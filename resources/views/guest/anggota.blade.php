{{--
    ============================================================
    ANGGOTA GAPKINDO — Super Modern Dashboard Theme
    Struktur:
    1. Hero Banner (dark teal gradient, modern dashboard style)
    2. Gradient Stat Cards (overlap hero, 3 cards)
    3. Modern Panel: Tabs + Search + Table + Pagination
    4. CTA back to home

    Functionality (sama persis dengan versi sebelumnya):
    - 6 tab kategori (Estate, Centrifuged, RSS, TSR, Brown, Traders)
    - AJAX fetch per kategori dengan pagination
    - Search filter client-side
    - Mobile responsive (table → stacked cards)
    ============================================================
--}}

@extends('guest.layouts.master')

@section('title', 'Anggota | GAPKINDO')

@push('styles')
    <style>
        /* ============================================================
                                                                                                                                                       ANGGOTA PAGE — Scoped Modern Dashboard Styles
                                                                                                                                                       Variabel di-scope di .gpk-anggota-page supaya tidak
                                                                                                                                                       mengganggu navbar/footer global.
                                                                                                                                                       ============================================================ */
        .gpk-anggota-page {
            /* Backgrounds */
            --c-bg: #f8fafc;
            --c-bg-panel: #ffffff;
            --c-bg-soft: #f1f5f9;
            --c-bg-softer: #f8fafc;

            /* Text */
            --c-ink: #0f172a;
            --c-ink-soft: #475569;
            --c-fade: #94a3b8;

            /* Lines */
            --c-line: #e2e8f0;
            --c-line-soft: #f1f5f9;

            /* Brand teal (matches dashboard panel) */
            --c-brand: #134e4a;
            --c-brand-deep: #0f3a37;
            --c-brand-soft: #ccfbf1;

            /* Hero (banner lama — navy + gold accent) */
            --c-cream: #FFFBF2;
            --c-gold-soft: #D4B355;

            /* Accent gradients (untuk stat cards) */
            --grad-teal: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%);
            --grad-purple: linear-gradient(135deg, #5b21b6 0%, #7c3aed 100%);
            --grad-amber: linear-gradient(135deg, #92400e 0%, #d97706 100%);

            /* Typography */
            --f-display: 'Fraunces', Georgia, serif;
            --f-sans: 'Manrope', 'Inter', system-ui, -apple-system, sans-serif;
            --f-mono: 'JetBrains Mono', monospace;

            /* Radius & shadow tokens */
            --r-sm: 8px;
            --r-md: 12px;
            --r-lg: 16px;
            --r-xl: 20px;
            --sh-sm: 0 1px 3px rgba(15, 23, 42, 0.06);
            --sh-md: 0 4px 12px rgba(15, 23, 42, 0.08);
            --sh-lg: 0 10px 30px rgba(15, 23, 42, 0.12);

            background: var(--c-bg);
            color: var(--c-ink);
            font-family: var(--f-sans);
            line-height: 1.55;
        }

        .gpk-anggota-page,
        .gpk-anggota-page *,
        .gpk-anggota-page *::before,
        .gpk-anggota-page *::after {
            box-sizing: border-box;
        }

        .gpk-anggota-page a {
            color: inherit;
            text-decoration: none;
        }

        /* Base container — GLOBAL (tidak di-scope) supaya footer & navbar
                                                                                                                                                       yang juga pakai class .gpk-container ikut ter-style.
                                                                                                                                                       Override 12px khusus konten anggota ada di rule berikutnya. */
        .gpk-container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 16px;
        }

        /* Container override untuk konten antara ticker (date & time) dan footer:
                                                                                                                                                       padding kanan/kiri = 12px (sesuai permintaan), full-bleed (max-width: 100%) */
        .gpk-anggota-page .ang-stats .gpk-container,
        .gpk-anggota-page .ang-main .gpk-container,
        .gpk-anggota-page .ang-cta .gpk-container {
            max-width: 100%;
            padding-left: 12px;
            padding-right: 12px;
        }

        /* ============================================================
                                                                                                                                                       1. BANNER HEADER (Lama — navy + checkerboard + Fraunces)
                                                                                                                                                       ============================================================ */
        .gpk-anggota-page .ang-hero {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1a237e 100%);
            color: var(--c-cream);
            padding: clamp(1.2rem, 3vh, 2.2rem) 0;
            position: relative;
            overflow: hidden;
        }

        .gpk-anggota-page .ang-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3Crect x='16' y='16' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3C/svg%3E");
            pointer-events: none;
        }

        .gpk-anggota-page .ang-hero__inner {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .gpk-anggota-page .ang-hero__eyebrow {
            font-family: var(--f-mono);
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--c-gold-soft);
            margin-bottom: 0.7rem;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
        }

        .gpk-anggota-page .ang-hero__eyebrow::before,
        .gpk-anggota-page .ang-hero__eyebrow::after {
            content: "";
            width: 36px;
            height: 1px;
            background: var(--c-gold-soft);
        }

        .gpk-anggota-page .ang-hero__title {
            font-family: var(--f-display);
            font-weight: 500;
            font-size: clamp(2rem, 4.5vw, 3.4rem);
            line-height: 1.1;
            letter-spacing: -0.025em;
            color: var(--c-cream);
            margin: 0 0 0.7rem;
        }

        .gpk-anggota-page .ang-hero__title em {
            font-style: italic;
            font-weight: 400;
            color: var(--c-gold-soft);
        }

        .gpk-anggota-page .ang-hero__lead {
            font-size: clamp(0.95rem, 1.4vw, 1.1rem);
            line-height: 1.6;
            color: rgba(255, 251, 242, 0.78);
            max-width: 720px;
            margin: 0 auto;
        }

        /* ============================================================
                                                                                                                                                       2. GRADIENT STAT CARDS (di bawah banner, tidak overlap)
                                                                                                                                                       ============================================================ */
        .gpk-anggota-page .ang-stats {
            padding: clamp(1.25rem, 3vh, 2rem) 0 clamp(1rem, 2vh, 1.5rem);
            position: relative;
        }

        .gpk-anggota-page .ang-stats__grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .gpk-anggota-page .ang-stat {
            padding: 1.5rem 1.5rem 1.4rem;
            border-radius: var(--r-lg);
            color: #fff;
            position: relative;
            overflow: hidden;
            box-shadow: var(--sh-md);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .gpk-anggota-page .ang-stat:hover {
            transform: translateY(-3px);
            box-shadow: var(--sh-lg);
        }

        .gpk-anggota-page .ang-stat--teal {
            background: var(--grad-teal);
        }

        .gpk-anggota-page .ang-stat--purple {
            background: var(--grad-purple);
        }

        .gpk-anggota-page .ang-stat--amber {
            background: var(--grad-amber);
        }

        .gpk-anggota-page .ang-stat__label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            opacity: 0.88;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .gpk-anggota-page .ang-stat__num {
            font-size: clamp(2rem, 3.5vw, 2.75rem);
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.35rem;
            position: relative;
            z-index: 2;
            letter-spacing: -0.02em;
        }

        .gpk-anggota-page .ang-stat__unit {
            font-size: 0.85rem;
            opacity: 0.85;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }

        .gpk-anggota-page .ang-stat__icon {
            position: absolute;
            right: -10px;
            bottom: -10px;
            width: 90px;
            height: 90px;
            opacity: 0.18;
            z-index: 1;
        }

        .gpk-anggota-page .ang-stat__icon svg {
            width: 100%;
            height: 100%;
        }

        @media (max-width: 720px) {
            .gpk-anggota-page .ang-stats__grid {
                grid-template-columns: 1fr;
            }
        }

        /* ============================================================
                                                                                                                                                       3. MAIN PANEL — Tabs + Toolbar + Table
                                                                                                                                                       ============================================================ */
        .gpk-anggota-page .ang-main {
            padding: 0 0 clamp(2rem, 5vh, 4rem);
        }

        .gpk-anggota-page .ang-panel {
            background: var(--c-bg-panel);
            border-radius: var(--r-lg);
            border: 1px solid var(--c-line);
            box-shadow: var(--sh-sm);
            overflow: hidden;
        }

        /* TABS */
        .gpk-anggota-page .ang-tabs {
            background: var(--c-bg-soft);
            padding: 0.5rem;
            border-bottom: 1px solid var(--c-line);
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
        }

        .gpk-anggota-page .ang-tabs::-webkit-scrollbar {
            height: 6px;
        }

        .gpk-anggota-page .ang-tabs::-webkit-scrollbar-track {
            background: transparent;
        }

        .gpk-anggota-page .ang-tabs::-webkit-scrollbar-thumb {
            background: var(--c-line);
            border-radius: 3px;
        }

        .gpk-anggota-page .ang-tabs__inner {
            display: flex;
            gap: 4px;
            min-width: max-content;
        }

        .gpk-anggota-page .ang-tab {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            background: transparent;
            border: none;
            border-radius: var(--r-sm);
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            color: var(--c-ink-soft);
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .gpk-anggota-page .ang-tab svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .gpk-anggota-page .ang-tab:hover {
            background: #fff;
            color: var(--c-brand);
        }

        .gpk-anggota-page .ang-tab.is-active {
            background: var(--c-brand);
            color: #fff;
            box-shadow: 0 2px 8px rgba(19, 78, 74, 0.30);
        }

        /* TOOLBAR */
        .gpk-anggota-page .ang-toolbar {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.1rem 1.25rem;
            border-bottom: 1px solid var(--c-line);
            flex-wrap: wrap;
            background: #fff;
        }

        .gpk-anggota-page .ang-search {
            position: relative;
            flex: 1;
            min-width: 200px;
            max-width: 420px;
        }

        .gpk-anggota-page .ang-search__icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: var(--c-fade);
            pointer-events: none;
        }

        .gpk-anggota-page .ang-search__input {
            width: 100%;
            padding: 11px 14px 11px 40px;
            border: 1px solid var(--c-line);
            border-radius: 10px;
            font-family: inherit;
            font-size: 12px;
            color: var(--c-ink);
            background: var(--c-bg-softer);
            transition: all 0.2s ease;
        }

        .gpk-anggota-page .ang-search__input::placeholder {
            color: var(--c-fade);
        }

        .gpk-anggota-page .ang-search__input:focus {
            outline: none;
            border-color: var(--c-brand);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(19, 78, 74, 0.10);
        }

        .gpk-anggota-page .ang-toolbar__info {
            color: var(--c-ink-soft);
            font-size: 12px;
            margin-left: auto;
        }

        .gpk-anggota-page .ang-toolbar__info strong {
            color: var(--c-brand);
            font-weight: 700;
        }

        /* TABLES */
        .gpk-anggota-page .ang-tab-content {
            display: none;
        }

        .gpk-anggota-page .ang-tab-content.is-active {
            display: block;
        }

        .gpk-anggota-page .ang-table-wrap {
            background: #fff;
        }

        .gpk-anggota-page .ang-table-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .gpk-anggota-page .ang-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .gpk-anggota-page .ang-table thead {
            background: #2C5530;
        }

        .gpk-anggota-page .ang-table thead tr {
            background: #2C5530;
        }

        .gpk-anggota-page .ang-table thead th {
            background: #2C5530 !important;
            text-align: left;
            padding: 12px 18px;
            font-weight: 700;
            color: #D4B143 !important;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-bottom: 1px solid rgba(0, 0, 0, 0.15);
            border-top: none;
            white-space: nowrap;
        }

        .gpk-anggota-page .ang-table tbody td {
            padding: 14px 18px;
            border-bottom: 1px solid var(--c-line-soft);
            color: var(--c-ink);
            vertical-align: middle;
        }

        /* Zebra stripe — tint hijau senada dengan header */
        .gpk-anggota-page .ang-table tbody tr {
            background: #ffffff;
            transition: background 0.15s ease;
        }

        .gpk-anggota-page .ang-table tbody tr:nth-child(even) {
            background: rgba(44, 85, 48, 0.05);
        }

        .gpk-anggota-page .ang-table tbody tr:hover {
            background: rgba(44, 85, 48, 0.12);
        }

        .gpk-anggota-page .ang-table tbody tr:last-child td {
            border-bottom: none;
        }

        .gpk-anggota-page .badge-prov {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            background: var(--c-brand-soft);
            color: var(--c-brand);
            border-radius: 100px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.02em;
            white-space: nowrap;
        }

        .gpk-anggota-page .col-perusahaan {
            font-weight: 600;
            color: var(--c-ink);
        }

        .gpk-anggota-page .ang-table a {
            color: var(--c-brand);
            font-weight: 500;
        }

        .gpk-anggota-page .ang-table a:hover {
            color: var(--c-brand-deep);
            text-decoration: underline;
        }

        /* Loading / Empty states */
        .gpk-anggota-page .ang-loading,
        .gpk-anggota-page .ang-empty {
            text-align: center;
            padding: 3rem 1rem !important;
            color: var(--c-fade);
            font-style: italic;
            font-size: 0.92rem;
        }

        /* PAGINATION */
        .gpk-anggota-page .ang-pagination {
            display: flex;
            gap: 4px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 1.1rem 1.25rem;
            border-top: 1px solid var(--c-line);
            background: var(--c-bg-softer);
        }

        .gpk-anggota-page .ang-pg-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            min-width: 38px;
            height: 38px;
            padding: 0 12px;
            background: #fff;
            border: 1px solid var(--c-line);
            border-radius: 8px;
            color: var(--c-ink-soft);
            font-family: inherit;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .gpk-anggota-page .ang-pg-btn svg {
            width: 14px;
            height: 14px;
        }

        .gpk-anggota-page .ang-pg-btn:hover:not(:disabled):not(.is-active) {
            border-color: var(--c-brand);
            color: var(--c-brand);
            background: #fff;
        }

        .gpk-anggota-page .ang-pg-btn.is-active {
            background: var(--c-brand);
            border-color: var(--c-brand);
            color: #fff;
            box-shadow: 0 2px 6px rgba(19, 78, 74, 0.25);
        }

        .gpk-anggota-page .ang-pg-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        /* ============================================================
                                                                                                                                                       4. CTA BACK
                                                                                                                                                       ============================================================ */
        .gpk-anggota-page .ang-cta {
            padding: 0 0 clamp(2rem, 5vh, 4rem);
            text-align: center;
        }

        .gpk-anggota-page .ang-cta__btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 13px 26px;
            background: var(--c-brand);
            color: #fff !important;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(19, 78, 74, 0.28);
        }

        .gpk-anggota-page .ang-cta__btn:hover {
            background: var(--c-brand-deep);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(19, 78, 74, 0.38);
        }

        .gpk-anggota-page .ang-cta__btn svg {
            width: 16px;
            height: 16px;
            transition: transform 0.2s ease;
        }

        .gpk-anggota-page .ang-cta__btn:hover svg {
            transform: translateX(4px);
        }

        /* ============================================================
                                                                                                                                                       5. MOBILE RESPONSIVE — Table → Stacked Cards
                                                                                                                                                       ============================================================ */
        @media (max-width: 768px) {
            .gpk-anggota-page .ang-toolbar {
                padding: 1rem;
                gap: 0.75rem;
            }

            .gpk-anggota-page .ang-search {
                max-width: 100%;
            }

            .gpk-anggota-page .ang-toolbar__info {
                margin-left: 0;
                width: 100%;
            }

            .gpk-anggota-page .ang-table-wrap {
                background: var(--c-bg-softer);
                padding: 0.75rem;
            }

            .gpk-anggota-page .ang-table thead {
                display: none;
            }

            .gpk-anggota-page .ang-table,
            .gpk-anggota-page .ang-table tbody,
            .gpk-anggota-page .ang-table tr,
            .gpk-anggota-page .ang-table td {
                display: block;
                width: 100%;
            }

            .gpk-anggota-page .ang-table tr {
                background: #fff;
                border: 1px solid var(--c-line);
                border-radius: var(--r-md);
                margin-bottom: 10px;
                overflow: hidden;
                padding: 4px 0;
            }

            /* Matikan zebra-stripe di mobile (stacked cards harus semua putih) */
            .gpk-anggota-page .ang-table tbody tr,
            .gpk-anggota-page .ang-table tbody tr:nth-child(even) {
                background: #fff;
            }

            .gpk-anggota-page .ang-table tbody tr:hover {
                background: #fff;
            }

            .gpk-anggota-page .ang-table td {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 12px;
                padding: 10px 16px;
                border-bottom: 1px solid var(--c-line-soft);
            }

            .gpk-anggota-page .ang-table td:last-child {
                border-bottom: none;
            }

            .gpk-anggota-page .ang-table td::before {
                content: attr(data-label);
                font-weight: 700;
                color: var(--c-fade);
                font-size: 0.68rem;
                text-transform: uppercase;
                letter-spacing: 0.06em;
                flex-shrink: 0;
                padding-top: 2px;
            }

            .gpk-anggota-page .ang-table .col-perusahaan {
                text-align: right;
            }

            .gpk-anggota-page .ang-loading,
            .gpk-anggota-page .ang-empty {
                background: #fff;
                border-radius: var(--r-md);
                border: 1px solid var(--c-line);
            }

            .gpk-anggota-page .ang-loading::before,
            .gpk-anggota-page .ang-empty::before {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .gpk-anggota-page .ang-hero {
                padding: 2.5rem 0 4.5rem;
            }

            .gpk-anggota-page .ang-stat {
                padding: 1.25rem;
            }

            .gpk-anggota-page .ang-stat__num {
                font-size: 2rem;
            }
        }
    </style>
@endpush


@section('content')
    <div class="gpk-anggota-page">

        {{-- =====================================================
         1. HERO BANNER
         ===================================================== --}}
        <section class="ang-hero">
            <div class="gpk-container">
                <div class="ang-hero__inner">
                    <div class="ang-hero__eyebrow">Direktori Keanggotaan</div>
                    <h1 class="ang-hero__title">
                        Anggota <em>GAPKINDO</em>
                    </h1>
                    <p class="ang-hero__lead">
                        Daftar lengkap anggota perusahaan karet alam Indonesia berdasarkan kategori—
                        Estate, Latex, RSS, TSR, Brown Crape, dan Trader.
                    </p>
                </div>
            </div>
        </section>

        @include('guest.partials.ticker')


        {{-- =====================================================
         2. GRADIENT STAT CARDS
         ===================================================== --}}
        <section class="ang-stats">
            <div class="gpk-container">
                <div class="ang-stats__grid">
                    <div class="ang-stat ang-stat--teal">
                        <div class="ang-stat__label">Kategori Anggota</div>
                        <div class="ang-stat__num">6</div>
                        <div class="ang-stat__unit">jenis produsen karet</div>
                        <div class="ang-stat__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="7" height="7" rx="1" />
                                <rect x="14" y="3" width="7" height="7" rx="1" />
                                <rect x="3" y="14" width="7" height="7" rx="1" />
                                <rect x="14" y="14" width="7" height="7" rx="1" />
                            </svg>
                        </div>
                    </div>

                    <div class="ang-stat ang-stat--purple">
                        <div class="ang-stat__label">Cakupan Wilayah</div>
                        <div class="ang-stat__num">16</div>
                        <div class="ang-stat__unit">provinsi di Indonesia</div>
                        <div class="ang-stat__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 2C8 2 5 5 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-4-3-7-7-7z" />
                                <circle cx="12" cy="9" r="2.5" />
                            </svg>
                        </div>
                    </div>

                    <div class="ang-stat ang-stat--amber">
                        <div class="ang-stat__label">Negara Tujuan Ekspor</div>
                        <div class="ang-stat__num">100+</div>
                        <div class="ang-stat__unit">destinasi global</div>
                        <div class="ang-stat__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M2 12h20M12 2a15 15 0 0 1 0 20M12 2a15 15 0 0 0 0 20" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- =====================================================
         3. MAIN PANEL — Tabs + Toolbar + Table + Pagination
         ===================================================== --}}
        <section class="ang-main">
            <div class="gpk-container">
                <div class="ang-panel">

                    {{-- MODERN TABS --}}
                    <div class="ang-tabs">
                        <div class="ang-tabs__inner">
                            {{-- Tab 1: Estate --}}
                            <button class="ang-tab is-active" data-target="tab1" type="button">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path
                                        d="M12 2L8 6h3v4H7v-2l-4 4 4 4v-2h4v4H8l4 4 4-4h-3v-4h4v2l4-4-4-4v2h-4V6h3l-4-4z" />
                                </svg>
                                <span>{{ __('global.estate') }}</span>
                            </button>

                            {{-- Tab 2: Centrifuged Latex --}}
                            <button class="ang-tab" data-target="tab2" type="button">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" />
                                </svg>
                                <span>{{ __('global.Centrifuged Latex Producers') }}</span>
                            </button>

                            {{-- Tab 3: RSS Producers --}}
                            <button class="ang-tab" data-target="tab3" type="button">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                    <line x1="3" y1="9" x2="21" y2="9" />
                                    <line x1="3" y1="15" x2="21" y2="15" />
                                </svg>
                                <span>{{ __('global.rss producers') }}</span>
                            </button>

                            {{-- Tab 4: TSR --}}
                            <button class="ang-tab" data-target="tab4" type="button">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                                    <line x1="12" y1="22.08" x2="12" y2="12" />
                                </svg>
                                <span>{{ __('global.tsr') }}</span>
                            </button>

                            {{-- Tab 5: Brown Crape --}}
                            <button class="ang-tab" data-target="tab5" type="button">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z" />
                                    <path d="M2 18s3-3 10-3 10 3 10 3" />
                                    <path d="M2 6s3 3 10 3 10-3 10-3" />
                                </svg>
                                <span>{{ __('global.brown') }}</span>
                            </button>

                            {{-- Tab 6: Traders --}}
                            <button class="ang-tab" data-target="tab6" type="button">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="17 1 21 5 17 9" />
                                    <path d="M3 11V9a4 4 0 0 1 4-4h14" />
                                    <polyline points="7 23 3 19 7 15" />
                                    <path d="M21 13v2a4 4 0 0 1-4 4H3" />
                                </svg>
                                <span>{{ __('global.traders') }}</span>
                            </button>
                        </div>
                    </div>

                    {{-- TOOLBAR: search + counter --}}
                    <div class="ang-toolbar">
                        <div class="ang-search">
                            <svg class="ang-search__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                            <input type="text" class="ang-search__input" id="angSearch"
                                placeholder="Cari perusahaan, cabang, atau email...">
                        </div>
                        <div class="ang-toolbar__info" id="angInfo">
                            <span id="angInfoText">Memuat data...</span>
                        </div>
                    </div>

                    {{-- TAB CONTENTS --}}

                    {{-- TAB 1: ESTATE --}}
                    <div id="tab1" class="ang-tab-content is-active">
                        <div class="ang-table-wrap">
                            <div class="ang-table-scroll">
                                <table class="ang-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('global.cabang') }}</th>
                                            <th>{{ __('global.perusahaan') }}</th>
                                            <th>{{ __('global.email') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="asdasd">
                                        <tr>
                                            <td data-label="No">1</td>
                                            <td data-label="Cabang"><span
                                                    class="badge-prov">{{ __('province.North Sumatra') }}</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.BAKRIE SUMATERA PLANTATIONS Tbk') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:windy@bakriesumatera.com">windy@bakriesumatera.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">2</td>
                                            <td data-label="Cabang"><span
                                                    class="badge-prov">{{ __('province.North Sumatra') }}</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.BRIDGESTONE SUMATRA RUBBER ESTATE') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:shuhei-yamagata@bridgestone.com">shuhei-yamagata@bridgestone.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">3</td>
                                            <td data-label="Cabang"><span
                                                    class="badge-prov">{{ __('province.North Sumatra') }}</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.LONDON SUMATRA INDONESIA, PP') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:http://www.londonsumatra.com ">http://www.londonsumatra.com
                                                </a></td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">4</td>
                                            <td data-label="Cabang"><span
                                                    class="badge-prov">{{ __('province.North Sumatra') }}</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.PERKEBUNAN NUSANTARA IV REGIONAL 1') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:pengolahan@ptpn3.com ">pengolahan@ptpn3.com</a></td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">5</td>
                                            <td data-label="Cabang"><span
                                                    class="badge-prov">{{ __('province.North Sumatra') }}</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.PERKEBUNAN NUSANTARA IV REGIONAL 3') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:pemasaran.ptpn5@gmail.com">pemasaran.ptpn5@gmail.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">6</td>
                                            <td data-label="Cabang"><span class="badge-prov">Bengkulu</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.PAMOR GANDA') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:pamorganda_bengkulu@yahoo.com">pamorganda_bengkulu@yahoo.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">7</td>
                                            <td data-label="Cabang"><span
                                                    class="badge-prov">{{ __('province.South Sumatra') }}</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.LONDON SUMATRA INDONESIA Tbk') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:pamorganda_bengkulu@yahoo.com">pamorganda_bengkulu@yahoo.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">8</td>
                                            <td data-label="Cabang"><span
                                                    class="badge-prov">{{ __('province.South Sumatra') }}</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.PINAGO UTAMA Tbk') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:hasan.tantri@gmail.com">hasan.tantri@gmail.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">9</td>
                                            <td data-label="Cabang"><span class="badge-prov">Lampung</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.HUMA INDAH MEKAR') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:itsupport.him@bakriesumatera.com">itsupport.him@bakriesumatera.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">10</td>
                                            <td data-label="Cabang"><span class="badge-prov">Lampung</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.PERKEBUNAN NUSANTARA I REGIONAL 7') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:sekretariat@ptpn7.com">sekretariat@ptpn7.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="No">11</td>
                                            <td data-label="Cabang"><span class="badge-prov">Lampung</span></td>
                                            <td data-label="Perusahaan" class="col-perusahaan">
                                                {{ __('comp.SILVA INHUTANI LAMPUNG') }}</td>
                                            <td data-label="Email"><a
                                                    href="mailto:silva.jakarta@gmail.com">silva.jakarta@gmail.com</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="ang-pagination" id="pagination-dataEstate"></div>
                        </div>
                    </div>

                    {{-- TAB 2: CENTRIFUGED --}}
                    <div id="tab2" class="ang-tab-content">
                        <div class="ang-table-wrap">
                            <div class="ang-table-scroll">
                                <table class="ang-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('global.cabang') }}</th>
                                            <th>{{ __('global.perusahaan') }}</th>
                                            <th>{{ __('global.email') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-centrifuged">
                                        <tr>
                                            <td colspan="4" class="ang-loading">Memuat data...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="ang-pagination" id="pagination-centrifuged"></div>
                        </div>
                    </div>

                    {{-- TAB 3: RSS PRODUCERS --}}
                    <div id="tab3" class="ang-tab-content">
                        <div class="ang-table-wrap">
                            <div class="ang-table-scroll">
                                <table class="ang-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('global.cabang') }}</th>
                                            <th>{{ __('global.perusahaan') }}</th>
                                            <th>{{ __('global.rss producers') }}</th>
                                            <th>{{ __('global.email') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-RssProducers">
                                        <tr>
                                            <td colspan="5" class="ang-loading">Memuat data...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="ang-pagination" id="pagination-RssProducers"></div>
                        </div>
                    </div>

                    {{-- TAB 4: TSR PRODUCERS --}}
                    <div id="tab4" class="ang-tab-content">
                        <div class="ang-table-wrap">
                            <div class="ang-table-scroll">
                                <table class="ang-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('global.cabang') }}</th>
                                            <th>{{ __('global.perusahaan') }}</th>
                                            <th>{{ __('global.productType') }}</th>
                                            <th>{{ __('global.producersCode') }}</th>
                                            <th>{{ __('global.email') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-TsrProducers">
                                        <tr>
                                            <td colspan="6" class="ang-loading">Memuat data...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="ang-pagination" id="pagination-TsrProducers"></div>
                        </div>
                    </div>

                    {{-- TAB 5: BROWN CRAPE --}}
                    <div id="tab5" class="ang-tab-content">
                        <div class="ang-table-wrap">
                            <div class="ang-table-scroll">
                                <table class="ang-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('global.cabang') }}</th>
                                            <th>{{ __('global.perusahaan') }}</th>
                                            <th>{{ __('global.email') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-brownCrapeProducer">
                                        <tr>
                                            <td colspan="4" class="ang-loading">Memuat data...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="ang-pagination" id="pagination-brownCrapeProducer"></div>
                        </div>
                    </div>

                    {{-- TAB 6: TRADERS --}}
                    <div id="tab6" class="ang-tab-content">
                        <div class="ang-table-wrap">
                            <div class="ang-table-scroll">
                                <table class="ang-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('global.cabang') }}</th>
                                            <th>{{ __('global.perusahaan') }}</th>
                                            <th>{{ __('global.email') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-traders">
                                        <tr>
                                            <td colspan="4" class="ang-loading">Memuat data...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="ang-pagination" id="pagination-traders"></div>
                        </div>
                    </div>

                </div>{{-- /.ang-panel --}}
            </div>
        </section>


        {{-- =====================================================
         4. CTA BACK
         ===================================================== --}}
        <section class="ang-cta">
            <div class="gpk-container">
                <a href="{{ url('/') }}" class="ang-cta__btn">
                    <span>Kembali ke Beranda</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="M13 6l6 6-6 6" />
                    </svg>
                </a>
            </div>
        </section>

    </div>
@endsection


@push('scripts')
    <script>
        (function() {
            'use strict';

            // ====== Tab labels for info display ======
            const TAB_LABELS = {
                tab1: "{{ __('global.estate') }}",
                tab2: "{{ __('global.Centrifuged Latex Producers') }}",
                tab3: "{{ __('global.rss producers') }}",
                tab4: "{{ __('global.tsr') }}",
                tab5: "{{ __('global.brown') }}",
                tab6: "{{ __('global.traders') }}",
            };

            // ====== SVG helpers for pagination buttons ======
            const arrowLeft =
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>';
            const arrowRight =
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';

            function computePages(active, total) {
                const result = [];
                if (total <= 7) {
                    for (let i = 1; i <= total; i++) result.push(i);
                    return result;
                }
                result.push(1);
                if (active > 3) result.push('...');
                const start = Math.max(2, active - 1);
                const end = Math.min(total - 1, active + 1);
                for (let i = start; i <= end; i++) result.push(i);
                if (active < total - 2) result.push('...');
                result.push(total);
                return result;
            }

            // ====== Tab Configurations ======
            const tabConfigs = {
                tab1: {
                    tableBodyId: 'table-body-dataEstate',
                    paginationId: 'pagination-dataEstate',
                    url: '/estate',
                    colCount: 4,
                    rowRenderer: (item, index, currentPage, perPage) => `
                <td data-label="No">${(currentPage-1)*perPage + index + 1}</td>
                <td data-label="Cabang"><span class="badge-prov">${escapeHtml(item.prov)}</span></td>
                <td data-label="Perusahaan" class="col-perusahaan">${escapeHtml(item.company)}</td>
                <td data-label="Email"><a href="mailto:${escapeHtml(item.email)}">${escapeHtml(item.email)}</a></td>
            `
                },
                tab2: {
                    tableBodyId: 'table-body-centrifuged',
                    paginationId: 'pagination-centrifuged',
                    url: '/centrifuged',
                    colCount: 4,
                    rowRenderer: (item, index, currentPage, perPage) => `
                <td data-label="No">${(currentPage-1)*perPage + index + 1}</td>
                <td data-label="Cabang"><span class="badge-prov">${escapeHtml(item.prov)}</span></td>
                <td data-label="Perusahaan" class="col-perusahaan">${escapeHtml(item.company)}</td>
                <td data-label="Email"><a href="mailto:${escapeHtml(item.email)}">${escapeHtml(item.email)}</a></td>
            `
                },
                tab3: {
                    tableBodyId: 'table-body-RssProducers',
                    paginationId: 'pagination-RssProducers',
                    url: '/rss-producers',
                    colCount: 5,
                    rowRenderer: (item, index, currentPage, perPage) => `
                <td data-label="No">${(currentPage-1)*perPage + index + 1}</td>
                <td data-label="Cabang"><span class="badge-prov">${escapeHtml(item.prov)}</span></td>
                <td data-label="Perusahaan" class="col-perusahaan">${escapeHtml(item.company)}</td>
                <td data-label="RSS Producer">${escapeHtml(item.rss_product || '-')}</td>
                <td data-label="Email"><a href="mailto:${escapeHtml(item.email)}">${escapeHtml(item.email)}</a></td>
            `
                },
                tab4: {
                    tableBodyId: 'table-body-TsrProducers',
                    paginationId: 'pagination-TsrProducers',
                    url: '/tsr-producers', // Pastikan Route ini sesuai di web.php
                    colCount: 6,
                    rowRenderer: (item, index, currentPage, perPage) => {
                        // Kalkulasi nomor urut/indeks tabel
                        const rowNumber = (currentPage - 1) * perPage + index + 1;

                        // Mengembalikan string HTML LANGSUNG berupa kumpulan <td> (Tanpa bungkus <tr>)
                        return `
                <td data-label="No">${rowNumber}</td>
                <td data-label="Cabang"><span class="badge-prov">${escapeHtml(item.prov)}</span></td>
                <td data-label="Perusahaan" class="col-perusahaan">${escapeHtml(item.company)}</td>
                <td data-label="Tipe Produk">${escapeHtml(item.tsr_product)}</td>
                <td data-label="Kode Produsen">${escapeHtml(item.product_code)}</td>
                <td data-label="Email">${item.email ? `<a href="mailto:${escapeHtml(item.email)}">${escapeHtml(item.email)}</a>` : '-'}</td>
            `;
                    }
                },
                tab5: {
                    tableBodyId: 'table-body-brownCrapeProducer',
                    paginationId: 'pagination-brownCrapeProducer',
                    url: '/brownCrapeProducer',
                    colCount: 4,
                    rowRenderer: (item, index, currentPage, perPage) => `
                <td data-label="No">${(currentPage-1)*perPage + index + 1}</td>
                <td data-label="Cabang"><span class="badge-prov">${escapeHtml(item.prov)}</span></td>
                <td data-label="Perusahaan" class="col-perusahaan">${escapeHtml(item.company)}</td>
                <td data-label="Email"><a href="mailto:${escapeHtml(item.email)}">${escapeHtml(item.email)}</a></td>
            `
                },
                tab6: {
                    tableBodyId: 'table-body-traders',
                    paginationId: 'pagination-traders',
                    url: '/traders',
                    colCount: 4,
                    rowRenderer: (item, index, currentPage, perPage) => `
                <td data-label="No">${(currentPage-1)*perPage + index + 1}</td>
                <td data-label="Cabang"><span class="badge-prov">${escapeHtml(item.prov)}</span></td>
                <td data-label="Perusahaan" class="col-perusahaan">${escapeHtml(item.company)}</td>
                <td data-label="Email"><a href="mailto:${escapeHtml(item.email)}">${escapeHtml(item.email)}</a></td>
            `
                },
            };

            // Cache for raw data per tab (untuk search filter)
            const dataCache = {};

            function escapeHtml(str) {
                if (str === null || str === undefined) return '-';
                return String(str)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function renderTable(tabId, page = 1) {
                const cfg = tabConfigs[tabId];
                if (!cfg) return;

                const tbody = document.getElementById(cfg.tableBodyId);
                const pag = document.getElementById(cfg.paginationId);
                if (!tbody) return;

                tbody.innerHTML = `<tr><td colspan="${cfg.colCount}" class="ang-loading">Memuat data...</td></tr>`;

                fetch(`${cfg.url}?page=${page}`)
                    .then(res => res.json())
                    .then(data => {
                        dataCache[tabId] = data;
                        renderRows(tabId, data, page);
                        renderPagination(tabId, data);
                        updateInfo(tabId, data);
                    })
                    .catch(err => {
                        tbody.innerHTML =
                            `<tr><td colspan="${cfg.colCount}" class="ang-empty">Gagal memuat data. Silakan refresh halaman.</td></tr>`;
                        console.error('Anggota fetch error:', err);
                    });
            }

            function renderRows(tabId, data, page) {
                const cfg = tabConfigs[tabId];
                const tbody = document.getElementById(cfg.tableBodyId);
                if (!tbody) return;
                tbody.innerHTML = '';

                if (!data.data || data.data.length === 0) {
                    tbody.innerHTML =
                        `<tr><td colspan="${cfg.colCount}" class="ang-empty">Belum ada data anggota di kategori ini.</td></tr>`;
                    return;
                }

                const search = (document.getElementById('angSearch')?.value || '').toLowerCase().trim();

                const filtered = search ?
                    data.data.filter(item => {
                        const haystack = [item.prov, item.company, item.email, item.rss_product, item.tsr_product,
                                item.product_code
                            ]
                            .filter(Boolean)
                            .join(' ')
                            .toLowerCase();
                        return haystack.includes(search);
                    }) :
                    data.data;

                if (filtered.length === 0) {
                    tbody.innerHTML =
                        `<tr><td colspan="${cfg.colCount}" class="ang-empty">Tidak ada hasil untuk pencarian "${escapeHtml(search)}".</td></tr>`;
                    return;
                }

                filtered.forEach((item, idx) => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = cfg.rowRenderer(item, idx, data.current_page, data.per_page);
                    tbody.appendChild(tr);
                });
            }

            function renderPagination(tabId, data) {
                const cfg = tabConfigs[tabId];
                const pag = document.getElementById(cfg.paginationId);
                if (!pag) return;
                pag.innerHTML = '';

                if (data.last_page <= 1) return;

                const active = data.current_page;
                const total = data.last_page;

                // Prev
                const prev = document.createElement('button');
                prev.type = 'button';
                prev.className = 'ang-pg-btn';
                prev.disabled = active === 1;
                prev.innerHTML = arrowLeft + ' Prev';
                if (!prev.disabled) prev.onclick = () => renderTable(tabId, active - 1);
                pag.appendChild(prev);

                // Page numbers
                const pages = computePages(active, total);
                pages.forEach(p => {
                    if (p === '...') {
                        const span = document.createElement('span');
                        span.style.cssText =
                            'display:inline-flex;align-items:center;padding:0 0.5rem;color:var(--c-fade);font-weight:600;';
                        span.textContent = '…';
                        pag.appendChild(span);
                    } else {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'ang-pg-btn' + (p === active ? ' is-active' : '');
                        btn.textContent = p;
                        btn.onclick = () => renderTable(tabId, p);
                        pag.appendChild(btn);
                    }
                });

                // Next
                const next = document.createElement('button');
                next.type = 'button';
                next.className = 'ang-pg-btn';
                next.disabled = active === total;
                next.innerHTML = 'Next ' + arrowRight;
                if (!next.disabled) next.onclick = () => renderTable(tabId, active + 1);
                pag.appendChild(next);
            }

            function updateInfo(tabId, data) {
                const info = document.getElementById('angInfoText');
                if (!info || !data) return;
                const label = TAB_LABELS[tabId] || '';
                const total = data.total || (data.data ? data.data.length : 0);
                info.innerHTML = `<strong>${total}</strong> anggota di ${label}`;
            }

            // ====== Tab Switching ======
            const tabs = document.querySelectorAll('.ang-tab');
            const contents = document.querySelectorAll('.ang-tab-content');

            tabs.forEach(btn => {
                btn.addEventListener('click', () => {
                    const targetId = btn.dataset.target;
                    tabs.forEach(t => t.classList.remove('is-active'));
                    contents.forEach(c => c.classList.remove('is-active'));
                    btn.classList.add('is-active');
                    const target = document.getElementById(targetId);
                    if (target) target.classList.add('is-active');

                    if (dataCache[targetId]) {
                        updateInfo(targetId, dataCache[targetId]);
                    }
                });
            });

            // ====== Search Filter ======
            const searchInput = document.getElementById('angSearch');
            if (searchInput) {
                let debounceTimer;
                searchInput.addEventListener('input', () => {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        const activeTab = document.querySelector('.ang-tab.is-active');
                        if (!activeTab) return;
                        const targetId = activeTab.dataset.target;
                        if (dataCache[targetId]) {
                            renderRows(targetId, dataCache[targetId], dataCache[targetId].current_page);
                        }
                    }, 200);
                });
            }

            // ====== Initial Load: All 6 tabs ======
            renderTable('tab1');
            renderTable('tab2');
            renderTable('tab3');
            renderTable('tab4');
            renderTable('tab5');
            renderTable('tab6');
        })();
    </script>
@endpush
