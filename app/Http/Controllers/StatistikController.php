<?php

namespace App\Http\Controllers;

use App\Models\ExportDataset;
use App\Models\ExportDestination;
use App\Models\GlobalProductionDataset;
use App\Models\IndonesiaProductionDataset;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        $exportYear = ExportDataset::query()->max('year');
        $destinationsForYear = ExportDestination::query()
            ->whereHas('dataset', fn($query) => $query->where('year', $exportYear));
        $totalExportVolumeKg = (clone $destinationsForYear)->sum('volume');
        $destinationCountryCount = $destinationsForYear
            ->selectRaw('COUNT(DISTINCT LOWER(TRIM(country))) as country_count')
            ->value('country_count');

        return view('guest.statistik.index', [
            'totalExportVolumeKg' => $totalExportVolumeKg,
            'destinationCountryCount' => (int) $destinationCountryCount,
            'exportYear' => $exportYear,
        ]);
    }

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
            ->map(fn($year) => (int) $year)
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
            'destinations' => fn($query) => $query->orderBy('position'),
        ])
            ->where('month', $selectedMonth)
            ->where('year', $selectedYear)
            ->first();

        $exportDestinations = $dataset
            ? $dataset->destinations->map(fn($destination) => [
                'country' => $destination->country,
                'volume' => $destination->volume !== null ? (float) $destination->volume : null,
                'value' => $destination->value !== null ? (float) $destination->value : null,
            ])->all()
            : [];

        $totalVolume = array_sum(array_column($exportDestinations, 'volume'));
        $totalValue = array_sum(array_column($exportDestinations, 'value'));
        $chartMaximum = max(1, max(array_column($exportDestinations, 'volume') ?: [0]));

        return view('guest.statistik.tujuan-ekspor', [
            'months' => $this->localizedMonths(),
            'years' => $years,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'exportDestinations' => $exportDestinations,
            'totalVolume' => $totalVolume,
            'totalValue' => $totalValue,
            'chartMaximum' => $chartMaximum,
        ]);
    }

    public function produksiIndonesia(Request $request)
    {
        $validated = $request->validate([
            'month' => 'nullable|integer|between:1,12',
            'year' => 'nullable|integer|between:2000,2100',
        ]);

        $latestDataset = IndonesiaProductionDataset::orderByDesc('year')
            ->orderByDesc('month')
            ->first();
        $years = IndonesiaProductionDataset::query()
            ->select('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->map(fn($year) => (int) $year)
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

        $dataset = IndonesiaProductionDataset::with([
            'productions' => fn($query) => $query->orderBy('position'),
        ])
            ->where('month', $selectedMonth)
            ->where('year', $selectedYear)
            ->first();

        $productions = $dataset
            ? $dataset->productions->map(fn($production) => [
                'province' => $production->province,
                'production_ton' => (float) $production->production_ton,
            ])->all()
            : [];

        return view('guest.statistik.produksi-indonesia', [
            'months' => $this->localizedMonths(),
            'years' => $years,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'productions' => $productions,
            'totalProduction' => array_sum(array_column($productions, 'production_ton')),
            'chartMaximum' => max(1, max(array_column($productions, 'production_ton') ?: [0])),
        ]);
    }

    public function produksiGlobal(Request $request)
    {
        $validated = $request->validate([
            'month' => 'nullable|integer|between:1,12',
            'year' => 'nullable|integer|between:2000,2100',
        ]);

        $latestDataset = GlobalProductionDataset::orderByDesc('year')
            ->orderByDesc('month')
            ->first();
        $years = GlobalProductionDataset::query()
            ->select('year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->map(fn($year) => (int) $year)
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

        $dataset = GlobalProductionDataset::with([
            'productions' => fn($query) => $query->orderBy('position'),
        ])
            ->where('month', $selectedMonth)
            ->where('year', $selectedYear)
            ->first();

        $productions = $dataset
            ? $dataset->productions->map(fn($production) => [
                'country' => $production->country,
                'production_ton' => (float) $production->production_ton,
            ])->all()
            : [];

        return view('guest.statistik.produksi-global', [
            'months' => $this->localizedMonths(),
            'years' => $years,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'productions' => $productions,
            'totalProduction' => array_sum(array_column($productions, 'production_ton')),
            'chartMaximum' => max(1, max(array_column($productions, 'production_ton') ?: [0])),
        ]);
    }

    private function localizedMonths(): array
    {
        return array_combine(range(1, 12), trans('global.guest.months'));
    }
}
