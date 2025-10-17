<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Centrifuged extends Model
{
    use HasFactory;
    protected $table = 'centrifuged_latex_producers';
    protected $fillable = [];

    public function getData()
    {
        return DB::table('centrifuged_latex_producers')->paginate(10); // 10 data per 
    }
}
