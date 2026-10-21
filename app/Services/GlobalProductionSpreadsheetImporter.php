<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GlobalProductionSpreadsheetImporter
{
    private const MAX_COUNTRIES = 1000;

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
                $header = strtolower(trim((string) $sheet->getCell([$column, $row])->getValue()));
                $headerType = null;

                if (str_contains($header, 'negara') || str_contains($header, 'country')) {
                    $headerType = 'country';
                } elseif (str_contains($header, 'produksi') || str_contains($header, 'production')) {
                    $headerType = 'production';
                }

                if ($headerType !== null) {
                    $cell = Coordinate::stringFromColumnIndex($column) . $row;

                    if (isset($rowHeaderCells[$headerType])) {
                        throw ValidationException::withMessages([
                            'excel' => __('global.guest.globalProductionExcelDuplicateHeader', [
                                'column' => $headerType === 'country'
                                    ? __('global.guest.countries')
                                    : __('global.guest.production'),
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
            $headers = array_merge($headers, $rowHeaders);

            if (count($headers) === 2) {
                $headerEndRow = $row;
                break;
            }
        }

        if (count($headers) !== 2) {
            $missingHeaders = [];
            if (!isset($headers['country'])) {
                $missingHeaders[] = __('global.guest.countries');
            }
            if (!isset($headers['production'])) {
                $missingHeaders[] = __('global.guest.production') . ' (Ton)';
            }

            throw ValidationException::withMessages([
                'excel' => __('global.guest.globalProductionExcelMissingHeaders', [
                    'columns' => implode(__('global.guest.globalProductionExcelHeaderSeparator'), $missingHeaders),
                ]),
            ]);
        }

        if ($highestRow - $headerEndRow > self::MAX_COUNTRIES + 1) {
            throw ValidationException::withMessages([
                'excel' => 'File Excel melebihi batas 1.000 negara.',
            ]);
        }

        $productions = [];
        $seenCountries = [];

        for ($row = $headerEndRow + 1; $row <= $highestRow; $row++) {
            $countryCell = Coordinate::stringFromColumnIndex($headers['country']) . $row;
            $productionCell = Coordinate::stringFromColumnIndex($headers['production']) . $row;
            $countryValue = $sheet->getCell([$headers['country'], $row])->getValue();
            $productionValue = $sheet->getCell([$headers['production'], $row])->getValue();
            $country = trim((string) ($countryValue ?? ''));

            if ($country === '' && ($productionValue === null || trim((string) $productionValue) === '')) {
                continue;
            }

            if ($country === '') {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.globalProductionExcelCountryRequired', [
                        'cell' => $countryCell,
                        'productionCell' => $productionCell,
                    ]),
                ]);
            }

            if (str_starts_with($country, '=')) {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.globalProductionExcelInvalidCountry', [
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
                    'excel' => __('global.guest.globalProductionExcelDuplicateCountry', [
                        'country' => $country,
                        'cell' => $countryCell,
                    ]),
                ]);
            }

            $production = $this->parseProduction(
                $productionValue,
                $productionCell
            );

            $seenCountries[$countryKey] = true;
            $productions[] = [
                'country' => $country,
                'production_ton' => $production,
                'position' => count($productions) + 1,
            ];
        }

        if ($productions === []) {
            throw ValidationException::withMessages([
                'excel' => 'File Excel tidak berisi baris produksi negara.',
            ]);
        }

        return $productions;
    }

    private function parseProduction(mixed $value, string $cell): float
    {
        if ($value === null || trim((string) $value) === '') {
            throw ValidationException::withMessages([
                'excel' => __('global.guest.globalProductionExcelProductionRequired', [
                    'cell' => $cell,
                ]),
            ]);
        }

        if (is_int($value) || is_float($value) || is_numeric($value)) {
            $number = (float) $value;
        } else {
            $normalized = str_replace([',', ' '], '', trim((string) $value));
            if (!preg_match('/^-?\d+(?:\.\d+)?$/', $normalized)) {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.globalProductionExcelProductionInvalid', [
                        'cell' => $cell,
                        'value' => (string) $value,
                    ]),
                ]);
            }

            $number = (float) $normalized;
        }

        if (!is_finite($number) || $number < 0) {
            throw ValidationException::withMessages([
                'excel' => __('global.guest.globalProductionExcelProductionNegative', [
                    'cell' => $cell,
                    'value' => (string) $value,
                ]),
            ]);
        }

        return $number;
    }
}
