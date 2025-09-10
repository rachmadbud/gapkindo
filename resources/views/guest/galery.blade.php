@extends('guest.layouts.master')

@section('title', 'Galery | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ __('global.galery') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area blog-page padding-top-40" style="background-color: #FCFCFC; padding-bottom: 55px;">
        <div class="container">
            <div class="row">
                <div class="blog-lst col-md-10 pl0">
                    @foreach ($data as $item)
                        <section class="post">
                            <div class="text-center padding-b-50">
                                <h2 class="wow fadeInLeft animated">{{ $item->title }}</h2>
                                <div class="title-line wow fadeInRight animated"></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="author-category">
                                        At <a href="#">{{ $item->at }}</a>
                                    </p>
                                </div>
                                <div class="col-sm-6 right">
                                    <p class="date-comments">
                                        <a href="single.html"><i class="fa fa-calendar-o"></i>
                                            {{ app(\App\Helpers\Helper::class)->formatDate($item->created_at) }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="image wow fadeInLeft animated">
                                <a href="{{ route('detailGaleri', app(\App\Helpers\Helper::class)->enkrip($item->id)) }}">
                                    <img src="{{ asset('guest/assets/img/galeri/' . $item->image) }}" class="img-responsive"
                                        alt="Example blog post alt">
                                </a>
                            </div>
                            <p class="read-more">
                                <a href="{{ route('detailGaleri', app(\App\Helpers\Helper::class)->enkrip($item->id)) }}"
                                    class="btn btn-default btn-border">{{ __('global.read') }}</a>
                            </p>
                        </section>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

@endsection
