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
            $table->string('email')->nullable();
            $table->timestamps();
        });

        DB::table('centrifuged_latex_producers')->insert([
            [
                'prov' => 'North Sumatra',
                'company' => 'BAKRIE SUMATERA PLANTATIONS Tbk, PT',
                'email' => 'windy@bakriesumatera.com',
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
                'company' => 'SRI SUMATERA SEJAHTERA, PT',
                'email' => 'srisspt@yahoo.com, srisspt@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prov' => 'South Sumatra',
                'company' => 'SRITRANG LINGGA INDONESIA, PT',
                'email' => 'www.sritranggroup.com',
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
                'prov' => 'Jawa',
                'company' => 'PERKEBUNAN NUSANTARA I REGIONAL 2, PT',
                'email' => 'pemasarannt8@gmail.com',
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
