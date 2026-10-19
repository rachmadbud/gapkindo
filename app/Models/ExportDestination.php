<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExportDestination extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'export_dataset_id',
        'country',
        'volume',
        'value',
        'position',
    ];

    public function dataset(): BelongsTo
    {
        return $this->belongsTo(ExportDataset::class, 'export_dataset_id');
    }
}
