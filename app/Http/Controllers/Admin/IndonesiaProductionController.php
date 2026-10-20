<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndonesiaProductionDataset;
use App\Services\IndonesiaProductionSpreadsheetImporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Exception as SpreadsheetException;
use PhpOffice\PhpSpreadsheet\Reader\Exception as SpreadsheetReaderException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class IndonesiaProductionController extends Controller
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

    public function index()
    {
        $datasets = IndonesiaProductionDataset::withCount('productions')
            ->orderByDesc('year')
            ->orderByDesc('month')
            ->get();

        return view('admin.content.indonesia-production.index', [
            'datasets' => $datasets,
            'months' => self::MONTHS,
        ]);
    }

    public function upload(Request $request, IndonesiaProductionSpreadsheetImporter $importer)
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
            $dataset = IndonesiaProductionDataset::updateOrCreate(
                ['month' => $validated['month'], 'year' => $validated['year']],
                ['source_filename' => Str::limit(basename($request->file('excel')->getClientOriginalName()), 255, '')]
            );

            $dataset->productions()->delete();
            $dataset->productions()->createMany($productions);
        });

        return redirect()
            ->route('admin.indonesiaProduction')
            ->with('success', 'Data produksi di Indonesia berhasil diimpor. Data pada periode yang sama telah diganti.');
    }

    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Produksi Indonesia');
        $sheet->fromArray([
            ['NO', 'PROVINSI', 'PRODUKSI (TON)'],
            [1, 'Sumatera Utara', 12345.678],
            [2, 'Jawa Barat', 9876.543],
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
            ['PETUNJUK TEMPLATE PRODUKSI DI INDONESIA'],
            ['Isi satu baris untuk setiap provinsi atau wilayah pada sheet Produksi Indonesia.'],
            ['Kolom yang diperlukan: PROVINSI dan PRODUKSI (TON).'],
            ['Produksi harus berupa angka nol atau lebih.'],
            ['Periode bulan dan tahun dipilih pada form unggah admin.'],
            ['Jangan mengubah judul kolom pada sheet Produksi Indonesia.'],
        ]);
        $instructions->getColumnDimension('A')->setWidth(100);
        $instructions->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $instructions->getStyle('A1:A6')->getAlignment()->setWrapText(true);
        $spreadsheet->setActiveSheetIndex(0);

        return response()->streamDownload(function () use ($spreadsheet) {
            (new Xlsx($spreadsheet))->save('php://output');
            $spreadsheet->disconnectWorksheets();
        }, 'template-produksi-indonesia.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}
