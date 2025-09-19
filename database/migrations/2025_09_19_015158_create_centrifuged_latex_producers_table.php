<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('centrifuged_latex_producers', function (Blueprint $table) {
            $table->id();
            $table->string('prov')->nullable();
            $table->string('company')->nullable();
            $table->string('page')->nullable();
            $table->timestamps();
        });

        DB::table('centrifuged_latex_producers')->insert([
            [
                'prov' => 'North Sumatra',
                'company' => 'BAKRIE SUMATERA PLANTATIONS Tbk, PT',
                'page' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'PERKEBUNAN NUSANTARA IV REGIONAL 1, PT',
                'page' => '9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'SRI SUMATERA SEJAHTERA, PT',
                'page' => '13',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'SRITRANG LINGGA INDONESIA, PT',
                'page' => '51',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Lampung',
                'company' => 'SILVA INHUTANI LAMPUNG, PT',
                'page' => '59',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I REGIONAL 2, PT',
                'page' => '86',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centrifuged_latex_producers');
    }
};
