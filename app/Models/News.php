<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'image', 'source'];
    protected $table = 'news';

    public function getData()
    {
        $data = DB::table('news')->orderBy('created_at', 'desc')->get();
        return $data;
    }

    public function insertData($data)
    {
        $insert = DB::table('news')->insert($data);

        return $insert;
    }

    public function getDataById($id)
    {
        $data = DB::table('news')->where('id', $id)->first();
        return $data;
    }
}
