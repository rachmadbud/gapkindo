<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalProductionDataset;
use App\Services\GlobalProductionSpreadsheetImporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Exception as SpreadsheetException;
use PhpOffice\PhpSpreadsheet\Reader\Exception as SpreadsheetReaderException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class GlobalProductionController extends Controller
{
    public function index()
    {
        $datasets = GlobalProductionDataset::withCount('productions')
            ->orderByDesc('year')
            ->orderByDesc('month')
            ->get();

        return view('admin.content.global-production.index', [
            'datasets' => $datasets,
            'months' => array_combine(range(1, 12), trans('global.guest.months')),
        ]);
    }

    public function upload(Request $request, GlobalProductionSpreadsheetImporter $importer)
    {
        $validated = $request->validate([
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|between:2000,2100',
            'excel' => 'required|file|mimes:xlsx,xls|max:10240',
        ]);

        try {
            $productions = $importer->import($request->file('excel'));
        } catch (SpreadsheetReaderException | SpreadsheetException $exception) {
            return back()
                ->withErrors(['excel' => 'File Excel tidak dapat dibaca. Pastikan file tidak rusak dan menggunakan format .xlsx atau .xls.'])
                ->withInput();
        }

        DB::transaction(function () use ($validated, $request, $productions) {
            $dataset = GlobalProductionDataset::updateOrCreate(
                ['month' => $validated['month'], 'year' => $validated['year']],
                ['source_filename' => Str::limit(basename($request->file('excel')->getClientOriginalName()), 255, '')]
            );

            $dataset->productions()->delete();
            $dataset->productions()->createMany($productions);
        });

        return redirect()
            ->route('admin.globalProduction')
            ->with('success', __('global.guest.globalProductionUploadSuccess'));
    }

    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Produksi Global');
        $sheet->fromArray([
            ['NO', 'NEGARA', 'PRODUKSI (TON)'],
            [1, 'Indonesia', 3450000],
            [2, 'Thailand', 4800000],
        ]);
        $sheet->getColumnDimension('A')->setWidth(8);
        $sheet->getColumnDimension('B')->setWidth(32);
        $sheet->getColumnDimension('C')->setWidth(24);
        $sheet->getStyle('A1:C1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['rgb' => '000000']],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FFC000'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);
        $sheet->getStyle('C2:C1002')->getNumberFormat()->setFormatCode('#,##0.###');
        $sheet->freezePane('A2');

        $instructions = $spreadsheet->createSheet();
        $instructions->setTitle('Petunjuk');
        $instructions->fromArray([
            ['PETUNJUK TEMPLATE PRODUKSI GLOBAL'],
            ['Isi satu baris untuk setiap negara pada sheet Produksi Global.'],
            ['Kolom yang diperlukan: NEGARA dan PRODUKSI (TON).'],
            ['Produksi harus berupa angka nol atau lebih.'],
            ['Periode bulan dan tahun dipilih pada form unggah admin.'],
            ['Jangan mengubah judul kolom pada sheet Produksi Global.'],
        ]);
        $instructions->getColumnDimension('A')->setWidth(100);
        $instructions->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $instructions->getStyle('A1:A6')->getAlignment()->setWrapText(true);
        $spreadsheet->setActiveSheetIndex(0);

        return response()->streamDownload(function () use ($spreadsheet) {
            (new Xlsx($spreadsheet))->save('php://output');
            $spreadsheet->disconnectWorksheets();
        }, 'template-produksi-global.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}
