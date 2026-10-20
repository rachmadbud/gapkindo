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
            for ($column = 1; $column <= $highestColumnIndex; $column++) {
                $header = strtolower(trim((string) $sheet->getCell([$column, $row])->getValue()));

                if (str_contains($header, 'provinsi') || str_contains($header, 'province') || str_contains($header, 'wilayah')) {
                    $headers['province'] = $column;
                } elseif (str_contains($header, 'produksi') || str_contains($header, 'production')) {
                    $headers['production'] = $column;
                }

                if (count($headers) === 2) {
                    $headerEndRow = $row;
                    break 2;
                }
            }
        }

        if (count($headers) !== 2) {
            throw ValidationException::withMessages([
                'excel' => 'Kolom Excel harus memuat Provinsi dan Produksi (Ton).',
            ]);
        }

        if ($highestRow - $headerEndRow > self::MAX_PROVINCES + 1) {
            throw ValidationException::withMessages([
                'excel' => 'File Excel melebihi batas 1.000 provinsi.',
            ]);
        }

        $productions = [];
        $seenProvinces = [];

        for ($row = $headerEndRow + 1; $row <= $highestRow; $row++) {
            $province = trim((string) ($sheet->getCell([$headers['province'], $row])->getValue() ?? ''));

            if ($province === '' || str_starts_with($province, '=') || preg_match('/^total\b/i', $province)) {
                continue;
            }

            $provinceKey = mb_strtolower($province);
            if (isset($seenProvinces[$provinceKey])) {
                throw ValidationException::withMessages([
                    'excel' => "Provinsi {$province} tercantum lebih dari sekali.",
                ]);
            }

            $production = $this->parseProduction(
                $sheet->getCell([$headers['production'], $row])->getValue(),
                $row
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

    private function parseProduction(mixed $value, int $row): float
    {
        if ($value === null || trim((string) $value) === '') {
            throw ValidationException::withMessages([
                'excel' => "Produksi pada baris {$row} harus diisi.",
            ]);
        }

        if (is_int($value) || is_float($value) || is_numeric($value)) {
            $number = (float) $value;
        } else {
            $normalized = str_replace([',', ' '], '', trim((string) $value));
            if (!preg_match('/^-?\d+(?:\.\d+)?$/', $normalized)) {
                throw ValidationException::withMessages([
                    'excel' => "Produksi pada baris {$row} bukan angka yang valid.",
                ]);
            }

            $number = (float) $normalized;
        }

        if (!is_finite($number) || $number < 0) {
            throw ValidationException::withMessages([
                'excel' => "Produksi pada baris {$row} harus berupa angka positif.",
            ]);
        }

        return $number;
    }
}
