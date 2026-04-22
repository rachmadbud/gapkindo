<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trs_producers', function (Blueprint $table) {
            $table->id();
            $table->string('prov')->nullable();
            $table->text('company')->nullable();
            $table->string('tsr_product')->nullable();
            $table->string('product_code')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trs_producers');
    }
};
