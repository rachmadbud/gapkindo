<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Estate extends Model
{
    use HasFactory;
    protected $table = 'estate';
    protected $fillable = [];

    public function getData()
    {
        $dataEstate = DB::table('estate')->paginate(10); // 10 data per halaman
        return response()->json($dataEstate);
    }
}
