<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PricesDashboardTest extends TestCase
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
    }

    public function test_prices_navigation_opens_the_dashboard_with_a_sicom_market_summary(): void
    {
        $this->get('/harga')
            ->assertOk()
            ->assertSee('Dasbor Harga')
            ->assertSee('SICOM TSR20')
            ->assertSee('SGX:TF1!')
            ->assertSee(route('sicom-tsr20'))
            ->assertSee('gpk-stat-card')
            ->assertSee('gpk-price-chart')
            ->assertSee('#1e3a8a');
    }

    public function test_sicom_ts_r20_page_links_to_the_tradingview_chart_for_the_requested_symbol(): void
    {
        $this->get('/sicom-tsr20')
            ->assertOk()
            ->assertSee('SICOM TSR20')
            ->assertSee('SICOM-TSR20')
            ->assertSee('gpk-price-chart')
            ->assertSee('Januari 2026')
            ->assertSee('Buka')
            ->assertSee('Tertinggi')
            ->assertSee('Terendah')
            ->assertSee('Oktober 2026')
            ->assertSee('258,2')
            ->assertSee('Lihat Chart di TradingView')
            ->assertSee('https://id.tradingview.com/chart/?symbol=SGX%3ATF1%21');
    }

    public function test_guest_price_pages_use_english_when_the_language_cookie_is_set(): void
    {
        $this->withCookie('locale', 'en')
            ->get('/harga')
            ->assertOk()
            ->assertSee('Price Dashboard')
            ->assertSee('SICOM TSR20 Price Trends');

        $this->withCookie('locale', 'en')
            ->get('/sicom-tsr20')
            ->assertOk()
            ->assertSee('January 2026')
            ->assertSee('Low')
            ->assertSee('October 2026');
    }

    public function test_language_switch_route_sets_the_selected_language_cookie(): void
    {
        $this->from('/harga')
            ->get('/change-language/en')
            ->assertRedirect('/harga')
            ->assertCookie('locale', 'en');
    }

    public function test_member_table_labels_follow_the_selected_language(): void
    {
        $this->withCookie('locale', 'en')
            ->get('/anggota')
            ->assertOk()
            ->assertSee('Product Type')
            ->assertSee('Producer Code');

        $this->withCookie('locale', 'id')
            ->get('/anggota')
            ->assertOk()
            ->assertSee('Produsen RSS')
            ->assertSee('Kode Produsen');
    }
}
