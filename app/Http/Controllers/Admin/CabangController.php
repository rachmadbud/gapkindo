<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->modelCabang = new \App\Models\Cabang();
    }

    public function cabang(Request $request)
    {
        $dataCabang = $this->modelCabang->getData();

        return view('admin.content.cabang', [
            'dataCabang' => $dataCabang
        ]);
    }

    public function cabangPost(Request $request)
    {
        $request->validate([
            'propinsi' => 'required',
        ]);

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('guest/assets/img/cabang'), $imageName);

        $data = [
            'propinsi' => $request->propinsi,
            'alamat' => $request->alamat,
            'tlpn' => $request->tlpn,
            'email' => $request->email,
            'img' => $imageName,
            'ketua'  => $request->ketua,
            'sekertaris'  => $request->sekertaris,
            'created_at' => now(),
        ];

        $this->modelCabang->insertData($data);

        if (!$this->modelCabang) {
            return redirect()->back()->with('error', 'Failed to create Cabang.');
        }

        return redirect()->route('admin.cabang')->with('success', 'Cabang created successfully.');
    }

    public function hapus($id)
    {
        $id_cabang = app(\App\Helpers\Helper::class)->dekrip($id);

        $this->modelCabang->hapus($id_cabang);

        return redirect()->route('admin.cabang')->with('success', 'Cabang deleted successfully.');
    }
}
