<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->modelNews = new \App\Models\News();
        $this->modelTpp = new \App\Models\Tpp();
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
        $dataTpp = $this->modelTpp->getData();
        return view('guest.anggotaTPP', ['dataTpp' => $dataTpp]);
    }
}
