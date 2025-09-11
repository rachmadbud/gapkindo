@extends('guest.layouts.master')

@section('title', 'Kontak | GAPKINDO')

@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">{{ __('global.titleKontak') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="content-area recent-property padding-top-40 parallax-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-black" id="contact1">
                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> {{ __('global.Alamat') }}</h3>
                                <p>Jl. Cideng Barat No.62-A 14, RT.14/RW.2, Cideng, <br>
                                    Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10150
                                    <br>
                                    <strong>Indonesia</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i>{{ __('global.PusatPanggilan') }}</h3>
                                <p class="text-black text-muted">Kami sarankan Anda menggunakan bentuk komunikasi
                                    elektronik.</p>
                                <p><strong> (62-21) 3846811, 3500368</strong></p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i>{{ __('global.DukunganElektronik') }}</h3>
                                <p class=" text-blacktext-muted">Jangan ragu untuk menulis email kepada kami atau
                                    menggunakan sistem
                                    tiket elektronik kami.</p>
                                <ul>
                                    <li><strong><a href="mailto:">gapkindo.pusat@gmail.com,</a></strong> </li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->
                        <hr>

                        <div id="map" style="width:100%; height:400px;"></div>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Buat map di div #map
            var map = L.map('map').setView([-6.1741661609779435, 106.8111734503309], 13);

            // Tambahkan tile dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([-6.1741661609779435, 106.8111734503309])
                .addTo(map)
                .bindPopup("<b>GAPKINDO</b><br>Jakarta Pusat.")
                .openPopup();
        });
    </script>
@endpush
