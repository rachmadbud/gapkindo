<?php

namespace Tests\Feature;

use App\Data\IndonesiaRubberProductionData;
use App\Http\Controllers\Admin\IndonesiaProductionController;
use App\Models\IndonesiaProductionDataset;
use App\Services\IndonesiaProductionSpreadsheetImporter;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Tests\TestCase;

class IndonesiaProductionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        app()->setLocale('id');
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

    public function test_migration_resumes_when_table_creation_succeeded_before_index_failure(): void
    {
        Schema::table('indonesia_productions', function (Blueprint $table) {
            $table->dropIndex('indonesia_productions_dataset_position_idx');
        });

        $migration = require database_path('migrations/2026_10_20_000000_create_indonesia_production_tables.php');
        $migration->up();

        $this->assertTrue(Schema::hasIndex(
            'indonesia_productions',
            'indonesia_productions_dataset_position_idx'
        ));
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

        $this->withCookie('locale', 'id')
            ->get('/produksi-indonesia?month=5&year=2025')
            ->assertOk()
            ->assertSee('Produksi Indonesia')
            ->assertSee('Mei')
            ->assertSee('Sumatera Utara')
            ->assertSee('12.345,500')
            ->assertSee('15.000,500');
    }

    public function test_public_production_page_displays_historical_chart_data_and_hover_points(): void
    {
        $historicalProduction = IndonesiaRubberProductionData::all();
        $this->assertCount(57, $historicalProduction['years']);
        foreach ($historicalProduction['series'] as $series) {
            $this->assertCount(57, $series['values']);
        }
        $this->assertEquals(3111.253, $historicalProduction['series'][0]['values'][48]);
        $this->assertEquals(3680.428, array_sum(array_map(
            fn($series) => $series['values'][47],
            $historicalProduction['series']
        )));

        $this->get('/produksi-indonesia')
            ->assertOk()
            ->assertSee('Produksi Karet Indonesia')
            ->assertSee('PR (Perkebunan Rakyat)')
            ->assertSee('PBN (Perkebunan Besar Negara)')
            ->assertSee('PBS (Perkebunan Besar Swasta)')
            ->assertSee('2025*)')
            ->assertSee('2026**)')
            ->assertSee('Direktorat Jenderal Perkebunan')
            ->assertSee('Dashboard Analitik Produksi Karet Indonesia')
            ->assertSee('3.680,4')
            ->assertSee('79,7%')
            ->assertDontSee('Mode area')
            ->assertSee('gpk-history-point', false);
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

    public function test_invalid_production_error_identifies_the_column_and_cell(): void
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray([
            ['PROVINSI', 'PRODUKSI (TON)'],
            ['Jawa Barat', 'bukan angka'],
        ]);

        $this->assertImporterErrorContains($spreadsheet, ['B2', 'Ton', 'bukan angka']);
    }

    public function test_missing_production_header_error_names_the_missing_column(): void
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray([
            ['PROVINSI', 'JUMLAH'],
            ['Jawa Barat', 100],
        ]);

        $this->assertImporterErrorContains($spreadsheet, ['Produksi (Ton)']);
    }

    public function test_duplicate_province_error_identifies_the_duplicate_cell(): void
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray([
            ['PROVINSI', 'PRODUKSI (TON)'],
            ['Jawa Barat', 100],
            ['Jawa Barat', 200],
        ]);

        $this->assertImporterErrorContains($spreadsheet, ['Jawa Barat', 'A3']);
    }

    private function assertImporterErrorContains(Spreadsheet $spreadsheet, array $expectedFragments): void
    {
        $path = tempnam(sys_get_temp_dir(), 'production-invalid-');
        (new Xlsx($spreadsheet))->save($path);
        $spreadsheet->disconnectWorksheets();

        try {
            $file = new UploadedFile(
                $path,
                'invalid.xlsx',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                null,
                true
            );

            try {
                (new IndonesiaProductionSpreadsheetImporter())->import($file);
                $this->fail('Expected the Excel importer to reject invalid data.');
            } catch (ValidationException $exception) {
                $message = $exception->errors()['excel'][0];
                foreach ($expectedFragments as $fragment) {
                    $this->assertStringContainsString($fragment, $message);
                }
            }
        } finally {
            @unlink($path);
        }
    }
}
