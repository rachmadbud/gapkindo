<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExportDataset;
use App\Services\ExportSpreadsheetImporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Exception as SpreadsheetException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Exception as SpreadsheetReaderException;

class ExportDestinationController extends Controller
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
        $datasets = ExportDataset::withCount('destinations')
            ->orderByDesc('year')
            ->orderByDesc('month')
            ->get();

        return view('admin.content.export-destinations.index', [
            'datasets' => $datasets,
            'months' => self::MONTHS,
        ]);
    }

    public function upload(Request $request, ExportSpreadsheetImporter $importer)
    {
        $validated = $request->validate([
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|between:2000,2100',
            'excel' => 'required|file|mimes:xlsx,xls|max:10240',
        ]);

        try {
            $destinations = $importer->import($request->file('excel'));
        } catch (SpreadsheetReaderException | SpreadsheetException $exception) {
            return back()
                ->withErrors(['excel' => 'File Excel tidak dapat dibaca. Pastikan file tidak rusak dan menggunakan format .xlsx atau .xls.'])
                ->withInput();
        }

        DB::transaction(function () use ($validated, $request, $destinations) {
            $dataset = ExportDataset::updateOrCreate(
                ['month' => $validated['month'], 'year' => $validated['year']],
                ['source_filename' => Str::limit(basename($request->file('excel')->getClientOriginalName()), 255, '')]
            );

            $dataset->destinations()->delete();
            $dataset->destinations()->createMany($destinations);
        });

        return redirect()
            ->route('admin.exportDestinations')
            ->with('success', 'Data tujuan ekspor berhasil diimpor. Data pada periode yang sama telah diganti.');
    }

    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $dataSheet = $spreadsheet->getActiveSheet();
        $dataSheet->setTitle('Data Ekspor');
        $dataSheet->mergeCells('A1:A2');
        $dataSheet->mergeCells('B1:B2');
        $dataSheet->mergeCells('C1:D1');
        $dataSheet->setCellValue('A1', 'NO');
        $dataSheet->setCellValue('B1', 'NEGARA TUJUAN');
        $dataSheet->setCellValue('C1', 'DATA EKSPOR');
        $dataSheet->setCellValue('C2', 'VOLUME (KG)');
        $dataSheet->setCellValue('D2', 'NILAI (US$)');
        $dataSheet->getColumnDimension('A')->setWidth(8);
        $dataSheet->getColumnDimension('B')->setWidth(32);
        $dataSheet->getColumnDimension('C')->setWidth(22);
        $dataSheet->getColumnDimension('D')->setWidth(22);
        $dataSheet->getStyle('A1:D2')->applyFromArray([
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
        $dataSheet->freezePane('A3');
        $dataSheet->getStyle('C3:D1002')->getNumberFormat()->setFormatCode('#,##0.###');

        $instructionSheet = $spreadsheet->createSheet();
        $instructionSheet->setTitle('Petunjuk');
        $instructionSheet->fromArray([
            ['PETUNJUK TEMPLATE TUJUAN EKSPOR'],
            ['Isi satu baris untuk setiap negara tujuan pada sheet Data Ekspor.'],
            ['Kolom yang diperlukan: NEGARA TUJUAN, VOLUME (KG), dan NILAI (US$).'],
            ['Volume dan nilai harus berupa angka; gunakan tanda - atau kosong jika tidak ada data.'],
            ['Periode bulan dan tahun dipilih pada form unggah admin.'],
            ['Jangan mengubah baris judul/kolom pada sheet Data Ekspor.'],
        ]);
        $instructionSheet->getColumnDimension('A')->setWidth(100);
        $instructionSheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $instructionSheet->getStyle('A1:A6')->getAlignment()->setWrapText(true);
        $spreadsheet->setActiveSheetIndex(0);

        $fileName = 'template-tujuan-ekspor.xlsx';

        return response()->streamDownload(function () use ($spreadsheet) {
            (new Xlsx($spreadsheet))->save('php://output');
            $spreadsheet->disconnectWorksheets();
        }, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}
