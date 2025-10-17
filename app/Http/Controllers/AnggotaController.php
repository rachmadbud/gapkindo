<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function estate(Request $request)
    {
        $locale = app()->getLocale();
        $dataEstate = $this->modelEstate->getData();

        return response()->json([
            'current_page' => $dataEstate->currentPage(),
            'last_page' => $dataEstate->lastPage(),
            'per_page' => $dataEstate->perPage(),
            'data' => $dataEstate->map(function ($item) use ($locale) {

                // Ambil provinsi mentah
                $provKey = $item->prov;

                // Coba terjemahkan dari global.php -> province
                $translated = trans('global.province.' . $provKey, [], $locale);

                // Kalau tidak ada translasi, pakai aslinya
                if ($translated === 'global.province.' . $provKey) {
                    $translated = $provKey;
                }

                return [
                    'id' => $item->id,
                    'prov' => $translated,
                    'company' => $item->company,
                    'email' => $item->email,
                ];
            }),
        ]);
    }
    public function centrifuged()
    {
        $locale = app()->getLocale();

        $dataCentrifuged = $this->modelCentrifuged->getData();
        return response()->json([
            'current_page' => $dataCentrifuged->currentPage(),
            'last_page' => $dataCentrifuged->lastPage(),
            'per_page' => $dataCentrifuged->perPage(),
            'data' => $dataCentrifuged->map(function ($item) use ($locale) {

                // Ambil provinsi mentah
                $provKey = $item->prov;

                // Coba terjemahkan dari global.php -> province
                $translated = trans('global.province.' . $provKey, [], $locale);

                // Kalau tidak ada translasi, pakai aslinya
                if ($translated === 'global.province.' . $provKey) {
                    $translated = $provKey;
                }

                return [
                    'id' => $item->id,
                    'prov' => $translated,
                    'company' => $item->company,
                    'email' => $item->email,
                ];
            }),
        ]);
    }

    public function rssProducers()
    {
        $locale = app()->getLocale();

        $dataRss = $this->modelRss->getData();
        return response()->json([
            'current_page' => $dataRss->currentPage(),
            'last_page' => $dataRss->lastPage(),
            'per_page' => $dataRss->perPage(),
            'data' => $dataRss->map(function ($item) use ($locale) {

                // Ambil provinsi mentah
                $provKey = $item->prov;

                // Coba terjemahkan dari global.php -> province
                $translated = trans('global.province.' . $provKey, [], $locale);

                // Kalau tidak ada translasi, pakai aslinya
                if ($translated === 'global.province.' . $provKey) {
                    $translated = $provKey;
                }

                return [
                    'id' => $item->id,
                    'prov' => $translated,
                    'company' => $item->company,
                    'rss_product' => $item->rss_product,
                    'email' => $item->email,
                ];
            }),
        ]);
    }

    public function tsrProducers()
    {
        $locale = app()->getLocale();

        $dataTsrProducers = $this->modelTsrProducers->getData();
        return response()->json([
            'current_page' => $dataTsrProducers->currentPage(),
            'last_page' => $dataTsrProducers->lastPage(),
            'per_page' => $dataTsrProducers->perPage(),
            'data' => $dataTsrProducers->map(function ($item) use ($locale) {

                // Ambil provinsi mentah
                $provKey = $item->prov;

                // Coba terjemahkan dari global.php -> province
                $translated = trans('global.province.' . $provKey, [], $locale);

                // Kalau tidak ada translasi, pakai aslinya
                if ($translated === 'global.province.' . $provKey) {
                    $translated = $provKey;
                }

                return [
                    'id' => $item->id,
                    'prov' => $translated,
                    'company' => $item->company,
                    'tsr_product' => $item->tsr_product,
                    'product_code' => $item->product_code,
                    'email' => $item->email,
                ];
            }),
        ]);
    }

    public function brownCrapeProducer()
    {
        $locale = app()->getLocale();
        $dataBrownCrapeProducer = $this->modelBrownCrapeProducer->getData();
        return response()->json([
            'current_page' => $dataBrownCrapeProducer->currentPage(),
            'last_page' => $dataBrownCrapeProducer->lastPage(),
            'per_page' => $dataBrownCrapeProducer->perPage(),
            'data' => $dataBrownCrapeProducer->map(function ($item) use ($locale) {

                // Ambil provinsi mentah
                $provKey = $item->prov;

                // Coba terjemahkan dari global.php -> province
                $translated = trans('global.province.' . $provKey, [], $locale);

                // Kalau tidak ada translasi, pakai aslinya
                if ($translated === 'global.province.' . $provKey) {
                    $translated = $provKey;
                }

                return [
                    'id' => $item->id,
                    'prov' => $translated,
                    'company' => $item->company,
                    'email' => $item->email,
                ];
            }),
        ]);
    }

    public function traders()
    {
        $locale = app()->getLocale();

        $dataTraders = $this->modelTraders->getData();
        return response()->json([
            'current_page' => $dataTraders->currentPage(),
            'last_page' => $dataTraders->lastPage(),
            'per_page' => $dataTraders->perPage(),
            'data' => $dataTraders->map(function ($item) use ($locale) {

                // Ambil provinsi mentah
                $provKey = $item->prov;

                // Coba terjemahkan dari global.php -> province
                $translated = trans('global.province.' . $provKey, [], $locale);

                // Kalau tidak ada translasi, pakai aslinya
                if ($translated === 'global.province.' . $provKey) {
                    $translated = $provKey;
                }

                return [
                    'id' => $item->id,
                    'prov' => $translated,
                    'company' => $item->company,
                    'email' => $item->email,
                ];
            }),
        ]);
    }
}
