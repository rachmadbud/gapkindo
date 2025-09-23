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
            $table->string('email')->nullable();
            $table->timestamps();
        });

        // Insert initial data
        DB::table('estate')->insert([
            [
                'prov' => 'North Sumatra',
                'company' => 'BAKRIE SUMATERA PLANTATIONS Tbk, PT',
                'email' => 'windy@bakriesumatera.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'BRIDGESTONE SUMATRA RUBBER ESTATE, PT',
                'email' => 'shuhei-yamagata@bridgestone@com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'LONDON SUMATRA INDONESIA, PP PT',
                'email' => 'http://www.londonsumatra.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'PERKEBUNAN NUSANTARA IV REGIONAL 1, PT',
                'email' => 'pengolahan@ptpn3.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'North Sumatra',
                'company' => 'PERKEBUNAN NUSANTARA IV REGIONAL 3, PT',
                'email' => 'pemasaran.ptpn5@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Bengkulu',
                'company' => 'PAMOR GANDA, PT',
                'email' => 'pamorganda_bengkulu@yahoo.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'LONDON SUMATRA INDONESIA, Tbk, PT',
                'email' => 'http://www.londonsumatra.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'PINAGO UTAMA Tbk, PT',
                'email' => 'hasan.tantri@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Lampung',
                'company' => 'HUMA INDAH MEKAR, PT',
                'email' => 'itsupport.him@bakriesumatera.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Lampung',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 7, PT',
                'email' => 'sekretariat@ptpn7.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Lampung',
                'company' => 'SILVA INHUTANI LAMPUNG, PT',
                'email' => 'silva.jakarta@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'BRIDGESTONE KALIMANTAN PLANTATIONS, PT',
                'email' => '72',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'JOHNLIN AGRO MANDIRI, PT',
                'email' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South-Central-East Kalimantan',
                'company' => 'MULTI KUSUMA CEMERLANG, PT',
                'email' => '(62-21) 29353610',
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
                'company' => 'INDO JAVA RUBBER PLANTING Co, PT',
                'email' => 'marketing@jawattie.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'KALIDUREN ESTATES, PT',
                'email' => 'marketing@jawattie.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 2, PT',
                'email' => 'pemasarannt8@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 3, PT',
                'email' => 'skrh_reg3@ptpn1.co.id, pemasaran@ptpn09.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I  REGIONAL 5, PT',
                'email' => '',
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
