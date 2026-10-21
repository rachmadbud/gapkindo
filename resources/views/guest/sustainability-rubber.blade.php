@extends('guest.layouts.master')

@section('title', __('global.guest.sustainabilityRubberTitle') . ' | GAPKINDO')

@push('styles')
    <style>
        .gpk-sustainability {
            --sustainability-ink: #183b2b;
            --sustainability-muted: #65766c;
            --sustainability-green: #087d59;
            color: var(--sustainability-ink);
        }

        .gpk-sustainability *,
        .gpk-sustainability *::before,
        .gpk-sustainability *::after {
            box-sizing: border-box;
        }

        .gpk-sustainability-hero {
            position: relative;
            overflow: hidden;
            padding: clamp(2.6rem, 6vw, 4.5rem) 1.5rem;
            color: #fff;
            background: linear-gradient(115deg, #075b43 0%, #09805d 58%, #13a17b 100%);
        }

        .gpk-sustainability-hero::before {
            position: absolute;
            inset: 0;
            background-image: linear-gradient(45deg, rgba(255, 255, 255, .035) 25%, transparent 25%, transparent 75%, rgba(255, 255, 255, .035) 75%),
                linear-gradient(45deg, rgba(255, 255, 255, .035) 25%, transparent 25%, transparent 75%, rgba(255, 255, 255, .035) 75%);
            background-position: 0 0, 16px 16px;
            background-size: 32px 32px;
            content: "";
            pointer-events: none;
        }

        .gpk-sustainability-hero::after {
            position: absolute;
            right: 5%;
            bottom: -2.3rem;
            color: rgba(255, 255, 255, .09);
            content: "\f4d8";
            font-family: "Font Awesome 5 Free";
            font-size: clamp(7rem, 17vw, 13rem);
            font-weight: 900;
            line-height: 1;
            pointer-events: none;
        }

        .gpk-sustainability-hero-inner,
        .gpk-sustainability-content {
            width: min(100%, 1320px);
            margin: 0 auto;
        }

        .gpk-sustainability-hero-inner {
            position: relative;
            z-index: 1;
        }

        .gpk-sustainability-eyebrow {
            display: inline-block;
            margin-bottom: .45rem;
            color: rgba(255, 255, 255, .82);
            font-size: .9rem;
            font-weight: 800;
            letter-spacing: .13em;
            text-transform: uppercase;
        }

        .gpk-sustainability-hero h1 {
            margin: 0;
            color: #fff;
            font-size: clamp(3rem, 6vw, 4.6rem);
            font-weight: 800;
            line-height: 1.12;
        }

        .gpk-sustainability-hero p {
            max-width: 1020px;
            margin: 1rem 0 0;
            color: rgba(255, 255, 255, .9);
            font-size: clamp(1.15rem, 1.8vw, 1.4rem);
        }

        .gpk-sustainability-content {
            padding: clamp(1.5rem, 3vw, 2.4rem);
            border: 1px solid rgba(20, 57, 39, .08);
            border-radius: 0 0 18px 18px;
            background: #fff;
            box-shadow: 0 12px 30px rgba(23, 52, 38, .09);
        }

        .gpk-sustainability-pillars {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 1.15rem;
        }

        .gpk-sustainability-pillar {
            position: relative;
            display: flex;
            min-height: 138px;
            align-items: center;
            gap: 1rem;
            overflow: hidden;
            padding: 1.25rem 1.45rem;
            border-radius: 16px;
            color: #fff;
            background: var(--pillar-color);
        }

        .gpk-sustainability-pillar::after {
            position: absolute;
            right: -12px;
            bottom: -30px;
            width: 82px;
            height: 82px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .12);
            content: "";
        }

        .gpk-sustainability-pillar-icon {
            display: grid;
            width: 58px;
            height: 58px;
            flex: 0 0 58px;
            place-items: center;
            border-radius: 12px;
            background: rgba(255, 255, 255, .17);
            font-size: 1.5rem;
        }

        .gpk-sustainability-pillar-copy {
            position: relative;
            z-index: 1;
        }

        .gpk-sustainability-pillar-copy small {
            display: block;
            margin-bottom: .16rem;
            font-size: .86rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .gpk-sustainability-pillar-copy h2 {
            margin: 0;
            color: #fff;
            font-size: clamp(1.12rem, 1.5vw, 1.3rem);
            font-weight: 800;
            line-height: 1.25;
        }

        .gpk-sustainability-intro {
            margin: 1.6rem 0 2rem;
            padding: 1.5rem 1.7rem;
            border-left: 4px solid #16b982;
            border-radius: 0 12px 12px 0;
            color: #315848;
            background: #effaf4;
            font-size: clamp(1.08rem, 1.3vw, 1.2rem);
            line-height: 1.85;
        }

        .gpk-sustainability-section-heading {
            display: flex;
            align-items: center;
            gap: 1.4rem;
            margin: 2rem 0 1.5rem;
            color: #63736c;
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: .15em;
            text-align: center;
            text-transform: uppercase;
        }

        .gpk-sustainability-section-heading::before,
        .gpk-sustainability-section-heading::after {
            height: 1px;
            flex: 1;
            background: #e3e9e5;
            content: "";
        }

        .gpk-sustainability-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.4rem;
        }

        .gpk-sustainability-card {
            overflow: hidden;
            border: 1px solid #e5ebe7;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(30, 55, 42, .06);
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .gpk-sustainability-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(30, 55, 42, .12);
        }

        .gpk-sustainability-card-header {
            display: flex;
            min-height: 112px;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem 1.45rem;
            color: #fff;
            background: linear-gradient(120deg, var(--platform-color), var(--platform-highlight));
        }

        .gpk-sustainability-card-logo-frame {
            display: flex;
            width: 66px;
            height: 66px;
            flex: 0 0 66px;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, .75);
            border-radius: 8px;
            background: #feffff;
        }

        .gpk-sustainability-card-logo-frame img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 7px;
        }

        .gpk-sustainability-card-header h3 {
            margin: 0;
            color: #fff;
            font-size: 1.35rem;
            font-weight: 800;
            line-height: 1.25;
        }

        .gpk-sustainability-card-header p {
            margin: .16rem 0 0;
            color: rgba(255, 255, 255, .85);
            font-size: .88rem;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .gpk-sustainability-card-body {
            display: flex;
            min-height: 285px;
            flex-direction: column;
            align-items: flex-start;
            padding: 1.45rem 1.55rem 1.6rem;
        }

        .gpk-sustainability-tag {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            margin-bottom: .95rem;
            padding: .48rem .85rem;
            border-radius: 99px;
            color: var(--platform-color);
            background: color-mix(in srgb, var(--platform-color) 10%, white);
            font-size: .8rem;
            font-weight: 800;
            letter-spacing: .035em;
            text-transform: uppercase;
        }

        .gpk-sustainability-card-body>p {
            margin: 0;
            color: #000000;
            font-size: 1.89rem;
            line-height: 1.8;
        }

        .gpk-sustainability-card-link {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            margin-top: auto;
            padding: .72rem 1rem;
            border-radius: 8px;
            color: #fff;
            background: var(--platform-color);
            font-size: .95rem;
            font-weight: 800;
            text-decoration: none;
            transition: filter .18s ease, transform .18s ease;
        }

        .gpk-sustainability-card-link:hover,
        .gpk-sustainability-card-link:focus {
            transform: translateY(-1px);
            filter: brightness(.9);
            color: #fff;
            text-decoration: none;
        }

        @media (max-width: 900px) {
            .gpk-sustainability-hero {
                padding: 2.5rem 1.25rem;
            }

            .gpk-sustainability-pillars {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .gpk-sustainability-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 560px) {
            .gpk-sustainability-content {
                padding: 1rem;
            }

            .gpk-sustainability-pillars,
            .gpk-sustainability-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .gpk-sustainability-pillar {
                min-height: 100px;
            }

            .gpk-sustainability-intro {
                padding: 1rem;
                font-size: .95rem;
            }

            .gpk-sustainability-card-header {
                min-height: 88px;
            }

            .gpk-sustainability-card-body {
                min-height: 220px;
            }

            .gpk-sustainability-card-body>p {
                font-size: .92rem;
            }
        }

        @supports not (background: color-mix(in srgb, white, black)) {
            .gpk-sustainability-tag {
                background: #eef5f1;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .gpk-sustainability-card,
            .gpk-sustainability-card-link {
                transition: none;
            }
        }
    </style>
@endpush

@section('content')
    @php
        $pillarIcons = ['fa-leaf', 'fa-hands-helping', 'fa-chart-line', 'fa-link'];
        $pillarColors = ['#07845c', '#10a68b', '#315fc8', '#c86a08'];
        $platformStyles = [
            [
                'color' => '#087b59',
                'highlight' => '#0ba983',
                'logo' =>
                    'https://sustainablenaturalrubber.org/wp-content/uploads/2020/05/Logo-GPSNR_colours-Copy-2-2-e1588143277780.png',
                'icon' => 'fa-globe',
            ],
            [
                'color' => '#148b83',
                'highlight' => '#1ab0a1',
                'logo' => asset('guest/assets/img/icon/snr-i.png'),
                'icon' => 'fa-microscope',
            ],
            ['color' => '#244dbd', 'highlight' => '#4485ef', 'logo' => 'snarpi.png', 'icon' => 'fa-landmark'],
            [
                'color' => '#b85b05',
                'highlight' => '#f09a09',
                'logo' => asset('guest/assets/img/icon/projectTree.svg'),
                'icon' => 'fa-tree',
            ],
            [
                'color' => '#5726a5',
                'highlight' => '#7a36df',
                'logo' => asset('guest/assets/img/icon/projectTree.svg/cropped-RubberWay-PNG-Logo-4'),
                'icon' => 'fa-link',
            ],
            [
                'color' => '#b4103b',
                'highlight' => '#e32655',
                'logo' => 'https://ecovadis.com/wp-content/uploads/2026/05/revamp-logo.svg',
                'icon' => 'fa-award',
            ],
        ];
        $platformLinks = [
            'GPSNR' => 'https://sustainablenaturalrubber.org/',
            'SNR-i' => 'https://snr-i.org/',
            'SNARPI' =>
                'https://ekon.go.id/publikasi/detail/3010/peluncuran-snarpi-untuk-wujudkan-karet-alam-berkelanjutan',
            'Project Tree' => 'https://project-tree-natural-rubber.com/',
            'RubberWay' => 'https://rubberway.tech/',
            'EcoVadis' => 'https://ecovadis.com/',
        ];
    @endphp

    <div class="gpk-sustainability">
        <header class="gpk-sustainability-hero">
            <div class="gpk-sustainability-hero-inner">
                <span class="gpk-sustainability-eyebrow">{{ __('global.guest.information') }}</span>
                <h1>{{ __('global.guest.sustainabilityRubberTitle') }}</h1>
                <p>{{ __('global.guest.sustainabilityRubberSubtitle') }}</p>
            </div>
        </header>

        <main class="gpk-sustainability-content">
            <section class="gpk-sustainability-pillars" aria-label="{{ __('global.guest.sustainabilityPillarsHeading') }}">
                @foreach (__('global.guest.sustainabilityPillars') as $index => $pillar)
                    <article class="gpk-sustainability-pillar" style="--pillar-color: {{ $pillarColors[$index] }}">
                        <span class="gpk-sustainability-pillar-icon" aria-hidden="true">
                            <i class="fas {{ $pillarIcons[$index] }}"></i>
                        </span>
                        <div class="gpk-sustainability-pillar-copy">
                            <small>{{ __('global.guest.sustainabilityPillarLabel', ['number' => $index + 1]) }}</small>
                            <h2>{{ $pillar['title'] }}</h2>
                        </div>
                    </article>
                @endforeach
            </section>

            <p class="gpk-sustainability-intro">{{ __('global.guest.sustainabilityIntro') }}</p>

            <h2 class="gpk-sustainability-section-heading" id="sustainability-platforms">
                {{ __('global.guest.sustainabilityPlatformsHeading') }}
            </h2>

            <section class="gpk-sustainability-grid" aria-label="{{ __('global.guest.sustainabilityPlatformsHeading') }}">
                @foreach (__('global.guest.sustainabilityPlatforms') as $index => $platform)
                    @php
                        $style = $platformStyles[$index];
                        $platformUrl = $platformLinks[$platform['name']] ?? null;
                    @endphp
                    <article class="gpk-sustainability-card"
                        style="--platform-color: {{ $style['color'] }}; --platform-highlight: {{ $style['highlight'] }}">
                        <header class="gpk-sustainability-card-header">
                            <span class="gpk-sustainability-card-logo-frame">
                                <img src="{{ $style['logo'] }}" alt="{{ $platform['name'] }} logo" width="76"
                                    height="76">
                            </span>
                            <div>
                                <h3>{{ $platform['name'] }}</h3>
                                <p>{{ $platform['subtitle'] }}</p>
                            </div>
                        </header>
                        <div class="gpk-sustainability-card-body">
                            <span class="gpk-sustainability-tag">
                                <i class="fas {{ $style['icon'] }}" aria-hidden="true"></i>
                                {{ $platform['tag'] }}
                            </span>
                            <p>{{ $platform['description'] }}</p>
                            @if ($platformUrl)
                                <a class="gpk-sustainability-card-link" href="{{ $platformUrl }}"
                                    target="{{ $platform['name'] === 'SNARPI' ? '_self' : '_blank' }}"
                                    @if ($platform['name'] !== 'SNARPI') rel="noopener noreferrer" @endif>
                                    {{ __('global.guest.sustainabilityVisitWebsite') }}
                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </section>
        </main>
    </div>
@endsection
