<?php

namespace App\Http\Controllers;

use App\Models\ExportDataset;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    private const MONTHS = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    public function tujuanEkspor(Request $request)
    {
        $validated = $request->validate([
            'month' => 'nullable|integer|between:1,12',
            'year' => 'nullable|integer|between:2000,2100',
        ]);

        $latestDataset = ExportDataset::orderByDesc('year')
            ->orderByDesc('month')
            ->first();
        $years = ExportDataset::query()
            ->select('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->map(fn ($year) => (int) $year)
            ->all();

        if ($years === []) {
            $years = [now()->year];
        }

        $selectedMonth = (int) ($validated['month'] ?? $latestDataset?->month ?? now()->month);
        $selectedYear = (int) ($validated['year'] ?? $latestDataset?->year ?? now()->year);

        if (!in_array($selectedYear, $years, true)) {
            $years[] = $selectedYear;
            rsort($years);
        }

        $dataset = ExportDataset::with([
            'destinations' => fn ($query) => $query->orderBy('position'),
        ])
            ->where('month', $selectedMonth)
            ->where('year', $selectedYear)
            ->first();

        $exportDestinations = $dataset
            ? $dataset->destinations->map(fn ($destination) => [
                'country' => $destination->country,
                'volume' => $destination->volume !== null ? (float) $destination->volume : null,
                'value' => $destination->value !== null ? (float) $destination->value : null,
            ])->all()
            : [];

        $totalVolume = array_sum(array_column($exportDestinations, 'volume'));
        $totalValue = array_sum(array_column($exportDestinations, 'value'));
        $chartMaximum = max(1, max(array_column($exportDestinations, 'volume') ?: [0]));

        return view('guest.statistik.tujuan-ekspor', [
            'months' => self::MONTHS,
            'years' => $years,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'exportDestinations' => $exportDestinations,
            'totalVolume' => $totalVolume,
            'totalValue' => $totalValue,
            'chartMaximum' => $chartMaximum,
        ]);
    }
}
