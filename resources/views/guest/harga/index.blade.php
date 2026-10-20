@extends('guest.layouts.master')

@section('title', __('global.guest.priceDashboard') . ' | GAPKINDO')

@push('styles')
    @include('guest.harga.partials.styles')
@endpush

@section('content')
    <div class="gpk-stat-page">
        @include('guest.harga.partials.sidebar')

        <main class="gpk-stat-content">
            <header class="gpk-stat-heading">
                <div>
                    <span class="gpk-stat-eyebrow">{{ __('global.guest.dataCenter') }}</span>
                    <h1>{{ __('global.guest.priceDashboard') }}</h1>
                    <p>{{ __('global.guest.rubberPriceSummary') }}</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('sicom-tsr20') }}">
                    <i class="fas fa-chart-line" aria-hidden="true"></i>
                    {{ __('global.guest.viewSicomChart') }}
                </a>
            </header>

            <section class="gpk-stat-cards" aria-label="{{ __('global.guest.chartSummary') }}">
                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.lastPrice') }} · {{ __('global.guest.october') }} 2026</span>
                        <span class="gpk-stat-icon"><i class="fas fa-dollar-sign" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">258,2 <span class="gpk-stat-unit">US$/kg</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.estimatedFromReferenceImage') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.periodChange') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-arrow-trend-up" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">+75,2 <span class="gpk-stat-unit">US$/kg</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.estimatedJanOctChange') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.exchange') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-globe-asia" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">SICOM</p>
                    <p class="gpk-stat-caption">{{ __('global.guest.rubberContract') }}</p>
                </article>
            </section>

            <section class="gpk-stat-main-grid gpk-stat-main-grid--single" aria-label="{{ __('global.guest.chartSummary') }}">
                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>{{ __('global.guest.priceTrends') }}</h2>
                            <p>{{ __('global.guest.january') }}–{{ __('global.guest.october') }} 2026 · US$/kg</p>
                        </div>
                        <span class="gpk-stat-tag">{{ __('global.guest.estimatedVisualization') }}</span>
                    </div>

                    <div class="gpk-price-overview-chart">
                        @include('guest.harga.partials.chart')
                    </div>

                    <a class="gpk-price-chart-action" href="{{ route('sicom-tsr20') }}">
                        {{ __('global.guest.chartDetail') }} <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </article>
            </section>

            <p class="gpk-price-source-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                <span>
                    {{ __('global.guest.priceReferenceNote') }}
                </span>
            </p>
        </main>
    </div>
@endsection
