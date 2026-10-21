<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('global_production_datasets')) {
            Schema::create('global_production_datasets', function (Blueprint $table) {
                $table->id();
                $table->unsignedTinyInteger('month');
                $table->unsignedSmallInteger('year');
                $table->string('source_filename');
                $table->timestamps();

                $table->unique(['year', 'month']);
            });
        }

        if (!Schema::hasTable('global_productions')) {
            Schema::create('global_productions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('global_production_dataset_id')
                    ->constrained('global_production_datasets')
                    ->cascadeOnDelete();
                $table->string('country');
                $table->decimal('production_ton', 20, 3);
                $table->unsignedInteger('position');
            });
        }

        if (!Schema::hasIndex('global_productions', 'global_productions_dataset_position_idx')) {
            Schema::table('global_productions', function (Blueprint $table) {
                $table->index(
                    ['global_production_dataset_id', 'position'],
                    'global_productions_dataset_position_idx'
                );
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('global_productions');
        Schema::dropIfExists('global_production_datasets');
    }
};
