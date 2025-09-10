<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Galery extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function getData()
    {
        $data = DB::table('galeries')->orderBy('id', 'desc')->get();
        return $data;
    }
}
