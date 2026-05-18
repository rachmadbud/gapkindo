{{--
    ============================================================
    CABANG GAPKINDO — Modern Map + Cards Grid
    Struktur:
    1. Banner header (navy + checkerboard, same as sejarah)
    2. Stats bar (jumlah cabang)
    3. Interactive Map (Leaflet + OpenStreetMap)
    4. Cards grid dengan foto cabang
    5. CTA back to home
    ============================================================
--}}

@extends('guest.layouts.master')

@section('title', 'Cabang GAPKINDO')

@push('styles')
{{-- Leaflet CSS --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""/>

<style>
    /* ============================================================
       CABANG PAGE — Scoped Styles
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

        --f-display: 'Fraunces', Georgia, serif;
        --f-sans: 'Manrope', 'Open Sans', sans-serif;
        --f-mono: 'JetBrains Mono', monospace;
    }

    .gpk-cabang, .gpk-cabang *, .gpk-cabang *::before, .gpk-cabang *::after {
        box-sizing: border-box;
    }
    .gpk-cabang {
        background: var(--c-bg);
        color: var(--c-ink);
        font-family: var(--f-sans);
        line-height: 1.6;
    }
    .gpk-cabang a { color: inherit; text-decoration: none; }

    .gpk-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 16px;
    }
    /* Body sections: full-width 16px (match index) */
    .gpk-cabang .cab-stats .gpk-container,
    .gpk-cabang .cab-map-section .gpk-container,
    .gpk-cabang .cab-grid-section .gpk-container,
    .gpk-cabang .cab-cta .gpk-container {
        max-width: 100%;
        padding-left: 16px;
        padding-right: 16px;
    }

    /* ============================================================
       1. PAGE HEADER (Banner — same as sejarah)
       ============================================================ */
    .cab-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1a237e 100%);
        color: var(--c-cream);
        padding: clamp(1.2rem, 3vh, 2.2rem) 0;
        position: relative;
        overflow: hidden;
    }
    .cab-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3Crect x='16' y='16' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3C/svg%3E");
        pointer-events: none;
    }
    .cab-hero__inner {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 900px;
        margin: 0 auto;
    }
    .cab-hero__eyebrow {
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
    .cab-hero__eyebrow::before,
    .cab-hero__eyebrow::after {
        content: "";
        width: 36px;
        height: 1px;
        background: var(--c-gold-soft);
    }
    .cab-hero__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-cream);
        margin: 0 0 0.7rem;
    }
    .cab-hero__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold-soft);
    }
    .cab-hero__lead {
        font-size: clamp(0.95rem, 1.4vw, 1.1rem);
        line-height: 1.6;
        color: rgba(255, 251, 242, 0.78);
        max-width: 720px;
        margin: 0 auto;
    }

    /* ============================================================
       2. STATS BAR
       ============================================================ */
    .cab-stats {
        background: var(--c-bg);
        padding: clamp(2rem, 4vh, 3rem) 0 clamp(1.5rem, 3vh, 2rem);
    }
    .cab-stats__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        text-align: center;
        max-width: 980px;
        margin: 0 auto;
        padding: 1.6rem 0;
        border-top: 1px solid var(--c-line);
        border-bottom: 1px solid var(--c-line);
    }
    .cab-stat__num {
        font-family: var(--f-display);
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 500;
        line-height: 1;
        color: var(--c-leaf);
        margin-bottom: 0.3rem;
    }
    .cab-stat__label {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-fade);
    }
    @media (max-width: 720px) {
        .cab-stats__grid { grid-template-columns: 1fr; gap: 1.2rem; }
    }

    /* ============================================================
       3. MAP SECTION — Leaflet
       ============================================================ */
    .cab-map-section {
        background: var(--c-bg);
        padding: clamp(2rem, 5vh, 3.5rem) 0;
    }
    .cab-map-section__head {
        text-align: center;
        margin-bottom: clamp(1.5rem, 3vh, 2.2rem);
    }
    .cab-section__num {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        color: var(--c-fade);
        margin-bottom: 0.6rem;
        display: block;
    }
    .cab-section__eyebrow {
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
    .cab-section__eyebrow::before {
        content: "";
        width: 32px;
        height: 1px;
        background: var(--c-gold);
    }
    .cab-section__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-ink);
        max-width: 720px;
        margin: 0 auto;
    }
    .cab-section__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold);
    }

    /* Map container */
    .cab-map-wrap {
        position: relative;
    }
    .cab-map {
        width: 100%;
        height: 560px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow:
            0 12px 36px rgba(0, 0, 0, 0.12),
            0 0 0 1px rgba(26, 46, 31, 0.08);
        position: relative;
        z-index: 0;
    }

    /* Reset View Button (top-right) */
    .cab-map-reset {
        position: absolute;
        top: 14px;
        right: 14px;
        z-index: 1000;
        width: 44px;
        height: 44px;
        background: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--c-leaf);
        box-shadow:
            0 4px 14px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(26, 46, 31, 0.08);
        transition: all 0.3s cubic-bezier(0.34, 1.4, 0.6, 1);
        outline: none;
    }
    .cab-map-reset:hover {
        background: var(--c-leaf);
        color: white;
        transform: translateY(-2px) rotate(-45deg);
        box-shadow:
            0 8px 20px rgba(44, 85, 48, 0.35),
            0 0 0 1px rgba(184, 145, 30, 0.3);
    }
    .cab-map-reset:active {
        transform: translateY(0) rotate(-90deg);
    }
    .cab-map-reset svg {
        width: 22px;
        height: 22px;
        stroke-width: 2.2;
        transition: transform 0.4s ease;
    }
    /* Tooltip on hover */
    .cab-map-reset::after {
        content: "Reset tampilan";
        position: absolute;
        top: 50%;
        right: calc(100% + 10px);
        transform: translateY(-50%);
        background: rgba(26, 46, 31, 0.92);
        color: white;
        font-family: var(--f-sans);
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        padding: 0.45rem 0.8rem;
        border-radius: 6px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }
    .cab-map-reset:hover::after {
        opacity: 1;
    }
    @media (max-width: 768px) {
        .cab-map-reset::after { display: none; }  /* tooltip off mobile */
    }
    /* Custom marker style */
    .cab-marker {
        background: linear-gradient(180deg, #3a7140 0%, #2C5530 100%);
        width: 38px;
        height: 38px;
        border-radius: 50% 50% 50% 0;
        transform: rotate(-45deg);
        border: 3px solid white;
        box-shadow: 0 4px 12px rgba(44, 85, 48, 0.5);
        display: flex !important;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }
    .cab-marker::before {
        content: "";
        width: 14px;
        height: 14px;
        background: var(--c-gold);
        border-radius: 50%;
        transform: rotate(45deg);
    }
    .cab-marker:hover {
        transform: rotate(-45deg) scale(1.18);
    }
    .leaflet-popup-content-wrapper {
        border-radius: 12px;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.18);
        padding: 0;
    }
    .leaflet-popup-content {
        margin: 0;
        width: 240px !important;
    }
    .cab-popup__img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 12px 12px 0 0;
        display: block;
    }
    .cab-popup__body {
        padding: 1rem 1.1rem 1.1rem;
    }
    .cab-popup__title {
        font-family: var(--f-display);
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--c-ink);
        margin: 0 0 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .cab-popup__title svg {
        width: 16px;
        height: 16px;
        color: var(--c-leaf);
        flex-shrink: 0;
    }
    .cab-popup__btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #5a40f0;
        color: white !important;
        padding: 0.55rem 1rem;
        border-radius: 6px;
        font-family: var(--f-sans);
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        text-decoration: none !important;
        transition: background 0.3s ease, transform 0.3s ease;
        margin-top: 0.4rem;
    }
    .cab-popup__btn:hover {
        background: #4a30e0;
        transform: translateY(-2px);
        color: white !important;
    }
    .cab-popup__btn svg {
        width: 14px;
        height: 14px;
    }

    /* Map hint */
    .cab-map-hint {
        text-align: center;
        margin-top: 0.8rem;
        font-family: var(--f-mono);
        font-size: 0.7rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-fade);
    }

    /* ============================================================
       4. CARDS GRID
       ============================================================ */
    .cab-grid-section {
        background: var(--c-bg-soft);
        padding: clamp(2rem, 5vh, 3.5rem) 0;
    }
    .cab-grid-section__head {
        text-align: center;
        margin-bottom: clamp(1.5rem, 3vh, 2.2rem);
    }

    .cab-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.2rem;
    }
    @media (min-width: 600px) { .cab-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 900px) { .cab-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (min-width: 1280px) { .cab-grid { grid-template-columns: repeat(4, 1fr); } }

    .cab-card {
        background: white;
        border-radius: 14px;
        overflow: hidden;
        box-shadow:
            0 6px 18px rgba(0, 0, 0, 0.05),
            0 0 0 1px rgba(26, 46, 31, 0.05);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        display: flex;
        flex-direction: column;
        text-decoration: none !important;
        color: inherit;
        position: relative;
    }
    .cab-card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 18px 38px rgba(0, 0, 0, 0.12),
            0 0 0 1px rgba(184, 145, 30, 0.20);
    }

    .cab-card__photo {
        position: relative;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: var(--c-bg);
    }
    .cab-card__photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .cab-card:hover .cab-card__photo img {
        transform: scale(1.08);
    }
    /* Overlay gradient on photo */
    .cab-card__photo::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 50%, rgba(0, 0, 0, 0.55) 100%);
        pointer-events: none;
    }
    /* Number badge */
    .cab-card__num {
        position: absolute;
        top: 12px;
        left: 12px;
        background: var(--c-gold);
        color: white;
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        padding: 0.35rem 0.7rem;
        border-radius: 4px;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(184, 145, 30, 0.3);
    }

    .cab-card__body {
        padding: 1.1rem 1.2rem 1.3rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .cab-card__name {
        font-family: var(--f-display);
        font-size: 1.25rem;
        font-weight: 600;
        line-height: 1.25;
        color: var(--c-ink);
        margin: 0 0 0.5rem;
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
    }
    .cab-card__name svg {
        width: 18px;
        height: 18px;
        color: var(--c-leaf);
        flex-shrink: 0;
        margin-top: 4px;
    }
    .cab-card__meta {
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--c-fade);
        margin-bottom: 0.8rem;
    }
    .cab-card__cta {
        margin-top: auto;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-family: var(--f-sans);
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #5a40f0;
        transition: gap 0.3s ease;
    }
    .cab-card:hover .cab-card__cta {
        gap: 0.8rem;
    }
    .cab-card__cta svg {
        width: 14px;
        height: 14px;
    }

    /* ============================================================
       5. CTA BACK
       ============================================================ */
    .cab-cta {
        background: var(--c-bg);
        padding: clamp(2rem, 5vh, 3.5rem) 0;
        text-align: center;
    }
    .cab-cta__btn {
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
    .cab-cta__btn:hover {
        transform: translateY(-4px);
        background: linear-gradient(180deg, #8c72ff 0%, #6b51f0 55%, #5a40e0 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.5),
            inset 0 -1px 0 rgba(0, 0, 0, 0.18),
            0 12px 22px rgba(90, 64, 240, 0.45),
            0 22px 40px rgba(90, 64, 240, 0.28);
        color: #fff !important;
    }
    .cab-cta__btn svg {
        width: 20px;
        height: 20px;
        transition: transform 0.4s ease;
    }
    .cab-cta__btn:hover svg {
        transform: translateX(6px) scale(1.18);
    }

    @media (max-width: 768px) {
        .cab-map { height: 420px; }
    }
</style>
@endpush

@section('content')
@php
    // Mapping nama propinsi ke koordinat lat/lng
    $coordsMap = [
        'Aceh' => [4.6951, 96.7494],
        'Sumatera Utara' => [2.1154, 99.5451], 'Sumut' => [2.1154, 99.5451], 'Sumatra Utara' => [2.1154, 99.5451],
        'Sumatera Barat' => [-0.7399, 100.8000], 'Sumbar' => [-0.7399, 100.8000], 'Sumatra Barat' => [-0.7399, 100.8000],
        'Riau' => [0.2933, 101.7068],
        'Kepulauan Riau' => [3.9456, 108.1429], 'Kepri' => [3.9456, 108.1429],
        'Jambi' => [-1.4852, 102.4381],
        'Sumatera Selatan' => [-3.3194, 103.9140], 'Sumsel' => [-3.3194, 103.9140], 'Sumatra Selatan' => [-3.3194, 103.9140],
        'Bengkulu' => [-3.5778, 102.3464],
        'Lampung' => [-4.5586, 105.4068],
        'Kepulauan Bangka Belitung' => [-2.7411, 106.4406], 'Babel' => [-2.7411, 106.4406],
        'DKI Jakarta' => [-6.2088, 106.8456], 'Jakarta' => [-6.2088, 106.8456], 'DKI' => [-6.2088, 106.8456],
        'Jawa Barat' => [-6.9147, 107.6098], 'Jabar' => [-6.9147, 107.6098],
        'Jawa Tengah' => [-7.1505, 110.1403], 'Jateng' => [-7.1505, 110.1403],
        'DI Yogyakarta' => [-7.7956, 110.3695], 'Yogyakarta' => [-7.7956, 110.3695], 'DIY' => [-7.7956, 110.3695],
        'Jawa Timur' => [-7.5360, 112.2384], 'Jatim' => [-7.5360, 112.2384],
        'Banten' => [-6.4058, 106.0640],
        'Bali' => [-8.3405, 115.0920],
        'Nusa Tenggara Barat' => [-8.6529, 117.3616], 'NTB' => [-8.6529, 117.3616],
        'Nusa Tenggara Timur' => [-8.6574, 121.0794], 'NTT' => [-8.6574, 121.0794],
        'Kalimantan Barat' => [-0.0274, 111.4753], 'Kalbar' => [-0.0274, 111.4753],
        'Kalimantan Tengah' => [-1.6815, 113.3823], 'Kalteng' => [-1.6815, 113.3823],
        'Kalimantan Selatan' => [-3.0926, 115.2838], 'Kalsel' => [-3.0926, 115.2838],
        'Kalimantan Timur' => [0.5384, 116.4194], 'Kaltim' => [0.5384, 116.4194],
        'Kalimantan Utara' => [3.0731, 116.0413], 'Kaltara' => [3.0731, 116.0413],
        'Sulawesi Utara' => [0.6247, 123.9750], 'Sulut' => [0.6247, 123.9750],
        'Sulawesi Tengah' => [-1.4300, 121.4456], 'Sulteng' => [-1.4300, 121.4456],
        'Sulawesi Selatan' => [-3.6688, 119.9740], 'Sulsel' => [-3.6688, 119.9740],
        'Sulawesi Tenggara' => [-4.1449, 122.1746], 'Sultra' => [-4.1449, 122.1746],
        'Sulawesi Barat' => [-2.8441, 119.2321], 'Sulbar' => [-2.8441, 119.2321],
        'Gorontalo' => [0.6999, 122.4467],
        'Maluku' => [-3.2385, 130.1453],
        'Maluku Utara' => [1.5709, 127.8088], 'Malut' => [1.5709, 127.8088],
        'Papua' => [-4.2699, 138.0804],
        'Papua Barat' => [-1.3361, 133.1747],
    ];

    // Persiapkan data untuk JS (encode aman)
    $cabangJS = collect($data ?? [])->map(function($item) use ($coordsMap) {
        $propName = trim($item->propinsi);
        $coords = $coordsMap[$propName] ?? [-2.0, 118.0];
        return [
            'id' => app(\App\Helpers\Helper::class)->enkrip($item->id),
            'propinsi' => $propName,
            'img' => asset('guest/assets/img/cabang/' . $item->img),
            'detailUrl' => route('detail-cabanag', app(\App\Helpers\Helper::class)->enkrip($item->id)),
            'lat' => $coords[0],
            'lng' => $coords[1],
        ];
    })->values();

    $totalCabang = count($data ?? []);
    // Region grouping (untuk stats)
    $regionsList = collect($data ?? [])->pluck('propinsi')->unique()->count();
@endphp

<div class="gpk-cabang">

    {{-- =====================================================
         1. BANNER HEADER (sama dengan sejarah)
         ===================================================== --}}
    <section class="cab-hero">
        <div class="gpk-container">
            <div class="cab-hero__inner">
                <div class="cab-hero__eyebrow">Jaringan Nasional</div>
                <h1 class="cab-hero__title">
                    Cabang <em>GAPKINDO</em>
                </h1>
                <p class="cab-hero__lead">
                    Jaringan {{ $totalCabang }} cabang DPW yang tersebar di provinsi-provinsi penghasil karet utama Indonesia—siap
                    mendukung industri karet alam di setiap daerah.
                </p>
            </div>
        </div>
    </section>

    @include('guest.partials.ticker')


    {{-- =====================================================
         2. STATS BAR
         ===================================================== --}}
    <section class="cab-stats">
        <div class="gpk-container">
            <div class="cab-stats__grid">
                <div class="cab-stat">
                    <div class="cab-stat__num">{{ $totalCabang }}</div>
                    <div class="cab-stat__label">Cabang</div>
                </div>
                <div class="cab-stat">
                    <div class="cab-stat__num">16</div>
                    <div class="cab-stat__label">Provinsi</div>
                </div>
                <div class="cab-stat">
                    <div class="cab-stat__num">100+</div>
                    <div class="cab-stat__label">Negara Ekspor</div>
                </div>
            </div>
        </div>
    </section>


    {{-- =====================================================
         3. MAP SECTION — Interactive Leaflet
         ===================================================== --}}
    <section class="cab-map-section">
        <div class="gpk-container">
            <div class="cab-map-section__head">
                <div class="cab-section__num">— 01 / Peta Cabang</div>
                <span class="cab-section__eyebrow">Lokasi Cabang</span>
                <h2 class="cab-section__title">
                    Tersebar di seluruh <em>Indonesia</em>
                </h2>
            </div>

            <div class="cab-map-wrap">
                <div id="cabangMap" class="cab-map"></div>
                <button type="button" class="cab-map-reset" id="cabangMapReset" aria-label="Reset tampilan peta">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polyline points="23 4 23 10 17 10"/>
                        <polyline points="1 20 1 14 7 14"/>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>
                    </svg>
                </button>
            </div>
            <div class="cab-map-hint">🗺️ Klik pin untuk melihat detail cabang • Scroll untuk zoom • Klik tombol ↻ untuk reset</div>
        </div>
    </section>


    {{-- =====================================================
         4. CARDS GRID
         ===================================================== --}}
    <section class="cab-grid-section">
        <div class="gpk-container">
            <div class="cab-grid-section__head">
                <div class="cab-section__num">— 02 / Daftar Lengkap</div>
                <span class="cab-section__eyebrow">Direktori Cabang</span>
                <h2 class="cab-section__title">
                    Semua cabang <em>GAPKINDO</em>
                </h2>
            </div>

            <div class="cab-grid">
                @foreach ($data as $idx => $item)
                    <a href="{{ route('detail-cabanag', app(\App\Helpers\Helper::class)->enkrip($item->id)) }}"
                       class="cab-card" title="Detail cabang {{ $item->propinsi }}">
                        <div class="cab-card__photo">
                            <span class="cab-card__num">DPW {{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <img src="{{ asset('guest/assets/img/cabang/' . $item->img) }}"
                                 alt="Cabang {{ $item->propinsi }}" loading="lazy">
                        </div>
                        <div class="cab-card__body">
                            <h3 class="cab-card__name">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                {{ $item->propinsi }}
                            </h3>
                            <div class="cab-card__meta">GAPKINDO Cabang</div>
                            <span class="cab-card__cta">
                                Lihat Detail
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M13 6l6 6-6 6"/>
                                </svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    {{-- =====================================================
         5. CTA BACK
         ===================================================== --}}
    <section class="cab-cta">
        <div class="gpk-container">
            <a href="{{ url('/') }}" class="cab-cta__btn">
                <span>Kembali ke Beranda</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14"/>
                    <path d="M13 6l6 6-6 6"/>
                </svg>
            </a>
        </div>
    </section>

</div>
@endsection


@push('scripts')
{{-- Leaflet JS --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

<script>
(function() {
    'use strict';

    if (!document.getElementById('cabangMap')) return;

    const cabangData = {!! $cabangJS->toJson() !!};

    // Initialize map centered on Indonesia
    const map = L.map('cabangMap', {
        center: [-2.5, 118.0],
        zoom: 5,
        zoomControl: true,
        scrollWheelZoom: true,
    });

    // Use a clean modern tile theme
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    }).addTo(map);

    // Custom marker icon (HTML)
    const cabangIcon = L.divIcon({
        className: 'cab-marker-wrap',
        html: '<div class="cab-marker"></div>',
        iconSize: [38, 38],
        iconAnchor: [19, 38],
        popupAnchor: [0, -36],
    });

    // Add markers from data
    const markers = [];
    cabangData.forEach((c) => {
        const popupHTML = `
            <img src="${c.img}" alt="${c.propinsi}" class="cab-popup__img" onerror="this.style.display='none'">
            <div class="cab-popup__body">
                <h4 class="cab-popup__title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    ${c.propinsi}
                </h4>
                <a href="${c.detailUrl}" class="cab-popup__btn">
                    Detail Cabang
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </a>
            </div>
        `;

        const marker = L.marker([c.lat, c.lng], { icon: cabangIcon })
            .addTo(map)
            .bindPopup(popupHTML, { closeButton: true, autoClose: false });

        markers.push(marker);
    });

    // Fit bounds to show all markers if there are multiple
    function resetMapView() {
        if (markers.length > 1) {
            const group = L.featureGroup(markers);
            map.fitBounds(group.getBounds().pad(0.15), { animate: true, duration: 0.6 });
        } else if (markers.length === 1) {
            map.setView(markers[0].getLatLng(), 6, { animate: true, duration: 0.6 });
        } else {
            map.setView([-2.5, 118.0], 5, { animate: true, duration: 0.6 });
        }
        map.closePopup();
    }
    resetMapView();

    // Reset button handler
    const resetBtn = document.getElementById('cabangMapReset');
    if (resetBtn) {
        resetBtn.addEventListener('click', function(e) {
            e.preventDefault();
            resetMapView();
        });
    }
})();
</script>
@endpush
