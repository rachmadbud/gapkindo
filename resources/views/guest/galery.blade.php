{{--
    ============================================================
    GALERI GAPKINDO — Modern Photo Gallery
    Struktur:
    1. Banner header (navy + checkerboard, sama dengan berita/cabang/sejarah)
    2. Stats bar (jumlah galeri, halaman, update terakhir)
    3. Grid foto 4-kolom dengan hover overlay
    4. Pagination buttons (client-side, 8 per halaman)
    5. CTA back to home
    ============================================================
--}}

@extends('guest.layouts.master')

@section('title', 'Galeri | GAPKINDO')

@push('styles')
<style>
    /* ============================================================
       GALERI PAGE — Scoped Styles
       ============================================================ */
    :root {
        --c-bg: #FAF7F0;
        --c-bg-soft: #F4EFE3;
        --c-ink: #1A2E1F;
        --c-ink-soft: #4a5b4f;
        --c-leaf: #2C5530;
        --c-gold: #B8911E;
        --c-gold-soft: #D4B355;
        --c-cream: #FFFBF2;
        --c-line: rgba(26, 46, 31, 0.10);
        --c-fade: #6b7770;

        --f-display: 'Fraunces', Georgia, serif;
        --f-sans: 'Manrope', 'Open Sans', sans-serif;
        --f-mono: 'JetBrains Mono', monospace;
    }

    .gpk-galery-page, .gpk-galery-page *, .gpk-galery-page *::before, .gpk-galery-page *::after {
        box-sizing: border-box;
    }
    .gpk-galery-page {
        background: var(--c-bg);
        color: var(--c-ink);
        font-family: var(--f-sans);
        line-height: 1.6;
    }
    .gpk-galery-page a { color: inherit; text-decoration: none; }

    .gpk-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 16px;
    }
    /* Body sections: full-width 16px (match index) */
    .gpk-galery-page .gal-stats .gpk-container,
    .gpk-galery-page .gal-grid-section .gpk-container,
    .gpk-galery-page .gal-cta .gpk-container {
        max-width: 100%;
        padding-left: 16px;
        padding-right: 16px;
    }

    /* ============================================================
       1. PAGE HEADER (Banner — same pattern)
       ============================================================ */
    .gal-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1a237e 100%);
        color: var(--c-cream);
        padding: clamp(1.2rem, 3vh, 2.2rem) 0;
        position: relative;
        overflow: hidden;
    }
    .gal-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3Crect x='16' y='16' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3C/svg%3E");
        pointer-events: none;
    }
    .gal-hero__inner {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 900px;
        margin: 0 auto;
    }
    .gal-hero__eyebrow {
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
    .gal-hero__eyebrow::before,
    .gal-hero__eyebrow::after {
        content: "";
        width: 36px;
        height: 1px;
        background: var(--c-gold-soft);
    }
    .gal-hero__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-cream);
        margin: 0 0 0.7rem;
    }
    .gal-hero__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold-soft);
    }
    .gal-hero__lead {
        font-size: clamp(0.95rem, 1.4vw, 1.1rem);
        line-height: 1.6;
        color: rgba(255, 251, 242, 0.78);
        max-width: 720px;
        margin: 0 auto;
    }

    /* ============================================================
       2. STATS BAR
       ============================================================ */
    .gal-stats {
        background: var(--c-bg);
        padding: clamp(2rem, 4vh, 3rem) 0 clamp(1rem, 2vh, 1.5rem);
    }
    .gal-stats__grid {
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
    .gal-stat__num {
        font-family: var(--f-display);
        font-size: clamp(2.2rem, 4.5vw, 3.5rem);
        font-weight: 500;
        line-height: 1;
        color: var(--c-leaf);
        margin-bottom: 0.3rem;
    }
    .gal-stat__label {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-fade);
    }
    @media (max-width: 720px) {
        .gal-stats__grid { grid-template-columns: 1fr; gap: 1rem; }
    }

    /* ============================================================
       3. GRID SECTION
       ============================================================ */
    .gal-grid-section {
        background: var(--c-bg);
        padding: clamp(1.5rem, 4vh, 3rem) 0 clamp(2rem, 5vh, 3.5rem);
    }
    .gal-grid-section__head {
        text-align: center;
        margin-bottom: clamp(1.5rem, 3vh, 2.2rem);
    }
    .gal-section__num {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        color: var(--c-fade);
        margin-bottom: 0.6rem;
        display: block;
    }
    .gal-section__eyebrow {
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
    .gal-section__eyebrow::before {
        content: "";
        width: 32px;
        height: 1px;
        background: var(--c-gold);
    }
    .gal-section__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-ink);
        max-width: 720px;
        margin: 0 auto;
    }
    .gal-section__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold);
    }

    /* GRID — photo-dominant */
    .gal-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.2rem;
    }
    @media (min-width: 600px)  { .gal-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 980px)  { .gal-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (min-width: 1280px) { .gal-grid { grid-template-columns: repeat(4, 1fr); } }

    /* GALLERY CARD */
    .gal-card {
        position: relative;
        background: white;
        border-radius: 14px;
        overflow: hidden;
        box-shadow:
            0 6px 18px rgba(0, 0, 0, 0.06),
            0 0 0 1px rgba(26, 46, 31, 0.05);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        text-decoration: none !important;
        color: inherit;
        display: block;
    }
    .gal-card.is-hidden {
        display: none;
    }
    .gal-card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 20px 42px rgba(0, 0, 0, 0.18),
            0 0 0 1px rgba(184, 145, 30, 0.25);
    }

    .gal-card__photo {
        position: relative;
        aspect-ratio: 4 / 3;
        overflow: hidden;
        background: var(--c-bg-soft);
    }
    .gal-card__photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.2, 0.8, 0.3, 1);
    }
    .gal-card:hover .gal-card__photo img {
        transform: scale(1.1);
    }

    /* DARK OVERLAY on hover */
    .gal-card__overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg,
            transparent 0%,
            transparent 40%,
            rgba(0, 0, 0, 0.55) 80%,
            rgba(0, 0, 0, 0.85) 100%);
        opacity: 1;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    /* TITLE on photo (always visible, white on gradient) */
    .gal-card__caption {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 1.2rem 1.3rem 1.3rem;
        z-index: 2;
        color: white;
    }
    .gal-card__meta {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--c-gold-soft);
        margin-bottom: 0.5rem;
        background: rgba(0, 0, 0, 0.4);
        padding: 0.3rem 0.6rem;
        border-radius: 4px;
        backdrop-filter: blur(6px);
    }
    .gal-card__meta svg {
        width: 12px;
        height: 12px;
        color: var(--c-gold-soft);
        flex-shrink: 0;
    }
    .gal-card__title {
        font-family: var(--f-display);
        font-size: 1.15rem;
        font-weight: 600;
        line-height: 1.25;
        color: white;
        margin: 0 0 0.4rem;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        /* clamp to 2 lines */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .gal-card__at {
        font-family: var(--f-sans);
        font-size: 0.82rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.85);
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.4);
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }
    .gal-card__at svg {
        width: 14px;
        height: 14px;
        color: var(--c-gold-soft);
        flex-shrink: 0;
    }

    /* "View Gallery" badge — appears on hover, top-right */
    .gal-card__view-badge {
        position: absolute;
        top: 14px;
        right: 14px;
        background: rgba(255, 255, 255, 0.95);
        color: var(--c-leaf);
        font-family: var(--f-sans);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        padding: 0.4rem 0.7rem;
        border-radius: 6px;
        z-index: 3;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        opacity: 0;
        transform: translateY(-6px);
        transition: opacity 0.35s ease, transform 0.35s ease;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }
    .gal-card:hover .gal-card__view-badge {
        opacity: 1;
        transform: translateY(0);
    }
    .gal-card__view-badge svg {
        width: 14px;
        height: 14px;
    }

    /* Empty state */
    .gal-empty {
        text-align: center;
        padding: 4rem 1rem;
        color: var(--c-fade);
        font-family: var(--f-sans);
        font-size: 1rem;
    }
    .gal-empty svg {
        width: 60px;
        height: 60px;
        opacity: 0.4;
        margin-bottom: 1rem;
    }

    /* ============================================================
       4. PAGINATION (same as berita)
       ============================================================ */
    .gal-pagination {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-top: clamp(2rem, 4vh, 2.8rem);
    }
    .gal-pagination__info {
        flex-basis: 100%;
        text-align: center;
        font-family: var(--f-mono);
        font-size: 0.74rem;
        font-weight: 500;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--c-fade);
        margin-bottom: 1rem;
    }
    .gal-pagination__info strong {
        color: var(--c-leaf);
        font-weight: 700;
    }

    .gal-pg-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        min-width: 42px;
        height: 42px;
        padding: 0 0.9rem;
        background: white;
        border: 1px solid var(--c-line);
        border-radius: 8px;
        font-family: var(--f-sans);
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--c-ink);
        cursor: pointer;
        transition: all 0.25s ease;
        outline: none;
    }
    .gal-pg-btn:hover:not(:disabled):not(.is-active) {
        background: var(--c-leaf);
        color: white;
        border-color: var(--c-leaf);
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(44, 85, 48, 0.25);
    }
    .gal-pg-btn:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }
    .gal-pg-btn.is-active {
        background: linear-gradient(180deg, #7256ff 0%, #5a40f0 55%, #4830d8 100%);
        color: white;
        border-color: #5a40f0;
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.3),
            0 6px 14px rgba(90, 64, 240, 0.35);
        cursor: default;
    }
    .gal-pg-btn--arrow {
        font-weight: 700;
    }
    .gal-pg-btn svg {
        width: 16px;
        height: 16px;
    }
    .gal-pg-ellipsis {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 32px;
        height: 42px;
        color: var(--c-fade);
        font-family: var(--f-sans);
        font-weight: 600;
    }

    /* ============================================================
       5. CTA BACK
       ============================================================ */
    .gal-cta {
        background: var(--c-bg-soft);
        padding: clamp(2rem, 5vh, 3.5rem) 0;
        text-align: center;
    }
    .gal-cta__btn {
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
    .gal-cta__btn:hover {
        transform: translateY(-4px);
        background: linear-gradient(180deg, #8c72ff 0%, #6b51f0 55%, #5a40e0 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.5),
            inset 0 -1px 0 rgba(0, 0, 0, 0.18),
            0 12px 22px rgba(90, 64, 240, 0.45),
            0 22px 40px rgba(90, 64, 240, 0.28);
        color: #fff !important;
    }
    .gal-cta__btn svg {
        width: 20px;
        height: 20px;
        transition: transform 0.4s ease;
    }
    .gal-cta__btn:hover svg {
        transform: translateX(6px) scale(1.18);
    }
</style>
@endpush

@section('content')
@php
    $totalGaleri = count($data ?? []);
    $latestDate = $totalGaleri > 0
        ? \Carbon\Carbon::parse($data[0]->created_at)->locale('id')->isoFormat('D MMM Y')
        : '-';
    $perPage = 8; // 8 galeri per halaman (4 col × 2 row = sempurna)
    $totalPages = max(1, ceil($totalGaleri / $perPage));
@endphp

<div class="gpk-galery-page">

    {{-- =====================================================
         1. BANNER HEADER
         ===================================================== --}}
    <section class="gal-hero">
        <div class="gpk-container">
            <div class="gal-hero__inner">
                <div class="gal-hero__eyebrow">Dokumentasi Kegiatan</div>
                <h1 class="gal-hero__title">
                    Galeri <em>GAPKINDO</em>
                </h1>
                <p class="gal-hero__lead">
                    Dokumentasi kongres, kegiatan, pertemuan, dan momen penting GAPKINDO bersama
                    anggota, pemerintah, dan mitra industri karet alam Indonesia.
                </p>
            </div>
        </div>
    </section>

    @include('guest.partials.ticker')


    {{-- =====================================================
         2. STATS BAR
         ===================================================== --}}
    <section class="gal-stats">
        <div class="gpk-container">
            <div class="gal-stats__grid">
                <div class="gal-stat">
                    <div class="gal-stat__num">{{ $totalGaleri }}</div>
                    <div class="gal-stat__label">Total Galeri</div>
                </div>
                <div class="gal-stat">
                    <div class="gal-stat__num">{{ $totalPages }}</div>
                    <div class="gal-stat__label">Halaman</div>
                </div>
                <div class="gal-stat">
                    <div class="gal-stat__num" style="font-size: clamp(1.2rem, 2.5vw, 1.8rem); padding-top: 0.5rem;">{{ $latestDate }}</div>
                    <div class="gal-stat__label">Update Terakhir</div>
                </div>
            </div>
        </div>
    </section>


    {{-- =====================================================
         3. GRID GALERI
         ===================================================== --}}
    <section class="gal-grid-section">
        <div class="gpk-container">
            <div class="gal-grid-section__head">
                <div class="gal-section__num">— Dokumentasi</div>
                <span class="gal-section__eyebrow">Photo Gallery</span>
                <h2 class="gal-section__title">
                    Momen <em>terbaik</em> GAPKINDO
                </h2>
            </div>

            @if ($totalGaleri === 0)
                <div class="gal-empty">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                    <p>Belum ada galeri yang dipublikasikan.</p>
                </div>
            @else
                <div class="gal-grid" id="galGrid">
                    @foreach ($data as $idx => $item)
                        @php
                            $createdAt = \Carbon\Carbon::parse($item->created_at);
                            $formattedDate = $createdAt->locale('id')->isoFormat('D MMM Y');
                            $pageNum = floor($idx / $perPage) + 1;
                        @endphp
                        <a href="{{ route('detailGaleri', app(\App\Helpers\Helper::class)->enkrip($item->id)) }}"
                           class="gal-card {{ $idx >= $perPage ? 'is-hidden' : '' }}"
                           data-page="{{ $pageNum }}"
                           title="{{ $item->title }}">
                            <div class="gal-card__photo">
                                <img src="{{ asset('guest/assets/img/galeri/' . $item->image) }}"
                                     alt="{{ $item->title }}"
                                     loading="lazy"
                                     onerror="this.style.opacity='0.3';this.parentElement.style.background='linear-gradient(135deg,#F4EFE3,#D4B355)';">
                                <div class="gal-card__overlay"></div>
                                <span class="gal-card__view-badge">
                                    Lihat
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M13 6l6 6-6 6"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="gal-card__caption">
                                <div class="gal-card__meta">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                        <line x1="16" y1="2" x2="16" y2="6"/>
                                        <line x1="8" y1="2" x2="8" y2="6"/>
                                        <line x1="3" y1="10" x2="21" y2="10"/>
                                    </svg>
                                    {{ $formattedDate }}
                                </div>
                                <h3 class="gal-card__title">{{ \Illuminate\Support\Str::limit($item->title, 80) }}</h3>
                                @if (!empty($item->at))
                                    <div class="gal-card__at">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                            <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                        {{ $item->at }}
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- PAGINATION --}}
                <div class="gal-pagination" id="galPagination" data-total-pages="{{ $totalPages }}">
                    <div class="gal-pagination__info">
                        Menampilkan <strong><span id="galPgFrom">1</span>–<span id="galPgTo">{{ min($perPage, $totalGaleri) }}</span></strong>
                        dari <strong>{{ $totalGaleri }}</strong> galeri
                        @if($totalPages > 1) • Halaman <strong><span id="galPgCurr">1</span></strong> dari <strong>{{ $totalPages }}</strong>@endif
                    </div>
                    {{-- Buttons di-generate via JS --}}
                </div>
            @endif
        </div>
    </section>


    {{-- =====================================================
         4. CTA BACK
         ===================================================== --}}
    <section class="gal-cta">
        <div class="gpk-container">
            <a href="{{ url('/') }}" class="gal-cta__btn">
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
<script>
(function() {
    'use strict';

    const grid = document.getElementById('galGrid');
    const pagWrap = document.getElementById('galPagination');
    if (!grid || !pagWrap) return;

    const totalPages = parseInt(pagWrap.dataset.totalPages, 10) || 1;
    const perPage = {{ $perPage }};
    const totalItems = {{ $totalGaleri }};
    let currentPage = 1;

    const pgFrom = document.getElementById('galPgFrom');
    const pgTo   = document.getElementById('galPgTo');
    const pgCurr = document.getElementById('galPgCurr');

    const arrowLeft = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>';
    const arrowRight = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';

    function buildPagination(active) {
        const oldButtons = pagWrap.querySelectorAll('.gal-pg-btn, .gal-pg-ellipsis');
        oldButtons.forEach(b => b.remove());

        const container = document.createDocumentFragment();

        // Prev
        const prev = document.createElement('button');
        prev.type = 'button';
        prev.className = 'gal-pg-btn gal-pg-btn--arrow';
        prev.disabled = active === 1;
        prev.innerHTML = arrowLeft + ' <span>Prev</span>';
        prev.addEventListener('click', () => goPage(active - 1));
        container.appendChild(prev);

        // Page numbers with smart ellipsis
        const pages = computePages(active, totalPages);
        pages.forEach(p => {
            if (p === '...') {
                const span = document.createElement('span');
                span.className = 'gal-pg-ellipsis';
                span.textContent = '…';
                container.appendChild(span);
            } else {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'gal-pg-btn' + (p === active ? ' is-active' : '');
                btn.textContent = p;
                btn.setAttribute('aria-label', 'Halaman ' + p);
                if (p === active) btn.setAttribute('aria-current', 'page');
                btn.addEventListener('click', () => goPage(p));
                container.appendChild(btn);
            }
        });

        // Next
        const next = document.createElement('button');
        next.type = 'button';
        next.className = 'gal-pg-btn gal-pg-btn--arrow';
        next.disabled = active === totalPages;
        next.innerHTML = '<span>Next</span> ' + arrowRight;
        next.addEventListener('click', () => goPage(active + 1));
        container.appendChild(next);

        pagWrap.appendChild(container);
    }

    function computePages(active, total) {
        const result = [];
        if (total <= 7) {
            for (let i = 1; i <= total; i++) result.push(i);
            return result;
        }
        result.push(1);
        if (active > 3) result.push('...');
        const start = Math.max(2, active - 1);
        const end   = Math.min(total - 1, active + 1);
        for (let i = start; i <= end; i++) result.push(i);
        if (active < total - 2) result.push('...');
        result.push(total);
        return result;
    }

    function goPage(page) {
        if (page < 1 || page > totalPages || page === currentPage) return;
        currentPage = page;

        const cards = grid.querySelectorAll('.gal-card');
        cards.forEach((card) => {
            const cardPage = parseInt(card.dataset.page, 10);
            if (cardPage === page) {
                card.classList.remove('is-hidden');
            } else {
                card.classList.add('is-hidden');
            }
        });

        const from = totalItems === 0 ? 0 : (page - 1) * perPage + 1;
        const to   = Math.min(page * perPage, totalItems);
        if (pgFrom) pgFrom.textContent = from;
        if (pgTo)   pgTo.textContent   = to;
        if (pgCurr) pgCurr.textContent = page;

        buildPagination(page);

        const headTarget = document.querySelector('.gal-grid-section__head');
        if (headTarget) headTarget.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    buildPagination(1);
})();
</script>
@endpush
