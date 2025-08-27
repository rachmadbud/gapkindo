@extends('admin.template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Dasboard 1</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card col-12">
                    <div class="card-header">
                        <h3 class="card-title">
                            <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <br><br>
                                <br>
                                <!-- small box -->
                                <div class="small-box" style="color: #3654ed;">
                                    <div class="inner">
                                        <h3>{{ Auth::user()->name }}</h3>
                                        <p>Selamat Datang</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-6">
                                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_Y76lSjmxMO.json"
                                    background="transparent" speed="1" style="width: 450px; height: 350px;" loop
                                    autoplay></lottie-player>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="breadcrumb-item"><a href="#" class="text-danger">
                                <img src="{{ asset('assets/17-55-41-668_512.webp') }}" width="203px" height="60px"
                                    alt="">
                            </a></div>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
                <div class="col-lg-4 col-6">
                    <div class="small-box">
                        {{-- <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_dgempiad.json"  background="transparent"  speed="1"  style="width: 450px; height: 430px;"  loop autoplay></lottie-player> --}}
                        <h2></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@push('script')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script>
        function showTime() {
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            var session = "AM";

            if (h == 0) {
                h = 12;
            }

            if (h > 12) {
                h = h - 12;
                session = "PM";
            }

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            var time = h + ":" + m + ":" + s + " " + session;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;

            setTimeout(showTime, 1000);

        }
        showTime();
    </script>
@endpush
