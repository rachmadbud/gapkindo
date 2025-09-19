@extends('guest.layouts.master')

@section('title', 'Galery | GAPKINDO')

@section('content')

    <link rel="stylesheet" href="{{ asset('guest/assets/css/lightslider.min.css') }}">
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ $dataGaleri->title }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->
    <div class="content-area single-property" style="background-color: #FCFCFC;">
        <div class="container">

            <div class="clearfix padding-top-40">
                <div class="col-md-12 single-property-content ">
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

                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    @foreach ($data as $item)
                                        <li data-thumb="{{ asset('guest/assets/img/galeri/' . $item->foto_detail) }}">
                                            <img src="{{ asset('guest/assets/img/galeri/' . $item->foto_detail) }}"
                                                alt="foto galeri">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('guest/assets/js/lightslider.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 9,
                slideMargin: 0,
                speed: 2500, // transisi antar slide 2.5 detik
                pause: 4000, // jeda antar slide 6 detik
                auto: true,
                loop: true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
@endpush
