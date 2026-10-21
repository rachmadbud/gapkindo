@extends('guest.layouts.master')

@section('title', __('global.guest.productionGlobal') . ' | GAPKINDO')

@push('styles')
    @include('guest.statistik.partials.styles')
    <style>
        .gpk-production-chart {
            display: grid;
            gap: 1.1rem;
            padding: 0.25rem 0;
        }

        .gpk-production-chart-legend,
        .gpk-production-chart-row {
            display: grid;
            grid-template-columns: minmax(120px, 180px) minmax(0, 1fr) 140px;
            align-items: center;
            gap: 1rem;
        }

        .gpk-production-chart-legend {
            padding-bottom: 0.55rem;
            border-bottom: 1px solid #eeeadd;
            color: #778176;
            font-size: 0.99rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .gpk-production-chart-legend span:last-child,
        .gpk-production-chart-value {
            text-align: right;
        }

        .gpk-production-chart-country {
            overflow: hidden;
            color: #334238;
            font-size: 1.2rem;
            font-weight: 700;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .gpk-production-chart-track {
            height: 1rem;
            overflow: hidden;
            border-radius: 99px;
            background: #edf0e8;
        }

        .gpk-production-chart-bar {
            width: var(--bar-width);
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #2c5530, #72a34f);
        }

        .gpk-production-chart-row:nth-child(2n) .gpk-production-chart-bar {
            background: linear-gradient(90deg, #a57a14, #e1bd4a);
        }

        .gpk-production-chart-row:nth-child(3n) .gpk-production-chart-bar {
            background: linear-gradient(90deg, #326b86, #68abc0);
        }

        .gpk-production-chart-value {
            color: #020202;
            font-size: 1.2rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .gpk-production-chart-axis {
            display: flex;
            justify-content: space-between;
            margin: 0.7rem 156px 0 196px;
            color: #8b9389;
            font-size: 0.82rem;
        }

        @media (max-width: 1100px) {
            .gpk-production-chart-legend,
            .gpk-production-chart-row {
                grid-template-columns: minmax(110px, 160px) minmax(0, 1fr) 125px;
                gap: 0.65rem;
            }

            .gpk-production-chart-axis {
                margin-right: 140px;
                margin-left: 174px;
            }
        }

        @media (max-width: 600px) {
            .gpk-production-chart {
                gap: 1rem;
            }

            .gpk-production-chart-legend,
            .gpk-production-chart-row {
                grid-template-columns: minmax(80px, 110px) minmax(0, 1fr) auto;
                gap: 0.6rem;
            }

            .gpk-production-chart-country {
                grid-row: 1 / 3;
                white-space: normal;
            }

            .gpk-production-chart-track {
                grid-column: 2 / 4;
                grid-row: 2;
            }

            .gpk-production-chart-value {
                grid-column: 2 / 4;
                grid-row: 1;
                text-align: left;
            }

            .gpk-production-chart-axis {
                margin-right: 0;
                margin-left: 116px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="gpk-stat-page">
        @include('guest.layouts.sidebar')

        <main class="gpk-stat-content">
            <header class="gpk-stat-heading">
                <div>
                    <span class="gpk-stat-eyebrow">{{ __('global.guest.dataCenter') }}</span>
                    <h1>{{ __('global.guest.productionGlobal') }}</h1>
                    <p>{{ __('global.guest.productionDetailsGlobal') }}</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('statistik') }}">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    {{ __('global.guest.backToDashboard') }}
                </a>
            </header>

            <form class="gpk-export-filters" method="GET" action="{{ route('produksi-global') }}">
                <div class="gpk-export-filters-heading">
                    <span class="gpk-stat-eyebrow">{{ __('global.guest.reportFilter') }}</span>
                    <p>{{ __('global.guest.selectProductionPeriod') }}</p>
                </div>
                <div class="gpk-export-filter-field">
                    <label for="global-production-month">{{ __('global.guest.period') }}</label>
                    <select id="global-production-month" name="month">
                        @foreach ($months as $monthNumber => $monthName)
                            <option value="{{ $monthNumber }}" {{ $selectedMonth === $monthNumber ? 'selected' : '' }}>
                                {{ $monthName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="gpk-export-filter-field">
                    <label for="global-production-year">{{ __('global.guest.year') }}</label>
                    <select id="global-production-year" name="year">
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

            <section class="gpk-stat-cards" aria-label="{{ __('global.guest.productionSummary') }} {{ $months[$selectedMonth] }} {{ $selectedYear }}">
                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.totalProduction') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-boxes" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value gpk-stat-value--compact">{{ number_format($totalProduction, 3, ',', '.') }} <span
                            class="gpk-stat-unit">{{ __('global.guest.tonnes') }}</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.selectedMonthProduction') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.recordedCountries') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-globe-americas" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ count($productions) }} <span class="gpk-stat-unit">{{ __('global.guest.countries') }}</span></p>
                    <p class="gpk-stat-caption">{{ __('global.guest.productionRegions') }}</p>
                </article>

                <article class="gpk-stat-card">
                    <div class="gpk-stat-card-top">
                        <span class="gpk-stat-label">{{ __('global.guest.dataPeriod') }}</span>
                        <span class="gpk-stat-icon"><i class="fas fa-calendar-alt" aria-hidden="true"></i></span>
                    </div>
                    <p class="gpk-stat-value">{{ $months[$selectedMonth] }}</p>
                    <p class="gpk-stat-caption">{{ __('global.guest.year') }} {{ $selectedYear }}</p>
                </article>
            </section>

            <section class="gpk-stat-main-grid gpk-stat-main-grid--single" aria-label="{{ __('global.guest.productionByCountry') }}">
                <article class="gpk-stat-panel">
                    <div class="gpk-stat-panel-heading">
                        <div>
                            <h2>{{ __('global.guest.productionByCountry') }}</h2>
                            <p>{{ __('global.guest.production') }} ({{ __('global.guest.tonnes') }}) · {{ $months[$selectedMonth] }} {{ $selectedYear }}</p>
                        </div>
                        <span class="gpk-stat-tag">DATA EXCEL</span>
                    </div>
                    @if (count($productions))
                        <div class="gpk-production-chart-legend" aria-hidden="true">
                            <span>{{ __('global.guest.countries') }}</span>
                            <span></span>
                            <span>{{ __('global.guest.production') }} ({{ __('global.guest.tonnes') }})</span>
                        </div>
                        <div class="gpk-production-chart" role="list" aria-label="{{ __('global.guest.productionByCountry') }} ({{ __('global.guest.tonnes') }})">
                            @foreach ($productions as $production)
                                @php
                                    $barWidth = ($production['production_ton'] / $chartMaximum) * 100;
                                @endphp
                                <div class="gpk-production-chart-row" role="listitem">
                                    <span class="gpk-production-chart-country">{{ $production['country'] }}</span>
                                    <div class="gpk-production-chart-track" role="progressbar"
                                        aria-label="{{ __('global.guest.production') }} {{ $production['country'] }}" aria-valuemin="0"
                                        aria-valuemax="{{ $chartMaximum }}"
                                        aria-valuenow="{{ $production['production_ton'] }}">
                                        <div class="gpk-production-chart-bar" style="--bar-width: {{ $barWidth }}%;"></div>
                                    </div>
                                    <span class="gpk-production-chart-value">
                                        {{ number_format($production['production_ton'], 3, ',', '.') }} {{ __('global.guest.tonnes') }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                        <div class="gpk-production-chart-axis" aria-hidden="true">
                            <span>0</span>
                            <span>{{ number_format($chartMaximum * 0.25, 0, ',', '.') }}</span>
                            <span>{{ number_format($chartMaximum * 0.5, 0, ',', '.') }}</span>
                            <span>{{ number_format($chartMaximum * 0.75, 0, ',', '.') }}</span>
                            <span>{{ number_format($chartMaximum, 0, ',', '.') }} {{ __('global.guest.tonnes') }}</span>
                        </div>
                    @else
                        <div class="gpk-stat-empty">
                            <span class="gpk-stat-empty-icon"><i class="fas fa-calendar-times" aria-hidden="true"></i></span>
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
