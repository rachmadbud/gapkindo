{{--
    ============================================================
    DETAIL NEWS GAPKINDO — Elegant Article Page
    Struktur:
    1. Banner header (navy + checkerboard, compact)
    2. Hero section: title + meta (date, source)
    3. Featured image (large, hero-style)
    4. Article body (readable typography, max-width)
    5. Article footer: print, share, info card
    6. CTA back to news list + home
    ============================================================
--}}

@extends('guest.layouts.master')

@section('title', $dataNews->title . ' | GAPKINDO')

@push('styles')
<style>
    /* ============================================================
       DETAIL NEWS PAGE — Scoped Styles
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

    .gpk-news-detail, .gpk-news-detail *, .gpk-news-detail *::before, .gpk-news-detail *::after {
        box-sizing: border-box;
    }
    .gpk-news-detail {
        background: var(--c-bg);
        color: var(--c-ink);
        font-family: var(--f-sans);
        line-height: 1.6;
    }
    .gpk-news-detail a { color: inherit; text-decoration: none; }

    .gpk-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 16px;
    }
    /* Body sections: full-width 16px */
    .gpk-news-detail .nd-hero-content .gpk-container,
    .gpk-news-detail .nd-image .gpk-container,
    .gpk-news-detail .nd-body .gpk-container,
    .gpk-news-detail .nd-footer .gpk-container,
    .gpk-news-detail .nd-cta .gpk-container {
        max-width: 100%;
        padding-left: 16px;
        padding-right: 16px;
    }

    /* ============================================================
       1. MINI BANNER (Breadcrumb-style compact)
       ============================================================ */
    .nd-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1a237e 100%);
        color: var(--c-cream);
        padding: clamp(1rem, 2.5vh, 1.5rem) 0;
        position: relative;
        overflow: hidden;
    }
    .nd-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3Crect x='16' y='16' width='16' height='16' fill='rgba(255,255,255,0.04)'/%3E%3C/svg%3E");
        pointer-events: none;
    }
    .nd-hero__inner {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--c-gold-soft);
    }
    .nd-hero__inner a {
        color: rgba(255, 251, 242, 0.7);
        transition: color 0.3s ease;
    }
    .nd-hero__inner a:hover {
        color: var(--c-gold-soft);
    }
    .nd-hero__sep {
        opacity: 0.5;
    }

    /* ============================================================
       2. HERO CONTENT (Title + Meta)
       ============================================================ */
    .nd-hero-content {
        background: var(--c-bg);
        padding: clamp(2rem, 5vh, 3.5rem) 0 clamp(1.5rem, 3vh, 2rem);
        text-align: center;
    }
    .nd-hero-content__inner {
        max-width: 880px;
        margin: 0 auto;
    }
    .nd-eyebrow {
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.32em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin-bottom: 1.2rem;
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
    }
    .nd-eyebrow::before,
    .nd-eyebrow::after {
        content: "";
        width: 32px;
        height: 1px;
        background: var(--c-gold);
    }
    .nd-title {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: clamp(1.8rem, 4vw, 3rem);
        line-height: 1.15;
        letter-spacing: -0.02em;
        color: var(--c-ink);
        margin: 0 0 1.4rem;
    }
    .nd-meta {
        display: inline-flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 0.8rem 1.5rem;
        padding: 0.8rem 1.5rem;
        background: white;
        border-radius: 100px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--c-line);
    }
    .nd-meta__item {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--c-fade);
    }
    .nd-meta__item svg {
        width: 14px;
        height: 14px;
        color: var(--c-leaf);
        flex-shrink: 0;
    }
    .nd-meta__item strong {
        color: var(--c-ink);
        font-weight: 700;
    }
    .nd-meta__divider {
        width: 1px;
        height: 14px;
        background: var(--c-line);
    }

    /* ============================================================
       3. FEATURED IMAGE
       ============================================================ */
    .nd-image {
        background: var(--c-bg);
        padding: 0 0 clamp(2rem, 4vh, 3rem);
    }
    .nd-image__wrap {
        max-width: 1200px;
        margin: 0 auto;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 14px 40px rgba(0, 0, 0, 0.12);
        position: relative;
        aspect-ratio: 16 / 9;
        background: var(--c-bg-soft);
    }
    .nd-image__wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .nd-image__caption {
        text-align: center;
        margin-top: 0.8rem;
        font-family: var(--f-mono);
        font-size: 0.72rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--c-fade);
    }

    /* ============================================================
       4. ARTICLE BODY — Magazine/Book Style
       ============================================================ */
    .nd-body {
        background:
            radial-gradient(ellipse at top, rgba(184, 145, 30, 0.04) 0%, transparent 50%),
            var(--c-bg);
        padding: clamp(1rem, 3vh, 2rem) 0 clamp(2rem, 5vh, 3.5rem);
        position: relative;
    }

    /* Reading progress bar (fixed top) */
    .nd-progress {
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        width: 0%;
        background: linear-gradient(90deg, var(--c-leaf) 0%, var(--c-gold) 100%);
        z-index: 9999;
        transition: width 0.1s ease-out;
        box-shadow: 0 0 8px rgba(184, 145, 30, 0.5);
    }

    /* Reading info bar (time, words) */
    .nd-reading-info {
        max-width: 1200px;
        margin: 0 auto 1.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
        padding: 0.8rem 1.2rem;
        background: white;
        border-radius: 100px;
        border: 1px solid var(--c-line);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
        width: fit-content;
    }
    .nd-reading-info__item {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: var(--f-mono);
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--c-fade);
    }
    .nd-reading-info__item svg {
        width: 14px;
        height: 14px;
        color: var(--c-gold);
    }
    .nd-reading-info__item strong {
        color: var(--c-leaf);
        font-weight: 700;
    }
    .nd-reading-info__divider {
        width: 1px;
        height: 16px;
        background: var(--c-line);
    }

    /* Book/Magazine page — width matches image (1200px) */
    .nd-body__inner {
        max-width: 1200px;
        margin: 0 auto;
        background:
            linear-gradient(135deg, #FFFEF9 0%, #FFFCEF 100%);
        border-radius: 4px;
        padding: clamp(2.5rem, 6vw, 5rem) clamp(2rem, 5vw, 4rem);
        box-shadow:
            0 1px 1px rgba(0, 0, 0, 0.08),
            0 4px 8px rgba(0, 0, 0, 0.06),
            0 16px 36px rgba(0, 0, 0, 0.10),
            0 0 0 1px rgba(184, 145, 30, 0.12);
        position: relative;
    }

    /* Decorative line at top of page (like book chapter divider) */
    .nd-body__inner::before {
        content: "";
        position: absolute;
        top: clamp(1.5rem, 4vw, 3rem);
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, transparent 0%, var(--c-gold) 50%, transparent 100%);
    }

    /* "Article" decorative label */
    .nd-body__label {
        text-align: center;
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.4em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin: 0.8rem 0 2rem;
    }

    /* CONTENT — Book Typography */
    .nd-content {
        font-family: var(--f-display);
        font-size: 1.2rem;       /* 19.2px - large book-like */
        line-height: 1.85;
        color: #2c2418;          /* warm ink color */
        text-align: justify;
        hyphens: auto;
        -webkit-hyphens: auto;
        -ms-hyphens: auto;
        word-spacing: 0.02em;
        letter-spacing: 0.005em;
        font-weight: 400;
    }
    .nd-content p {
        margin: 0 0 1.4rem;
    }
    /* First paragraph: no indent, drop cap */
    .nd-content > p:first-of-type {
        text-indent: 0;
    }
    /* Subsequent paragraphs: classic book indent */
    .nd-content > p:not(:first-of-type) {
        text-indent: 2em;
    }
    .nd-content p:last-child {
        margin-bottom: 0;
    }

    /* DROP CAP — elegant book-style */
    .nd-content > p:first-of-type::first-letter {
        font-family: var(--f-display);
        font-weight: 700;
        font-size: 5rem;
        line-height: 0.85;
        float: left;
        margin: 0.25rem 0.6rem -0.2rem 0;
        color: var(--c-leaf);
        text-shadow: 1px 1px 0 rgba(184, 145, 30, 0.15);
    }

    /* End-of-article ornament (like book chapter ending) */
    .nd-content::after {
        content: "❦";
        display: block;
        text-align: center;
        font-family: var(--f-display);
        font-size: 1.8rem;
        color: var(--c-gold);
        margin: 2rem 0 0;
        line-height: 1;
        opacity: 0.6;
        column-span: all;        /* spans full width when in column layout */
        -webkit-column-span: all;
    }

    /* MAGAZINE 2-COLUMN LAYOUT on wide screens */
    @media (min-width: 900px) {
        .nd-content {
            column-count: 2;
            column-gap: 3.5rem;
            column-rule: 1px solid rgba(184, 145, 30, 0.18);
        }
        /* Avoid orphan/widow lines */
        .nd-content p {
            orphans: 3;
            widows: 3;
            break-inside: avoid-column;
        }
        /* Drop cap container shouldn't break */
        .nd-content > p:first-of-type {
            break-inside: avoid-column;
            break-after: auto;
        }
    }
    /* Extra wide: 3 columns for very wide screens */
    @media (min-width: 1400px) {
        .nd-content {
            column-count: 2;
            column-gap: 4.5rem;
        }
    }

    /* Mobile: reduce body size + single column */
    @media (max-width: 899px) {
        .nd-content {
            column-count: 1;
        }
    }
    @media (max-width: 600px) {
        .nd-content {
            font-size: 1.1rem;
            line-height: 1.78;
            text-align: left;     /* justify breaks on narrow screens */
            hyphens: none;
        }
        .nd-content > p:not(:first-of-type) {
            text-indent: 1.5em;
        }
        .nd-content > p:first-of-type::first-letter {
            font-size: 4rem;
            margin: 0.2rem 0.5rem 0 0;
        }
        .nd-reading-info {
            gap: 1rem;
            padding: 0.7rem 1rem;
            flex-wrap: wrap;
        }
        .nd-reading-info__item {
            font-size: 0.7rem;
        }
    }

    /* ============================================================
       5. ARTICLE FOOTER (Info + Actions)
       ============================================================ */
    .nd-footer {
        background: var(--c-bg);
        padding: 0 0 clamp(2rem, 5vh, 3.5rem);
    }
    .nd-footer__inner {
        max-width: 780px;
        margin: 0 auto;
    }

    /* DETAILS CARD */
    .nd-details {
        background: linear-gradient(135deg, var(--c-bg-soft) 0%, white 100%);
        border-radius: 14px;
        padding: 1.6rem 1.8rem;
        border: 1px solid var(--c-line);
        margin-bottom: 1.4rem;
    }
    .nd-details__title {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        font-family: var(--f-mono);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin: 0 0 1.2rem;
    }
    .nd-details__title::after {
        content: "";
        flex: 1;
        height: 1px;
        background: var(--c-line);
    }
    .nd-details__grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.8rem;
    }
    @media (min-width: 600px) {
        .nd-details__grid { grid-template-columns: repeat(2, 1fr); }
    }
    .nd-details__item {
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
    }
    .nd-details__label {
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--c-fade);
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }
    .nd-details__label svg {
        width: 12px;
        height: 12px;
        color: var(--c-leaf);
    }
    .nd-details__value {
        font-family: var(--f-display);
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--c-ink);
    }

    /* ACTION BUTTONS (Print, Share) */
    .nd-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.7rem;
        justify-content: center;
    }
    .nd-action-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.4rem;
        background: white;
        border: 1px solid var(--c-line);
        border-radius: 10px;
        font-family: var(--f-sans);
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--c-ink);
        cursor: pointer;
        text-decoration: none !important;
        transition: all 0.3s ease;
        outline: none;
    }
    .nd-action-btn:hover {
        background: var(--c-leaf);
        color: white;
        border-color: var(--c-leaf);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(44, 85, 48, 0.25);
    }
    .nd-action-btn svg {
        width: 14px;
        height: 14px;
    }

    /* ============================================================
       6. CTA BACK (Bottom)
       ============================================================ */
    .nd-cta {
        background: var(--c-bg-soft);
        padding: clamp(2rem, 5vh, 3.5rem) 0;
    }
    .nd-cta__inner {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }
    .nd-cta__btn {
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
    .nd-cta__btn--primary {
        background: linear-gradient(180deg, #7256ff 0%, #5a40f0 55%, #4830d8 100%);
        color: #fff !important;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.4),
            inset 0 -1px 0 rgba(0, 0, 0, 0.15),
            0 6px 14px rgba(90, 64, 240, 0.35),
            0 14px 28px rgba(90, 64, 240, 0.22);
    }
    .nd-cta__btn--primary:hover {
        transform: translateY(-4px);
        background: linear-gradient(180deg, #8c72ff 0%, #6b51f0 55%, #5a40e0 100%);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.5),
            inset 0 -1px 0 rgba(0, 0, 0, 0.18),
            0 12px 22px rgba(90, 64, 240, 0.45),
            0 22px 40px rgba(90, 64, 240, 0.28);
        color: #fff !important;
    }
    .nd-cta__btn--secondary {
        background: white;
        color: var(--c-ink) !important;
        border: 1px solid var(--c-line);
    }
    .nd-cta__btn--secondary:hover {
        transform: translateY(-4px);
        background: var(--c-leaf);
        color: white !important;
        border-color: var(--c-leaf);
        box-shadow: 0 12px 22px rgba(44, 85, 48, 0.3);
    }
    .nd-cta__btn svg {
        width: 16px;
        height: 16px;
        transition: transform 0.4s ease;
    }
    .nd-cta__btn--primary:hover svg {
        transform: translateX(6px) scale(1.18);
    }
    .nd-cta__btn--secondary:hover svg {
        transform: translateX(-6px) scale(1.18);
    }

    /* PRINT STYLES */
    @media print {
        .nd-hero, .nd-footer, .nd-cta, .nd-progress, .nd-reading-info, .nd-body__label {
            display: none !important;
        }
        .nd-body__inner {
            box-shadow: none !important;
            padding: 0 !important;
            background: white !important;
        }
        .nd-body__inner::before {
            display: none !important;
        }
        .nd-content {
            font-size: 11pt !important;
            line-height: 1.6 !important;
        }
        .nd-content > p:first-of-type::first-letter {
            font-size: 2.5rem !important;
            color: #000 !important;
        }
        .nd-content::after {
            color: #666 !important;
        }
        .gpk-news-detail {
            background: white !important;
        }
    }
</style>
@endpush

@section('content')
@php
    $publishDate = $dataNews->created_at
        ? \Carbon\Carbon::parse($dataNews->created_at)->locale('id')->isoFormat('D MMMM Y')
        : '-';
    $relativeDate = $dataNews->created_at
        ? \Carbon\Carbon::parse($dataNews->created_at)->diffForHumans()
        : '';

    // Split content into paragraphs for proper book-style typography
    $content = trim($dataNews->content ?? '');
    $paragraphs = preg_split('/\n\s*\n/', $content);
    if (count($paragraphs) === 1 && strpos($content, "\n") !== false) {
        // Fallback: split single newlines if no double newlines exist
        $paragraphs = preg_split('/\n+/', $content);
    }
    $paragraphs = array_filter(array_map('trim', $paragraphs));

    // Reading time estimation (~200 words per minute for Indonesian)
    $wordCount = str_word_count(strip_tags($content));
    $readingTime = max(1, ceil($wordCount / 200));
@endphp

<div class="gpk-news-detail">

    {{-- =====================================================
         1. MINI BANNER — Breadcrumb-style
         ===================================================== --}}
    <section class="nd-hero">
        <div class="gpk-container">
            <div class="nd-hero__inner">
                <a href="{{ url('/') }}">Beranda</a>
                <span class="nd-hero__sep">/</span>
                <a href="{{ route('berita') ?? url('/berita') }}">Berita</a>
                <span class="nd-hero__sep">/</span>
                <span>Detail</span>
            </div>
        </div>
    </section>


    {{-- =====================================================
         2. HERO CONTENT — Title + Meta
         ===================================================== --}}
    <section class="nd-hero-content">
        <div class="gpk-container">
            <div class="nd-hero-content__inner">
                <div class="nd-eyebrow">Artikel Berita</div>
                <h1 class="nd-title">{{ $dataNews->title }}</h1>
                <div class="nd-meta">
                    <span class="nd-meta__item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <strong>{{ $publishDate }}</strong>
                    </span>
                    @if(!empty($dataNews->source))
                    <span class="nd-meta__divider"></span>
                    <span class="nd-meta__item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                        </svg>
                        Sumber: <strong>{{ $dataNews->source }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </section>


    {{-- =====================================================
         3. FEATURED IMAGE
         ===================================================== --}}
    @if(!empty($dataNews->image))
    <section class="nd-image">
        <div class="gpk-container">
            <div class="nd-image__wrap">
                <img src="{{ asset('guest/assets/img/news/' . $dataNews->image) }}"
                     alt="{{ $dataNews->title }}"
                     onerror="this.style.opacity='0.3';this.parentElement.style.background='linear-gradient(135deg,#F4EFE3,#D4B355)';">
            </div>
        </div>
    </section>
    @endif


    {{-- =====================================================
         4. ARTICLE BODY — Magazine/Book Style
         ===================================================== --}}
    <section class="nd-body">
        <div class="nd-progress" id="ndProgress"></div>

        <div class="gpk-container">
            {{-- Reading Info Bar --}}
            <div class="nd-reading-info">
                <span class="nd-reading-info__item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <strong>{{ $readingTime }}</strong> menit baca
                </span>
                <span class="nd-reading-info__divider"></span>
                <span class="nd-reading-info__item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                    <strong>{{ number_format($wordCount) }}</strong> kata
                </span>
            </div>

            {{-- Book-style page --}}
            <div class="nd-body__inner">
                <div class="nd-body__label">— Artikel —</div>
                <div class="nd-content">
                    @foreach($paragraphs as $para)
                        <p>{!! nl2br(e($para)) !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- =====================================================
         5. ARTICLE FOOTER — Detail Card + Actions
         ===================================================== --}}
    <section class="nd-footer">
        <div class="gpk-container">
            <div class="nd-footer__inner">

                {{-- Detail Card --}}
                <div class="nd-details">
                    <div class="nd-details__title">{{ __('global.detail') }}</div>
                    <div class="nd-details__grid">
                        <div class="nd-details__item">
                            <span class="nd-details__label">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                {{ __('global.tanggal') }}
                            </span>
                            <span class="nd-details__value">{{ $publishDate }}</span>
                        </div>
                        <div class="nd-details__item">
                            <span class="nd-details__label">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                                </svg>
                                {{ __('global.sumber') }}
                            </span>
                            <span class="nd-details__value">{{ $dataNews->source ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="nd-actions">
                    <button type="button" class="nd-action-btn" onclick="window.print()">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9"/>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                            <rect x="6" y="14" width="12" height="8"/>
                        </svg>
                        Cetak Artikel
                    </button>
                    <button type="button" class="nd-action-btn" id="ndShareBtn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="18" cy="5" r="3"/>
                            <circle cx="6" cy="12" r="3"/>
                            <circle cx="18" cy="19" r="3"/>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                        </svg>
                        Bagikan
                    </button>
                    <a href="https://wa.me/?text={{ urlencode($dataNews->title . ' - ' . url()->current()) }}"
                       target="_blank" rel="noopener" class="nd-action-btn">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        WhatsApp
                    </a>
                </div>

            </div>
        </div>
    </section>


    {{-- =====================================================
         6. CTA BACK
         ===================================================== --}}
    <section class="nd-cta">
        <div class="gpk-container">
            <div class="nd-cta__inner">
                <a href="{{ route('berita') ?? url('/berita') }}" class="nd-cta__btn nd-cta__btn--secondary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"/>
                        <path d="M11 18l-6-6 6-6"/>
                    </svg>
                    <span>Semua Berita</span>
                </a>
                <a href="{{ url('/') }}" class="nd-cta__btn nd-cta__btn--primary">
                    <span>Kembali ke Beranda</span>
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
<script>
(function() {
    'use strict';

    // ====== Reading Progress Bar (scroll-based) ======
    const progressBar = document.getElementById('ndProgress');
    const article = document.querySelector('.nd-body__inner');

    if (progressBar && article) {
        function updateProgress() {
            const articleRect = article.getBoundingClientRect();
            const articleTop = articleRect.top + window.scrollY;
            const articleHeight = article.offsetHeight;
            const windowHeight = window.innerHeight;
            const scrollY = window.scrollY;

            // Start: ketika top artikel masuk viewport
            // End: ketika bottom artikel keluar viewport
            const start = articleTop - windowHeight * 0.3;
            const end   = articleTop + articleHeight - windowHeight * 0.5;
            const range = end - start;

            let progress = 0;
            if (scrollY > start && range > 0) {
                progress = Math.min(100, Math.max(0, ((scrollY - start) / range) * 100));
            } else if (scrollY >= end) {
                progress = 100;
            }
            progressBar.style.width = progress + '%';
        }
        window.addEventListener('scroll', updateProgress, { passive: true });
        window.addEventListener('resize', updateProgress);
        updateProgress();
    }

    // ====== Share Button (Web Share API + clipboard fallback) ======
    const shareBtn = document.getElementById('ndShareBtn');
    if (!shareBtn) return;

    const title = {!! json_encode($dataNews->title) !!};
    const url = window.location.href;

    shareBtn.addEventListener('click', async function() {
        if (navigator.share) {
            try {
                await navigator.share({
                    title: title,
                    text: title,
                    url: url
                });
            } catch (err) {
                if (err.name !== 'AbortError') console.error('Share failed:', err);
            }
        } else {
            try {
                await navigator.clipboard.writeText(url);
                const originalText = shareBtn.innerHTML;
                shareBtn.innerHTML = `
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Tautan Disalin!
                `;
                shareBtn.style.background = 'var(--c-leaf)';
                shareBtn.style.color = 'white';
                shareBtn.style.borderColor = 'var(--c-leaf)';
                setTimeout(() => {
                    shareBtn.innerHTML = originalText;
                    shareBtn.style.background = '';
                    shareBtn.style.color = '';
                    shareBtn.style.borderColor = '';
                }, 2000);
            } catch (err) {
                alert('Tautan: ' + url);
            }
        }
    });
})();
</script>
@endpush
