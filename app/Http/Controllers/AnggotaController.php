<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function __construct()
    {
        $this->modelEstate = new \App\Models\Estate();
        $this->modelCentrifuged = new \App\Models\Centrifuged();
        $this->modelRss = new \App\Models\RssProducers();
        $this->modelTsrProducers = new \App\Models\TsrProducers();
        $this->modelBrownCrapeProducer = new \App\Models\BrownCrapeProducer();
        $this->modelTraders = new \App\Models\Traders();
    }

    public function index()
    {
        // $dataEstate = $this->modelEstate->getData();
        // $dataCentrifuged = $this->modelCentrifuged->getData();
        // $dataRss = $this->modelRss->getData();
        // $dataTsrProducers = $this->modelTsrProducers->getData();
        // $dataBrownCrapeProducer = $this->modelBrownCrapeProducer->getData();
        // $dataTraders = $this->modelTraders->getData();

        return view('guest.anggota');
    }

    public function estate()
    {
        return $dataEstate = $this->modelEstate->getData();
    }
    public function centrifuged()
    {
        return $dataCentrifuged = $this->modelCentrifuged->getData();
    }

    public function rssProducers()
    {
        return $dataRss = $this->modelRss->getData();
    }

    public function tsrProducers()
    {
        return $dataTsrProducers = $this->modelTsrProducers->getData();
    }

    public function brownCrapeProducer()
    {
        return $dataBrownCrapeProducer = $this->modelBrownCrapeProducer->getData();
    }

    public function traders()
    {
        return $dataTraders = $this->modelTraders->getData();
    }
}
