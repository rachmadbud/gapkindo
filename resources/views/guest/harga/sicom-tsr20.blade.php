@extends('guest.layouts.master')

@section('title', 'SICOM-TSR20 | GAPKINDO')

@push('styles')
    @include('guest.harga.partials.styles')
@endpush

@section('content')
    <div class="gpk-stat-page">
        @include('guest.harga.partials.sidebar')

        <main class="gpk-stat-content">
            <header class="gpk-stat-heading">
                <div>
                    <span class="gpk-stat-eyebrow">Harga Karet Alam · Singapore Exchange</span>
                    <h1>SICOM-TSR20</h1>
                    <p>Tren harga referensi dan akses ke chart TradingView SGX:TF1!.</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('harga') }}">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    Kembali ke Dashboard
                </a>
            </header>

            <section class="gpk-stat-cards" aria-label="Ringkasan grafik SICOM TSR20">
                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Harga terakhir · Okt 2026</span>
                        <span class="gpk-stat-icon"><i class="fas fa-dollar-sign" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">258,2 <span class="gpk-stat-unit">US$/kg</span></p>
                    <p class="gpk-stat-caption">Perkiraan pembacaan gambar</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Rentang gambar</span>
                        <span class="gpk-stat-icon"><i class="fas fa-arrows-alt-v" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">Jan–Okt</p>
                    <p class="gpk-stat-caption">Tahun 2026 · 10 titik bulanan</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Simbol TradingView</span>
                        <span class="gpk-stat-icon"><i class="fas fa-chart-line" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">SGX:TF1!</p>
                    <p class="gpk-stat-caption">Singapore Exchange · TSR20</p>
                </article>
            </section>

            <section class="gpk-stat-main-grid gpk-stat-main-grid--single" aria-label="Grafik harga SICOM TSR20">
                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>Grafik Harga SICOM TSR20</h2>
                            <p>Estimasi level harga bulanan dari gambar · US$/kg</p>
                        </div>
                        <span class="gpk-stat-tag">JAN–OKT 2026</span>
                    </div>
                    <div class="gpk-price-overview-chart">
                        <div class="gpk-price-overview-chart">
                            @include('guest.harga.partials.chart')
                        </div>

                        <p class="gpk-price-chart-caption">
                            Titik bulanan ditaksir dari posisi grafik pada gambar yang diberikan; tidak mewakili penutupan
                            bulanan resmi atau data harian.
                        </p>

                        <a class="gpk-price-chart-action" href="https://id.tradingview.com/chart/?symbol=SGX%3ATF1%21"
                            target="_blank" rel="noopener noreferrer">
                            Lihat Chart di TradingView <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                        </a>
                </article>
            </section>

            <p class="gpk-price-source-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <span>
                    Grafik di atas adalah visualisasi manual berdasarkan gambar referensi, bukan feed harga live.
                    Gunakan tombol <strong>Lihat Chart di TradingView</strong> untuk membuka instrumen SGX:TF1! secara
                    langsung di TradingView.
                </span>
            </p>
        </main>
    </div>
@endsection
