<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublikasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->modelPublikasi = new \App\Models\Publikasi();
    }

    public function index()
    {
        $dataPublikasi = $this->modelPublikasi->getData();
        return view('admin.content.publikasi.index', [
            'dataPublikasi' => $dataPublikasi
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'tanggal' => 'required',
                'judul' => 'required',
                'lampiran' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            ]
        );

        $file = $request->file('lampiran');

        // ambil ekstensi asli
        $extension = $file->getClientOriginalExtension();

        // buat nama file unik (tanpa original name)
        $nama_file = time() . '_' . Str::random(20) . '.' . $extension;

        // folder tujuan
        $tujuan_upload = public_path('publikasi');

        // pindahkan file
        $file->move($tujuan_upload, $nama_file);

        // insert data ke table publikasis
        DB::table('publikasis')->insert([
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'lampiran' => $nama_file,
            'created_at' => now(),
        ]);

        return redirect()->route('admin.publikasi')->with('success', 'Publikasi created successfully.');
    }

    public function destroy($id)
    {
        $this->modelPublikasi->deleteData($id);
        return redirect()->route('admin.publikasi')->with('success', 'Data Berhasil Dihapus');
    }
}
