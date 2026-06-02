<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TsrProducers extends Model
{
    use HasFactory;
    protected $table = 'tsr_producers';
    protected $fillable = [];

    public function getData()
    {
        return $dataTsrProducers = DB::table('tsr_producers')->paginate(10);
    }
}
