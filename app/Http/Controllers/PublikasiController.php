<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function __construct()
    {
        $this->modelPublikasi = new \App\Models\Publikasi();
    }

    public function index()
    {
        $dataPublikasi = $this->modelPublikasi->getData();
        return view('guest.publikasi', [
            'dataPublikasi' => $dataPublikasi
        ]);
    }
}
