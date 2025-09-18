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

        DB::table('galeries')->insert([
            [
                'id' => 5,
                'title' => 'Kongres XX GAPKINDO 2025',
                'image' => '1758178963.jpg',
                'at' => 'Nusa Dua , Bali',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'title' => 'GAPKINDO GALA DINNER 2025',
                'image' => '1758180551.jpg',
                'at' => 'Nusa Dua, Bali',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeries');
    }
};
