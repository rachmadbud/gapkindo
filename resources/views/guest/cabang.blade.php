@extends('guest.layouts.master')

@section('title', 'Cabang | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">HALAMAN News</h1>
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
                    <div class="col-sm-6 col-md-4 p0 my-2">
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="">
                                    <img src="" style="height: 200px; width: 100%; object-fit: cover;"
                                        alt="">
                                </a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="">
                                    </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left"><b><i class="fas fa-calendar-alt"></i> :</b>
                                </span>
                                <span class="proerty-price pull-right">*new</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
