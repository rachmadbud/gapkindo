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
                    <span class="gpk-stat-eyebrow">{{ __('global.guest.rubberPrices') }} · Singapore Exchange</span>
                    <h1>SICOM-TSR20</h1>
                    <p>{{ __('global.guest.tradingViewPriceTrend') }}</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('harga') }}">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    {{ __('global.guest.backToDashboard') }}
                </a>
            </header>

            <section class="gpk-stat-cards" aria-label="{{ __('global.guest.chartSummary') }}">
                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.lastPrice') }} · {{ __('global.guest.october') }} 2026</span>
                        <span class="gpk-stat-icon"><i class="fas fa-dollar-sign" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">258,2 <span class="gpk-stat-unit">US$/kg</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.estimatedImageReading') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.referenceRange') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-arrows-alt-v" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ __('global.guest.january') }}–{{ __('global.guest.october') }}</p>
                    <p class="gpk-stat-caption">{{ __('global.guest.monthlyPoints') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.tradingViewSymbol') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-chart-line" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">SGX:TF1!</p>
                    <p class="gpk-stat-caption">Singapore Exchange · TSR20</p>
                </article>
            </section>

            <section class="gpk-stat-main-grid gpk-stat-main-grid--single" aria-label="{{ __('global.guest.priceTrends') }}">
                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>{{ __('global.guest.sicomChartTitle') }}</h2>
                            <p>{{ __('global.guest.estimatedMonthlyLevels') }}</p>
                        </div>
                        <span class="gpk-stat-tag">{{ strtoupper(__('global.guest.january')) }}–{{ strtoupper(__('global.guest.october')) }} 2026</span>
                    </div>
                    <div class="gpk-price-overview-chart">
                        <div class="gpk-price-overview-chart">
                            @include('guest.harga.partials.chart')
                        </div>

                        <p class="gpk-price-chart-caption">
                            {{ __('global.guest.monthlyPointsDisclaimer') }}
                        </p>

                        <a class="gpk-price-chart-action" href="https://id.tradingview.com/chart/?symbol=SGX%3ATF1%21"
                            target="_blank" rel="noopener noreferrer">
                            {{ __('global.guest.viewTradingView') }} <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                        </a>
                </article>
            </section>

            <p class="gpk-price-source-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <span>
                    {{ __('global.guest.manualPriceVisualization') }}
                </span>
            </p>
        </main>
    </div>
@endsection
