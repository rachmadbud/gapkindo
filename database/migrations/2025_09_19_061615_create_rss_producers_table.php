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
        Schema::create('rss_producers', function (Blueprint $table) {
            $table->id();
            $table->string('prov', 100);
            $table->string('company', 255);
            $table->string('rss_product', 100)->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        DB::table('rss_producers')->insert([
            [
                'prov' => 'North Sumatra',
                'company' => 'LONDON SUMATRA INDONESIA Tbk, PP PT',
                'rss_product' => 'RSS 1',
                'email' => 'https://www.londonsumatra.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'PERKEBUNAN NUSANTARA IV REGIONAL 1, PT',
                'rss_product' => 'RSS (1, 2, 3)',
                'email' => 'pengolahan@ptpn3.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'PINAGO UTAMA Tbk, PT',
                'rss_product' => 'RSS 1',
                'email' => 'hasan.tantri@gmail.com, ratna.sari@pinagoutama.com, helen.riana@pinagoutama.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'LAMPUNG',
                'company' => 'PERKEBUNAN NUSANTARA I REGIONAL 7, PT',
                'rss_product' => 'RSS',
                'email' => 'sekretariat@ptpn7.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'BRIDGESTONE KALIMANTAN PLANTATIONS, PT',
                'rss_product' => 'RSS (1 & 4)',
                'email' => 't.sakoda@bskp.co.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I REGIONAL 2, PT',
                'rss_product' => 'RSS (1, 2, 3)',
                'email' => 'pemasarannt8@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I REGIONAL 3, PT',
                'rss_product' => 'RSS (1, 2, & 4)',
                'email' => 'skrh_reg3@ptpn1.co.id; pemasaran@ptpn09.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBENUN NUSANTARA I REGIONAL 5, PT',
                'rss_product' => 'RSS',
                'email' => 'skrh_reg5@ptpn1.co.id; map_reg5@ptpn1.co.id',
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
        Schema::dropIfExists('rss_producers');
    }
};
