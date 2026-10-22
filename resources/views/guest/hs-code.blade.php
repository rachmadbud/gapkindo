@extends('guest.layouts.master')

@section('title', __('global.guest.hsCodeTitle') . ' | GAPKINDO')

@push('styles')
    <style>
        .gpk-hs-hero {
            position: relative;
            overflow: hidden;
            padding: clamp(1.2rem, 3vh, 2.2rem) 1rem;
            color: #fffbf2;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1a237e 100%);
        }

        .gpk-hs-hero::before {
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3Crect x='16' y='16' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3C/svg%3E");
            content: "";
            pointer-events: none;
        }

        .gpk-hs-hero__inner {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .gpk-hs-hero__eyebrow {
            display: inline-flex;
            align-items: center;
            gap: .8rem;
            margin-bottom: .7rem;
            color: #d4b355;
            font-family: var(--f-mono, monospace);
            font-size: .78rem;
            font-weight: 500;
            letter-spacing: .35em;
            text-transform: uppercase;
        }

        .gpk-hs-hero__eyebrow::before,
        .gpk-hs-hero__eyebrow::after {
            width: 36px;
            height: 1px;
            background: #d4b355;
            content: "";
        }

        .gpk-hs-hero__title {
            margin: 0 0 .7rem;
            color: #fffbf2;
            font-family: var(--f-display, Georgia, serif);
            font-size: clamp(2rem, 4.5vw, 3.4rem);
            font-weight: 500;
            letter-spacing: -.025em;
            line-height: 1.1;
        }

        .gpk-hs-hero__title em {
            color: #d4b355;
            font-weight: 400;
        }

        .gpk-hs-hero__lead {
            max-width: 700px;
            margin: 0 auto;
            color: rgba(255, 251, 242, .78);
            font-size: clamp(.95rem, 1.4vw, 1.1rem);
            line-height: 1.6;
        }

        .gpk-hs-code {
            max-width: 1120px;
            margin: 0 auto;
            color: #1a2e1f;
        }

        .gpk-hs-code__card {
            margin-bottom: 1.5rem;
            overflow: hidden;
            border: 1px solid #e4e9e5;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 8px 24px rgba(23, 52, 38, .07);
        }

        .gpk-hs-code__card-header {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: 1.15rem 1.35rem;
            border-bottom: 1px solid #e9eee9;
        }

        .gpk-hs-code__icon {
            display: inline-grid;
            width: 2.4rem;
            height: 2.4rem;
            flex: 0 0 auto;
            place-items: center;
            border-radius: 50%;
            background: #edf5ef;
            color: #2c5530;
        }

        .gpk-hs-code__card-header h2 {
            margin: 0;
            color: #1a2e1f;
            font-size: 1.2rem;
            font-weight: 800;
        }

        .gpk-hs-code__table-wrap {
            overflow-x: auto;
        }

        .gpk-hs-code__table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .gpk-hs-code__table th,
        .gpk-hs-code__table td {
            padding: .85rem 1.35rem;
            border-bottom: 1px solid #edf0ed;
            text-align: left;
            vertical-align: middle;
        }

        .gpk-hs-code__table th {
            background: #f7f9f7;
            color: #53645a;
            font-size: .8rem;
            font-weight: 800;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .gpk-hs-code__table tbody tr:last-child td {
            border-bottom: 0;
        }

        .gpk-hs-code__table tbody tr:hover {
            background: #fbfcfb;
        }

        .gpk-hs-code__grade {
            color: #1a2e1f;
            font-weight: 700;
        }

        .gpk-hs-code__number {
            color: #23633d;
            font-family: var(--f-mono, monospace);
            font-weight: 600;
            white-space: nowrap;
        }

        .gpk-hs-code__notes {
            display: grid;
            gap: .8rem 1.5rem;
            margin: 0;
            padding: 1.25rem 1.5rem 1.4rem;
            list-style: none;
        }

        .gpk-hs-code__notes li {
            display: flex;
            gap: .65rem;
            align-items: flex-start;
            color: #435249;
        }

        .gpk-hs-code__notes i {
            margin-top: .2rem;
            color: #2c7a46;
        }

        @media (max-width: 640px) {

            .gpk-hs-code__table th,
            .gpk-hs-code__table td {
                padding: .75rem .9rem;
            }

            .gpk-hs-code__notes {
                grid-template-columns: 1fr;
                padding-right: 1rem;
                padding-left: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    @php
        $hsCodes = [
            ['SIR 10', '4001.22.10'],
            ['SIR 10CV/VK', '4001.22.10'],
            ['SIR 20', '4001.22.20'],
            ['SIR 20CV/VK', '4001.22.20'],
            ['SIR 3L', '4001.22.30'],
            ['SIR 3WF', '4001.22.30'],
            ['SIR 3CV', '4001.22.40'],
            ['SIR 5', '4001.22.60'],
            ['SIR LoV', '4001.22.90'],
            ['Lateks Kons', '4001.1'],
            ['RSS Grade 1', '4001.21.10'],
            ['RSS Grade 2', '4001.21.20'],
            ['RSS Grade 3', '4001.21.30'],
            ['RSS Grade 4', '4001.21.40'],
            ['RSS Grade 5', '4001.21.50'],
            ['Mixture of NR', '4002.8'],
        ];
        $hsNotes = [
            ['SIR', __('global.guest.hsCodeSir')],
            ['RSS', __('global.guest.hsCodeRss')],
            ['CV/VK', __('global.guest.hsCodeCvVk')],
            ['L', __('global.guest.hsCodeLightColored')],
            ['WF', __('global.guest.hsCodeWholeField')],
            ['LoV', __('global.guest.hsCodeLowViscosity')],
        ];
    @endphp

    <section class="gpk-hs-hero">
        <div class="gpk-hs-hero__inner">
            <div class="gpk-hs-hero__eyebrow">{{ __('global.guest.hsCodeEyebrow') }}</div>
            <h1 class="gpk-hs-hero__title">
                {{ __('global.guest.hsCodeTitle') }} <em>GAPKINDO</em>
            </h1>
            <p class="gpk-hs-hero__lead">{{ __('global.guest.hsCodeSubtitle') }}</p>
        </div>
    </section>

    @include('guest.partials.ticker')

    <main class="gpk-hs-code">
        <section class="gpk-hs-code__card" aria-labelledby="hs-code-table-title">
            <header class="gpk-hs-code__card-header">
                <span class="gpk-hs-code__icon" aria-hidden="true"><i class="fas fa-barcode"></i></span>
                <h2 id="hs-code-table-title">{{ __('global.guest.hsCodeTitle') }}</h2>
            </header>
            <div class="gpk-hs-code__table-wrap">
                <table class="gpk-hs-code__table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('global.guest.hsCodeType') }}</th>
                            <th scope="col">{{ __('global.guest.hsCodeNumber') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hsCodes as [$grade, $code])
                            <tr>
                                <td class="gpk-hs-code__grade">{{ $grade }}</td>
                                <td class="gpk-hs-code__number">{{ $code }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section class="gpk-hs-code__card" aria-labelledby="hs-code-notes-title">
            <header class="gpk-hs-code__card-header">
                <span class="gpk-hs-code__icon" aria-hidden="true"><i class="fas fa-info"></i></span>
                <h2 id="hs-code-notes-title">{{ __('global.guest.hsCodeNotes') }}</h2>
            </header>
            <ul class="gpk-hs-code__notes">
                @foreach ($hsNotes as [$abbreviation, $description])
                    <li>
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span><strong>{{ $abbreviation }}</strong> - {{ $description }}</span>
                    </li>
                @endforeach
            </ul>
        </section>
    </main>
@endsection
