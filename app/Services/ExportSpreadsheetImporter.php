<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExportSpreadsheetImporter
{
    private const MAX_DESTINATIONS = 1000;

    public function import(UploadedFile $file): array
    {
        $reader = IOFactory::createReaderForFile($file->getRealPath());
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $highestColumnIndex = min(
            Coordinate::columnIndexFromString($sheet->getHighestDataColumn()),
            26
        );
        $highestRow = $sheet->getHighestDataRow();
        $headers = [];
        $headerEndRow = 0;

        for ($row = 1; $row <= min($highestRow, 10); $row++) {
            $rowHeaders = [];
            $rowHeaderCells = [];

            for ($column = 1; $column <= $highestColumnIndex; $column++) {
                $header = $this->normalizeHeader($sheet->getCell([$column, $row])->getValue());

                if ($header === '') {
                    continue;
                }

                $headerType = null;
                if (str_contains($header, 'negara') || str_contains($header, 'country')) {
                    $headerType = 'country';
                } elseif (str_contains($header, 'volume')) {
                    $headerType = 'volume';
                } elseif (str_contains($header, 'nilai') || str_contains($header, 'value')) {
                    $headerType = 'value';
                }

                if ($headerType !== null) {
                    $cell = Coordinate::stringFromColumnIndex($column) . $row;

                    if (isset($rowHeaderCells[$headerType])) {
                        throw ValidationException::withMessages([
                            'excel' => __('global.guest.spreadsheetDuplicateHeader', [
                                'column' => $this->headerLabel($headerType),
                                'firstCell' => $rowHeaderCells[$headerType],
                                'duplicateCell' => $cell,
                            ]),
                        ]);
                    }

                    $rowHeaders[$headerType] = $column;
                    $rowHeaderCells[$headerType] = $cell;
                }
            }

            $headers = array_merge($headers, $rowHeaders);

            if (count($headers) === 3) {
                $headerEndRow = $row;
                break;
            }
        }

        if (count($headers) !== 3) {
            $missingHeaders = [];
            foreach (['country', 'volume', 'value'] as $header) {
                if (!isset($headers[$header])) {
                    $missingHeaders[] = $this->headerLabel($header);
                }
            }

            throw ValidationException::withMessages([
                'excel' => __('global.guest.spreadsheetMissingHeaders', [
                    'columns' => implode(__('global.guest.spreadsheetHeaderSeparator'), $missingHeaders),
                ]),
            ]);
        }

        if ($highestRow - $headerEndRow > self::MAX_DESTINATIONS + 1) {
            throw ValidationException::withMessages([
                'excel' => __('global.guest.exportDestinationsExcelRowLimit'),
            ]);
        }

        $destinations = [];
        $seenCountries = [];

        for ($row = $headerEndRow + 1; $row <= $highestRow; $row++) {
            $countryCell = Coordinate::stringFromColumnIndex($headers['country']) . $row;
            $volumeCell = Coordinate::stringFromColumnIndex($headers['volume']) . $row;
            $valueCell = Coordinate::stringFromColumnIndex($headers['value']) . $row;
            $countryValue = $sheet->getCell([$headers['country'], $row])->getValue();
            $volumeValue = $sheet->getCell([$headers['volume'], $row])->getValue();
            $valueValue = $sheet->getCell([$headers['value'], $row])->getValue();
            $country = trim((string) ($countryValue ?? ''));

            if ($country === ''
                && $this->isEmptyNumber($volumeValue)
                && $this->isEmptyNumber($valueValue)) {
                continue;
            }

            if ($country === '') {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.exportDestinationExcelCountryRequired', [
                        'cell' => $countryCell,
                        'volumeCell' => $volumeCell,
                        'valueCell' => $valueCell,
                    ]),
                ]);
            }

            if (str_starts_with($country, '=')) {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.exportDestinationExcelInvalidCountry', [
                        'cell' => $countryCell,
                    ]),
                ]);
            }

            if (preg_match('/^total\b/i', $country)) {
                continue;
            }

            $countryKey = mb_strtolower($country);
            if (isset($seenCountries[$countryKey])) {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.exportDestinationExcelDuplicateCountry', [
                        'country' => $country,
                        'cell' => $countryCell,
                    ]),
                ]);
            }

            $volume = $this->parseNumber($volumeValue, $volumeCell, __('global.guest.exportVolume'));
            $value = $this->parseNumber($valueValue, $valueCell, __('global.guest.exportValue'));

            $seenCountries[$countryKey] = true;
            $destinations[] = [
                'country' => $country,
                'volume' => $volume,
                'value' => $value,
                'position' => count($destinations) + 1,
            ];

            if (count($destinations) > self::MAX_DESTINATIONS) {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.exportDestinationsExcelRowLimit'),
                ]);
            }
        }

        if ($destinations === []) {
            throw ValidationException::withMessages([
                'excel' => __('global.guest.exportDestinationsExcelEmpty'),
            ]);
        }

        return $destinations;
    }

    private function normalizeHeader(mixed $value): string
    {
        return strtolower(trim((string) $value));
    }

    private function headerLabel(string $header): string
    {
        return match ($header) {
            'country' => __('global.guest.exportDestinationCountry'),
            'volume' => __('global.guest.exportVolume'),
            'value' => __('global.guest.exportValue'),
        };
    }

    private function isEmptyNumber(mixed $value): bool
    {
        return $value === null
            || trim((string) $value) === ''
            || in_array(trim((string) $value), ['-', '–', '—'], true);
    }

    private function parseNumber(mixed $value, string $cell, string $column): ?float
    {
        if ($this->isEmptyNumber($value)) {
            return null;
        }

        if (is_int($value) || is_float($value) || is_numeric($value)) {
            $number = (float) $value;
        } else {
            $normalized = str_replace([',', ' '], '', trim((string) $value));
            if (!preg_match('/^-?\d+(?:\.\d+)?$/', $normalized)) {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.spreadsheetNumberInvalid', [
                        'column' => $column,
                        'cell' => $cell,
                        'value' => (string) $value,
                    ]),
                ]);
            }

            $number = (float) $normalized;
        }

        if (!is_finite($number) || $number < 0) {
            throw ValidationException::withMessages([
                'excel' => __('global.guest.spreadsheetNumberNegative', [
                    'column' => $column,
                    'cell' => $cell,
                    'value' => (string) $value,
                ]),
            ]);
        }

        return $number;
    }
}
