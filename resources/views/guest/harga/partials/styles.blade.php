@include('guest.statistik.partials.styles')

<style>
    .gpk-price-overview-chart {
        margin-top: 1rem;
    }

    .gpk-price-chart {
        display: block;
        width: 100%;
        height: auto;
        min-height: 220px;
        overflow: visible;
    }

    .gpk-price-chart-grid {
        stroke: #e8e3d6;
        stroke-width: 1;
    }

    .gpk-price-chart-candle-wick {
        stroke-width: 2;
    }

    .gpk-price-chart-candle-body {
        stroke-width: 1;
    }

    .gpk-price-chart-candle--up {
        fill: #2c8a5b;
        stroke: #2c8a5b;
    }

    .gpk-price-chart-candle--down {
        fill: #b75440;
        stroke: #b75440;
    }

    .gpk-price-chart-candle .gpk-price-chart-value-label {
        fill: #1a2e1f;
        stroke: none;
    }

    .gpk-price-chart-axis-label,
    .gpk-price-chart-month {
        fill: #758075;
        font-family: var(--f-body, 'Manrope', sans-serif);
        font-size: 13px;
    }

    .gpk-price-chart-value-label {
        fill: #1a2e1f;
        font-family: var(--f-body, 'Manrope', sans-serif);
        font-size: 11px;
        font-weight: 800;
    }

    .gpk-price-chart-axis-title {
        fill: #657166;
        font-family: var(--f-body, 'Manrope', sans-serif);
        font-size: 12px;
        font-weight: 800;
    }

    .gpk-price-chart-caption {
        margin: 0.85rem 0 0;
        color: #8b9389;
        font-size: 0.82rem;
        line-height: 1.5;
    }

    .gpk-price-chart-detail {
        width: 100%;
        margin-top: 0.8rem;
        border-collapse: collapse;
        color: #334238;
        font-size: 0.84rem;
    }

    .gpk-price-chart-detail th,
    .gpk-price-chart-detail td {
        padding: 0.65rem 0.75rem;
        border-bottom: 1px solid #eeeadd;
        text-align: right;
        white-space: nowrap;
    }

    .gpk-price-chart-detail thead th {
        background: #edf3e9;
        color: #526052;
        font-size: 0.72rem;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .gpk-price-chart-detail th:first-child,
    .gpk-price-chart-detail td:first-child {
        text-align: left;
    }

    .gpk-price-change--up {
        color: #287553;
        font-weight: 800;
    }

    .gpk-price-change--down {
        color: #a64d35;
        font-weight: 800;
    }

    .gpk-price-chart-table-wrap {
        overflow-x: auto;
        margin-top: 0.75rem;
    }

    .gpk-price-chart-action {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.85rem;
        padding: 0.65rem 0.9rem;
        border: 1px solid #2c5530;
        border-radius: 6px;
        background: #2c5530;
        color: #fff !important;
        font-size: 0.9rem;
        font-weight: 700;
        text-decoration: none !important;
        transition: background 0.2s, transform 0.2s;
    }

    .gpk-price-chart-action:hover {
        transform: translateY(-1px);
        background: #1a3b20;
    }

    .gpk-price-source-note {
        display: flex;
        align-items: flex-start;
        gap: 0.7rem;
        margin-top: 1rem;
        padding: 0.9rem 1rem;
        border-left: 3px solid #b8911e;
        border-radius: 0 6px 6px 0;
        background: #f5f0df;
        color: #6e6038;
        font-size: 0.9rem;
        line-height: 1.6;
    }

    .gpk-price-chart-legend {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #657166;
        font-size: 0.82rem;
        font-weight: 700;
    }

    .gpk-price-chart-legend::before {
        width: 0.8rem;
        height: 0.8rem;
        border-radius: 2px;
        background: #2c8a5b;
        content: '';
    }

    .gpk-price-chart-legend span {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        margin-left: 0.6rem;
    }

    .gpk-price-chart-legend .gpk-price-chart-legend-down::before,
    .gpk-price-chart-legend .gpk-price-chart-legend-up::before {
        width: 0.75rem;
        height: 0.75rem;
        border-radius: 2px;
        content: '';
    }

    .gpk-price-chart-legend .gpk-price-chart-legend-down::before {
        background: #b75440;
    }

    .gpk-price-chart-legend .gpk-price-chart-legend-up::before {
        background: #2c8a5b;
    }

    @media (max-width: 600px) {
        .gpk-price-chart {
            min-height: 180px;
        }

        .gpk-price-chart-detail {
            min-width: 620px;
        }

        .gpk-price-chart-axis-label,
        .gpk-price-chart-month {
            font-size: 11px;
        }
    }
</style>
