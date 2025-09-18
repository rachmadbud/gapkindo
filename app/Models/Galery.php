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

    public function insertDetailData($data)
    {
        $stmtInsert = DB::table('detail_galeri')->insert($data);
        return $stmtInsert;
    }

    public function getDataDetail($dekripId)
    {
        $data = \Illuminate\Support\Facades\DB::table('galeries')
            ->leftJoin('detail_galeri', 'galeries.id', '=', 'detail_galeri.id_galery')
            ->select('galeries.*', 'detail_galeri.foto as foto_detail', 'detail_galeri.id as id_detail')
            ->where('galeries.id', $dekripId)
            ->orderBy('detail_galeri.created_at', 'desc')
            ->get();

        return $data;
    }
}
