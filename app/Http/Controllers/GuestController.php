<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->modelNews = new \App\Models\News();
        $this->modelCabang = new \App\Models\Cabang();
        $this->modelGalery = new \App\Models\Galery();
    }

    public function index()
    {
        $dataNews = $this->modelNews->getData();

        return view('guest.index', ['dataNews' => $dataNews]);
    }

    public function detailNews($id)
    {
        $idNews = app(\App\Helpers\Helper::class)->dekrip($id);
        return view('guest.detail-news', [
            'dataNews' => $this->modelNews->getDataById($idNews)
        ]);
    }

    public function berita()
    {
        $dataNews = $this->modelNews->getData();

        return view('guest.berita', ['dataNews' => $dataNews]);
    }

    public function anggotaTpp()
    {
        return view('guest.anggotaTPP');
    }

    public function cabang()
    {
        $data = $this->modelCabang->getData();
        return view('guest.cabang', ['data' => $data]);
    }

    public function galery()
    {
        $data = $this->modelGalery->getData();
        return view('guest.galery', ['data' => $data]);
    }

    public function detailGalery($id)
    {
        $idGalery = app(\App\Helpers\Helper::class)->dekrip($id);

        $data = $this->modelGalery->getDataDetail($idGalery);
        $dataGaleri = $this->modelGalery->getData()->where('id', $idGalery)->first();

        // dd($data);
        return view('guest.detail-galery', ['data' => $data, 'dataGaleri' => $dataGaleri]);
    }

    public function regulasi()
    {
        return view('guest.regulasi');
    }

    public function detailCabang($id)
    {
        $idCabang = app(\App\Helpers\Helper::class)->dekrip($id);
        return view('guest.detail-cabang', [
            'dataCabang' => $this->modelCabang->getDataById($idCabang)
        ]);
    }
}
