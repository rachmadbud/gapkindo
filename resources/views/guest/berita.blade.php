@extends('guest.layouts.master')

@section('title', 'BERITA | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title"></h1>BERITA
                </div>
            </div>
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
                            <h5><a href="{{ route('detail.news', app(\App\Helpers\Helper::class)->enkrip($news->id)) }}">{{ $news->title }}
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
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="" id="contact1">
                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> Alamat</h3>
                                <p>Jl. Cideng Barat No.62-A 14, RT.14/RW.2, Cideng, <br>
                                    Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10150
                                    <br>
                                    <strong>Indonesia</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> PUSAT PANGGILAN</h3>
                                <p class="text-muted">Kami sarankan Anda menggunakan bentuk komunikasi elektronik.</p>
                                <p><strong> (62-21) 3846811, 3500368</strong></p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i>Dukungan elektronik</h3>
                                <p class="text-muted">Jangan ragu untuk menulis email kepada kami atau menggunakan sistem
                                    tiket elektronik kami.</p>
                                <ul>
                                    <li><strong><a href="mailto:">gapkindo.pusat@gmail.com,</a></strong> </li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->
                        <hr>
                        <div id="map"></div>
                        <hr>
                        <h2>Contact form</h2>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control" id="subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea id="message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send
                                        message</button>
                                </div>
                            </div>
                            <!-- /.row -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
