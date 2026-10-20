@extends('guest.layouts.master')

@section('title', __('global.guest.statistics') . ' | GAPKINDO')

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
                    <h1>{{ __('global.guest.statisticsDashboard') }}</h1>
                    <p>{{ __('global.guest.statisticsSummary') }}</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('tujuan-ekspor') }}">
                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    {{ __('global.guest.exploreExportDestinations') }}
                </a>
            </header>

            <section class="gpk-stat-cards" aria-label="{{ __('global.guest.statisticsSummary') }}">
                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.plantationArea') }} · 2025</span>
                        <span class="gpk-stat-icon"><i class="fas fa-seedling" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">- <span class="gpk-stat-unit">{{ __('global.guest.millionHa') }}</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.totalRubberPlantationArea') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.production') }} · 2025</span>
                        <span class="gpk-stat-icon"><i class="fas fa-boxes" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">- <span class="gpk-stat-unit">{{ __('global.guest.millionTonnes') }}</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.naturalRubberProduction') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.exportVolume') }} · {{ $exportYear ?? '—' }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-chart-line" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ number_format($totalExportVolumeKg, 0, ',', '.') }} <span
                            class="gpk-stat-unit">kg</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.exportVolumeAccumulated') }} {{ $exportYear ?? __('global.guest.latest') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.exportDestinations') }} · {{ $exportYear ?? '—' }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-globe-asia" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ $destinationCountryCount }} <span class="gpk-stat-unit">{{ __('global.guest.country') }}</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.uniqueDestinationCountries') }} {{ $exportYear ?? __('global.guest.latest') }}</p>
                </article>
            </section>

            <section class="gpk-stat-main-grid" aria-label="{{ __('global.guest.statisticsDashboard') }}">
                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>{{ __('global.guest.industryTrends') }}</h2>
                            <p>{{ __('global.guest.statisticsDevelopment') }}</p>
                        </div>
                        <span class="gpk-stat-tag">{{ __('global.guest.visualization') }}</span>
                    </div>
                    <div class="gpk-stat-empty">
                        <span class="gpk-stat-empty-icon"><i class="fas fa-chart-area" aria-hidden="true"></i></span>
                        <h3>{{ __('global.guest.statisticsUnavailable') }}</h3>
                        <p>{{ __('global.guest.statisticsUnavailableDescription') }}</p>
                    </div>
                </article>

                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>{{ __('global.guest.exportMarket') }}</h2>
                            <p>{{ __('global.guest.indonesiaRubberMarketReach') }}</p>
                        </div>
                    </div>
                    <div class="gpk-stat-empty">
                        <span class="gpk-stat-empty-icon"><i class="fas fa-globe-asia" aria-hidden="true"></i></span>
                        <h3>{{ $destinationCountryCount }} {{ __('global.guest.destinationsRecorded') }} {{ $exportYear ?? __('global.guest.latest') }}
                        </h3>
                        <p>{{ __('global.guest.destinationDetailsDescription') }}</p>
                        <a class="gpk-stat-button" href="{{ route('tujuan-ekspor') }}">
                            {{ __('global.guest.seeExportDestinations') }} <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            </section>

            <p class="gpk-stat-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <span>{{ __('global.guest.exportSummaryNote') }}</span>
            </p>
        </main>
    </div>
@endsection
