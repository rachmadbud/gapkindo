@extends('guest.layouts.master')

@section('title', 'Berita | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ __('global.publikasi') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area recent-property padding-top-40 parallax-bg">
        <div class="container">
            <div class="row">
                @foreach ($dataPublikasi as $item)
                    <div class="proerty-th">

                        <div class="col-sm-6 col-md-4 p0 my-2">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{ asset('publikasi/' . $item->lampiran) }}" target="_blank">
                                        <img src="{{ asset('guest/assets/img/slide1/1634091544930.jpg') }}"
                                            style="width: 550px" alt="no image">
                                    </a>

                                </div>
                                <div class="item-entry overflow">
                                    <h5 class="text-center">
                                        <a href="{{ asset('publikasi/' . $item->lampiran) }}" target="_blank""
                                            title="{{ $item->judul }}">{{ $item->judul }}
                                        </a>
                                    </h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b><i class="fas fa-calendar-alt"></i>
                                            {{ $item->created_at }}</b>
                                    </span>
                                    <span class="proerty-price pull-right">*</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
