@extends('guest.layouts.master')

@section('title', 'sejarah | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ __('global.sejarah') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    {{-- <div class="content-area blog-page padding-top-40 parallax-bg"> --}}
    <div class="content-area blog-page padding-top-40 parallax-bg" style="background-color: #FCFCFC; padding-bottom: 55px;">
        <div class="container">
            <div class="row">
                <div class="blog-lst col-md-8 pl0">
                    <section id="id-100" class="post single">

                        <div id="post-content" class="post-body single wow fadeInLeft animated">

                            <h1>{{ __('global.Penjelasan') }}</h1>

                            <p>{{ __('global.penjelasanP1') }}</p>

                            {{-- <p>{{ __('global.penjelasanP2') }}</p>
                            <ul>
                                <li>{{ __('global.penjelasanP2Li1') }}</li>
                                <li>{{ __('global.penjelasanP2Li2') }}Kongres ke-II GAPKINDO pada tangga 11-09-1972 di
                                    Jakarta</li>
                            </ul> --}}

                    </section>

                </div>
            </div>

        </div>
    </div>

@endsection
