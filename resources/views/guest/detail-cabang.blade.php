@extends('guest.layouts.master')
@section('title', 'Detail | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ __('global.cabang') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area single-property parallax-bg">&nbsp;
        <div class="container">

            <div class="clearfix padding-top-40">

                <div class="col-md-8 single-property-content prp-style-1 ">
                    <div class="row">
                        <div class="light-slide-item">
                            <div class="clearfix">
                                <div class="favorite-and-print">
                                    <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                        <i class="fa fa-star-o"></i>
                                    </a>
                                    <a class="printer-icon " href="javascript:window.print()">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>

                                <ul id="" class=" list-unstyled cS-hidden">
                                    <li data-thumb="">
                                        <img src="{{ asset('guest/assets/img/cabang/' . $dataCabang->img) }}" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="single-property-wrapper">
                        <!-- .property-meta -->

                        <div class="section">
                            <h4 class="s-property-title">{{ $dataCabang->propinsi }}</h4>
                            <div class="s-property-content">
                                <p class="text-black text-justify"></p>
                            </div>
                        </div>
                        <!-- End description area  -->

                        <div class="section additional-details">

                            {{-- <h4 class="s-property-title">{{ __('global.sekretCabangJam') }}</h4> --}}
                            @if ($dataCabang->propinsi == 'Kalimantan Selatan-Tengah-Timur')
                                <h4 class="s-property-title">{{ __('global.sekretCabangKalSelTengTim') }}</h4>
                            @elseif ($dataCabang->propinsi == 'Kalimantan Barat')
                                <h4 class="s-property-title">{{ __('global.sekretCabangKalimantanBarat') }}</h4>
                            @elseif ($dataCabang->propinsi == 'Lampung')
                                <h4 class="s-property-title">{{ __('global.sekretCabangLampung') }}</h4>
                            @elseif ($dataCabang->propinsi == 'Jawa')
                                <h4 class="s-property-title">{{ __('global.sekretCabangJawa') }}</h4>
                            @elseif ($dataCabang->propinsi == 'Sumatera Selatan')
                                <h4 class="s-property-title">{{ __('global.sekretCabangSumSel') }}</h4>
                            @elseif ($dataCabang->propinsi == 'Bengkulu')
                                <h4 class="s-property-title">{{ __('global.sekretCabangBengkulu') }}</h4>
                            @elseif ($dataCabang->propinsi == 'Jambi')
                                <h4 class="s-property-title">{{ __('global.sekretCabangJambi') }}</h4>
                            @elseif ($dataCabang->propinsi == 'Sumatera Utara')
                                <h4 class="s-property-title">{{ __('global.sekretCabangSumUt') }}</h4>
                            @endif

                            <ul class="additional-details-list clearfix">
                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">{{ __('global.Alamat') }}</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{!! nl2br($dataCabang->alamat) !!}</span>
                                </li>
                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Tel./Fax</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $dataCabang->tlpn }}</span>
                                </li>
                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">{{ __('global.email') }}</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $dataCabang->email }}</span>
                                </li>
                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">{{ __('global.ketua') }}</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $dataCabang->ketua }}</span>
                                </li>
                                <li>
                                    <span
                                        class="col-xs-6 col-sm-4 col-md-4 add-d-title">{{ __('global.sekretarisEx') }}</span>
                                    <span
                                        class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $dataCabang->sekertaris }}</span>
                                </li>

                            </ul>
                        </div>
                        <!-- End additional-details area  -->

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
