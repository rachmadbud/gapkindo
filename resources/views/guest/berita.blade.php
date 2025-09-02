@extends('guest.layouts.master')

@section('title', 'Kontak | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">HALAMAN BERITA</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
        <div class="container">
            <div class="row">
                <div class="proerty-th">
                    @foreach ($dataNews as $news)
                        <div class="col-sm-6 col-md-4 p0 my-2">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a
                                        href="{{ route('detail.news', app(\App\Helpers\Helper::class)->enkrip($news->id)) }}">
                                        <img src="{{ asset('guest/assets/img/news/' . $news->image) }}"
                                            style="height: 200px; width: 100%; object-fit: cover;" alt="">
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
@endsection
