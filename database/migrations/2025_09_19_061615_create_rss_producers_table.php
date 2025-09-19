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
            $table->integer('factory')->nullable();
            $table->string('rss_product', 100)->nullable();
            $table->integer('page')->nullable();
            $table->timestamps();
        });

        DB::table('rss_producers')->insert([
            [
                'prov' => 'NORTH SUMATRA',
                'company' => 'LONDON SUMATRA INDONESIA Tbk, PP PT',
                'factory' => 1,
                'rss_product' => 'RSS 1',
                'page' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'NORTH SUMATRA',
                'company' => 'PERKEBUNAN NUSANTARA IV REGIONAL 1, PT',
                'factory' => 5,
                'rss_product' => 'RSS (1, 2, 3)',
                'page' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'SOUTH SUMATRA',
                'company' => 'PINAGO UTAMA Tbk, PT',
                'factory' => 1,
                'rss_product' => 'RSS 1',
                'page' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'LAMPUNG',
                'company' => 'PERKEBUNAN NUSANTARA I REGIONAL 7, PT',
                'factory' => 5,
                'rss_product' => 'RSS',
                'page' => 58,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'SOUTH-CENTRAL-EAST KALIMANTAN',
                'company' => 'BRIDGESTONE KALIMANTAN PLANTATIONS, PT',
                'factory' => 1,
                'rss_product' => 'RSS (1 & 4)',
                'page' => 72,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA BRANCH',
                'company' => 'PERKEBUNAN NUSANTARA I REGIONAL 2, PT',
                'factory' => 6,
                'rss_product' => 'RSS (1, 2, 3)',
                'page' => 86,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA BRANCH',
                'company' => 'PERKEBUNAN NUSANTARA I REGIONAL 3, PT',
                'factory' => 11,
                'rss_product' => 'RSS (1, 2, & 4)',
                'page' => 87,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA BRANCH',
                'company' => 'PERKEBENUN NUSANTARA I REGIONAL 5, PT',
                'factory' => 11,
                'rss_product' => 'RSS',
                'page' => 87,
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
