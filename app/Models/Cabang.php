<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'cabangs';
    protected $fillable = [
        'propinsi',
        'alamat',
        'tlpn',
        'email',
        'img',
        'ketua',
        'ketuasekertaris',
    ];

    public function getData()
    {
        $data = DB::table('cabangs')->orderBy('id', 'desc')->get();
        return $data;
    }

    public function insertData($data)
    {
        $stmtInsert = DB::table('cabangs')->insert($data);
        return $stmtInsert;
    }

    public function hapus($id_cabang)
    {
        // Ambil data cabang dulu
        $cabang = DB::table('cabangs')->where('id', $id_cabang)->first();
        // dd($cabang->img);

        if ($cabang) {
            // Hapus file gambar (kalau ada)
            if ($cabang->img && file_exists(public_path('guest/assets/img/cabang/' . $cabang->img))) {
                unlink(public_path('guest/assets/img/cabang/' . $cabang->img));
            }

            // Hapus record dari DB
            DB::table('cabangs')->where('id', $id_cabang)->delete();

            return redirect()->route('admin.cabang')
                ->with('success', 'Cabang deleted successfully with image.');
        }

        return redirect()->route('admin.cabang')
            ->with('error', 'Cabang not found.');
    }
}
