<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->modelGalery = new \App\Models\Galery();
    }

    public function index()
    {
        $dataGalery = $this->modelGalery->getData();

        // coba return data pakai json_decode
        // return response()->json($dataGalery);

        return view('admin.content.galery.index', [
            'dataGalery' => $dataGalery
        ]);
    }

    public function destroy($id)
    {
        $this->modelGalery->deleteData($id);
        return redirect()->route('admin.galery')->with('success', 'Data Berhasil Dihapus');
    }

    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'judul' => 'required',
            'tempat' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('guest/assets/img/galeri'), $imageName);

        // simpan data ke database
        $data = [
            'title' => $request->judul,
            'at' => $request->tempat,
            'image' => $imageName,
        ];
        $this->modelGalery->insertData($data);

        return redirect()->route('admin.galery')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function detail($id)
    {
        $dekripId = app(\App\Helpers\Helper::class)->dekrip($id);

        // cari data berdasarkan id, panggil juga table detail_galeri berdasarkan id_galery
        $dataDetail = \Illuminate\Support\Facades\DB::table('galeries')
            ->leftJoin('detail_galeri', 'galeries.id', '=', 'detail_galeri.id_galery')
            ->select('galeries.*', 'detail_galeri.foto as foto_detail', 'detail_galeri.id as id_detail')
            ->where('galeries.id', $dekripId)
            ->get();
        // dd($dataDetail);

        $dataGaleri = \Illuminate\Support\Facades\DB::table('galeries')
            ->where('id', $dekripId)
            ->first();

        return view('admin.content.galery.detail', [
            'dataDetail' => $dataDetail,
            'dataGaleri' => $dataGaleri
        ]);
    }

    public function destroyDetail(Request $request, $id)
    {
        // cari data detail berdasarkan id
        $data = \Illuminate\Support\Facades\DB::table('detail_galeri')->where('id', $id)->first();

        if ($data) {
            // Hapus file gambar (kalau ada)
            if ($data->foto && file_exists(public_path('guest/assets/img/galeri/' . $data->foto))) {
                unlink(public_path('guest/assets/img/galeri/' . $data->foto));
            }

            // Hapus record dari DB
            \Illuminate\Support\Facades\DB::table('detail_galeri')->where('id', $id)->delete();
        }

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
