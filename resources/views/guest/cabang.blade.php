@extends('guest.layouts.master')

@section('title', 'Cabang | GAPKINDO')

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
    <div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
        <div class="container">
            <div class="row">
                @foreach ($data as $item)
                    <div class="proerty-th">
                        <div class="col-sm-6 col-md-4 p0 my-2">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{ route('soon') }}">
                                        <img src="{{ asset('guest/assets/img/cabang/' . $item->img) }}"
                                            style="height: 200px; width: 100%; object-fit: cover;" alt="">
                                    </a>
                                </div>
                                <div class="item-entry overflow">
                                    <p><a href="">{{ $item->propinsi }}</a></p>
                                    <div class="dot-hr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
