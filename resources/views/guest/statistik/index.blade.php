@extends('guest.layouts.master')

@section('title', 'Statistik Karet Alam | GAPKINDO')

@push('styles')
    @include('guest.statistik.partials.styles')
@endpush

@section('content')
    <div class="gpk-stat-page">
        @include('guest.layouts.sidebar')

        <main class="gpk-stat-content">
            <header class="gpk-stat-heading">
                <div>
                    <span class="gpk-stat-eyebrow">Pusat Data GAPKINDO</span>
                    <h1>Dashboard Statistik</h1>
                    <p>Ringkasan industri karet alam Indonesia dan perdagangan global.</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('tujuan-ekspor') }}">
                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    Jelajahi tujuan ekspor
                </a>
            </header>

            <section class="gpk-stat-cards" aria-label="Ringkasan statistik">
                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Luas kebun · 2025</span>
                        <span class="gpk-stat-icon"><i class="fas fa-seedling" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">- <span class="gpk-stat-unit">juta ha</span></p>
                    <p class="gpk-stat-caption">Total luas perkebunan karet</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Produksi · 2025</span>
                        <span class="gpk-stat-icon"><i class="fas fa-boxes" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">- <span class="gpk-stat-unit">juta ton</span></p>
                    <p class="gpk-stat-caption">Produksi karet alam</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Volume ekspor · {{ $exportYear ?? '—' }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-chart-line" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ number_format($totalExportVolumeKg, 0, ',', '.') }} <span
                            class="gpk-stat-unit">kg</span></p>
                    <p class="gpk-stat-caption">Akumulasi volume ekspor tahun {{ $exportYear ?? 'terbaru' }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Negara tujuan · {{ $exportYear ?? '—' }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-globe-asia" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ $destinationCountryCount }} <span class="gpk-stat-unit">negara</span></p>
                    <p class="gpk-stat-caption">Negara tujuan unik tahun {{ $exportYear ?? 'terbaru' }}</p>
                </article>
            </section>

            <section class="gpk-stat-main-grid" aria-label="Rincian statistik">
                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>Tren industri</h2>
                            <p>Perkembangan statistik karet alam dari waktu ke waktu.</p>
                        </div>
                        <span class="gpk-stat-tag">VISUALISASI</span>
                    </div>
                    <div class="gpk-stat-empty">
                        <span class="gpk-stat-empty-icon"><i class="fas fa-chart-area" aria-hidden="true"></i></span>
                        <h3>Grafik statistik belum tersedia</h3>
                        <p>Hubungkan halaman ini dengan data statistik resmi untuk menampilkan tren luas kebun, produksi,
                            dan ekspor.</p>
                    </div>
                </article>

                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>Pasar ekspor</h2>
                            <p>Jangkauan pasar karet alam Indonesia.</p>
                        </div>
                    </div>
                    <div class="gpk-stat-empty">
                        <span class="gpk-stat-empty-icon"><i class="fas fa-globe-asia" aria-hidden="true"></i></span>
                        <h3>{{ $destinationCountryCount }} negara tujuan tercatat pada {{ $exportYear ?? 'tahun terbaru' }}
                        </h3>
                        <p>Lihat halaman tujuan ekspor untuk menampilkan rincian negara dan volume perdagangan.</p>
                        <a class="gpk-stat-button" href="{{ route('tujuan-ekspor') }}">
                            Lihat tujuan ekspor <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            </section>

            <p class="gpk-stat-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <span>Ringkasan volume dan negara tujuan dihitung dari data ekspor tahun terbaru yang tersedia.</span>
            </p>
        </main>
    </div>
@endsection
