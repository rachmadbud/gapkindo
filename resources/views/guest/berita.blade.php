{{--
    ============================================================
    BERITA GAPKINDO — Modern News List
    Struktur:
    1. Banner header (navy + checkerboard, sama dengan cabang/sejarah)
    2. Stats bar (jumlah berita, terbaru, dll)
    3. Grid berita 3-kolom dengan card design modern
    4. Pagination buttons (client-side JavaScript)
    5. CTA back to home
    ============================================================
--}}

@extends('guest.layouts.master')

@section('title', 'Berita | GAPKINDO')

@push('styles')
<style>
    /* ============================================================
       BERITA PAGE — Scoped Styles
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

    .gpk-news-page, .gpk-news-page *, .gpk-news-page *::before, .gpk-news-page *::after {
        box-sizing: border-box;
    }
    .gpk-news-page {
        background: var(--c-bg);
        color: var(--c-ink);
        font-family: var(--f-sans);
        line-height: 1.6;
    }
    .gpk-news-page a { color: inherit; text-decoration: none; }

    .gpk-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 16px;
    }
    /* Body sections: full-width 16px (match index) */
    .gpk-news-page .news-stats .gpk-container,
    .gpk-news-page .news-grid-section .gpk-container,
    .gpk-news-page .news-cta .gpk-container {
        max-width: 100%;
        padding-left: 16px;
        padding-right: 16px;
    }

    /* ============================================================
       1. PAGE HEADER (Banner — same as cabang/sejarah)
       ============================================================ */
    .news-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1a237e 100%);
        color: var(--c-cream);
        padding: clamp(1.2rem, 3vh, 2.2rem) 0;
        position: relative;
        overflow: hidden;
    }
    .news-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3Crect x='16' y='16' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3C/svg%3E");
        pointer-events: none;
    }
    .news-hero__inner {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 900px;
        margin: 0 auto;
    }
    .news-hero__eyebrow {
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
    .news-hero__eyebrow::before,
    .news-hero__eyebrow::after {
        content: "";
        width: 36px;
        height: 1px;
        background: var(--c-gold-soft);
    }
    .news-hero__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-cream);
        margin: 0 0 0.7rem;
    }
    .news-hero__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold-soft);
    }
    .news-hero__lead {
        font-size: clamp(0.95rem, 1.4vw, 1.1rem);
        line-height: 1.6;
        color: rgba(255, 251, 242, 0.78);
        max-width: 720px;
        margin: 0 auto;
    }

    /* ============================================================
       2. STATS BAR
       ============================================================ */
    .news-stats {
        background: var(--c-bg);
        padding: clamp(2rem, 4vh, 3rem) 0 clamp(1rem, 2vh, 1.5rem);
    }
    .news-stats__grid {
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
    .news-stat__num {
        font-family: var(--f-display);
        font-size: clamp(2.2rem, 4.5vw, 3.5rem);
        font-weight: 500;
        line-height: 1;
        color: var(--c-leaf);
        margin-bottom: 0.3rem;
    }
    .news-stat__label {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-fade);
    }
    @media (max-width: 720px) {
        .news-stats__grid { grid-template-columns: 1fr; gap: 1rem; }
    }

    /* ============================================================
       3. GRID SECTION
       ============================================================ */
    .news-grid-section {
        background: var(--c-bg);
        padding: clamp(1.5rem, 4vh, 3rem) 0 clamp(2rem, 5vh, 3.5rem);
    }
    .news-grid-section__head {
        text-align: center;
        margin-bottom: clamp(1.5rem, 3vh, 2.2rem);
    }
    .news-section__num {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        color: var(--c-fade);
        margin-bottom: 0.6rem;
        display: block;
    }
    .news-section__eyebrow {
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
    .news-section__eyebrow::before {
        content: "";
        width: 32px;
        height: 1px;
        background: var(--c-gold);
    }
    .news-section__title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-ink);
        max-width: 720px;
        margin: 0 auto;
    }
    .news-section__title em {
        font-style: italic;
        font-weight: 400;
        color: var(--c-gold);
    }

    /* GRID */
    .news-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.4rem;
    }
    @media (min-width: 640px)  { .news-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 980px)  { .news-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (min-width: 1400px) { .news-grid { grid-template-columns: repeat(4, 1fr); } }

    /* NEWS CARD */
    .news-card {
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
    }
    .news-card.is-hidden {
        display: none;
    }
    .news-card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 18px 38px rgba(0, 0, 0, 0.12),
            0 0 0 1px rgba(184, 145, 30, 0.18);
    }
    .news-card__photo {
        position: relative;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: var(--c-bg-soft);
    }
    .news-card__photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .news-card:hover .news-card__photo img {
        transform: scale(1.07);
    }
    .news-card__badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: var(--c-leaf);
        color: white;
        font-family: var(--f-mono);
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        padding: 0.35rem 0.7rem;
        border-radius: 4px;
        z-index: 2;
    }
    .news-card__badge--new {
        background: var(--c-gold);
        box-shadow: 0 4px 10px rgba(184, 145, 30, 0.3);
    }
    .news-card__body {
        padding: 1.1rem 1.2rem 1.3rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .news-card__meta {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--c-fade);
        margin-bottom: 0.6rem;
    }
    .news-card__meta svg {
        width: 14px;
        height: 14px;
        color: var(--c-gold);
        flex-shrink: 0;
    }
    .news-card__title {
        font-family: var(--f-display);
        font-size: 1.2rem;
        font-weight: 600;
        line-height: 1.3;
        color: var(--c-ink);
        margin: 0 0 0.8rem;
        transition: color 0.3s ease;
        /* clamp to 3 lines */
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .news-card:hover .news-card__title {
        color: var(--c-leaf);
    }
    .news-card__cta {
        margin-top: auto;
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        font-family: var(--f-sans);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #5a40f0;
        transition: gap 0.3s ease;
        padding-top: 0.4rem;
        border-top: 1px solid var(--c-line);
    }
    .news-card:hover .news-card__cta {
        gap: 0.85rem;
    }
    .news-card__cta svg {
        width: 14px;
        height: 14px;
    }

    /* Empty state */
    .news-empty {
        text-align: center;
        padding: 4rem 1rem;
        color: var(--c-fade);
        font-family: var(--f-sans);
        font-size: 1rem;
    }
    .news-empty svg {
        width: 60px;
        height: 60px;
        opacity: 0.4;
        margin-bottom: 1rem;
    }

    /* ============================================================
       4. PAGINATION
       ============================================================ */
    .news-pagination {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-top: clamp(2rem, 4vh, 2.8rem);
    }
    .news-pagination__info {
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
    .news-pagination__info strong {
        color: var(--c-leaf);
        font-weight: 700;
    }

    .news-pg-btn {
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
    .news-pg-btn:hover:not(:disabled):not(.is-active) {
        background: var(--c-leaf);
        color: white;
        border-color: var(--c-leaf);
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(44, 85, 48, 0.25);
    }
    .news-pg-btn:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }
    .news-pg-btn.is-active {
        background: linear-gradient(180deg, #7256ff 0%, #5a40f0 55%, #4830d8 100%);
        color: white;
        border-color: #5a40f0;
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.3),
            0 6px 14px rgba(90, 64, 240, 0.35);
        cursor: default;
    }
    .news-pg-btn--arrow {
        font-weight: 700;
    }
    .news-pg-btn svg {
        width: 16px;
        height: 16px;
    }
    .news-pg-ellipsis {
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
    .news-cta {
        background: var(--c-bg-soft);
        padding: clamp(2rem, 5vh, 3.5rem) 0;
        text-align: center;
    }
    .news-cta__btn {
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
    .news-cta__btn:hover {
        transform: translateY(-4px);
        background: linear-gradient(180deg, #8c72ff 0%, #6b51f0 55%, #5a40e0 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.5),
            inset 0 -1px 0 rgba(0, 0, 0, 0.18),
            0 12px 22px rgba(90, 64, 240, 0.45),
            0 22px 40px rgba(90, 64, 240, 0.28);
        color: #fff !important;
    }
    .news-cta__btn svg {
        width: 20px;
        height: 20px;
        transition: transform 0.4s ease;
    }
    .news-cta__btn:hover svg {
        transform: translateX(6px) scale(1.18);
    }
</style>
@endpush

@section('content')
@php
    $totalBerita = count($dataNews ?? []);
    $latestDate = $totalBerita > 0
        ? \Carbon\Carbon::parse($dataNews[0]->created_at)->locale('id')->isoFormat('D MMM Y')
        : '-';
    $perPage = 8; // 8 berita per halaman supaya tampilan rapi
    $totalPages = max(1, ceil($totalBerita / $perPage));
@endphp

<div class="gpk-news-page">

    {{-- =====================================================
         1. BANNER HEADER (sama dengan cabang/sejarah)
         ===================================================== --}}
    <section class="news-hero">
        <div class="gpk-container">
            <div class="news-hero__inner">
                <div class="news-hero__eyebrow">Latest Update</div>
                <h1 class="news-hero__title">
                    Berita <em>GAPKINDO</em>
                </h1>
                <p class="news-hero__lead">
                    Mengikuti perkembangan harga, regulasi, dan dinamika pasar karet alam nasional maupun global
                    yang menentukan masa depan industri.
                </p>
            </div>
        </div>
    </section>

    @include('guest.partials.ticker')


    {{-- =====================================================
         2. STATS BAR
         ===================================================== --}}
    <section class="news-stats">
        <div class="gpk-container">
            <div class="news-stats__grid">
                <div class="news-stat">
                    <div class="news-stat__num">{{ $totalBerita }}</div>
                    <div class="news-stat__label">Total Berita</div>
                </div>
                <div class="news-stat">
                    <div class="news-stat__num">{{ $totalPages }}</div>
                    <div class="news-stat__label">Halaman</div>
                </div>
                <div class="news-stat">
                    <div class="news-stat__num" style="font-size: clamp(1.2rem, 2.5vw, 1.8rem); padding-top: 0.5rem;">{{ $latestDate }}</div>
                    <div class="news-stat__label">Update Terakhir</div>
                </div>
            </div>
        </div>
    </section>


    {{-- =====================================================
         3. GRID BERITA
         ===================================================== --}}
    <section class="news-grid-section">
        <div class="gpk-container">
            <div class="news-grid-section__head">
                <div class="news-section__num">— Arsip Berita</div>
                <span class="news-section__eyebrow">Newsroom</span>
                <h2 class="news-section__title">
                    Kabar terbaru dari <em>industri karet alam</em>
                </h2>
            </div>

            @if ($totalBerita === 0)
                <div class="news-empty">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20 3H3c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h3v3l3-3h11c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                    </svg>
                    <p>Belum ada berita yang dipublikasikan.</p>
                </div>
            @else
                <div class="news-grid" id="newsGrid">
                    @foreach ($dataNews as $idx => $news)
                        @php
                            $createdAt = \Carbon\Carbon::parse($news->created_at);
                            $formattedDate = $createdAt->locale('id')->isoFormat('D MMM Y');
                            $isRecent = $createdAt->greaterThan(now()->subDays(7));
                            $pageNum = floor($idx / $perPage) + 1;
                        @endphp
                        <a href="{{ route('detail.news', app(\App\Helpers\Helper::class)->enkrip($news->id)) }}"
                           class="news-card {{ $idx >= $perPage ? 'is-hidden' : '' }}"
                           data-page="{{ $pageNum }}"
                           title="{{ $news->title }}">
                            <div class="news-card__photo">
                                @if($isRecent)
                                    <span class="news-card__badge news-card__badge--new">Baru</span>
                                @else
                                    <span class="news-card__badge">Berita</span>
                                @endif
                                <img src="{{ asset('guest/assets/img/news/' . $news->image) }}"
                                     alt="{{ $news->title }}"
                                     loading="lazy"
                                     onerror="this.style.opacity='0.3';this.parentElement.style.background='linear-gradient(135deg,#F4EFE3,#D4B355)';">
                            </div>
                            <div class="news-card__body">
                                <div class="news-card__meta">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                        <line x1="16" y1="2" x2="16" y2="6"/>
                                        <line x1="8" y1="2" x2="8" y2="6"/>
                                        <line x1="3" y1="10" x2="21" y2="10"/>
                                    </svg>
                                    {{ $formattedDate }}
                                </div>
                                <h3 class="news-card__title">{{ \Illuminate\Support\Str::limit($news->title, 110) }}</h3>
                                <span class="news-card__cta">
                                    Baca Selengkapnya
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14M13 6l6 6-6 6"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- PAGINATION (selalu tampil, JS handle single-page case) --}}
                <div class="news-pagination" id="newsPagination" data-total-pages="{{ $totalPages }}">
                    <div class="news-pagination__info">
                        Menampilkan <strong><span id="pgFrom">1</span>–<span id="pgTo">{{ min($perPage, $totalBerita) }}</span></strong>
                        dari <strong>{{ $totalBerita }}</strong> berita
                        @if($totalPages > 1) • Halaman <strong><span id="pgCurr">1</span></strong> dari <strong>{{ $totalPages }}</strong>@endif
                    </div>
                    {{-- Buttons di-generate via JS --}}
                </div>
            @endif
        </div>
    </section>


    {{-- =====================================================
         4. CTA BACK
         ===================================================== --}}
    <section class="news-cta">
        <div class="gpk-container">
            <a href="{{ url('/') }}" class="news-cta__btn">
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

    const grid = document.getElementById('newsGrid');
    const pagWrap = document.getElementById('newsPagination');
    if (!grid || !pagWrap) return;

    const totalPages = parseInt(pagWrap.dataset.totalPages, 10) || 1;
    const perPage = {{ $perPage }};
    const totalItems = {{ $totalBerita }};
    let currentPage = 1;

    const pgFrom = document.getElementById('pgFrom');
    const pgTo   = document.getElementById('pgTo');
    const pgCurr = document.getElementById('pgCurr');

    // SVG arrow helpers
    const arrowLeft = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>';
    const arrowRight = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';

    function buildPagination(active) {
        // Container holds: info (already in DOM) + buttons
        const oldButtons = pagWrap.querySelectorAll('.news-pg-btn, .news-pg-ellipsis');
        oldButtons.forEach(b => b.remove());

        const container = document.createDocumentFragment();

        // Previous button
        const prev = document.createElement('button');
        prev.type = 'button';
        prev.className = 'news-pg-btn news-pg-btn--arrow';
        prev.disabled = active === 1;
        prev.innerHTML = arrowLeft + ' <span>Prev</span>';
        prev.addEventListener('click', () => goPage(active - 1));
        container.appendChild(prev);

        // Page number buttons with smart ellipsis
        const pages = computePages(active, totalPages);
        pages.forEach(p => {
            if (p === '...') {
                const span = document.createElement('span');
                span.className = 'news-pg-ellipsis';
                span.textContent = '…';
                container.appendChild(span);
            } else {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'news-pg-btn' + (p === active ? ' is-active' : '');
                btn.textContent = p;
                btn.setAttribute('aria-label', 'Halaman ' + p);
                if (p === active) btn.setAttribute('aria-current', 'page');
                btn.addEventListener('click', () => goPage(p));
                container.appendChild(btn);
            }
        });

        // Next button
        const next = document.createElement('button');
        next.type = 'button';
        next.className = 'news-pg-btn news-pg-btn--arrow';
        next.disabled = active === totalPages;
        next.innerHTML = '<span>Next</span> ' + arrowRight;
        next.addEventListener('click', () => goPage(active + 1));
        container.appendChild(next);

        pagWrap.appendChild(container);
    }

    /**
     * Compute pagination items with ellipsis.
     * Examples:
     *   total=5, active=3 → [1, 2, 3, 4, 5]
     *   total=10, active=1 → [1, 2, 3, '...', 10]
     *   total=10, active=5 → [1, '...', 4, 5, 6, '...', 10]
     *   total=10, active=10 → [1, '...', 8, 9, 10]
     */
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

        // Show/hide cards
        const cards = grid.querySelectorAll('.news-card');
        cards.forEach((card, idx) => {
            const cardPage = parseInt(card.dataset.page, 10);
            if (cardPage === page) {
                card.classList.remove('is-hidden');
            } else {
                card.classList.add('is-hidden');
            }
        });

        // Update info text
        const from = totalItems === 0 ? 0 : (page - 1) * perPage + 1;
        const to   = Math.min(page * perPage, totalItems);
        if (pgFrom) pgFrom.textContent = from;
        if (pgTo)   pgTo.textContent   = to;
        if (pgCurr) pgCurr.textContent = page;

        // Rebuild pagination buttons
        buildPagination(page);

        // Smooth scroll to top of grid
        const headTarget = document.querySelector('.news-grid-section__head');
        if (headTarget) headTarget.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // Initial render
    buildPagination(1);
})();
</script>
@endpush
