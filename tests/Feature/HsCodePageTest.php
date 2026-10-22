<?php

namespace Tests\Feature;

use Tests\TestCase;

class HsCodePageTest extends TestCase
{
    public function test_hs_code_page_displays_the_table_and_translated_notes(): void
    {
        $this->get('/hs-code')
            ->assertOk()
            ->assertSee('class="gpk-hs-hero"', false)
            ->assertSee('class="gpk-ticker"', false)
            ->assertSee('Klasifikasi Komoditas')
            ->assertSee('Kode HS Karet Alam')
            ->assertSee('SIR 10')
            ->assertSee('4001.22.10')
            ->assertSee('Lateks Kons')
            ->assertSee('4001.1')
            ->assertSee('Mixture of NR')
            ->assertSee('4002.8')
            ->assertSee('<strong>SIR</strong> - Standard Indonesian Rubber (Karet Remah Indonesia)', false)
            ->assertSee('<strong>RSS</strong> - Ribbed Smoked Sheet (Lembaran Asap)', false)
            ->assertSee('<strong>CV/VK</strong> - Constant Viscosity / Viskositas Konstan', false)
            ->assertSee('<strong>L</strong> - Light Colored (Warna Terang)', false)
            ->assertSee('<strong>WF</strong> - Whole Field (BOKAR dari 1 sumber kebun)', false)
            ->assertSee('<strong>LoV</strong> - Low Viscosity (Viskositas Rendah)', false)
            ->assertSee('Standard Indonesian Rubber (Karet Remah Indonesia)')
            ->assertSee('Ribbed Smoked Sheet (Lembaran Asap)')
            ->assertSee(route('hs-code'));
    }

    public function test_hs_code_page_labels_follow_the_selected_language(): void
    {
        $this->withCookie('locale', 'en')
            ->get('/hs-code')
            ->assertOk()
            ->assertSee('Natural Rubber HS Codes')
            ->assertSee('Type / Grade')
            ->assertSee('Notes &amp; Translations', false)
            ->assertSee('Standard Indonesian Rubber');
    }
}
