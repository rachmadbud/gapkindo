<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GlobalProductionDataset extends Model
{
    protected $fillable = [
        'month',
        'year',
        'source_filename',
    ];

    public function productions(): HasMany
    {
        return $this->hasMany(GlobalProduction::class);
    }
}
