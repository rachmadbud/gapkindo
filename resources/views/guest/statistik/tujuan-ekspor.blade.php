@extends('guest.layouts.master')

@section('title', __('global.guest.exportDestinations') . ' | GAPKINDO')

@push('styles')
    @include('guest.statistik.partials.styles')
@endpush

@section('content')
    <div class="gpk-stat-page">
        @include('guest.layouts.sidebar')

        <main class="gpk-stat-content">
            <header class="gpk-stat-heading">
                <div>
                    <span class="gpk-stat-eyebrow">{{ __('global.guest.dataCenter') }}</span>
                    <h1>{{ __('global.guest.exportDestinations') }}</h1>
                    <p>{{ __('global.guest.exportMarket') }} — {{ __('global.guest.indonesiaRubberMarketReach') }}</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('statistik') }}">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    {{ __('global.guest.backToDashboard') }}
                </a>
            </header>

            <form class="gpk-export-filters" method="GET" action="{{ route('tujuan-ekspor') }}">
                <div class="gpk-export-filters-heading">
                    <span class="gpk-stat-eyebrow">{{ __('global.guest.reportFilter') }}</span>
                    <p>{{ __('global.guest.selectExportPeriod') }}</p>
                </div>
                <div class="gpk-export-filter-field">
                    <label for="export-month">{{ __('global.guest.period') }}</label>
                    <select id="export-month" name="month">
                        @foreach ($months as $monthNumber => $monthName)
                            <option value="{{ $monthNumber }}" {{ $selectedMonth === $monthNumber ? 'selected' : '' }}>
                                {{ $monthName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="gpk-export-filter-field">
                    <label for="export-year">{{ __('global.guest.year') }}</label>
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
                    {{ __('global.guest.show') }}
                </button>
            </form>

            <section class="gpk-stat-cards" aria-label="Ringkasan ekspor {{ $months[$selectedMonth] }} {{ $selectedYear }}">
                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.totalExportVolume') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-shipping-fast" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value gpk-stat-value--compact">{{ number_format($totalVolume, 0, ',', '.') }} <span
                            class="gpk-stat-unit">KG</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.selectedMonthVolume') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.totalExportValue') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-dollar-sign" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value gpk-stat-value--compact">US$ {{ number_format($totalValue, 0, ',', '.') }}</p>
                    <p class="gpk-stat-caption">{{ __('global.guest.selectedMonthValue') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.dataPeriod') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-calendar-alt" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ $months[$selectedMonth] }}</p>
                    <p class="gpk-stat-caption">{{ __('global.guest.year') }} {{ $selectedYear }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.destinationCountries') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-globe-asia" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ count($exportDestinations) }} <span class="gpk-stat-unit">{{ __('global.guest.country') }}</span>
                    </p>
                    <p class="gpk-stat-caption">{{ __('global.guest.dataRowsInPeriod') }}</p>
                </article>
            </section>

            <section class="gpk-stat-main-grid gpk-stat-main-grid--single" aria-label="Rincian tujuan ekspor">
                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>{{ __('global.guest.exportVolumeByCountry') }}</h2>
                            <p>{{ __('global.guest.volumeKg') }} {{ __('global.guest.and') }} {{ __('global.guest.valueUsd') }} · {{ $months[$selectedMonth] }} {{ $selectedYear }}</p>
                        </div>
                        <span class="gpk-stat-tag">DATA EXCEL</span>
                    </div>
                    @if (count($exportDestinations))
                        <div class="gpk-export-chart-legend" aria-hidden="true">
                            <span>{{ __('global.guest.destinationCountry') }}</span>
                            <span>{{ __('global.guest.volumeKg') }}</span>
                            <span>{{ __('global.guest.valueUsd') }}</span>
                        </div>
                        <div class="gpk-export-chart" role="list" aria-label="{{ __('global.guest.exportVolumeByCountry') }}">
                            @foreach ($exportDestinations as $destination)
                                @php
                                    $volume = $destination['volume'];
                                    $barWidth = $volume && $chartMaximum ? ($volume / $chartMaximum) * 100 : 0;
                                @endphp
                                <div class="gpk-export-chart-row" role="listitem">
                                    <span class="gpk-export-chart-country">{{ $destination['country'] }}</span>
                                    <div class="gpk-export-chart-track" role="progressbar"
                                        aria-label="{{ __('global.guest.exportVolume') }} {{ $destination['country'] }}" aria-valuemin="0"
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
                            <h3>{{ __('global.guest.noDataAvailable') }}</h3>
                            <p>{{ __('global.guest.selectAnotherPeriod', ['period' => $months[$selectedMonth] . ' ' . $selectedYear]) }}</p>
                        </div>
                    @endif
                </article>
            </section>

            <p class="gpk-stat-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <span>{{ __('global.guest.uploadedExcelDataNote') }}</span>
            </p>
        </main>
    </div>
@endsection
