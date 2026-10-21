<?php

namespace Tests\Feature;

use Tests\TestCase;

class SustainabilityRubberTest extends TestCase
{
    public function test_sustainability_page_displays_pillars_and_platforms(): void
    {
        $this->get('/sustainability-rubber')
            ->assertOk()
            ->assertSee('Sustainability Rubber')
            ->assertSee('Lingkungan Ramah Alam')
            ->assertSee('Kesejahteraan Petani')
            ->assertSee('GPSNR')
            ->assertSee('Project Tree')
            ->assertSee('EcoVadis')
            ->assertSee('src="project-tree.png"', false)
            ->assertSee('alt="Project Tree logo"', false)
            ->assertSee('class="gpk-sustainability-card-logo-frame"', false)
            ->assertSee('href="https://project-tree-natural-rubber.com/"', false)
            ->assertSee('href="https://rubberway.tech/"', false)
            ->assertSee('Kunjungi Website')
            ->assertSee('Organisasi & Platform Internasional');
    }

    public function test_sustainability_menu_links_to_the_named_page_route(): void
    {
        $this->get('/sustainability-rubber')
            ->assertSee(route('sustainability-rubber'))
            ->assertSee('aria-expanded="false"', false);
    }
}
