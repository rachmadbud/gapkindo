<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

class IndonesiaProductionSpreadsheetImporter
{
    private const MAX_PROVINCES = 1000;

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

                if (str_contains($header, 'provinsi') || str_contains($header, 'province') || str_contains($header, 'wilayah')) {
                    $headerType = 'province';
                } elseif (str_contains($header, 'produksi') || str_contains($header, 'production')) {
                    $headerType = 'production';
                }

                if ($headerType !== null) {
                    $cell = Coordinate::stringFromColumnIndex($column) . $row;

                    if (isset($rowHeaderCells[$headerType])) {
                        throw ValidationException::withMessages([
                            'excel' => __('global.guest.spreadsheetDuplicateHeader', [
                                'column' => $headerType === 'province'
                                    ? __('global.guest.provinces')
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

            if (count($headers) === 2) {
                $headerEndRow = $row;
                break;
            }
        }

        if (count($headers) !== 2) {
            $missingHeaders = [];
            if (!isset($headers['province'])) {
                $missingHeaders[] = __('global.guest.provinces');
            }
            if (!isset($headers['production'])) {
                $missingHeaders[] = __('global.guest.production') . ' (Ton)';
            }

            throw ValidationException::withMessages([
                'excel' => __('global.guest.spreadsheetMissingHeaders', [
                    'columns' => implode(__('global.guest.spreadsheetHeaderSeparator'), $missingHeaders),
                ]),
            ]);
        }

        if ($highestRow - $headerEndRow > self::MAX_PROVINCES + 1) {
            throw ValidationException::withMessages([
                'excel' => __('global.guest.indonesiaProductionExcelRowLimit'),
            ]);
        }

        $productions = [];
        $seenProvinces = [];

        for ($row = $headerEndRow + 1; $row <= $highestRow; $row++) {
            $provinceCell = Coordinate::stringFromColumnIndex($headers['province']) . $row;
            $productionCell = Coordinate::stringFromColumnIndex($headers['production']) . $row;
            $provinceValue = $sheet->getCell([$headers['province'], $row])->getValue();
            $productionValue = $sheet->getCell([$headers['production'], $row])->getValue();
            $province = trim((string) ($provinceValue ?? ''));

            if ($province === '' && ($productionValue === null || trim((string) $productionValue) === '')) {
                continue;
            }

            if ($province === '') {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.indonesiaProductionExcelProvinceRequired', [
                        'cell' => $provinceCell,
                        'productionCell' => $productionCell,
                    ]),
                ]);
            }

            if (str_starts_with($province, '=')) {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.indonesiaProductionExcelInvalidProvince', [
                        'cell' => $provinceCell,
                    ]),
                ]);
            }

            if (preg_match('/^total\b/i', $province)) {
                continue;
            }

            $provinceKey = mb_strtolower($province);
            if (isset($seenProvinces[$provinceKey])) {
                throw ValidationException::withMessages([
                    'excel' => __('global.guest.indonesiaProductionExcelDuplicateProvince', [
                        'province' => $province,
                        'cell' => $provinceCell,
                    ]),
                ]);
            }

            $production = $this->parseProduction(
                $productionValue,
                $productionCell
            );

            $seenProvinces[$provinceKey] = true;
            $productions[] = [
                'province' => $province,
                'production_ton' => $production,
                'position' => count($productions) + 1,
            ];
        }

        if ($productions === []) {
            throw ValidationException::withMessages([
                'excel' => 'File Excel tidak berisi baris produksi provinsi.',
            ]);
        }

        return $productions;
    }

    private function parseProduction(mixed $value, string $cell): float
    {
        if ($value === null || trim((string) $value) === '') {
            throw ValidationException::withMessages([
                'excel' => __('global.guest.spreadsheetNumberRequired', [
                    'column' => __('global.guest.production') . ' (Ton)',
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
                    'excel' => __('global.guest.spreadsheetNumberInvalid', [
                        'column' => __('global.guest.production') . ' (Ton)',
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
                    'column' => __('global.guest.production') . ' (Ton)',
                    'cell' => $cell,
                    'value' => (string) $value,
                ]),
            ]);
        }

        return $number;
    }
}
