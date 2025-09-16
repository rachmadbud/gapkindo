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

    <div class="content-area recent-property padding-top-40">
        <div class="container">
            <div class="row">
                <!-- Informasi Kontak -->
                <div class="col-md-6">
                    <h3>{{ __('global.gapkindoSekretariat') }}</h3>
                    <p>
                        Jl. Cideng Barat No.62-A, RT.14/RW.2, Cideng, <br>
                        Kecamatan Gambir, Kota Jakarta Pusat, <br> Daerah Khusus Ibukota Jakarta 10150
                    </p>

                    <p><i class="fa fa-phone"></i> Telp : (62-21) 3501510, 3501511, 3846813</p>
                    <p><i class="fa fa-fax"></i> Fax : (62-21) 3846811, 3500368</p>
                    <p><i class="fa fa-envelope"></i> Email :
                        <a href="mailto:sekretariat@bpnapi.org">gapkindo.pusat@gmail.com</a>
                    </p>
                </div>

                <!-- Formulir Kontak -->
                <div class="col-md-6">
                    <div id="map" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Buat map di div #map
            var map = L.map('map').setView([-6.1741661609779435, 106.8111734503309], 13); // posisi Jakarta

            // Tambahkan tile dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Marker lokasi kantor
            L.marker([-6.1741661609779435, 106.8111734503309])
                .addTo(map)
                .bindPopup("<b>{{ __('global.gapkindoSekretariat') }}")
                .openPopup();
        });
    </script>
@endpush
