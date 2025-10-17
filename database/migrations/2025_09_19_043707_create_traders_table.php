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
            $table->string('email')->nullable();
            $table->timestamps();
        });

        // TRADERS /BROKER/BUYER REPRESENTATIVES
        DB::table('traders')->insert([
            [
                'prov' => 'North Sumatra',
                'company' => 'BUMI INDAWA NIAGA, PT',
                'email' => 'parkjs@korindo.co.id, bumindawa@korindo.co.id,rusman@korindo.co.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'BINTANG AGUNG PERSADA, PT',
                'email' => '(62-711) 317388',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'WARNA AGUNG SELATAN, PT',
                'email' => 'warnaagungselatansha@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'AGRO LINO SEJAHTERA, PT',
                'email' => '(62-21) 509 89300',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'BAJABANG INDONESIA, PT PP',
                'email' => 'dadangkurnia@bajabang.co.id, rozakyes@gmail.com, sulaiman@bajabang.co.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'BITUNG GUNASEJAHTERA, PT',
                'email' => 'bitung@cbn.net.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'JADI JAYA MAKMUR, CV',
                'email' => 'jamaksmg@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'JAYA ASRI NIAGA, PT',
                'email' => 'info@jayaasri.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'MERIDIAN JATI INDONESIA, PT',
                'email' => 'marketing@meridianjati.co.id, logistic@meridianjati.co.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'NUSA ALAM RUBBER, PT',
                'email' => 'pt.nusaalamrubber@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'SEMESTA JAYA LESTARIE , CV',
                'email' => 'putera_semesta@hotmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'TRIKARYA SEMESTA, PT',
                'email' => '3karyasemesta@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'WILSON TUNGGAL PERKASA, PT',
                'email' => 'sales1@pt-wilson.com',
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
