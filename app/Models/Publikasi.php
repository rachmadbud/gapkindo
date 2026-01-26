<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Publikasi extends Model
{
    use HasFactory;

    public function getData()
    {
        $data = DB::table('publikasis')->orderBy('created_at', 'desc')->get();
        return $data;
    }

    public function deleteData($id)
    {
        $data = DB::table('publikasis')->where('id', $id)->first();

        // dd($cabang->img);

        if ($data) {
            // Hapus file gambar (kalau ada)
            if ($data->lampiran && file_exists(public_path('publikasi/' . $data->lampiran))) {
                unlink(public_path('publikasi/' . $data->lampiran));
            }

            // Hapus record dari DB
            DB::table('publikasis')->where('id', $id)->delete();
            return true;
        }
    }
}
