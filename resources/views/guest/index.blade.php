@extends('guest.layouts.master')
@section('title', 'Home | GAPKINDO')
@section('content')
    @include('guest.partials.slider')
    <!-- property area -->
    <div class="content-area home-area-1 recent-property parallax-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>GAPKINDO NEWS</h2>
                </div>
            </div>

            <div class="row">
                <div class="proerty-th">

                    @foreach ($dataNews as $news)
                        <div class="col-sm-6 col-md-4 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{ route('detail.news', app(\App\Helpers\Helper::class)->enkrip($news->id)) }}">
                                        <img src="{{ asset('guest/assets/img/news/' . $news->image) }}">
                                    </a>

                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="{{ route('detail.news', app(\App\Helpers\Helper::class)->enkrip($news->id)) }}"
                                            title="{{ $news->title }}">{{ \Illuminate\Support\Str::limit($news->title, 40) }}
                                        </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b><i class="fas fa-calendar-alt"></i> :
                                            {{ date('d-m-Y', strtotime($news->created_at)) }}</b>
                                    </span>
                                    <span class="proerty-price pull-right">*new</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!--Welcome area -->
    <div class="Welcome-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 Welcome-entry  col-sm-12">
                    <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                        <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                    <!-- /.feature title -->
                                    <h2>GAPKINDO</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                            <div class="row">
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <a href="{{ route('guest.index') }}"><i class="pe-7s-home pe-4x"></i></a>
                                        </div>
                                        <h3>{{ __('global.home') }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <a href="{{ route('cabang') }}" target="_blank" rel="noopener noreferrer"><i
                                                    class="pe-7s-users pe-4x"></i></a>

                                        </div>
                                        <h3>{{ __('global.cabang') }}</h3>
                                    </div>
                                </div>


                                <div class="col-xs-12 text-center">
                                    <i class="welcome-circle"></i>
                                </div>

                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <a href="{{ route('sejarah') }}"><i class="pe-7s-notebook pe-4x"></i></a>
                                        </div>
                                        <h3>{{ __('global.sejarah') }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <a href="{{ route('kontak') }}"><i class="pe-7s-help2 pe-4x"></i></a>
                                        </div>
                                        <h3>{{ __('global.kontak') }}</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--TESTIMONIALS -->
    <div class="testimonial-area recent-property parallax-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2 style="color: #028808;">{{ trans('global.badanPengawas') }}</h2>
                    <p class="text-center">2025 - 2028</p>
                </div>
            </div>
            <div class="row-centered">
                <div class="proerty-th">
                    <div class="col-sm-12 col-md-12 p0">
                        <div class="box-two proerty-item ">
                            <div class="item-thumb ">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/MARTINUS-S-SINARYA.png') }}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">MARTINUS S SINARYA </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>{{ trans('global.Ketuaaja') }}</b> </span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="proerty-th">
                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/RYANTO WISNUARDHI.png') }}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">RYANTO WISNUARDHY</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>{{ trans('global.Anggota') }}</b></span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/MOAGRAHA-GUNAWAN.png') }}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">MOAGRAHA GUNAWAN</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>{{ trans('global.Anggota') }}</b></span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/SANTO-SUMONO.png') }}"></a>

                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">SANTO SUMONO</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>{{ trans('global.Anggota') }}</b></span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/VINCENTIUS-OEI.png') }}"></a>

                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">VINCENTIUS OEI KOK SEN</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>{{ trans('global.Anggota') }}</b></span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2 style="color: #028808;">{{ trans('global.badanPengurus') }}</h2>
                    <p class="text-center">2025 - 2028</p>
                </div>
            </div>
            <div class="row-centered">
                <div class="proerty-th">
                    <div class="col-sm-12 col-md-12 p0">
                        <div class="box-two proerty-item ">
                            <div class="item-thumb ">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/alex-img.png') }}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">ALEX KURNIAWAN EDY </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>{{ trans('global.ketua') }}</b> </span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="row-centered">
                    <div class="proerty-th">
                        <div class="col-sm-8 col-md-12 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{ route('soon') }}"><img
                                            src="{{ asset('guest/assets/img/demo/timmie-img.png') }}"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="{{ route('soon') }}">TIMMIE MELVIN</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> {{ trans('global.SekUm') }} /
                                            {{ trans('global.KabidKeuangan') }}</b></span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="proerty-th">
                        <div class="col-sm-8 col-md-12 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{ route('soon') }}"><img
                                            src="{{ asset('guest/assets/img/demo/vargo-img.png') }}"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="{{ route('soon') }}">VARGO GUNAWAN</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> {{ trans('global.KabidOrganisasi') }} /
                                            {{ trans('global.bendahara') }}</b></span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="proerty-th">
                        <div class="col-sm-8 col-md-12 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{ route('soon') }}"><img
                                            src="{{ asset('guest/assets/img/demo/edrikson-img.png') }}"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="{{ route('soon') }}">ERIKSON GINTING</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> {{ trans('global.KabidProduksi') }}</b></span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="proerty-th">
                        <div class="col-sm-8 col-md-12 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{ route('soon') }}"><img
                                            src="{{ asset('guest/assets/img/demo/widiyantoko-img.png') }}"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="{{ route('soon') }}">I. WIDYANTOKO SUMARLIN</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> {{ trans('global.KeBidPemasaran') }}</b></span>
                                    <span class="proerty-price pull-right"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row my-4">
                <div class="proerty-th">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box-two proerty-item my-2">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}">
                                    <img src="{{ asset('guest/assets/img/cabang/ketua/IshakLeono-sumut.png') }}">
                                </a>
                            </div>
                            <div class="item-entry overflow text-center">
                                <h5><a href="{{ route('soon') }}">ISHAK LEONO</a></h5>
                                <div class="dot-hr"></div>
                                <span class=""><b>Sumatera Utara</b></span>
                                <span class="proerty-price"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="proerty-th">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box-two proerty-item my-2">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}">
                                    <img src="{{ asset('guest/assets/img/cabang/ketua/Gusnar Sunardi - Jambi.png') }}"
                                        width="50">
                                </a>
                            </div>
                            <div class="item-entry overflow text-center">
                                <h5><a href="{{ route('soon') }}">Gusnar Sunardi</a></h5>
                                <div class="dot-hr"></div>
                                <span class=""><b>Jambi</b></span>
                                <span class="proerty-price"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="proerty-th">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box-two proerty-item my-2">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}">
                                    <img
                                        src="{{ asset('guest/assets/img/cabang/ketua/Budiman Sutanto - Bengkulu.png') }}">
                                </a>
                            </div>
                            <div class="item-entry overflow text-center">
                                <h5><a href="{{ route('soon') }}">Budiman Sutanto</a></h5>
                                <div class="dot-hr"></div>
                                <span class=""><b>Bengkulu</b></span>
                                <span class="proerty-price"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="proerty-th">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box-two proerty-item my-2">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}">
                                    <img src="{{ asset('guest/assets/img/cabang/ketua/Irwan Mualim - Sumsel.png') }}">
                                </a>
                            </div>
                            <div class="item-entry overflow text-center">
                                <h5><a href="{{ route('soon') }}">Irwan Mualim</a></h5>
                                <div class="dot-hr"></div>
                                <span class=""><b>Sumatera Selatan</b></span>
                                <span class="proerty-price"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <br>

            <div class="row my-4">
                <div class="proerty-th">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box-two proerty-item my-2">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}">
                                    <img src="{{ asset('guest/assets/img/cabang/ketua/userDefault.png') }}">
                                </a>
                            </div>
                            <div class="item-entry overflow text-center">
                                <h5><a href="{{ route('soon') }}">Tedi Noviandi</a></h5>
                                <div class="dot-hr"></div>
                                <span class=""><b>Lampung</b></span>
                                <span class="proerty-price"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="proerty-th">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box-two proerty-item my-2">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}">
                                    <img src="{{ asset('guest/assets/img/cabang/ketua/Arif - Kalbar.png') }}"
                                        width="50">
                                </a>
                            </div>
                            <div class="item-entry overflow text-center">
                                <h5><a href="{{ route('soon') }}">Arif</a></h5>
                                <div class="dot-hr"></div>
                                <span class=""><b>Kalimantan Barat</b></span>
                                <span class="proerty-price"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="proerty-th">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box-two proerty-item my-2">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}">
                                    <img src="{{ asset('guest/assets/img/cabang/ketua/userDefault.png') }}">

                                </a>
                            </div>
                            <div class="item-entry overflow text-center">
                                <h5><a href="{{ route('soon') }}">Andreas Winata</a></h5>
                                <div class="dot-hr"></div>
                                <span class=""><b>Kalimantan Selatan-Tengah-Timur</b></span>
                                <span class="proerty-price"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="proerty-th">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="box-two proerty-item my-2">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}">
                                    <img src="{{ asset('guest/assets/img/cabang/ketua/Anthonya M. Saputera - Jawa') }}">
                                </a>
                            </div>
                            <div class="item-entry overflow text-center">
                                <h5><a href="{{ route('soon') }}">Anthonya M Saputra</a></h5>
                                <div class="dot-hr"></div>
                                <span class=""><b>Jawa </b></span>
                                <span class="proerty-price"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2 style="color: #028808;">{{ __('global.gapkindoSekretariat') }}</h2>
                </div>
            </div>
            <div class="row-centered">
                <div class="proerty-th">
                    <div class="col-sm-12 col-md-12 p0">
                        <div class="box-two proerty-item ">
                            <div class="item-thumb ">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/ERWIN-TUNAS.png') }}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">Erwin Tunas</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>{{ __('global.direkturEksekutif') }}</b> </span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="proerty-th">
                    <div class="col-sm-12 col-md-12 p0">
                        <div class="box-two proerty-item ">
                            <div class="item-thumb ">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/UHENDI-HARIS.png') }}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">UHENDI HARIS </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>{{ __('global.asistenDirekturEksekutif') }}</b> </span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- boy-sale area -->
        <div class="boy-sale-area">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">

                        <div class="col-xs-12">
                            <p class="asks-call">{{ __('global.HAVEQUESTIONS?CALL') }} : <span class="strong">(62-21)
                                    3501510, 3501511, 3846813</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
