<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('export_datasets', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('month');
            $table->unsignedSmallInteger('year');
            $table->string('source_filename');
            $table->timestamps();

            $table->unique(['year', 'month']);
        });

        Schema::create('export_destinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('export_dataset_id')
                ->constrained('export_datasets')
                ->cascadeOnDelete();
            $table->string('country');
            $table->decimal('volume', 20, 3)->nullable();
            $table->decimal('value', 20, 2)->nullable();
            $table->unsignedInteger('position');

            $table->index(['export_dataset_id', 'position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('export_destinations');
        Schema::dropIfExists('export_datasets');
    }
};
