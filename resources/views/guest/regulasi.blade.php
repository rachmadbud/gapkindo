@extends('guest.layouts.master')

@section('title', 'Regulasi | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ __('global.regulasi') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area recent-property padding-top-40 parallax-bg">
        <div class="container">
            <div class="row">
                <div class="blog-lst col-md-9 p0">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="post-header single">
                                <div class="">
                                    <h2 class="wow fadeInLeft animated">{{ trans('global.anggotaTpp') }}</h2>
                                    <div class="title-line wow fadeInRight animated"></div>
                                </div>
                            </div>
                            <!-- Input Pencarian -->
                            <!-- Tabel -->
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    {{-- Data akan di-render dengan JavaScript --}}
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-between">
                                <button id="prevBtn" class="btn btn-primary">Previous</button>
                                <span id="pageInfo"></span>
                                <button id="nextBtn" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="blog-asside-right col-md-3">

                    <div class="panel panel-default sidebar-menu wow  fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ __('global.Search') }}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="input-group">
                                <input class="form-control" placeholder="Search" type="text" id="searchInput">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-smal">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="proerty-th">

                </div>
            </div>
        </div>
    </div>



@endsection
