<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('indonesia_production_datasets')) {
            Schema::create('indonesia_production_datasets', function (Blueprint $table) {
                $table->id();
                $table->unsignedTinyInteger('month');
                $table->unsignedSmallInteger('year');
                $table->string('source_filename');
                $table->timestamps();

                $table->unique(['year', 'month']);
            });
        }

        if (!Schema::hasTable('indonesia_productions')) {
            Schema::create('indonesia_productions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('indonesia_production_dataset_id')
                    ->constrained('indonesia_production_datasets')
                    ->cascadeOnDelete();
                $table->string('province');
                $table->decimal('production_ton', 20, 3);
                $table->unsignedInteger('position');
            });
        }

        if (!Schema::hasIndex('indonesia_productions', 'indonesia_productions_dataset_position_idx')) {
            Schema::table('indonesia_productions', function (Blueprint $table) {
                $table->index(
                    ['indonesia_production_dataset_id', 'position'],
                    'indonesia_productions_dataset_position_idx'
                );
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('indonesia_productions');
        Schema::dropIfExists('indonesia_production_datasets');
    }
};
