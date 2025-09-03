<?php

namespace Database\Seeders;

use App\Models\Tpp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tpp::factory()->count(100)->create();
    }
}
