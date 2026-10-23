@extends('guest.layouts.master')

@section('title', __('global.guest.productionInIndonesia') . ' | GAPKINDO')

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

        .gpk-production-chart-province {
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

        .gpk-history-legend {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.7rem 1rem;
        }

        .gpk-history-chart-wrap {
            position: relative;
            width: 100%;
        }

        .gpk-history-chart {
            display: block;
            width: 100%;
            height: auto;
            overflow: visible;
        }

        .gpk-history-grid-line,
        .gpk-history-axis-line {
            stroke: #dce2e8;
            stroke-width: 1;
        }

        .gpk-history-grid-line.is-hidden {
            visibility: hidden;
        }

        .gpk-history-axis-label {
            fill: #64748b;
            font: 12px system-ui, sans-serif;
        }

        .gpk-history-axis-title {
            fill: #475569;
            font: 700 13px system-ui, sans-serif;
        }

        .gpk-history-series-line {
            fill: none;
            stroke-width: 3;
            stroke-linejoin: round;
            stroke-linecap: round;
        }

        .gpk-history-point {
            cursor: crosshair;
            stroke: #fff;
            stroke-width: 1.5;
        }

        .gpk-history-point:hover,
        .gpk-history-point:focus {
            r: 7;
            outline: none;
            stroke-width: 2.5;
        }

        .gpk-history-card {
            overflow: hidden;
            border: 1px solid #dce2e8;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 5px 18px rgba(26, 46, 31, 0.07);
        }

        .gpk-history-card-header {
            padding: 1.35rem 1.6rem 1rem;
            background: linear-gradient(110deg, #1a3b20 0%, #2c5530 56%, #72a34f 100%);
            color: #fff;
        }

        .gpk-history-card-title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .gpk-history-title-group {
            display: flex;
            min-width: 0;
            align-items: center;
            gap: 0.9rem;
        }

        .gpk-history-title-icon {
            flex: 0 0 auto;
            font-size: 2.4rem;
        }

        .gpk-history-title-group h2 {
            margin: 0;
            color: #fff;
            font-size: clamp(1.5rem, 2vw, 1.85rem);
            font-weight: 800;
        }

        .gpk-history-title-group p {
            margin: 0.2rem 0 0;
            color: rgba(255, 255, 255, 0.78);
            font-size: 1.15rem;
        }

        .gpk-history-year-badge {
            flex: 0 0 auto;
            padding: 0.35rem 0.65rem;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1.05rem;
            font-weight: 800;
        }

        .gpk-history-clock {
            flex: 0 0 auto;
            color: rgba(255, 255, 255, 0.86);
            font-size: 1.05rem;
            font-weight: 700;
            text-align: right;
        }

        .gpk-history-legend {
            justify-content: center;
            gap: 0.6rem 1.3rem;
            padding: 0.8rem 1rem;
            border-bottom: 1px solid #e8edf2;
            background: #f9fafb;
            color: #40516a;
            font-size: 1.05rem;
        }

        .gpk-history-legend-item {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .gpk-history-legend-swatch {
            width: 0.7rem;
            height: 0.7rem;
            flex: 0 0 auto;
            border-radius: 50%;
        }

        .gpk-history-chart-body {
            padding: 0.5rem 0.8rem 0;
        }

        .gpk-history-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(135px, 1fr));
            gap: 0.75rem;
            margin: 0.75rem;
            padding: 1.2rem;
            border-radius: 10px;
            background: linear-gradient(110deg, #1a3b20 0%, #2c5530 56%, #72a34f 100%);
            color: #fff;
        }

        .gpk-history-summary-heading {
            grid-column: 1 / -1;
            margin: 0;
            color: #fff;
            font-size: 1.5rem;
            font-weight: 800;
            text-align: center;
        }

        .gpk-history-summary-item {
            min-width: 0;
            padding: 0.75rem;
            border: 1px solid rgba(255, 255, 255, 0.26);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.16);
            text-align: center;
        }

        .gpk-history-summary-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.05rem;
            font-weight: 700;
        }

        .gpk-history-summary-value {
            margin: 0.4rem 0 0;
            color: #fff;
            font-size: clamp(1.45rem, 2vw, 1.85rem);
            font-weight: 800;
            line-height: 1.2;
            text-align: center;
            /* <--- Tambahkan baris ini */
        }

        .gpk-history-source {
            margin: 0.75rem;
            padding: 0.8rem 1rem;
            border-left: 4px solid #f59e0b;
            border-radius: 6px;
            background: #fff4c8;
            color: #85451c;
            font-size: 1.05rem;
        }

        .gpk-history-source-title {
            margin-right: 0.55rem;
            padding: 0.2rem 0.45rem;
            border-radius: 4px;
            background: #f59e0b;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 800;
        }

        .gpk-history-source-note {
            margin: 0.55rem 0 0;
            padding-top: 0.5rem;
            border-top: 1px dashed #e6bb51;
        }

        @media (max-width: 700px) {
            .gpk-history-card-title-row {
                align-items: flex-start;
            }

            .gpk-history-clock {
                max-width: 115px;
                font-size: 0.9rem;
            }

            .gpk-history-card-header {
                padding: 1rem;
            }

            .gpk-history-chart-body {
                padding-right: 0.2rem;
                padding-left: 0.2rem;
            }

            .gpk-history-summary {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                margin: 0.5rem;
                padding: 0.8rem;
            }
        }

        .gpk-history-tooltip {
            position: absolute;
            z-index: 2;
            min-width: 190px;
            padding: 0.65rem 0.8rem;
            border-radius: 6px;
            background: rgba(0, 0, 0, 0.92);
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.18);
            color: #fff;
            font-size: 1.15rem;
            line-height: 1.55;
            pointer-events: none;
            transform: translate(-50%, calc(-100% - 10px));
        }

        .gpk-history-tooltip[hidden] {
            display: none;
        }

        .gpk-history-tooltip-title {
            margin-bottom: 0.2rem;
            font-weight: 800;
        }

        .gpk-history-tooltip-total {
            margin-top: 0.2rem;
            padding-top: 0.2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            font-weight: 700;
        }

        .gpk-history-note {
            margin: 0.8rem 0 0;
            color: #778176;
            font-size: 1.15rem;
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

            .gpk-production-chart-province {
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
                    <h1>{{ __('global.guest.productionInIndonesia') }}</h1>
                    <p>{{ __('global.guest.productionDetails') }}</p>
                </div>
                <a class="gpk-stat-button" href="{{ route('statistik') }}">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    {{ __('global.guest.backToDashboard') }}
                </a>
            </header>

            <section class="gpk-stat-main-grid gpk-stat-main-grid--single"
                aria-label="{{ __('global.guest.productionHistoryAria') }}">
                <article class="gpk-history-card">
                    <header class="gpk-history-card-header">
                        <div class="gpk-history-card-title-row">
                            <div class="gpk-history-title-group">
                                <i class="fas fa-flag gpk-history-title-icon" aria-hidden="true"></i>
                                <div>
                                    <h2>{{ __('global.guest.productionHistoryTitle') }}</h2>
                                    <p>{{ __('global.guest.productionHistorySubtitle') }}</p>
                                </div>
                                <span class="gpk-history-year-badge">
                                    {{ preg_replace('/\*+$/', '', $historicalProduction['years'][0]) }} -
                                    {{ preg_replace('/\*+$/', '', end($historicalProduction['years'])) }}
                                </span>
                            </div>
                            <div class="gpk-history-clock" role="timer"
                                aria-label="{{ __('global.guest.productionHistoryDateTime') }}">
                                <span data-history-date></span>
                                <strong data-history-time></strong>
                            </div>
                        </div>
                    </header>
                    <div class="gpk-history-legend" aria-label="{{ __('global.guest.productionHistoryLegend') }}">
                        @foreach ($historicalProduction['series'] as $series)
                            <span class="gpk-history-legend-item">
                                <span class="gpk-history-legend-swatch"
                                    style="background-color: {{ $series['color'] }}"></span>
                                {{ $series['label'] }}
                            </span>
                        @endforeach
                    </div>
                    <div class="gpk-history-chart-body">
                        <div class="gpk-history-chart-wrap">
                            <svg class="gpk-history-chart" data-history-chart viewBox="0 0 1000 500" role="img"
                                aria-label="{{ __('global.guest.productionHistoryAria') }}">
                                <g data-history-grid-layer></g>
                                <g data-history-lines></g>
                                <g data-history-points></g>
                                <g data-history-axes></g>
                            </svg>
                            <div class="gpk-history-tooltip" data-history-tooltip role="status" aria-live="polite" hidden>
                            </div>
                        </div>
                    </div>
                    <footer class="gpk-history-summary">
                        <h3 class="gpk-history-summary-heading">
                            <i class="fas fa-chart-line" aria-hidden="true"></i>
                            {{ __('global.guest.productionHistoryDashboard') }}
                        </h3>
                        <div class="gpk-history-summary-item">
                            <span class="gpk-history-summary-label"><i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                {{ __('global.guest.productionHistoryPeriod') }}</span>
                            <p class="gpk-history-summary-value">{{ $historicalProduction['summary']['period'] }}
                                {{ __('global.guest.productionHistoryYears') }}</p>
                        </div>
                        <div class="gpk-history-summary-item">
                            <span class="gpk-history-summary-label"><i class="fas fa-trophy" aria-hidden="true"></i>
                                {{ __('global.guest.productionHistoryPeakYear') }}</span>
                            <p class="gpk-history-summary-value">{{ $historicalProduction['summary']['peakYear'] }}</p>
                        </div>
                        <div class="gpk-history-summary-item">
                            <span class="gpk-history-summary-label"><i class="fas fa-weight-hanging" aria-hidden="true"></i>
                                {{ __('global.guest.productionHistoryPeak') }}</span>
                            <p class="gpk-history-summary-value">
                                {{ number_format($historicalProduction['summary']['peakProduction'], 1, ',', '.') }}
                                {{ __('global.guest.productionHistoryUnit') }}</p>
                        </div>
                        <div class="gpk-history-summary-item">
                            <span class="gpk-history-summary-label"><i class="fas fa-chart-line" aria-hidden="true"></i>
                                {{ __('global.guest.productionHistoryAverage') }}</span>
                            <p class="gpk-history-summary-value">
                                {{ number_format($historicalProduction['summary']['averageProduction'], 1, ',', '.') }}
                                {{ __('global.guest.productionHistoryUnit') }}</p>
                        </div>
                        @foreach ($historicalProduction['series'] as $series)
                            <div class="gpk-history-summary-item">
                                <span class="gpk-history-summary-label">
                                    <i class="fas fa-percentage" aria-hidden="true"></i>
                                    {{ __('global.guest.productionHistoryShare', ['series' => strtoupper($series['key'])]) }}
                                </span>
                                <p class="gpk-history-summary-value">
                                    {{ number_format($historicalProduction['summary']['shares'][$series['key']], 1, ',', '.') }}%
                                </p>
                            </div>
                        @endforeach
                    </footer>
                    <div class="gpk-history-source">
                        <span class="gpk-history-source-title">{{ __('global.guest.productionHistorySource') }}</span>
                        <strong>{{ $historicalProduction['source'] }}</strong>
                    </div>
                </article>
            </section>
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        (() => {
            const chartElement = document.querySelector('[data-history-chart]');
            if (!chartElement) return;

            const data = @json($historicalProduction);
            const panel = chartElement.closest('.gpk-history-card');
            const ns = 'http://www.w3.org/2000/svg';
            const bounds = {
                left: 76,
                right: 975,
                top: 26,
                bottom: 340,
                max: 4000
            };
            const groups = {
                grid: chartElement.querySelector('[data-history-grid-layer]'),
                lines: chartElement.querySelector('[data-history-lines]'),
                points: chartElement.querySelector('[data-history-points]'),
                axes: chartElement.querySelector('[data-history-axes]')
            };
            const tooltip = panel.querySelector('[data-history-tooltip]');
            const format = value => Number(value).toLocaleString('id-ID', {
                minimumFractionDigits: 1,
                maximumFractionDigits: 3
            });
            const x = index => bounds.left + index * (bounds.right - bounds.left) / (data.years.length - 1);
            const y = value => bounds.bottom - value * (bounds.bottom - bounds.top) / bounds.max;
            const svg = (tag, attributes = {}) => {
                const element = document.createElementNS(ns, tag);
                Object.entries(attributes).forEach(([key, value]) => element.setAttribute(key, value));
                return element;
            };
            const clear = group => group.replaceChildren();

            function renderAxes() {
                clear(groups.grid);
                clear(groups.axes);
                [0, 1000, 2000, 3000, 4000].forEach(value => {
                    const tickY = y(value);
                    groups.grid.append(svg('line', {
                        x1: bounds.left,
                        x2: bounds.right,
                        y1: tickY,
                        y2: tickY,
                        class: 'gpk-history-grid-line'
                    }));
                    const label = svg('text', {
                        x: bounds.left - 10,
                        y: tickY + 4,
                        class: 'gpk-history-axis-label',
                        'text-anchor': 'end'
                    });
                    label.textContent = `${value.toLocaleString('id-ID')} ${data.labels.thousandTonnesShort}`;
                    groups.axes.append(label);
                });

                groups.axes.append(svg('line', {
                    x1: bounds.left,
                    x2: bounds.right,
                    y1: bounds.bottom,
                    y2: bounds.bottom,
                    class: 'gpk-history-axis-line'
                }));
                data.years.forEach((year, index) => {
                    const label = svg('text', {
                        x: x(index),
                        y: bounds.bottom + 34,
                        class: 'gpk-history-axis-label',
                        'text-anchor': 'end',
                        transform: `rotate(-65 ${x(index)} ${bounds.bottom + 34})`
                    });
                    label.textContent = year;
                    groups.axes.append(label);
                });

                const productionTitle = svg('text', {
                    x: 15,
                    y: (bounds.top + bounds.bottom) / 2,
                    class: 'gpk-history-axis-title',
                    'text-anchor': 'middle',
                    transform: `rotate(-90 15 ${(bounds.top + bounds.bottom) / 2})`
                });
                productionTitle.textContent = data.labels.productionAxis;
                groups.axes.append(productionTitle);

                const yearTitle = svg('text', {
                    x: (bounds.left + bounds.right) / 2,
                    y: 488,
                    class: 'gpk-history-axis-title',
                    'text-anchor': 'middle'
                });
                yearTitle.textContent = data.labels.year;
                groups.axes.append(yearTitle);
            }

            function showTooltip(point, index) {
                const rect = point.getBoundingClientRect();
                const wrapperRect = chartElement.parentElement.getBoundingClientRect();
                const title = document.createElement('div');
                title.className = 'gpk-history-tooltip-title';
                title.textContent = `${data.labels.year} ${data.years[index]}`;
                const rows = data.series.map(series => {
                    const row = document.createElement('div');
                    row.style.color = series.color;
                    row.textContent =
                        `${series.label}: ${format(series.values[index])} ${data.labels.thousandTonnes}`;
                    return row;
                });
                const total = document.createElement('div');
                total.className = 'gpk-history-tooltip-total';
                total.textContent =
                    `Total: ${format(data.series.reduce((sum, series) => sum + series.values[index], 0))} ${data.labels.thousandTonnes}`;
                tooltip.replaceChildren(title, ...rows, total);
                tooltip.hidden = false;
                tooltip.style.left = `${rect.left + rect.width / 2 - wrapperRect.left}px`;
                tooltip.style.top = `${rect.top - wrapperRect.top}px`;
            }

            function render() {
                clear(groups.lines);
                clear(groups.points);
                renderAxes();
                data.series.forEach(series => {
                    const linePath = series.values.map((value, index) =>
                        `${index === 0 ? 'M' : 'L'} ${x(index).toFixed(2)} ${y(value).toFixed(2)}`
                    ).join(' ');
                    groups.lines.append(svg('path', {
                        d: linePath,
                        stroke: series.color,
                        class: 'gpk-history-series-line'
                    }));

                    series.values.forEach((value, index) => {
                        const point = svg('circle', {
                            cx: x(index),
                            cy: y(value),
                            r: 3,
                            fill: series.color,
                            class: 'gpk-history-point',
                            tabindex: 0,
                            'aria-label': `${data.years[index]}, ${series.label}: ${format(value)} ${data.labels.thousandTonnes}`
                        });
                        point.addEventListener('mouseenter', () => showTooltip(point, index));
                        point.addEventListener('focus', () => showTooltip(point, index));
                        point.addEventListener('mouseleave', () => {
                            tooltip.hidden = true;
                        });
                        point.addEventListener('blur', () => {
                            tooltip.hidden = true;
                        });
                        groups.points.append(point);
                    });
                });
                tooltip.hidden = true;
            }

            function updateClock() {
                const now = new Date();
                const locale = document.documentElement.lang.startsWith('en') ? 'en-US' : 'id-ID';
                panel.querySelector('[data-history-date]').textContent = new Intl.DateTimeFormat(locale, {
                    weekday: 'long',
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                }).format(now);
                panel.querySelector('[data-history-time]').textContent = new Intl.DateTimeFormat(locale, {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hourCycle: 'h23'
                }).format(now);
            }

            render();
            updateClock();
            window.setInterval(updateClock, 1000);
        })();
    </script>
@endpush
