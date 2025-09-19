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
        Schema::create('brown_crepe_producer', function (Blueprint $table) {
            $table->id();
            $table->string('prov')->nullable();
            $table->string('company')->nullable();
            $table->string('product')->nullable();
            $table->string('page')->nullable();
            $table->timestamps();
        });

        DB::table('brown_crepe_producer')->insert([
            [
                'prov' => 'Java',
                'company' => 'NASIONAL BHIRAWA TAMA, PT',
                'product' => 'Brown Crepe',
                'page' => 85,
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
        Schema::dropIfExists('brown_crepe_producer');
    }
};
