<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;
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
            \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($sheet->getHighestDataColumn()),
            26
        );
        $highestRow = $sheet->getHighestDataRow();
        $headers = [];
        $headerEndRow = 0;

        for ($row = 1; $row <= min($highestRow, 10); $row++) {
            for ($column = 1; $column <= $highestColumnIndex; $column++) {
                $header = $this->normalizeHeader($sheet->getCell([$column, $row])->getValue());

                if ($header === '') {
                    continue;
                }

                if (str_contains($header, 'negara') || str_contains($header, 'country')) {
                    $headers['country'] = $column;
                } elseif (str_contains($header, 'volume')) {
                    $headers['volume'] = $column;
                } elseif (str_contains($header, 'nilai') || str_contains($header, 'value')) {
                    $headers['value'] = $column;
                }

                if (count($headers) === 3) {
                    $headerEndRow = $row;
                    break 2;
                }
            }
        }

        if (count($headers) !== 3) {
            throw ValidationException::withMessages([
                'excel' => 'Kolom Excel harus memuat Negara Tujuan, Volume (KG), dan Nilai (US$).',
            ]);
        }

        if ($highestRow - $headerEndRow > self::MAX_DESTINATIONS + 1) {
            throw ValidationException::withMessages([
                'excel' => 'File Excel melebihi batas 1.000 negara tujuan.',
            ]);
        }

        $destinations = [];
        $seenCountries = [];

        for ($row = $headerEndRow + 1; $row <= $highestRow; $row++) {
            $countryValue = $sheet->getCell([$headers['country'], $row])->getValue();
            $country = trim((string) ($countryValue ?? ''));

            if ($country === '' || str_starts_with($country, '=')) {
                continue;
            }

            if (preg_match('/^total\b/i', $country)) {
                continue;
            }

            $countryKey = mb_strtolower($country);
            if (isset($seenCountries[$countryKey])) {
                throw ValidationException::withMessages([
                    'excel' => "Negara tujuan {$country} tercantum lebih dari sekali.",
                ]);
            }

            $volume = $this->parseNumber($sheet->getCell([$headers['volume'], $row])->getValue(), $row, 'Volume');
            $value = $this->parseNumber($sheet->getCell([$headers['value'], $row])->getValue(), $row, 'Nilai');

            $seenCountries[$countryKey] = true;
            $destinations[] = [
                'country' => $country,
                'volume' => $volume,
                'value' => $value,
                'position' => count($destinations) + 1,
            ];

            if (count($destinations) > self::MAX_DESTINATIONS) {
                throw ValidationException::withMessages([
                    'excel' => 'File Excel melebihi batas 1.000 negara tujuan.',
                ]);
            }
        }

        if ($destinations === []) {
            throw ValidationException::withMessages([
                'excel' => 'File Excel tidak berisi baris negara tujuan.',
            ]);
        }

        return $destinations;
    }

    private function normalizeHeader(mixed $value): string
    {
        return strtolower(trim((string) $value));
    }

    private function parseNumber(mixed $value, int $row, string $column): ?float
    {
        if ($value === null || trim((string) $value) === '' || in_array(trim((string) $value), ['-', '–', '—'], true)) {
            return null;
        }

        if (is_int($value) || is_float($value) || is_numeric($value)) {
            $number = (float) $value;
        } else {
            $normalized = str_replace([',', ' '], '', trim((string) $value));
            if (!preg_match('/^-?\d+(?:\.\d+)?$/', $normalized)) {
                throw ValidationException::withMessages([
                    'excel' => "Nilai {$column} pada baris {$row} bukan angka yang valid.",
                ]);
            }

            $number = (float) $normalized;
        }

        if (!is_finite($number) || $number < 0) {
            throw ValidationException::withMessages([
                'excel' => "Nilai {$column} pada baris {$row} harus berupa angka positif.",
            ]);
        }

        return $number;
    }
}
