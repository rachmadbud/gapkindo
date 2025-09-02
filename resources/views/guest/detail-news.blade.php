@extends('guest.layouts.master')
@section('title', 'Detail News | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ $dataNews->title }} </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
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
                                    <li data-thumb="{{ asset('guest/assets/img/news/' . $dataNews->image) }}">
                                        <img src="{{ asset('guest/assets/img/news/' . $dataNews->image) }}" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="single-property-wrapper">
                        <!-- .property-meta -->

                        <div class="section">
                            <h4 class="s-property-title">Description</h4>
                            <div class="s-property-content">
                                <p class="text-justify">{{ $dataNews->content }}</p>
                            </div>
                        </div>
                        <!-- End description area  -->

                        <div class="section additional-details">

                            <h4 class="s-property-title">Additional Details</h4>

                            <ul class="additional-details-list clearfix">
                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Tanggal</span>
                                    <span
                                        class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ date('d-m', strtotime($dataNews->created_at)) }}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Built In</span>
                                    <span
                                        class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ date('Y', strtotime($dataNews->created_at)) }}</span>
                                </li>
                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Source</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{ $dataNews->source }}</span>
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
