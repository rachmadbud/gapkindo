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
        Schema::create('galeries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image');
            $table->string('at');
            $table->timestamps();
        });

        DB::table('galeries')->insert(
            [
                'title' => 'KONGRES XX',
                'image' => 'kongresXX.jpg',
                'at' => 'NUSA DUA, BALI',
                'created_at' => '2025-08-20 06:26:44',
                'updated_at' => '2025-09-10 15:50:14',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeries');
    }
};
