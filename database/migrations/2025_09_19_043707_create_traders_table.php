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
        Schema::create('traders', function (Blueprint $table) {
            $table->id();
            $table->string('prov')->nullable();
            $table->string('company')->nullable();
            $table->string('page')->nullable();
            $table->timestamps();
        });

        // TRADERS /BROKER/BUYER REPRESENTATIVES
        DB::table('traders')->insert([
            [
                'prov' => 'NORTH SUMATRA',
                'company' => 'BUMI INDAWA NIAGA, PT',
                'page' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'SOUTH SUMATRA',
                'company' => 'BINTANG AGUNG PERSADA, PT',
                'page' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'SOUTH SUMATRA',
                'company' => 'WARNA AGUNG SELATAN, PT',
                'page' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'AGRO LINO SEJAHTERA, PT',
                'page' => 83,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'BAJABANG INDONESIA, PT PP',
                'page' => 83,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'BITUNG GUNASEJAHTERA, PT',
                'page' => 83,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'JADI JAYA MAKMUR, CV',
                'page' => 84,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'JAYA ASRI NIAGA, PT',
                'page' => 84,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'MERIDIAN JATI INDONESIA, PT',
                'page' => 85,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'NUSA ALAM RUBBER, PT',
                'page' => 86,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'SEMESTA JAYA LESTARIE , CV',
                'page' => 88,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'TRIKARYA SEMESTA, PT',
                'page' => 89,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'JAVA',
                'company' => 'WILSON TUNGGAL PERKASA, PT',
                'page' => 89,
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
        Schema::dropIfExists('traders');
    }
};
