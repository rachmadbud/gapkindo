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
        Schema::create('detail_galeri', function (Blueprint $table) {
            $table->id();
            $table->integer('id_galery');
            $table->string('foto');
            $table->timestamps();
        });

        DB::table('detail_galeri')->insert([
            [
                'id' => 9,
                'id_galery' => 4,
                'foto' => '1758178925.jpg',
                'created_at' => '2025-09-18 00:02:05',
                'updated_at' => null,
            ],
            [
                'id' => 11,
                'id_galery' => 5,
                'foto' => '1758179378.jpg',
                'created_at' => '2025-09-18 00:09:38',
                'updated_at' => null,
            ],
            [
                'id' => 12,
                'id_galery' => 5,
                'foto' => '1758179396.jpg',
                'created_at' => '2025-09-18 00:09:56',
                'updated_at' => null,
            ],
            [
                'id' => 13,
                'id_galery' => 5,
                'foto' => '1758179688.jpg',
                'created_at' => '2025-09-18 00:14:48',
                'updated_at' => null,
            ],
            [
                'id' => 14,
                'id_galery' => 5,
                'foto' => '1758179712.jpg',
                'created_at' => '2025-09-18 00:15:12',
                'updated_at' => null,
            ],
            [
                'id' => 15,
                'id_galery' => 5,
                'foto' => '1758179818.jpg',
                'created_at' => '2025-09-18 00:16:58',
                'updated_at' => null,
            ],
            [
                'id' => 16,
                'id_galery' => 5,
                'foto' => '1758179844.jpg',
                'created_at' => '2025-09-18 00:17:24',
                'updated_at' => null,
            ],
            [
                'id' => 17,
                'id_galery' => 5,
                'foto' => '1758179877.jpg',
                'created_at' => '2025-09-18 00:17:57',
                'updated_at' => null,
            ],
            [
                'id' => 18,
                'id_galery' => 5,
                'foto' => '1758179897.jpg',
                'created_at' => '2025-09-18 00:18:17',
                'updated_at' => null,
            ],
            [
                'id' => 19,
                'id_galery' => 5,
                'foto' => '1758179914.jpg',
                'created_at' => '2025-09-18 00:18:34',
                'updated_at' => null,
            ],
            [
                'id' => 20,
                'id_galery' => 5,
                'foto' => '1758179956.jpg',
                'created_at' => '2025-09-18 00:19:16',
                'updated_at' => null,
            ],
            [
                'id' => 21,
                'id_galery' => 5,
                'foto' => '1758179974.jpg',
                'created_at' => '2025-09-18 00:19:34',
                'updated_at' => null,
            ],
            [
                'id' => 22,
                'id_galery' => 5,
                'foto' => '1758179994.jpg',
                'created_at' => '2025-09-18 00:19:54',
                'updated_at' => null,
            ],
            [
                'id' => 23,
                'id_galery' => 5,
                'foto' => '1758180012.jpg',
                'created_at' => '2025-09-18 00:20:12',
                'updated_at' => null,
            ],
            [
                'id' => 24,
                'id_galery' => 5,
                'foto' => '1758180032.jpg',
                'created_at' => '2025-09-18 00:20:32',
                'updated_at' => null,
            ],
            [
                'id' => 25,
                'id_galery' => 5,
                'foto' => '1758180055.jpg',
                'created_at' => '2025-09-18 00:20:55',
                'updated_at' => null,
            ],
            [
                'id' => 26,
                'id_galery' => 5,
                'foto' => '1758180095.jpg',
                'created_at' => '2025-09-18 00:21:35',
                'updated_at' => null,
            ],
            [
                'id' => 27,
                'id_galery' => 5,
                'foto' => '1758180113.jpg',
                'created_at' => '2025-09-18 00:21:53',
                'updated_at' => null,
            ],
            [
                'id' => 28,
                'id_galery' => 6,
                'foto' => '1758180615.jpg',
                'created_at' => '2025-09-18 00:30:15',
                'updated_at' => null,
            ],
            [
                'id' => 29,
                'id_galery' => 6,
                'foto' => '1758180647.jpg',
                'created_at' => '2025-09-18 00:30:47',
                'updated_at' => null,
            ],
            [
                'id' => 30,
                'id_galery' => 6,
                'foto' => '1758180662.jpg',
                'created_at' => '2025-09-18 00:31:02',
                'updated_at' => null,
            ],
            [
                'id' => 31,
                'id_galery' => 6,
                'foto' => '1758180682.jpg',
                'created_at' => '2025-09-18 00:31:22',
                'updated_at' => null,
            ],
            [
                'id' => 32,
                'id_galery' => 6,
                'foto' => '1758180697.jpg',
                'created_at' => '2025-09-18 00:31:37',
                'updated_at' => null,
            ],
            [
                'id' => 33,
                'id_galery' => 6,
                'foto' => '1758180718.jpg',
                'created_at' => '2025-09-18 00:31:58',
                'updated_at' => null,
            ],
            [
                'id' => 34,
                'id_galery' => 6,
                'foto' => '1758180736.jpg',
                'created_at' => '2025-09-18 00:32:16',
                'updated_at' => null,
            ],
            [
                'id' => 35,
                'id_galery' => 6,
                'foto' => '1758180751.jpg',
                'created_at' => '2025-09-18 00:32:31',
                'updated_at' => null,
            ],
            [
                'id' => 36,
                'id_galery' => 6,
                'foto' => '1758180775.jpg',
                'created_at' => '2025-09-18 00:32:55',
                'updated_at' => null,
            ],
            [
                'id' => 37,
                'id_galery' => 6,
                'foto' => '1758180792.jpg',
                'created_at' => '2025-09-18 00:33:12',
                'updated_at' => null,
            ],
            [
                'id' => 38,
                'id_galery' => 6,
                'foto' => '1758180811.jpg',
                'created_at' => '2025-09-18 00:33:31',
                'updated_at' => null,
            ],
            [
                'id' => 39,
                'id_galery' => 6,
                'foto' => '1758180825.jpg',
                'created_at' => '2025-09-18 00:33:45',
                'updated_at' => null,
            ],
            [
                'id' => 40,
                'id_galery' => 6,
                'foto' => '1758180848.jpg',
                'created_at' => '2025-09-18 00:34:08',
                'updated_at' => null,
            ],
            [
                'id' => 41,
                'id_galery' => 6,
                'foto' => '1758180874.jpg',
                'created_at' => '2025-09-18 00:34:34',
                'updated_at' => null,
            ],
            [
                'id' => 42,
                'id_galery' => 6,
                'foto' => '1758180892.jpg',
                'created_at' => '2025-09-18 00:34:52',
                'updated_at' => null,
            ],
            [
                'id' => 43,
                'id_galery' => 6,
                'foto' => '1758180907.jpg',
                'created_at' => '2025-09-18 00:35:07',
                'updated_at' => null,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_galeri');
    }
};
