<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tpp extends Model
{
    use HasFactory;
    protected $table = 'tpp';
    protected $fillable = ['kode_tpp', 'perusahaan', 'cabang'];

    public function getData()
    {
        $data = DB::table('tpps')->get();
        return $data;
    }
}
