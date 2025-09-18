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

    public function deleteData($id)
    {
        $data = DB::table('galeries')->where('id', $id)->first();

        // dd($cabang->img);

        if ($data) {
            // Hapus file gambar (kalau ada)
            if ($data->image && file_exists(public_path('guest/assets/img/galeri/' . $data->image))) {
                unlink(public_path('guest/assets/img/galeri/' . $data->image));
            }

            // Hapus record dari DB
            DB::table('galeries')->where('id', $id)->delete();
            return true;
        }
    }

    public function insertData($data)
    {
        $stmtInsert = DB::table('galeries')->insert($data);
        return $stmtInsert;
    }
}
