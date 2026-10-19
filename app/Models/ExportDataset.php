<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExportDataset extends Model
{
    protected $fillable = [
        'month',
        'year',
        'source_filename',
    ];

    public function destinations(): HasMany
    {
        return $this->hasMany(ExportDestination::class);
    }
}
