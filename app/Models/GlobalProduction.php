<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GlobalProduction extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'global_production_dataset_id',
        'country',
        'production_ton',
        'position',
    ];

    public function dataset(): BelongsTo
    {
        return $this->belongsTo(GlobalProductionDataset::class, 'global_production_dataset_id');
    }
}
