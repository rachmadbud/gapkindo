@extends('guest.layouts.master')

@section('title', 'Harga Karet & Komoditas | GAPKINDO')

@push('styles')
    @include('guest.harga.partials.styles')
@endpush

@section('content')
    <div class="gpk-stat-page">
        @include('guest.harga.partials.sidebar')

        <main class="gpk-stat-content">
            <header class="gpk-stat-heading">
                <div>
                    <span class="gpk-stat-eyebrow">Pusat Data GAPKINDO</span>
                    <h1>Dashboard Harga</h1>
                    <p>Ringkasan harga karet alam dan tren SICOM TSR20.</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('sicom-tsr20') }}">
                    <i class="fas fa-chart-line" aria-hidden="true"></i>
                    Lihat Grafik SICOM
                </a>
            </header>

            <section class="gpk-stat-cards" aria-label="Ringkasan harga SICOM TSR20">
                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Harga terakhir · Okt 2026</span>
                        <span class="gpk-stat-icon"><i class="fas fa-dollar-sign" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">258,2 <span class="gpk-stat-unit">US$/kg</span></p>
                    <p class="gpk-stat-caption">Angka perkiraan dari gambar referensi</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Perubahan periode</span>
                        <span class="gpk-stat-icon"><i class="fas fa-arrow-trend-up" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">+75,2 <span class="gpk-stat-unit">US$/kg</span></p>
                    <p class="gpk-stat-caption">Perkiraan Jan–Okt 2026 · +41,1% dari 183,0</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Bursa</span>
                        <span class="gpk-stat-icon"><i class="fas fa-globe-asia" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">SICOM</p>
                    <p class="gpk-stat-caption">Kontrak karet alam TSR20 · SGX:TF1!</p>
                </article>
            </section>

            <section class="gpk-stat-main-grid gpk-stat-main-grid--single" aria-label="Grafik ringkasan harga">
                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>Tren Harga SICOM TSR20</h2>
                            <p>Januari–Oktober 2026 · US$/kg</p>
                        </div>
                        <span class="gpk-stat-tag">ESTIMASI VISUAL</span>
                    </div>

                    <div class="gpk-price-overview-chart">
                        @include('guest.harga.partials.chart')
                    </div>

                    <a class="gpk-price-chart-action" href="{{ route('sicom-tsr20') }}">
                        Lihat detail SICOM-TSR20 <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </article>
            </section>

            <p class="gpk-price-source-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <span>
                    Nilai grafik dibaca secara perkiraan dari gambar referensi yang diberikan dan bukan data historis harian
                    yang tervalidasi. Untuk grafik TradingView dan informasi pasar terkini, buka halaman
                    <strong>SICOM-TSR20</strong>.
                </span>
            </p>
        </main>
    </div>
@endsection
