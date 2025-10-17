<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Traders extends Model
{
    use HasFactory;
    protected $table = 'traders';
    protected $fillable = [];

    public function getData()
    {
        return $dataTraders = DB::table('traders')->paginate(10);
    }
}
