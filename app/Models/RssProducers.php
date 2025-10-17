<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RssProducers extends Model
{
    use HasFactory;
    protected $table = 'rss_producers';
    protected $fillable = [];

    public function getData()
    {
        return DB::table('rss_producers')->paginate(10); // 10 data per halaman
    }
}
