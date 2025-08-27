<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->modelNews = new \App\Models\News();
    }

    public function index()
    {
        $dataNews = $this->modelNews->getData();

        return view('guest.index', ['dataNews' => $dataNews]);
    }
}
