@php
    $monthNames = __('global.guest.months');
    $monthAbbreviations = __('global.guest.monthAbbreviations');
    $monthlyPrices = [
        ['open' => 181.0, 'high' => 189.0, 'low' => 177.0, 'close' => 183.0],
        ['open' => 183.0, 'high' => 200.0, 'low' => 181.0, 'close' => 195.0],
        ['open' => 195.0, 'high' => 208.0, 'low' => 188.0, 'close' => 193.0],
        ['open' => 193.0, 'high' => 212.0, 'low' => 190.0, 'close' => 205.0],
        ['open' => 205.0, 'high' => 232.0, 'low' => 202.0, 'close' => 223.0],
        ['open' => 223.0, 'high' => 231.0, 'low' => 205.0, 'close' => 218.0],
        ['open' => 218.0, 'high' => 226.0, 'low' => 210.0, 'close' => 217.0],
        ['open' => 217.0, 'high' => 230.0, 'low' => 214.0, 'close' => 222.0],
        ['open' => 222.0, 'high' => 252.0, 'low' => 218.0, 'close' => 244.0],
        ['open' => 244.0, 'high' => 263.0, 'low' => 240.0, 'close' => 258.2],
    ];
    $plotLeft = 82;
    $plotRight = 900;
    $plotBottom = 306;
    $priceScale = 2.52;
    $plotPoints = [];

    foreach ($monthlyPrices as $index => $point) {
        $plotPoints[] = [
            'x' => $plotLeft + $index * (($plotRight - $plotLeft) / (count($monthlyPrices) - 1)),
            'highY' => $plotBottom - ($point['high'] - 170) * $priceScale,
            'lowY' => $plotBottom - ($point['low'] - 170) * $priceScale,
            'openY' => $plotBottom - ($point['open'] - 170) * $priceScale,
            'closeY' => $plotBottom - ($point['close'] - 170) * $priceScale,
            'closeLabelY' => max(42, $plotBottom - ($point['high'] - 170) * $priceScale - 8),
        ];
    }
@endphp

<div class="gpk-price-chart-legend" aria-label="{{ __('global.guest.chartLegend') }}">
    <span class="gpk-price-chart-legend-up">{{ __('global.guest.up') }}</span>
    <span class="gpk-price-chart-legend-down">{{ __('global.guest.down') }}</span>
</div>

<svg class="gpk-price-chart" viewBox="0 0 960 360" role="img"
    aria-labelledby="sicom-chart-title sicom-chart-description" preserveAspectRatio="xMidYMid meet">
    <title id="sicom-chart-title">{{ __('global.guest.chartDescription') }}</title>
    <desc id="sicom-chart-description">
        {{ __('global.guest.candlestickDescription') }}
    </desc>

    <g aria-hidden="true">
        @foreach (range(170, 270, 10) as $level)
            @php
                $gridY = $plotBottom - ($level - 170) * $priceScale;
            @endphp
            <line class="gpk-price-chart-grid" x1="72" y1="{{ $gridY }}" x2="920"
                y2="{{ $gridY }}" />
            <text class="gpk-price-chart-axis-label" x="22" y="{{ $gridY + 4 }}">{{ $level }},0</text>
        @endforeach
        <text class="gpk-price-chart-axis-title" x="24" y="24">US$/kg</text>

        @foreach ($monthlyPrices as $index => $point)
            <line class="gpk-price-chart-grid" x1="{{ $plotPoints[$index]['x'] }}" y1="54"
                x2="{{ $plotPoints[$index]['x'] }}" y2="{{ $plotBottom }}" stroke-dasharray="2 5" />
            <text class="gpk-price-chart-month" x="{{ $plotPoints[$index]['x'] }}" y="338" text-anchor="middle">
                {{ $monthAbbreviations[$index] }}
            </text>
        @endforeach
    </g>

    @foreach ($monthlyPrices as $index => $point)
        @php
            $plotPoint = $plotPoints[$index];
            $directionClass = $point['close'] >= $point['open'] ? 'up' : 'down';
            $candleTop = min($plotPoint['openY'], $plotPoint['closeY']);
            $candleHeight = max(3, abs($plotPoint['openY'] - $plotPoint['closeY']));
            $change = $index > 0 ? $point['close'] - $monthlyPrices[$index - 1]['close'] : null;
            $changePercent = $index > 0 ? ($change / $monthlyPrices[$index - 1]['close']) * 100 : null;
        @endphp
        <g class="gpk-price-chart-candle gpk-price-chart-candle--{{ $directionClass }}">
            <title>
                {{ __('global.guest.priceMonth', ['month' => $monthNames[$index]]) }} — {{ __('global.guest.open') }}: {{ number_format($point['open'], 1, ',', '.') }},
                {{ __('global.guest.high') }}: {{ number_format($point['high'], 1, ',', '.') }},
                {{ __('global.guest.low') }}: {{ number_format($point['low'], 1, ',', '.') }},
                {{ __('global.guest.close') }}: {{ number_format($point['close'], 1, ',', '.') }}
                @if ($change !== null)
                    , {{ __('global.guest.change') }}: {{ $change > 0 ? '+' : '' }}{{ number_format($change, 1, ',', '.') }}
                    ({{ $changePercent > 0 ? '+' : '' }}{{ number_format($changePercent, 1, ',', '.') }}%)
                @endif
            </title>
            <line class="gpk-price-chart-candle-wick" x1="{{ $plotPoint['x'] }}" y1="{{ $plotPoint['highY'] }}"
                x2="{{ $plotPoint['x'] }}" y2="{{ $plotPoint['lowY'] }}" />
            <rect class="gpk-price-chart-candle-body" x="{{ $plotPoint['x'] - 13 }}" y="{{ $candleTop }}"
                width="26" height="{{ $candleHeight }}" rx="1" />
            <text class="gpk-price-chart-value-label" x="{{ $plotPoint['x'] }}" y="{{ $plotPoint['closeLabelY'] }}"
                text-anchor="middle">{{ number_format($point['close'], 1, ',', '.') }}</text>
        </g>
    @endforeach
</svg>

{{-- <div class="gpk-price-chart-table-wrap">
    <table class="gpk-price-chart-detail">
        <thead>
            <tr>
                <th scope="col">Bulan 2026</th>
                <th scope="col">Buka</th>
                <th scope="col">Tertinggi</th>
                <th scope="col">Terendah</th>
                <th scope="col">Tutup</th>
                <th scope="col">Perubahan tutup</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($monthlyPrices as $index => $point)
                @php
                    $change = $index > 0 ? $point['close'] - $monthlyPrices[$index - 1]['close'] : null;
                    $changePercent = $index > 0 ? ($change / $monthlyPrices[$index - 1]['close']) * 100 : null;
                @endphp
                <tr>
                    <th scope="row">{{ $point['name'] }}</th>
                    <td>{{ number_format($point['open'], 1, ',', '.') }}</td>
                    <td>{{ number_format($point['high'], 1, ',', '.') }}</td>
                    <td>{{ number_format($point['low'], 1, ',', '.') }}</td>
                    <td><strong>{{ number_format($point['close'], 1, ',', '.') }}</strong></td>
                    <td>
                        @if ($change !== null)
                            <span class="{{ $change >= 0 ? 'gpk-price-change--up' : 'gpk-price-change--down' }}">
                                {{ $change > 0 ? '+' : '' }}{{ number_format($change, 1, ',', '.') }}
                                ({{ $changePercent > 0 ? '+' : '' }}{{ number_format($changePercent, 1, ',', '.') }}%)
                            </span>
                        @else
                            —
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
