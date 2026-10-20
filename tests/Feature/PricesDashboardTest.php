<?php

namespace Tests\Feature;

use Tests\TestCase;

class PricesDashboardTest extends TestCase
{
    public function test_prices_navigation_opens_the_dashboard_with_a_sicom_market_summary(): void
    {
        $this->get('/harga')
            ->assertOk()
            ->assertSee('Harga Karet & Komoditas')
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
            ->assertSee('Rendah')
            ->assertSee('Oktober 2026')
            ->assertSee('258,2')
            ->assertSee('Lihat Chart di TradingView')
            ->assertSee('https://id.tradingview.com/chart/?symbol=SGX%3ATF1%21');
    }
}
