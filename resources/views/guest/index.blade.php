@extends('guest.layouts.master')

@section('content')
    @include('guest.partials.slider')
    <!-- property area -->
    <div class="content-area home-area-1 recent-property" style="background-color:#FCFCFC; padding-bottom: 55px;">
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
                                    <a
                                        href="{{ route('detail.news', app(\App\Helpers\Helper::class)->enkrip($news->id)) }}">
                                        <img src="{{ asset('guest/assets/img/news/' . $news->image) }}">
                                    </a>

                                </div>
                                <div class="item-entry overflow">
                                    <h5><a
                                            href="{{ route('detail.news', app(\App\Helpers\Helper::class)->enkrip($news->id)) }}">{{ $news->title }}
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
                                    <h2>GAP
                                        KINDO </h2>
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
                                            <i class="pe-7s-home pe-4x"></i>
                                        </div>
                                        <h3>Any property</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-users pe-4x"></i>
                                        </div>
                                        <h3>More Clients</h3>
                                    </div>
                                </div>


                                <div class="col-xs-12 text-center">
                                    <i class="welcome-circle"></i>
                                </div>

                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-notebook pe-4x"></i>
                                        </div>
                                        <h3>Easy to use</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-help2 pe-4x"></i>
                                        </div>
                                        <h3>Any help </h3>
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
    <div class="testimonial-area recent-property" style="background-color: #FCFCFC; padding-bottom: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>Badan Pengawas</h2>
                    <p>Masa Bakti 2025 - 2028</p>
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
                                <span class="pull-left"><b>KETUA</b> </span>
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
                                <h5><a href="{{ route('soon') }}">RYANTO WISNUARDHI</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>ANGGOTA</b></span>
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
                                <h5><a href="{{ route('soon') }}">MOAGRAHA-GUNAWAN</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>ANGGOTA</b></span>
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
                                <h5><a href="{{ route('soon') }}">SANTO-SUMONO</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>ANGGOTA</b></span>
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
                                <h5><a href="{{ route('soon') }}">VINCENTIUS-OEI</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>ANGGOTA</b></span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>Badan Pengurus GAPKINDO</h2>
                    <p>Masa Bakti 2025 - 2028</p>
                </div>
            </div>
            <div class="row-centered">
                <div class="proerty-th">
                    <div class="col-sm-12 col-md-12 p0">
                        <div class="box-two proerty-item ">
                            <div class="item-thumb ">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/ALEX-KURNIAWAN -EDY.png') }}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">ALEX KURNIAWAN EDY </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>KETUA UMUM</b> </span>
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
                                        src="{{ asset('guest/assets/img/demo/TIMMIE-MELVIN.png') }}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">TIMMIE MELVIN</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>SEKERTARIS UMUM & KABID KEUANGAN</b></span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/VARGO-GUNAWAN.png') }}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">VARGO GUNAWAN</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>KABID ORGANISASI & BENDAHARA </b></span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/ERIKSON-GINTING.png') }}"></a>

                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">ERIKSON GINTING</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>KETUA BIDANG PRODUKSI</b></span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="{{ route('soon') }}"><img
                                        src="{{ asset('guest/assets/img/demo/WIDYANTOKO-SUMARLIN.png') }}"></a>

                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{ route('soon') }}">WIDYANTOKO-SUMARLIN</a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>WIDYANTOKO-SUMARLIN</b></span>
                                <span class="proerty-price pull-right"></span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>Secretariat GAPKINDO</h2>
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
                                <span class="pull-left"><b>ERWIN-TUNAS</b> </span>
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
                                <h5><a href="{{ route('soon') }}">UHENDI-HARIS </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b>ASISTEN EKSEKUTIF DIREKTUR</b> </span>
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
                            <p class="asks-call">ADA PERTANYAAN? TELPON : <span class="strong"> (62-21) 3846811,
                                    3500368</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
