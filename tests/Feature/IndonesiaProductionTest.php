<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\IndonesiaProductionController;
use App\Models\IndonesiaProductionDataset;
use App\Services\IndonesiaProductionSpreadsheetImporter;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Tests\TestCase;

class IndonesiaProductionTest extends TestCase
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
            '--path' => 'database/migrations/2026_10_20_000000_create_indonesia_production_tables.php',
            '--force' => true,
        ]);
    }

    public function test_public_production_page_displays_database_data_for_selected_period(): void
    {
        $dataset = IndonesiaProductionDataset::create([
            'month' => 5,
            'year' => 2025,
            'source_filename' => 'may-2025.xlsx',
        ]);
        $dataset->productions()->createMany([
            ['province' => 'Sumatera Utara', 'production_ton' => 12345.5, 'position' => 1],
            ['province' => 'Jawa Barat', 'production_ton' => 2655, 'position' => 2],
        ]);

        $this->get('/produksi-indonesia?month=5&year=2025')
            ->assertOk()
            ->assertSee('Production in Indonesia')
            ->assertSee('Mei')
            ->assertSee('Sumatera Utara')
            ->assertSee('12.345,500 ton')
            ->assertSee('15.000,500');
    }

    public function test_admin_upload_replaces_production_data_for_the_selected_period(): void
    {
        $existingDataset = IndonesiaProductionDataset::create([
            'month' => 7,
            'year' => 2026,
            'source_filename' => 'old.xlsx',
        ]);
        $existingDataset->productions()->create([
            'province' => 'Old Province',
            'production_ton' => 10,
            'position' => 1,
        ]);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'PROVINSI');
        $sheet->setCellValue('B1', 'PRODUKSI (TON)');
        $sheet->fromArray([
            ['Sumatera Utara', 12345.678],
            ['Jawa Barat', 9876.543],
        ], null, 'A2');

        $path = tempnam(sys_get_temp_dir(), 'production-upload-');
        (new Xlsx($spreadsheet))->save($path);
        $spreadsheet->disconnectWorksheets();

        try {
            $request = Request::create('/admin/indonesia-production/upload', 'POST', [
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

            $response = (new IndonesiaProductionController())->upload(
                $request,
                new IndonesiaProductionSpreadsheetImporter()
            );
            $dataset = IndonesiaProductionDataset::with('productions')
                ->where('month', 7)
                ->where('year', 2026)
                ->firstOrFail();

            $this->assertSame(route('admin.indonesiaProduction'), $response->getTargetUrl());
            $this->assertSame('july-2026.xlsx', $dataset->source_filename);
            $this->assertCount(2, $dataset->productions);
            $this->assertSame('Sumatera Utara', $dataset->productions->first()->province);
            $this->assertEquals(12345.678, $dataset->productions->first()->production_ton);
        } finally {
            @unlink($path);
        }
    }
}
