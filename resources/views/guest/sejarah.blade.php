{{--
    ============================================================
    SEJARAH GAPKINDO — Premium Page
    Struktur:
    1. Page Header (dark gradient hero)
    2. Timeline Visual (8 milestone, pola colorful pin & rail
       diadaptasi dari template PowerPoint Time_Line.pptx)
    3. Detail Sejarah (Sebelum GAPKINDO, Pendirian, Tujuan,
       Lingkup Kegiatan) — diambil dari tentang_gapkindo.php
       gapkindosu.org
    ============================================================
--}}

@extends('guest.layouts.master')

@section('title', 'Sejarah | GAPKINDO')

@push('styles')
<style>
    /* ============================================================
       SEJARAH PAGE — Scoped Styles
       ============================================================ */
    :root {
        --c-bg: #FAF7F0;
        --c-bg-soft: #F4EFE3;
        --c-ink: #1A2E1F;
        --c-ink-soft: #4a5b4f;
        --c-leaf: #2C5530;
        --c-leaf-deep: #1A2E1F;
        --c-gold: #B8911E;
        --c-gold-soft: #D4B355;
        --c-cream: #FFFBF2;
        --c-line: rgba(26, 46, 31, 0.10);
        --c-fade: #6b7770;

        /* 8 milestone colors */
        --m1: #3b82f6;  /* 1967 blue */
        --m2: #06b6d4;  /* 1968 cyan */
        --m3: #22c55e;  /* 1971 green */
        --m4: #f59e0b;  /* 1972 amber */
        --m5: #14b8a6;  /* 1982 teal */
        --m6: #8b5cf6;  /* 1988 purple */
        --m7: #ef4444;  /* 1989 red */
        --m8: #fd7e14;  /* 2016 orange */

        --f-display: 'Fraunces', Georgia, serif;
        --f-sans: 'Manrope', 'Open Sans', sans-serif;
        --f-mono: 'JetBrains Mono', monospace;
    }

    /* GLOBAL RESET (scoped) */
    .gpk-sejarah, .gpk-sejarah *, .gpk-sejarah *::before, .gpk-sejarah *::after {
        box-sizing: border-box;
    }
    .gpk-sejarah {
        background: var(--c-bg);
        color: var(--c-ink);
        font-family: var(--f-sans);
        line-height: 1.6;
    }
    .gpk-sejarah a { color: inherit; text-decoration: none; }

    .gpk-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 16px;
    }

    /* Konten antara banner dan footer — full width + padding 16px (match index) */
    .gpk-sejarah .sejarah-timeline .gpk-container,
    .gpk-sejarah .sejarah-detail .gpk-container,
    .gpk-sejarah .sejarah-cta .gpk-container {
        max-width: 100%;
        padding-left: 16px;
        padding-right: 16px;
    }

    /* ============================================================
       1. PAGE HEADER (Hero) — Compact navy with checkerboard
       ============================================================ */
    .sejarah-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1a237e 100%);
        color: var(--c-cream);
        padding: clamp(1.2rem, 3vh, 2.2rem) 0;
        position: relative;
        overflow: hidden;
    }
    .sejarah-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3Crect x='16' y='16' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3C/svg%3E");
        pointer-events: none;
    }
    .sejarah-hero__inner {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 900px;
        margin: 0 auto;
    }
    .sejarah-hero__eyebrow {
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
    .sejarah-hero__eyebrow::before,
    .sejarah-hero__eyebrow::after {
        content: "";
        width: 36px;
        height: 1px;
        background: var(--c-gold-soft);
    }
    .sejarah-hero__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-cream);
        margin: 0 0 0.7rem;
    }
    .sejarah-hero__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold-soft);
    }
    .sejarah-hero__lead {
        font-size: clamp(0.95rem, 1.4vw, 1.1rem);
        line-height: 1.6;
        color: rgba(255, 251, 242, 0.78);
        max-width: 700px;
        margin: 0 auto;
    }

    /* ============================================================
       2. TIMELINE VISUAL (adaptasi pola PowerPoint)
       ============================================================ */
    .sejarah-timeline {
        background: var(--c-bg);
        padding: clamp(2.5rem, 6vh, 4.5rem) 0;
        position: relative;
        overflow-x: auto;
    }
    .sejarah-timeline__head {
        text-align: center;
        margin-bottom: clamp(2rem, 5vh, 3.5rem);
    }
    .sejarah-timeline__num {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        color: var(--c-fade);
        margin-bottom: 0.6rem;
        display: block;
    }
    .sejarah-timeline__eyebrow {
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.32em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin-bottom: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
    }
    .sejarah-timeline__eyebrow::before {
        content: "";
        width: 32px;
        height: 1px;
        background: var(--c-gold);
    }
    .sejarah-timeline__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-ink);
        max-width: 720px;
        margin: 0 auto;
    }
    .sejarah-timeline__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold);
    }

    /* TIMELINE GRID — desktop horizontal, mobile vertical */
    .timeline-track {
        position: relative;
        padding: 1rem 0 2rem;
        min-width: 1100px;     /* horizontal scroll on small viewports */
    }

    /* Connecting Rail (horizontal bar) */
    .timeline-rail {
        position: absolute;
        top: 175px;   /* aligned to bottom of circles */
        left: calc(100% / 16);
        right: calc(100% / 16);
        height: 16px;
        border-radius: 999px;
        background: linear-gradient(90deg,
            var(--m1) 0%, var(--m1) 12.5%,
            var(--m2) 12.5%, var(--m2) 25%,
            var(--m3) 25%, var(--m3) 37.5%,
            var(--m4) 37.5%, var(--m4) 50%,
            var(--m5) 50%, var(--m5) 62.5%,
            var(--m6) 62.5%, var(--m6) 75%,
            var(--m7) 75%, var(--m7) 87.5%,
            var(--m8) 87.5%, var(--m8) 100%);
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.12);
        z-index: 1;
    }

    /* Junction dots on rail */
    .timeline-rail::before,
    .timeline-rail::after {
        content: "";
        position: absolute;
        top: -3px;
        width: 22px;
        height: 22px;
        background: white;
        border-radius: 50%;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }
    .timeline-rail::before { left: -11px; }
    .timeline-rail::after  { right: -11px; }

    /* Grid container */
    .timeline-items {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 0;
        position: relative;
        z-index: 2;
    }

    .timeline-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 0 0.5rem;
        position: relative;
    }
    .timeline-item:not(:last-child)::after {
        content: "";
        position: absolute;
        top: 235px;
        right: 0;
        width: 1px;
        background: var(--c-line);
        height: calc(100% - 235px);
    }

    /* CIRCLE with icon (top) — pin shape */
    .timeline-circle-wrap {
        position: relative;
        margin-bottom: 14px;
    }
    .timeline-circle {
        width: 94px;
        height: 94px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2;
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.10);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .timeline-circle::before {
        content: "";
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        background: var(--accent);
        z-index: -1;
    }
    .timeline-circle::after {
        /* pin pointing down */
        content: "";
        position: absolute;
        bottom: -25px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 18px solid transparent;
        border-right: 18px solid transparent;
        border-top: 24px solid var(--accent);
        z-index: -2;
    }
    .timeline-circle svg {
        width: 44px;
        height: 44px;
        color: var(--c-ink);
        stroke-width: 1.6;
    }
    .timeline-item:hover .timeline-circle {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.18);
    }

    /* YEAR (above circle as label) */
    .timeline-year {
        font-family: var(--f-display);
        font-size: 1.7rem;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 6px;
        letter-spacing: -0.01em;
    }

    /* TEXT CONTENT (below rail) */
    .timeline-content {
        margin-top: 60px;
        background: white;
        padding: 1.5rem 1.2rem 1.8rem;
        border-radius: 8px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        min-height: 280px;
    }
    .timeline-content__title {
        font-family: var(--f-display);
        font-size: 1.55rem;
        font-weight: 700;
        line-height: 1.25;
        color: var(--c-ink);
        margin: 0 0 0.8rem;
    }
    .timeline-content__desc {
        font-size: 1.05rem;
        line-height: 1.55;
        color: var(--c-ink-soft);
    }

    /* Number indicator below */
    .timeline-number {
        font-family: var(--f-display);
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--accent);
        margin-top: 1rem;
        opacity: 0.85;
    }

    /* Hint for mobile horizontal scroll */
    .timeline-scroll-hint {
        display: none;
        text-align: center;
        font-family: var(--f-mono);
        font-size: 0.72rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-fade);
        margin-top: 1.5rem;
    }
    @media (max-width: 1199px) {
        .timeline-scroll-hint { display: block; }
    }

    /* ============================================================
       3. SEJARAH DETAIL — Card Layout
       ============================================================ */
    .sejarah-detail {
        background: var(--c-bg-soft);
        padding: clamp(2.5rem, 6vh, 4rem) 0;
    }
    .sejarah-detail__head {
        text-align: center;
        margin-bottom: clamp(2rem, 5vh, 3rem);
    }

    /* SECTION CARD */
    .sj-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 6px 22px rgba(0, 0, 0, 0.06);
        margin-bottom: 1.6rem;
        overflow: hidden;
        border: 1px solid var(--c-line);
        display: flex;
        flex-direction: column;
    }

    /* ROW: 3 card sejajar (Sebelum/Pendirian/Tujuan) */
    .sj-card-row {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.6rem;
        margin-bottom: 1.6rem;
    }
    .sj-card-row .sj-card {
        margin-bottom: 0;
        height: 100%;
    }
    @media (min-width: 992px) {
        .sj-card-row {
            grid-template-columns: repeat(3, 1fr);
            gap: 1.4rem;
        }
    }

    .sj-card__head {
        padding: 1.6rem 2rem;
        display: flex;
        align-items: center;
        gap: 1.1rem;
        border-bottom: 1px solid var(--c-line);
    }
    .sj-card__head svg {
        width: 38px;
        height: 38px;
        flex-shrink: 0;
        color: var(--c-leaf);
    }
    .sj-card__title {
        font-family: var(--f-display);
        font-size: 2.4rem;
        font-weight: 600;
        line-height: 1.2;
        color: var(--c-ink);
        margin: 0;
    }
    .sj-card__body {
        padding: 2rem 2rem 2.2rem;
        flex: 1;
    }
    .sj-card__text {
        font-size: 1.75rem;
        line-height: 1.6;
        color: var(--c-ink-soft);
        margin-bottom: 0;
    }
    .sj-card__text b { color: var(--c-leaf); font-weight: 700; }

    /* Adjust font sizes ketika 3-column row (lebih sempit) — title proporsional */
    @media (min-width: 992px) {
        .sj-card-row .sj-card__head {
            padding: 1.3rem 1.5rem;
            gap: 0.9rem;
        }
        .sj-card-row .sj-card__head svg {
            width: 32px;
            height: 32px;
        }
        .sj-card-row .sj-card__title {
            font-size: 1.9rem;
        }
        .sj-card-row .sj-card__body {
            padding: 1.5rem 1.5rem 1.7rem;
        }
        /* body font tetap 1.75rem (sama dengan Lingkup) — TIDAK di-shrink */
    }

    /* List for Pendirian */
    .sj-list-alpha {
        list-style: lower-alpha;
        padding-left: 2.2rem;
        margin: 0;
    }
    .sj-list-alpha li {
        padding: 0.6rem 0;
        font-size: 1.75rem;
        line-height: 1.55;
        color: var(--c-ink-soft);
        position: relative;
    }
    .sj-list-alpha li::marker {
        color: var(--c-gold);
        font-weight: 700;
        font-size: 1.4rem;
    }

    /* List for Lingkup (icon items) */
    .sj-lingkup {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.1rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    @media (min-width: 1024px) {
        .sj-lingkup { grid-template-columns: 1fr 1fr; gap: 1.2rem; }
    }
    .sj-lingkup__item {
        display: flex;
        align-items: flex-start;
        gap: 1.1rem;
        padding: 1.3rem 1.4rem;
        background: var(--c-cream);
        border-radius: 8px;
        border-left: 4px solid var(--accent, var(--c-leaf));
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .sj-lingkup__item:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
    }
    .sj-lingkup__icon {
        width: 54px;
        height: 54px;
        flex-shrink: 0;
        background: var(--accent, var(--c-leaf));
        color: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .sj-lingkup__icon svg {
        width: 28px;
        height: 28px;
    }
    .sj-lingkup__text {
        font-size: 1.75rem;
        line-height: 1.5;
        color: var(--c-ink-soft);
    }

    /* ============================================================
       4. CTA BACK TO HOME
       ============================================================ */
    .sejarah-cta {
        background: var(--c-bg);
        padding: clamp(2rem, 5vh, 3.5rem) 0;
        text-align: center;
    }
    .sejarah-cta__btn {
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1rem 2.4rem;
        background: linear-gradient(180deg, #7256ff 0%, #5a40f0 55%, #4830d8 100%);
        color: #fff !important;
        font-family: var(--f-sans);
        font-size: 0.95rem;
        font-weight: 800;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        text-decoration: none !important;
        border-radius: 12px;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.4),
            inset 0 -1px 0 rgba(0, 0, 0, 0.15),
            0 6px 14px rgba(90, 64, 240, 0.35),
            0 14px 28px rgba(90, 64, 240, 0.22);
        transition: all 0.35s cubic-bezier(0.34, 1.4, 0.6, 1);
    }
    .sejarah-cta__btn:hover {
        transform: translateY(-4px);
        background: linear-gradient(180deg, #8c72ff 0%, #6b51f0 55%, #5a40e0 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.5),
            inset 0 -1px 0 rgba(0, 0, 0, 0.18),
            0 12px 22px rgba(90, 64, 240, 0.45),
            0 22px 40px rgba(90, 64, 240, 0.28);
        color: #fff !important;
        text-decoration: none !important;
    }
    .sejarah-cta__btn svg {
        width: 20px;
        height: 20px;
        transition: transform 0.4s ease;
    }
    .sejarah-cta__btn:hover svg {
        transform: translateX(6px) scale(1.18);
    }

    /* ============================================================
       RESPONSIVE
       ============================================================ */
    @media (max-width: 768px) {
        .timeline-track { min-width: 900px; }
        .timeline-circle { width: 78px; height: 78px; }
        .timeline-circle svg { width: 34px; height: 34px; }
        .timeline-year { font-size: 1.4rem; }
        .timeline-content { padding: 1.1rem 0.9rem 1.3rem; min-height: 240px; }
        .timeline-content__title { font-size: 1.25rem; }
        .timeline-content__desc { font-size: 0.92rem; }
        .timeline-number { font-size: 1.2rem; }

        .sj-card__head { padding: 1.2rem 1.4rem; gap: 0.9rem; }
        .sj-card__head svg { width: 32px; height: 32px; }
        .sj-card__title { font-size: 1.85rem; }
        .sj-card__body { padding: 1.4rem 1.4rem 1.6rem; }
        .sj-card__text { font-size: 1.4rem; }
        .sj-list-alpha li { font-size: 1.4rem; }
        .sj-lingkup__text { font-size: 1.3rem; }
        .sj-lingkup__icon { width: 44px; height: 44px; }
        .sj-lingkup__icon svg { width: 22px; height: 22px; }
    }
</style>
@endpush

@section('content')
<div class="gpk-sejarah">

    {{-- =====================================================
         1. PAGE HEADER
         ===================================================== --}}
    <section class="sejarah-hero">
        <div class="gpk-container">
            <div class="sejarah-hero__inner">
                <div class="sejarah-hero__eyebrow">Heritage Sejak 1971</div>
                <h1 class="sejarah-hero__title">
                    Sejarah <em>GAPKINDO</em>
                </h1>
                <p class="sejarah-hero__lead">
                    Perjalanan panjang Gabungan Perusahaan Karet Indonesia—dari kebijakan
                    Menteri Perdagangan tahun 1967, lahirnya PPKSTI di tahun 1971, hingga menjadi
                    perkumpulan berbadan hukum yang menaungi industri karet alam nasional.
                </p>
            </div>
        </div>
    </section>

    @include('guest.partials.ticker')


    {{-- =====================================================
         2. TIMELINE VISUAL — 8 milestone
         ===================================================== --}}
    <section class="sejarah-timeline">
        <div class="gpk-container">
            <div class="sejarah-timeline__head">
                <div class="sejarah-timeline__num">— 01 / Timeline</div>
                <span class="sejarah-timeline__eyebrow">Perjalanan Organisasi</span>
                <h2 class="sejarah-timeline__title">
                    8 milestone <em>penting</em> sejak 1967
                </h2>
            </div>

            @php
                $milestones = [
                    [
                        'year' => '1967',
                        'color' => 'var(--m1)',
                        'title' => 'Kebijakan Menteri Perdagangan',
                        'desc' => 'Prof. Dr. Soemitro Djojohadikusumo selaku Menteri Perdagangan mengambil kebijakan menumbuhkan industri crumb rubber atau Karet Spesifikasi Teknis Khusus di Indonesia.',
                        'icon' => 'gavel',
                    ],
                    [
                        'year' => '1968',
                        'color' => 'var(--m2)',
                        'title' => 'Pembentukan Panitia Kerja',
                        'desc' => 'Pembentukan Panitia Kerja Crumb Rubber melalui Kepres No.293 Tahun 1968 untuk mengajak pengusaha karet memproduksi Standard Indonesian Rubber (SIR).',
                        'icon' => 'users',
                    ],
                    [
                        'year' => '1971',
                        'color' => 'var(--m3)',
                        'title' => 'Lahirnya PPKSTI',
                        'desc' => 'Para pengusaha pionir Karet Spesifikasi Khusus membentuk organisasi bernama Persatuan Pengusaha Karet Spesifikasi Teknis Indonesia (PPKSTI).',
                        'icon' => 'flag',
                    ],
                    [
                        'year' => '1972',
                        'color' => 'var(--m4)',
                        'title' => 'Transformasi ke GAPKINDO',
                        'desc' => 'Kongres PPKSTI memutuskan mengubah nama organisasi menjadi Gabungan Produsen Karet Indonesia (GAPKINDO).',
                        'icon' => 'refresh',
                    ],
                    [
                        'year' => '1982',
                        'color' => 'var(--m5)',
                        'title' => 'Perubahan Nama Pertama',
                        'desc' => 'Kongres Luar Biasa ke-6 mengubah nama organisasi menjadi Gabungan Pengusaha Karet Indonesia (GAPKINDO).',
                        'icon' => 'pencil',
                    ],
                    [
                        'year' => '1988',
                        'color' => 'var(--m6)',
                        'title' => 'Evolusi Nama',
                        'desc' => 'Dalam Kongres ke-8 nama berubah menjadi Gabungan Perusahaan Karet Indonesia.',
                        'icon' => 'evolution',
                    ],
                    [
                        'year' => '1989',
                        'color' => 'var(--m7)',
                        'title' => 'Pengesahan Resmi',
                        'desc' => 'Resmi menyandang nama Gabungan Perusahaan Karet Indonesia (GAPKINDO) dan dicatat dalam akta No. 33 Notaris R. Muh. Hendarmawan, SH.',
                        'icon' => 'certificate',
                    ],
                    [
                        'year' => '2016',
                        'color' => 'var(--m8)',
                        'title' => 'Status Berbadan Hukum',
                        'desc' => 'Keputusan Menteri Hukum dan HAM RI No. AHU-008-1125.AH.01.07. Tahun 2016 — menjadi organisasi berbadan hukum: Perkumpulan GAPKINDO.',
                        'icon' => 'shield',
                    ],
                ];

                $icons = [
                    'gavel'       => '<path d="M14 9l7 7-3.5 3.5L10.5 12 14 9z"/><path d="M3 7l7 7"/><line x1="5" y1="9" x2="9" y2="5"/><line x1="13" y1="3" x2="17" y2="7"/>',
                    'users'       => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
                    'flag'        => '<path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/>',
                    'refresh'     => '<polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>',
                    'pencil'      => '<path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>',
                    'evolution'   => '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>',
                    'certificate' => '<circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>',
                    'shield'      => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
                ];
            @endphp

            <div class="timeline-track">
                <div class="timeline-rail"></div>
                <div class="timeline-items">
                    @foreach ($milestones as $idx => $m)
                        <div class="timeline-item" style="--accent: {{ $m['color'] }};">
                            <div class="timeline-year">{{ $m['year'] }}</div>
                            <div class="timeline-circle-wrap">
                                <div class="timeline-circle">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        {!! $icons[$m['icon']] !!}
                                    </svg>
                                </div>
                            </div>
                            <div class="timeline-content">
                                <h3 class="timeline-content__title">{{ $m['title'] }}</h3>
                                <p class="timeline-content__desc">{{ $m['desc'] }}</p>
                            </div>
                            <div class="timeline-number">0{{ $idx + 1 }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="timeline-scroll-hint">⟵ Geser horizontal untuk lihat semua milestone ⟶</div>
        </div>
    </section>


    {{-- =====================================================
         3. SEJARAH DETAIL — diambil dari tentang_gapkindo.php
         ===================================================== --}}
    <section class="sejarah-detail">
        <div class="gpk-container">

            <div class="sejarah-detail__head">
                <div class="sejarah-timeline__num">— 02 / Detail</div>
                <span class="sejarah-timeline__eyebrow">Sejarah Lengkap</span>
                <h2 class="sejarah-timeline__title">
                    Mengenal <em>GAPKINDO</em> lebih dalam
                </h2>
            </div>

            {{-- ROW: 3 card sejajar (Sebelum GAPKINDO, Pendirian, Tujuan) --}}
            <div class="sj-card-row">

                {{-- SEBELUM GAPKINDO --}}
                <div class="sj-card" style="--accent: var(--m1);">
                    <div class="sj-card__head">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-4.95"/>
                        </svg>
                        <h3 class="sj-card__title">Sebelum GAPKINDO</h3>
                    </div>
                    <div class="sj-card__body">
                        <p class="sj-card__text">
                            Cikal bakal organisasi GAPKINDO telah ada pada <b>era 1950-an</b> yang dibentuk oleh pelaku
                            usaha industri Remilling Karet. Pada saat itu organisasi ini bernama <b>GARKI</b>
                            (Gabungan Remilling Karet Indonesia).
                        </p>
                    </div>
                </div>

                {{-- PENDIRIAN --}}
                <div class="sj-card" style="--accent: var(--m3);">
                    <div class="sj-card__head">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/>
                            <line x1="4" y1="22" x2="4" y2="15"/>
                        </svg>
                        <h3 class="sj-card__title">Pendirian</h3>
                    </div>
                    <div class="sj-card__body">
                        <ol class="sj-list-alpha">
                            <li>Didirikan oleh Anggota pada tanggal <b>21 Mei 1971</b></li>
                            <li>Melalui mekanisme <b>Kongres</b></li>
                            <li>Kepengurusan dipilih setiap <b>3 tahun</b> melalui Kongres</li>
                            <li>Anggaran Dasar dan Anggaran Rumah Tangga dibuat sebagai dasar penyelenggaraan</li>
                        </ol>
                    </div>
                </div>

                {{-- TUJUAN --}}
                <div class="sj-card" style="--accent: var(--m4);">
                    <div class="sj-card__head">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <circle cx="12" cy="12" r="6"/>
                            <circle cx="12" cy="12" r="2"/>
                        </svg>
                        <h3 class="sj-card__title">Tujuan</h3>
                    </div>
                    <div class="sj-card__body">
                        <p class="sj-card__text">
                            Untuk <b>memelihara, mengembangkan dan meningkatkan bisnis karet</b> baik secara kuantitatif
                            maupun kualitatif dalam hal produksi, pengolahan, dan pemasaran — sebagai suatu jalur
                            dukungan utama dalam pengembangan ekonomi bangsa menuju masyarakat yang adil dan makmur.
                        </p>
                    </div>
                </div>

            </div>

            {{-- LINGKUP KEGIATAN --}}
            <div class="sj-card" style="--accent: var(--m6);">
                <div class="sj-card__head">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <h3 class="sj-card__title">Lingkup Kegiatan</h3>
                </div>
                <div class="sj-card__body">
                    @php
                        $lingkup = [
                            ['color' => 'var(--m1)', 'icon' => '<path d="M20.42 4.58a5.4 5.4 0 0 0-7.65 0l-.77.78-.77-.78a5.4 5.4 0 0 0-7.65 7.65l.78.77L12 21l7.64-7.64.78-.77a5.4 5.4 0 0 0 0-7.65z"/>', 'text' => 'Menjalin kemitraan dan hubungan baik dengan pemerintah maupun sektor swasta di dalam dan luar negeri.'],
                            ['color' => 'var(--m3)', 'icon' => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>', 'text' => 'Membantu bisnis anggota dalam perizinan, produksi, kualitas, perdagangan, kepelabuhanan, bea cukai, karantina, pajak, lingkungan hidup, dan ketenagakerjaan.'],
                            ['color' => 'var(--m2)', 'icon' => '<circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/>', 'text' => 'Mendistribusikan informasi, peraturan perundangan dan memberikan penjelasan yang diperlukan.'],
                            ['color' => 'var(--m4)', 'icon' => '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>', 'text' => 'Mengembangkan kegiatan produksi, pemasaran, penelitian, konseling, dan konsultasi untuk meningkatkan kuantitas dan kualitas karet Indonesia.'],
                            ['color' => 'var(--m7)', 'icon' => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>', 'text' => 'Mengupayakan perluasan pasar karet dan memelihara pasar karet yang ada.'],
                            ['color' => 'var(--m5)', 'icon' => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>', 'text' => 'Memberikan penjelasan, saran, bimbingan, pendidikan, pelatihan, dan bimbingan khusus kepada Anggota dan stakeholders.'],
                            ['color' => 'var(--c-leaf)', 'icon' => '<rect x="2" y="7" width="20" height="15" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>', 'text' => 'Mewakili Anggota dalam institusi formal baik di dalam maupun luar negeri.'],
                            ['color' => 'var(--m6)', 'icon' => '<path d="M12 3v18M5 6l7-3 7 3M5 6l4 9a5 5 0 0 1-8 0M19 6l4 9a5 5 0 0 1-8 0"/>', 'text' => 'Bertindak sebagai arbiter jika diminta dalam menyelesaikan perselisihan yang muncul dalam bisnis karet.'],
                            ['color' => 'var(--m8)', 'icon' => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>', 'text' => 'Mengimplementasikan upaya yang bermanfaat untuk mencapai tujuan organisasi.'],
                        ];
                    @endphp

                    <ul class="sj-lingkup">
                        @foreach($lingkup as $lk)
                            <li class="sj-lingkup__item" style="--accent: {{ $lk['color'] }};">
                                <div class="sj-lingkup__icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        {!! $lk['icon'] !!}
                                    </svg>
                                </div>
                                <div class="sj-lingkup__text">{{ $lk['text'] }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </section>


    {{-- =====================================================
         4. CTA — Back to Home
         ===================================================== --}}
    <section class="sejarah-cta">
        <div class="gpk-container">
            <a href="{{ url('/') }}" class="sejarah-cta__btn">
                <span>Kembali ke Beranda</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M5 12h14"/>
                    <path d="M13 6l6 6-6 6"/>
                </svg>
            </a>
        </div>
    </section>

</div>
@endsection
