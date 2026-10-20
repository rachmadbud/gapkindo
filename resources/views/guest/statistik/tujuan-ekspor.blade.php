@extends('guest.layouts.master')

@section('title', 'Tujuan Ekspor | GAPKINDO')

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
                    <h1>Tujuan Ekspor</h1>
                    <p>Informasi pasar tujuan ekspor karet alam Indonesia.</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('statistik') }}">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    Kembali ke dashboard
                </a>
            </header>

            <form class="gpk-export-filters" method="GET" action="{{ route('tujuan-ekspor') }}">
                <div class="gpk-export-filters-heading">
                    <span class="gpk-stat-eyebrow">Filter laporan</span>
                    <p>Pilih periode data ekspor yang ingin ditampilkan.</p>
                </div>
                <div class="gpk-export-filter-field">
                    <label for="export-month">Periode</label>
                    <select id="export-month" name="month">
                        @foreach ($months as $monthNumber => $monthName)
                            <option value="{{ $monthNumber }}" {{ $selectedMonth === $monthNumber ? 'selected' : '' }}>
                                {{ $monthName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="gpk-export-filter-field">
                    <label for="export-year">Tahun</label>
                    <select id="export-year" name="year">
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ $selectedYear === $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="gpk-stat-button" type="submit">
                    <i class="fas fa-filter" aria-hidden="true"></i>
                    Tampilkan
                </button>
            </form>

            <section class="gpk-stat-cards" aria-label="Ringkasan ekspor {{ $months[$selectedMonth] }} {{ $selectedYear }}">
                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Total volume ekspor</span>
                        <span class="gpk-stat-icon"><i class="fas fa-shipping-fast" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value gpk-stat-value--compact">{{ number_format($totalVolume, 0, ',', '.') }} <span
                            class="gpk-stat-unit">KG</span></p>
                    <p class="gpk-stat-caption">Volume bulan terpilih</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Total nilai ekspor</span>
                        <span class="gpk-stat-icon"><i class="fas fa-dollar-sign" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value gpk-stat-value--compact">US$ {{ number_format($totalValue, 0, ',', '.') }}</p>
                    <p class="gpk-stat-caption">Nilai bulan terpilih</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Periode data</span>
                        <span class="gpk-stat-icon"><i class="fas fa-calendar-alt" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ $months[$selectedMonth] }}</p>
                    <p class="gpk-stat-caption">Tahun {{ $selectedYear }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">Negara tujuan</span>
                        <span class="gpk-stat-icon"><i class="fas fa-globe-asia" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ count($exportDestinations) }} <span class="gpk-stat-unit">negara</span>
                    </p>
                    <p class="gpk-stat-caption">Baris data pada periode ini</p>
                </article>
            </section>

            <section class="gpk-stat-main-grid gpk-stat-main-grid--single" aria-label="Rincian tujuan ekspor">
                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>Volume ekspor per negara tujuan</h2>
                            <p>Volume (KG) dan nilai ekspor (US$) · {{ $months[$selectedMonth] }} {{ $selectedYear }}</p>
                        </div>
                        <span class="gpk-stat-tag">DATA EXCEL</span>
                    </div>
                    @if (count($exportDestinations))
                        <div class="gpk-export-chart-legend" aria-hidden="true">
                            <span>Negara tujuan</span>
                            <span>Volume (KG)</span>
                            <span>Nilai (US$)</span>
                        </div>
                        <div class="gpk-export-chart" role="list" aria-label="Volume dan nilai ekspor per negara tujuan">
                            @foreach ($exportDestinations as $destination)
                                @php
                                    $volume = $destination['volume'];
                                    $barWidth = $volume && $chartMaximum ? ($volume / $chartMaximum) * 100 : 0;
                                @endphp
                                <div class="gpk-export-chart-row" role="listitem">
                                    <span class="gpk-export-chart-country">{{ $destination['country'] }}</span>
                                    <div class="gpk-export-chart-track" role="progressbar"
                                        aria-label="Volume ekspor {{ $destination['country'] }}" aria-valuemin="0"
                                        aria-valuemax="{{ $chartMaximum }}" aria-valuenow="{{ $volume ?? 0 }}">
                                        <div class="gpk-export-chart-bar" style="--bar-width: {{ $barWidth }}%;"></div>
                                    </div>
                                    <span class="gpk-export-chart-volume">
                                        {{ $volume !== null ? number_format($volume, 0, ',', '.') . ' KG' : '—' }}
                                    </span>
                                    <span class="gpk-export-chart-value">
                                        {{ $destination['value'] !== null ? 'US$ ' . number_format($destination['value'], 0, ',', '.') : '—' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                        <div class="gpk-export-chart-axis" aria-hidden="true">
                            <span>0</span>
                            <span>{{ number_format($chartMaximum * 0.25, 0, ',', '.') }}</span>
                            <span>{{ number_format($chartMaximum * 0.5, 0, ',', '.') }}</span>
                            <span>{{ number_format($chartMaximum * 0.75, 0, ',', '.') }}</span>
                            <span>{{ number_format($chartMaximum, 0, ',', '.') }} KG</span>
                        </div>
                    @else
                        <div class="gpk-stat-empty">
                            <span class="gpk-stat-empty-icon"><i class="fas fa-calendar-times"
                                    aria-hidden="true"></i></span>
                            <h3>Data belum tersedia</h3>
                            <p>Tidak ada data ekspor untuk {{ $months[$selectedMonth] }} {{ $selectedYear }}. Pilih
                                periode lain untuk melihat data yang tersedia.</p>
                        </div>
                    @endif
                </article>
            </section>

            <p class="gpk-stat-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <span>Data pada grafik dan ringkasan mengikuti file Excel yang diunggah admin untuk periode yang
                    dipilih.</span>
            </p>
        </main>
    </div>
@endsection
