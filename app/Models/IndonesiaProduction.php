<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndonesiaProduction extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'indonesia_production_dataset_id',
        'province',
        'production_ton',
        'position',
    ];

    public function dataset(): BelongsTo
    {
        return $this->belongsTo(IndonesiaProductionDataset::class, 'indonesia_production_dataset_id');
    }
}
