<?php

namespace Tests\Unit;

use App\Services\ExportSpreadsheetImporter;
use App\Http\Controllers\Admin\ExportDestinationController;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Tests\TestCase;

class ExportSpreadsheetImporterTest extends TestCase
{
    public function test_it_imports_the_two_row_excel_header_and_ignores_total_rows(): void
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');
        $sheet->mergeCells('C1:D1');
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'NEGARA TUJUAN');
        $sheet->setCellValue('C1', 'JULI 2026');
        $sheet->setCellValue('C2', 'VOLUME (KG)');
        $sheet->setCellValue('D2', 'NILAI (US$)');
        $sheet->fromArray([
            [1, 'JAPAN', 33170831, 76196351],
            [2, 'HONGKONG', '-', '-'],
            ['', 'Total', 33170831, 76196351],
        ], null, 'A3');

        $path = tempnam(sys_get_temp_dir(), 'export-xlsx-');
        (new Xlsx($spreadsheet))->save($path);
        $spreadsheet->disconnectWorksheets();

        try {
            $file = new UploadedFile($path, 'juli-2026.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', null, true);
            $rows = (new ExportSpreadsheetImporter())->import($file);

            $this->assertSame([
                [
                    'country' => 'JAPAN',
                    'volume' => 33170831.0,
                    'value' => 76196351.0,
                    'position' => 1,
                ],
                [
                    'country' => 'HONGKONG',
                    'volume' => null,
                    'value' => null,
                    'position' => 2,
                ],
            ], $rows);
        } finally {
            @unlink($path);
        }
    }

    public function test_it_rejects_a_workbook_without_required_columns(): void
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray([
            ['NEGARA', 'JUMLAH'],
            ['JAPAN', 100],
        ]);

        $path = tempnam(sys_get_temp_dir(), 'export-invalid-');
        (new Xlsx($spreadsheet))->save($path);
        $spreadsheet->disconnectWorksheets();

        try {
            $file = new UploadedFile($path, 'invalid.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', null, true);

            $this->expectException(ValidationException::class);
            (new ExportSpreadsheetImporter())->import($file);
        } finally {
            @unlink($path);
        }
    }

    public function test_download_template_contains_the_expected_excel_columns(): void
    {
        $response = (new ExportDestinationController())->downloadTemplate();

        ob_start();
        $response->sendContent();
        $content = ob_get_clean();
        $path = tempnam(sys_get_temp_dir(), 'export-template-');
        file_put_contents($path, $content);

        try {
            $spreadsheet = IOFactory::load($path);
            $sheet = $spreadsheet->getSheetByName('Data Ekspor');

            $this->assertNotNull($sheet);
            $this->assertSame('Data Ekspor', $spreadsheet->getActiveSheet()->getTitle());
            $this->assertSame('NEGARA TUJUAN', $sheet->getCell('B1')->getValue());
            $this->assertSame('VOLUME (KG)', $sheet->getCell('C2')->getValue());
            $this->assertSame('NILAI (US$)', $sheet->getCell('D2')->getValue());
            $spreadsheet->disconnectWorksheets();
        } finally {
            @unlink($path);
        }
    }
}
