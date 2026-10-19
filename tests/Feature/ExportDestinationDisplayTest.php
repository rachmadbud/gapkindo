<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\ExportDestinationController;
use App\Models\ExportDataset;
use App\Services\ExportSpreadsheetImporter;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Tests\TestCase;

class ExportDestinationDisplayTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
        ]);
        DB::purge('sqlite');

        Artisan::call('migrate', [
            '--path' => 'database/migrations/2025_08_27_032832_create_news_table.php',
            '--force' => true,
        ]);
        Artisan::call('migrate', [
            '--path' => 'database/migrations/2026_10_19_000000_create_export_datasets_tables.php',
            '--force' => true,
        ]);
    }

    public function test_public_export_page_displays_the_selected_months_uploaded_data(): void
    {
        $dataset = ExportDataset::create([
            'month' => 7,
            'year' => 2026,
            'source_filename' => 'july-2026.xlsx',
        ]);
        $dataset->destinations()->createMany([
            [
                'country' => 'JAPAN',
                'volume' => 33170831,
                'value' => 76196351,
                'position' => 1,
            ],
            [
                'country' => 'HONGKONG',
                'volume' => null,
                'value' => null,
                'position' => 2,
            ],
        ]);

        $this->withoutExceptionHandling()
            ->get('/tujuan-ekspor?month=7&year=2026')
            ->assertOk()
            ->assertSee('Juli')
            ->assertSee('JAPAN')
            ->assertSee('33.170.831 KG')
            ->assertSee('US$ 76.196.351')
            ->assertSee('HONGKONG');
    }

    public function test_admin_upload_replaces_the_selected_period_with_excel_rows(): void
    {
        $existingDataset = ExportDataset::create([
            'month' => 7,
            'year' => 2026,
            'source_filename' => 'old.xlsx',
        ]);
        $existingDataset->destinations()->create([
            'country' => 'OLD DESTINATION',
            'volume' => 10,
            'value' => 20,
            'position' => 1,
        ]);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NEGARA TUJUAN');
        $sheet->setCellValue('B1', 'VOLUME (KG)');
        $sheet->setCellValue('C1', 'NILAI (US$)');
        $sheet->fromArray([['JAPAN', 33170831, 76196351]], null, 'A2');

        $path = tempnam(sys_get_temp_dir(), 'export-upload-');
        (new Xlsx($spreadsheet))->save($path);
        $spreadsheet->disconnectWorksheets();

        try {
            $request = Request::create('/admin/export-destinations/upload', 'POST', [
                'month' => 7,
                'year' => 2026,
            ], [], [
                'excel' => new UploadedFile(
                    $path,
                    'july-2026.xlsx',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    null,
                    true
                ),
            ]);

            $response = (new ExportDestinationController())->upload($request, new ExportSpreadsheetImporter());
            $dataset = ExportDataset::with('destinations')->where('month', 7)->where('year', 2026)->firstOrFail();

            $this->assertSame(route('admin.exportDestinations'), $response->getTargetUrl());
            $this->assertSame('july-2026.xlsx', $dataset->source_filename);
            $this->assertCount(1, $dataset->destinations);
            $this->assertSame('JAPAN', $dataset->destinations->first()->country);
        } finally {
            @unlink($path);
        }
    }
}
