<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\GlobalProductionController;
use App\Models\GlobalProductionDataset;
use App\Services\GlobalProductionSpreadsheetImporter;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\ViewErrorBag;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Tests\TestCase;

class GlobalProductionTest extends TestCase
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
            '--path' => 'database/migrations/2026_10_21_000000_create_global_production_tables.php',
            '--force' => true,
        ]);
    }

    public function test_public_production_page_displays_coming_soon_notice(): void
    {
        $dataset = GlobalProductionDataset::create([
            'month' => 5,
            'year' => 2025,
            'source_filename' => 'may-2025.xlsx',
        ]);
        $dataset->productions()->createMany([
            ['country' => 'Indonesia', 'production_ton' => 12345.5, 'position' => 1],
            ['country' => 'Thailand', 'production_ton' => 2655, 'position' => 2],
        ]);

        $this->get('/produksi-global?month=5&year=2025')
            ->assertOk()
            ->assertSee('Produksi Global')
            ->assertSee('Segera Hadir')
            ->assertSee('Nantikan sesuatu yang menarik!')
            ->assertSee('Kembali ke Dasbor');
    }

    public function test_admin_upload_replaces_data_for_the_selected_period(): void
    {
        $existingDataset = GlobalProductionDataset::create([
            'month' => 7,
            'year' => 2026,
            'source_filename' => 'old.xlsx',
        ]);
        $existingDataset->productions()->create([
            'country' => 'Old country',
            'production_ton' => 10,
            'position' => 1,
        ]);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NEGARA');
        $sheet->setCellValue('B1', 'PRODUKSI (TON)');
        $sheet->fromArray([
            ['Indonesia', 12345.678],
            ['Thailand', 9876.543],
        ], null, 'A2');

        $path = tempnam(sys_get_temp_dir(), 'global-production-upload-');
        (new Xlsx($spreadsheet))->save($path);
        $spreadsheet->disconnectWorksheets();

        try {
            $request = Request::create('/admin/global-production/upload', 'POST', [
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

            $response = (new GlobalProductionController())->upload(
                $request,
                new GlobalProductionSpreadsheetImporter()
            );
            $dataset = GlobalProductionDataset::with('productions')
                ->where('month', 7)
                ->where('year', 2026)
                ->firstOrFail();

            $this->assertSame(route('admin.globalProduction'), $response->getTargetUrl());
            $this->assertSame('july-2026.xlsx', $dataset->source_filename);
            $this->assertCount(2, $dataset->productions);
            $this->assertSame('Indonesia', $dataset->productions->first()->country);
            $this->assertEquals(12345.678, $dataset->productions->first()->production_ton);
        } finally {
            @unlink($path);
        }
    }

    public function test_template_contains_the_expected_global_production_columns(): void
    {
        $response = (new GlobalProductionController())->downloadTemplate();

        ob_start();
        $response->sendContent();
        $content = ob_get_clean();
        $path = tempnam(sys_get_temp_dir(), 'global-production-template-');
        file_put_contents($path, $content);

        try {
            $spreadsheet = IOFactory::load($path);
            $sheet = $spreadsheet->getSheetByName('Produksi Global');

            $this->assertNotNull($sheet);
            $this->assertSame('Produksi Global', $spreadsheet->getActiveSheet()->getTitle());
            $this->assertSame('NEGARA', $sheet->getCell('B1')->getValue());
            $this->assertSame('PRODUKSI (TON)', $sheet->getCell('C1')->getValue());
            $spreadsheet->disconnectWorksheets();
        } finally {
            @unlink($path);
        }
    }

    public function test_admin_page_has_upload_and_template_actions(): void
    {
        $view = (new GlobalProductionController())->index();
        $view->with('errors', new ViewErrorBag());
        $html = $view->render();

        $this->assertStringContainsString('Unggah data produksi global', $html);
        $this->assertStringContainsString(route('admin.globalProduction.upload'), $html);
        $this->assertStringContainsString(route('admin.globalProduction.template'), $html);
    }

    public function test_invalid_production_error_identifies_the_column_and_cell(): void
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray([
            ['NEGARA', 'PRODUKSI (TON)'],
            ['Indonesia', 'bukan angka'],
        ]);

        $this->assertImporterErrorContains($spreadsheet, ['B2', 'Ton', 'bukan angka']);
    }

    public function test_missing_header_error_names_the_missing_column(): void
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray([
            ['NEGARA', 'JUMLAH'],
            ['Indonesia', 100],
        ]);

        $this->assertImporterErrorContains($spreadsheet, ['Produksi (Ton)']);
    }

    public function test_duplicate_country_error_identifies_the_duplicate_cell(): void
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray([
            ['NEGARA', 'PRODUKSI (TON)'],
            ['Indonesia', 100],
            ['Indonesia', 200],
        ]);

        $this->assertImporterErrorContains($spreadsheet, ['Indonesia', 'A3']);
    }

    public function test_duplicate_header_error_identifies_both_header_cells(): void
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray([
            ['NEGARA', 'NEGARA PRODUSEN', 'PRODUKSI (TON)'],
            ['Indonesia', 'Indonesia', 100],
        ]);

        $this->assertImporterErrorContains($spreadsheet, ['A1', 'B1']);
    }

    public function test_migration_adds_a_missing_position_index_to_existing_tables(): void
    {
        Schema::table('global_productions', function (Blueprint $table) {
            $table->dropIndex('global_productions_dataset_position_idx');
        });

        $migration = require database_path('migrations/2026_10_21_000000_create_global_production_tables.php');
        $migration->up();

        $this->assertTrue(Schema::hasIndex(
            'global_productions',
            'global_productions_dataset_position_idx'
        ));
    }

    private function assertImporterErrorContains(Spreadsheet $spreadsheet, array $expectedFragments): void
    {
        $path = tempnam(sys_get_temp_dir(), 'global-production-invalid-');
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
                (new GlobalProductionSpreadsheetImporter())->import($file);
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
