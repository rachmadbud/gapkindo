<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('indonesia_production_datasets', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('month');
            $table->unsignedSmallInteger('year');
            $table->string('source_filename');
            $table->timestamps();

            $table->unique(['year', 'month']);
        });

        Schema::create('indonesia_productions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indonesia_production_dataset_id')
                ->constrained('indonesia_production_datasets')
                ->cascadeOnDelete();
            $table->string('province');
            $table->decimal('production_ton', 20, 3);
            $table->unsignedInteger('position');

            $table->index(['indonesia_production_dataset_id', 'position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('indonesia_productions');
        Schema::dropIfExists('indonesia_production_datasets');
    }
};
