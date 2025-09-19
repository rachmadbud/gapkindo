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
        Schema::create('estate', function (Blueprint $table) {
            $table->id();
            $table->string('prov')->nullable();
            $table->string('company')->nullable();
            $table->string('page')->nullable();
            $table->timestamps();
        });

        // Insert initial data
        DB::table('estate')->insert([
            [
                'prov' => 'North Sumatra',
                'company' => 'BAKRIE SUMATERA PLANTATIONS Tbk, PT',
                'page' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'BRIDGESTONE SUMATRA RUBBER ESTATE, PT',
                'page' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'LONDON SUMATRA INDONESIA, PP PT',
                'page' => '6',
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
                'company' => 'PERKEBUNAN NUSANTARA IV REGIONAL 3, PT',
                'page' => '15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Bengkulu',
                'company' => 'PAMOR GANDA, PT',
                'page' => '31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'LONDON SUMATRA INDONESIA, Tbk, PT',
                'page' => '47',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'PINAGO UTAMA Tbk, PT',
                'page' => '48',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Lampung',
                'company' => 'HUMA INDAH MEKAR, PT',
                'page' => '55',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Lampung',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 7, PT',
                'page' => '58',
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
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'BRIDGESTONE KALIMANTAN PLANTATIONS, PT',
                'page' => '72',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'JOHNLIN AGRO MANDIRI, PT',
                'page' => '77',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'MULTI KUSUMA CEMERLANG, PT',
                'page' => '79',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'BAJABANG INDONESIA, PT PP',
                'page' => '83',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'INDO JAVA RUBBER PLANTING Co, PT',
                'page' => '84',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'KALIDUREN ESTATES, PT',
                'page' => '85',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 2, PT',
                'page' => '86',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 3, PT',
                'page' => '87',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 5, PT',
                'page' => '87',
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
        Schema::dropIfExists('estate');
    }
};
