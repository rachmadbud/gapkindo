<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BrownCrapeProducer extends Model
{
    use HasFactory;
    protected $table = 'brown_crepe_producer';
    protected $fillable = [];

    public function getData()
    {
        return $dataBrownCrapeProducers = DB::table('brown_crepe_producer')->paginate(10);
    }
}
