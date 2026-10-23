@extends('guest.layouts.master')

@section('title', __('global.guest.productionGlobal') . ' | GAPKINDO')

@push('styles')
    @include('guest.statistik.partials.styles')
    <style>
        .gpk-coming-soon {
            display: grid;
            min-height: min(650px, calc(100vh - var(--nav-h-desktop, 84px) - 3rem));
            place-items: center;
            padding: clamp(1.5rem, 5vw, 4rem);
            overflow: hidden;
            border: 1px solid #e8e3d6;
            border-radius: 18px;
            background:
                radial-gradient(ellipse at 50% 0%, rgba(184, 145, 30, 0.1), transparent 48%),
                linear-gradient(145deg, #fffdf8 0%, #f4f2e9 100%);
            text-align: center;
        }

        .gpk-coming-soon__content {
            width: min(100%, 620px);
        }

        .gpk-coming-soon__icon {
            display: grid;
            width: 92px;
            height: 92px;
            margin: 0 auto 1.75rem;
            place-items: center;
            border: 1px solid rgba(184, 145, 30, 0.32);
            border-radius: 50%;
            background: #edf3e9;
            color: #2c5530;
            font-size: 2.4rem;
            box-shadow: 0 12px 30px rgba(26, 46, 31, 0.08);
        }

        .gpk-coming-soon__eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            color: #8b6d21;
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        .gpk-coming-soon h2 {
            margin: 0;
            color: #1a2e1f;
            font-family: var(--f-display, Georgia, serif);
            font-size: clamp(2.6rem, 7vw, 4.8rem);
            font-weight: 600;
            line-height: 1.08;
        }

        .gpk-coming-soon__title {
            margin: 0.8rem 0 0;
            color: #2c5530;
            font-size: clamp(1.7rem, 4vw, 2.25rem);
            font-weight: 800;
            /* center */
            text-align: center;
        }

        .gpk-coming-soon__description {
            max-width: 510px;
            margin: 1rem auto 1.8rem;
            color: #657166;
            font-size: 1.5rem;
            line-height: 1.8;
        }

        .gpk-coming-soon__button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            padding: 0.85rem 1.2rem;
            border: 1px solid #2c5530;
            border-radius: 6px;
            background: #2c5530;
            color: #fff !important;
            font-size: 1.4rem;
            font-weight: 700;
            text-decoration: none !important;
            transition: transform 0.2s, background 0.2s;
        }

        .gpk-coming-soon__button:hover {
            transform: translateY(-1px);
            background: #1a3b20;
        }

        @media (max-width: 600px) {
            .gpk-coming-soon {
                min-height: 500px;
            }

            .gpk-coming-soon__icon {
                width: 76px;
                height: 76px;
                font-size: 2rem;
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
            </header>

            <section class="gpk-coming-soon" aria-labelledby="gpk-coming-soon-heading">
                <div class="gpk-coming-soon__content">
                    <span class="gpk-coming-soon__icon" aria-hidden="true">
                        <i class="fas fa-globe-americas"></i>
                    </span>
                    <span class="gpk-coming-soon__eyebrow">
                        <i class="fas fa-leaf" aria-hidden="true"></i>
                        {{ __('global.guest.dataCenter') }}
                    </span>
                    <h2 id="gpk-coming-soon-heading">{{ __('global.guest.comingSoon') }}</h2>
                    <p class="gpk-coming-soon__title">{{ __('global.guest.productionGlobal') }}</p>
                    <p class="gpk-coming-soon__description">{{ __('global.guest.underConstruction') }}</p>
                    <a class="gpk-coming-soon__button" href="{{ route('statistik') }}">
                        <i class="fas fa-arrow-left" aria-hidden="true"></i>
                        {{ __('global.guest.backToDashboard') }}
                    </a>
                </div>
            </section>
        </main>
    </div>
@endsection
