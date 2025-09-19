<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TsrProducers extends Model
{
    use HasFactory;
    protected $table = 'trs_producers';
    protected $fillable = [];

    public function getData()
    {
        $dataTsrProducers = DB::table('trs_producers')->paginate(10); // 10 data per halaman
        return response()->json($dataTsrProducers);
    }
}
