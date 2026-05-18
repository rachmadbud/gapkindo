{{--
    ============================================================
    KONTAK GAPKINDO — Modern Contact Page
    Struktur:
    1. Banner header (navy + checkerboard, sama pattern)
    2. Stats bar
    3. Contact info cards (3-col: Alamat, Telepon, Email)
    4. Map section (Leaflet — Jakarta Pusat)
    5. CTA back to home / lihat cabang
    ============================================================
--}}

@extends('guest.layouts.master')

@section('title', 'Kontak | GAPKINDO')

@push('styles')
{{-- Leaflet CSS --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""/>

<style>
    /* ============================================================
       KONTAK PAGE — Scoped Styles
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

    .gpk-kontak, .gpk-kontak *, .gpk-kontak *::before, .gpk-kontak *::after {
        box-sizing: border-box;
    }
    .gpk-kontak {
        background: var(--c-bg);
        color: var(--c-ink);
        font-family: var(--f-sans);
        line-height: 1.6;
    }
    .gpk-kontak a { color: inherit; text-decoration: none; }

    .gpk-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 16px;
    }
    /* Body sections: full-width 16px (match index) */
    .gpk-kontak .kn-stats .gpk-container,
    .gpk-kontak .kn-cards .gpk-container,
    .gpk-kontak .kn-map-section .gpk-container,
    .gpk-kontak .kn-cta .gpk-container {
        max-width: 100%;
        padding-left: 16px;
        padding-right: 16px;
    }

    /* ============================================================
       1. PAGE HEADER (Banner)
       ============================================================ */
    .kn-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1a237e 100%);
        color: var(--c-cream);
        padding: clamp(1.2rem, 3vh, 2.2rem) 0;
        position: relative;
        overflow: hidden;
    }
    .kn-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3Crect x='16' y='16' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3C/svg%3E");
        pointer-events: none;
    }
    .kn-hero__inner {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 900px;
        margin: 0 auto;
    }
    .kn-hero__eyebrow {
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
    .kn-hero__eyebrow::before,
    .kn-hero__eyebrow::after {
        content: "";
        width: 36px;
        height: 1px;
        background: var(--c-gold-soft);
    }
    .kn-hero__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-cream);
        margin: 0 0 0.7rem;
    }
    .kn-hero__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold-soft);
    }
    .kn-hero__lead {
        font-size: clamp(0.95rem, 1.4vw, 1.1rem);
        line-height: 1.6;
        color: rgba(255, 251, 242, 0.78);
        max-width: 720px;
        margin: 0 auto;
    }

    /* ============================================================
       2. STATS BAR
       ============================================================ */
    .kn-stats {
        background: var(--c-bg);
        padding: clamp(2rem, 4vh, 3rem) 0 clamp(1rem, 2vh, 1.5rem);
    }
    .kn-stats__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        text-align: center;
        max-width: 980px;
        margin: 0 auto;
        padding: 1.4rem 0;
        border-top: 1px solid var(--c-line);
        border-bottom: 1px solid var(--c-line);
    }
    .kn-stat__num {
        font-family: var(--f-display);
        font-size: clamp(2.2rem, 4.5vw, 3.5rem);
        font-weight: 500;
        line-height: 1;
        color: var(--c-leaf);
        margin-bottom: 0.3rem;
    }
    .kn-stat__label {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-fade);
    }
    @media (max-width: 720px) {
        .kn-stats__grid { grid-template-columns: 1fr; gap: 1rem; }
    }

    /* ============================================================
       3. CONTACT CARDS (3-col)
       ============================================================ */
    .kn-cards {
        background: var(--c-bg);
        padding: clamp(1.5rem, 4vh, 3rem) 0 clamp(2rem, 5vh, 3.5rem);
    }
    .kn-cards__head {
        text-align: center;
        margin-bottom: clamp(1.5rem, 3vh, 2.2rem);
    }
    .kn-section__num {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        color: var(--c-fade);
        margin-bottom: 0.6rem;
        display: block;
    }
    .kn-section__eyebrow {
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
    .kn-section__eyebrow::before {
        content: "";
        width: 32px;
        height: 1px;
        background: var(--c-gold);
    }
    .kn-section__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-ink);
        max-width: 720px;
        margin: 0 auto;
    }
    .kn-section__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold);
    }

    .kn-cards__grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.4rem;
    }
    @media (min-width: 720px)  { .kn-cards__grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 1080px) { .kn-cards__grid { grid-template-columns: repeat(3, 1fr); } }

    /* CARD */
    .kn-card {
        background: white;
        border-radius: 16px;
        padding: 2rem 1.8rem;
        box-shadow:
            0 6px 22px rgba(0, 0, 0, 0.06),
            0 0 0 1px rgba(26, 46, 31, 0.05);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
    }
    .kn-card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 18px 38px rgba(0, 0, 0, 0.12),
            0 0 0 1px rgba(184, 145, 30, 0.20);
    }

    /* Decorative corner accent */
    .kn-card::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 60px;
        height: 60px;
        background: linear-gradient(225deg, rgba(184, 145, 30, 0.15) 0%, transparent 70%);
        pointer-events: none;
    }

    /* Card Icon */
    .kn-card__icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: linear-gradient(135deg, var(--c-leaf) 0%, var(--c-leaf-deep) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.2rem;
        box-shadow: 0 6px 16px rgba(44, 85, 48, 0.25);
        position: relative;
    }
    .kn-card__icon svg {
        width: 26px;
        height: 26px;
        color: var(--c-gold-soft);
    }
    /* Variant: gold icon */
    .kn-card--phone .kn-card__icon {
        background: linear-gradient(135deg, var(--c-gold) 0%, #8a6b14 100%);
        box-shadow: 0 6px 16px rgba(184, 145, 30, 0.25);
    }
    .kn-card--phone .kn-card__icon svg {
        color: var(--c-cream);
    }
    /* Variant: ungu icon for email */
    .kn-card--email .kn-card__icon {
        background: linear-gradient(135deg, #7256ff 0%, #4830d8 100%);
        box-shadow: 0 6px 16px rgba(90, 64, 240, 0.25);
    }
    .kn-card--email .kn-card__icon svg {
        color: white;
    }

    .kn-card__label {
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-fade);
        margin-bottom: 0.4rem;
    }
    .kn-card__title {
        font-family: var(--f-display);
        font-size: 1.6rem;
        font-weight: 600;
        line-height: 1.2;
        color: var(--c-ink);
        margin: 0 0 1rem;
    }
    .kn-card__content {
        font-family: var(--f-sans);
        font-size: 0.95rem;
        line-height: 1.7;
        color: var(--c-ink-soft);
        margin-bottom: 1.2rem;
        flex: 1;
    }
    .kn-card__content strong {
        color: var(--c-ink);
        font-weight: 700;
    }
    .kn-card__content .country {
        display: inline-block;
        margin-top: 0.6rem;
        padding: 0.3rem 0.7rem;
        background: var(--c-bg-soft);
        color: var(--c-leaf);
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        border-radius: 4px;
        border: 1px solid rgba(44, 85, 48, 0.2);
    }
    .kn-card__phones {
        list-style: none;
        padding: 0;
        margin: 0 0 1.2rem;
    }
    .kn-card__phones li {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 0;
        font-family: var(--f-display);
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--c-ink);
        border-bottom: 1px dashed var(--c-line);
    }
    .kn-card__phones li:last-child {
        border-bottom: none;
    }
    .kn-card__phones li::before {
        content: "›";
        color: var(--c-gold);
        font-weight: 700;
        font-size: 1.2rem;
    }
    /* Subgroup untuk Telp + Fax dalam 1 card */
    .kn-card__subgroup {
        margin-bottom: 1rem;
    }
    .kn-card__subgroup:last-of-type {
        margin-bottom: 1.2rem;
    }
    .kn-card__sublabel {
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin-bottom: 0.4rem;
        padding-bottom: 0.3rem;
        border-bottom: 1px solid rgba(184, 145, 30, 0.25);
    }
    .kn-card__subgroup .kn-card__phones {
        margin-bottom: 0;
    }
    .kn-card__subgroup .kn-card__phones li {
        font-size: 1rem;
        padding: 0.3rem 0;
    }
    .kn-card__emails {
        list-style: none;
        padding: 0;
        margin: 0 0 1.2rem;
    }
    .kn-card__emails li {
        padding: 0.4rem 0;
        border-bottom: 1px dashed var(--c-line);
    }
    .kn-card__emails li:last-child { border-bottom: none; }
    .kn-card__emails a {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-family: var(--f-sans);
        font-size: 0.95rem;
        font-weight: 600;
        color: #5a40f0;
        transition: color 0.2s ease;
        word-break: break-all;
    }
    .kn-card__emails a:hover {
        color: var(--c-leaf);
        text-decoration: underline;
    }

    /* Action button at bottom of card */
    .kn-card__action {
        margin-top: auto;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.2rem;
        background: var(--c-bg-soft);
        color: var(--c-ink);
        border: 1px solid var(--c-line);
        border-radius: 10px;
        font-family: var(--f-sans);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        text-decoration: none !important;
        transition: all 0.3s ease;
    }
    .kn-card__action:hover {
        background: var(--c-leaf);
        color: white !important;
        border-color: var(--c-leaf);
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(44, 85, 48, 0.25);
    }
    .kn-card__action svg {
        width: 14px;
        height: 14px;
    }

    /* ============================================================
       4. MAP SECTION
       ============================================================ */
    .kn-map-section {
        background: var(--c-bg-soft);
        padding: clamp(2rem, 5vh, 3.5rem) 0;
    }
    .kn-map-section__head {
        text-align: center;
        margin-bottom: clamp(1.5rem, 3vh, 2.2rem);
    }

    .kn-map-wrap {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
    }
    .kn-map {
        width: 100%;
        height: 520px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow:
            0 14px 36px rgba(0, 0, 0, 0.12),
            0 0 0 1px rgba(26, 46, 31, 0.08);
        position: relative;
        z-index: 0;
    }

    /* Custom marker (sama dengan cabang) */
    .kn-marker {
        background: linear-gradient(180deg, #3a7140 0%, #2C5530 100%);
        width: 42px;
        height: 42px;
        border-radius: 50% 50% 50% 0;
        transform: rotate(-45deg);
        border: 3px solid white;
        box-shadow: 0 4px 12px rgba(44, 85, 48, 0.5);
        display: flex !important;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }
    .kn-marker::before {
        content: "";
        width: 16px;
        height: 16px;
        background: var(--c-gold);
        border-radius: 50%;
        transform: rotate(45deg);
    }
    .kn-marker:hover {
        transform: rotate(-45deg) scale(1.18);
    }

    /* Reset View Button (top-right) */
    .kn-map-reset {
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
    .kn-map-reset:hover {
        background: var(--c-leaf);
        color: white;
        transform: translateY(-2px) rotate(-45deg);
        box-shadow:
            0 8px 20px rgba(44, 85, 48, 0.35),
            0 0 0 1px rgba(184, 145, 30, 0.3);
    }
    .kn-map-reset svg {
        width: 22px;
        height: 22px;
        stroke-width: 2.2;
    }

    /* Map popup styling */
    .leaflet-popup-content-wrapper {
        border-radius: 12px;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.18);
    }
    .leaflet-popup-content {
        margin: 1rem 1.2rem 1.1rem;
    }
    .kn-popup__title {
        font-family: var(--f-display);
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--c-ink);
        margin: 0 0 0.4rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }
    .kn-popup__title svg {
        width: 16px;
        height: 16px;
        color: var(--c-leaf);
    }
    .kn-popup__body {
        font-family: var(--f-sans);
        font-size: 0.85rem;
        line-height: 1.5;
        color: var(--c-ink-soft);
        margin: 0 0 0.7rem;
    }
    .kn-popup__btn {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        background: #5a40f0;
        color: white !important;
        padding: 0.45rem 0.9rem;
        border-radius: 6px;
        font-family: var(--f-sans);
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        text-decoration: none !important;
        transition: all 0.3s ease;
    }
    .kn-popup__btn:hover {
        background: #4a30e0;
        transform: translateY(-1px);
        color: white !important;
    }
    .kn-popup__btn svg {
        width: 12px;
        height: 12px;
    }

    .kn-map-hint {
        text-align: center;
        margin-top: 0.8rem;
        font-family: var(--f-mono);
        font-size: 0.7rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-fade);
    }

    @media (max-width: 768px) {
        .kn-map { height: 400px; }
    }

    /* ============================================================
       5. CTA BACK
       ============================================================ */
    .kn-cta {
        background: var(--c-bg);
        padding: clamp(2rem, 5vh, 3.5rem) 0;
    }
    .kn-cta__inner {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }
    .kn-cta__btn {
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        padding: 0.95rem 2rem;
        font-family: var(--f-sans);
        font-size: 0.9rem;
        font-weight: 800;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        text-decoration: none !important;
        border-radius: 12px;
        transition: all 0.35s cubic-bezier(0.34, 1.4, 0.6, 1);
    }
    .kn-cta__btn--primary {
        background: linear-gradient(180deg, #7256ff 0%, #5a40f0 55%, #4830d8 100%);
        color: #fff !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.4),
            inset 0 -1px 0 rgba(0, 0, 0, 0.15),
            0 6px 14px rgba(90, 64, 240, 0.35),
            0 14px 28px rgba(90, 64, 240, 0.22);
    }
    .kn-cta__btn--primary:hover {
        transform: translateY(-4px);
        background: linear-gradient(180deg, #8c72ff 0%, #6b51f0 55%, #5a40e0 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.5),
            inset 0 -1px 0 rgba(0, 0, 0, 0.18),
            0 12px 22px rgba(90, 64, 240, 0.45),
            0 22px 40px rgba(90, 64, 240, 0.28);
        color: #fff !important;
    }
    .kn-cta__btn--secondary {
        background: white;
        color: var(--c-ink) !important;
        border: 1px solid var(--c-line);
    }
    .kn-cta__btn--secondary:hover {
        transform: translateY(-4px);
        background: var(--c-leaf);
        color: white !important;
        border-color: var(--c-leaf);
        box-shadow: 0 12px 22px rgba(44, 85, 48, 0.3);
    }
    .kn-cta__btn svg {
        width: 18px;
        height: 18px;
        transition: transform 0.4s ease;
    }
    .kn-cta__btn--primary:hover svg {
        transform: translateX(6px) scale(1.18);
    }
    .kn-cta__btn--secondary:hover svg {
        transform: translateX(-6px) scale(1.18);
    }
</style>
@endpush

@section('content')
@php
    // Koordinat GAPKINDO Pusat Jakarta
    $latGapkindo = -6.1741661609779435;
    $lngGapkindo = 106.8111734503309;
    $alamatLengkap = 'Jl. Cideng Barat No.62-A, RT.14/RW.2, Cideng, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10150';
    $emailPusat = 'gapkindo.pusat@gmail.com';
    $googleMapsUrl = 'https://www.google.com/maps/dir/?api=1&destination=' . $latGapkindo . ',' . $lngGapkindo;
@endphp

<div class="gpk-kontak">

    {{-- =====================================================
         1. BANNER HEADER
         ===================================================== --}}
    <section class="kn-hero">
        <div class="gpk-container">
            <div class="kn-hero__inner">
                <div class="kn-hero__eyebrow">Hubungi Kami</div>
                <h1 class="kn-hero__title">
                    Kontak <em>GAPKINDO</em>
                </h1>
                <p class="kn-hero__lead">
                    Pusat informasi & layanan GAPKINDO siap membantu pertanyaan Anda terkait keanggotaan,
                    regulasi, dan industri karet alam Indonesia.
                </p>
            </div>
        </div>
    </section>


    {{-- =====================================================
         2. STATS BAR
         ===================================================== --}}
    <section class="kn-stats">
        <div class="gpk-container">
            <div class="kn-stats__grid">
                <div class="kn-stat">
                    <div class="kn-stat__num">8</div>
                    <div class="kn-stat__label">Cabang</div>
                </div>
                <div class="kn-stat">
                    <div class="kn-stat__num">16</div>
                    <div class="kn-stat__label">Provinsi</div>
                </div>
                <div class="kn-stat">
                    <div class="kn-stat__num">100+</div>
                    <div class="kn-stat__label">Negara Ekspor</div>
                </div>
            </div>
        </div>
    </section>


    {{-- =====================================================
         3. CONTACT CARDS
         ===================================================== --}}
    <section class="kn-cards">
        <div class="gpk-container">
            <div class="kn-cards__head">
                <div class="kn-section__num">— 01 / Pusat GAPKINDO</div>
                <span class="kn-section__eyebrow">Informasi Kontak</span>
                <h2 class="kn-section__title">
                    Mari <em>berkomunikasi</em> dengan kami
                </h2>
            </div>

            <div class="kn-cards__grid">

                {{-- CARD 1: ALAMAT --}}
                <div class="kn-card kn-card--alamat">
                    <div class="kn-card__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <div class="kn-card__label">{{ __('global.Alamat') }}</div>
                    <h3 class="kn-card__title">Sekretariat GAPKINDO</h3>
                    <p class="kn-card__content">
                        Jl. Cideng Barat No.62-A, RT.14/RW.2, Cideng,
                        Kecamatan Gambir, Kota Jakarta Pusat,
                        Daerah Khusus Ibukota Jakarta 10150
                        <span class="country">Indonesia</span>
                    </p>
                    <a href="{{ $googleMapsUrl }}" target="_blank" rel="noopener" class="kn-card__action">
                        <span>Buka di Maps</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7"/>
                            <path d="M7 7h10v10"/>
                        </svg>
                    </a>
                </div>

                {{-- CARD 2: TELEPON + FAX --}}
                <div class="kn-card kn-card--phone">
                    <div class="kn-card__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </div>
                    <div class="kn-card__label">{{ __('global.PusatPanggilan') }}</div>
                    <h3 class="kn-card__title">Telepon &amp; Fax</h3>

                    <div class="kn-card__subgroup">
                        <div class="kn-card__sublabel">📞 Telepon</div>
                        <ul class="kn-card__phones">
                            <li>(62-21) 3501510</li>
                            <li>(62-21) 3501511</li>
                            <li>(62-21) 3846813</li>
                        </ul>
                    </div>

                    <div class="kn-card__subgroup">
                        <div class="kn-card__sublabel">📠 Fax</div>
                        <ul class="kn-card__phones">
                            <li>(62-21) 3846811</li>
                            <li>(62-21) 3500368</li>
                        </ul>
                    </div>

                    <a href="tel:+62213501510" class="kn-card__action">
                        <span>Telepon Sekarang</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </a>
                </div>

                {{-- CARD 3: EMAIL --}}
                <div class="kn-card kn-card--email">
                    <div class="kn-card__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </div>
                    <div class="kn-card__label">{{ __('global.DukunganElektronik') }}</div>
                    <h3 class="kn-card__title">Email</h3>
                    <p class="kn-card__content">
                        Jangan ragu menulis email kepada kami untuk pertanyaan keanggotaan,
                        regulasi, atau informasi industri.
                    </p>
                    <ul class="kn-card__emails">
                        <li>
                            <a href="mailto:{{ $emailPusat }}">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                                {{ $emailPusat }}
                            </a>
                        </li>
                    </ul>
                    <a href="mailto:{{ $emailPusat }}" class="kn-card__action">
                        <span>Kirim Email</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"/>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         4. MAP SECTION
         ===================================================== --}}
    <section class="kn-map-section">
        <div class="gpk-container">
            <div class="kn-map-section__head">
                <div class="kn-section__num">— 02 / Peta Lokasi</div>
                <span class="kn-section__eyebrow">Cideng, Jakarta Pusat</span>
                <h2 class="kn-section__title">
                    Temukan kami di <em>Jakarta Pusat</em>
                </h2>
            </div>

            <div class="kn-map-wrap">
                <div id="map" class="kn-map"></div>
                <button type="button" class="kn-map-reset" id="kontakMapReset" aria-label="Reset tampilan peta">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polyline points="23 4 23 10 17 10"/>
                        <polyline points="1 20 1 14 7 14"/>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>
                    </svg>
                </button>
            </div>
            <div class="kn-map-hint">🗺️ Klik pin untuk detail • Scroll untuk zoom • Klik tombol ↻ untuk reset</div>
        </div>
    </section>


    {{-- =====================================================
         5. CTA BACK
         ===================================================== --}}
    <section class="kn-cta">
        <div class="gpk-container">
            <div class="kn-cta__inner">
                <a href="{{ url('/') }}" class="kn-cta__btn kn-cta__btn--secondary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"/>
                        <path d="M11 18l-6-6 6-6"/>
                    </svg>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('cabang') ?? url('/cabang') }}" class="kn-cta__btn kn-cta__btn--primary">
                    <span>Lihat Semua Cabang</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"/>
                        <path d="M13 6l6 6-6 6"/>
                    </svg>
                </a>
            </div>
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
document.addEventListener("DOMContentLoaded", function() {
    'use strict';

    const mapEl = document.getElementById('map');
    if (!mapEl) return;

    const lat = {{ $latGapkindo }};
    const lng = {{ $lngGapkindo }};
    const googleMapsUrl = {!! json_encode($googleMapsUrl) !!};

    // Initialize map
    const map = L.map('map', {
        center: [lat, lng],
        zoom: 16,
        zoomControl: true,
        scrollWheelZoom: true,
    });

    // CARTO Light tile (modern, clean)
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    }).addTo(map);

    // Custom marker
    const customIcon = L.divIcon({
        className: 'kn-marker-wrap',
        html: '<div class="kn-marker"></div>',
        iconSize: [42, 42],
        iconAnchor: [21, 42],
        popupAnchor: [0, -40],
    });

    // Marker dengan popup
    const popupHTML = `
        <h4 class="kn-popup__title">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                <circle cx="12" cy="10" r="3"/>
            </svg>
            Sekretariat GAPKINDO
        </h4>
        <p class="kn-popup__body">
            Jl. Cideng Barat No.62-A, RT.14/RW.2,<br>
            Cideng, Kecamatan Gambir,<br>
            Jakarta Pusat 10150
        </p>
        <a href="${googleMapsUrl}" target="_blank" rel="noopener" class="kn-popup__btn">
            Buka di Google Maps
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M7 17L17 7"/>
                <path d="M7 7h10v10"/>
            </svg>
        </a>
    `;

    const marker = L.marker([lat, lng], { icon: customIcon })
        .addTo(map)
        .bindPopup(popupHTML, { closeButton: true, autoClose: false })
        .openPopup();

    // Reset function
    function resetMapView() {
        map.setView([lat, lng], 16, { animate: true, duration: 0.6 });
        marker.openPopup();
    }

    // Reset button handler
    const resetBtn = document.getElementById('kontakMapReset');
    if (resetBtn) {
        resetBtn.addEventListener('click', function(e) {
            e.preventDefault();
            resetMapView();
        });
    }
});
</script>
@endpush
