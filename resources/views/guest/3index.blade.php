@extends('guest.layouts.master')

@section('title', 'Home | GAPKINDO')
@section('bodyClass', 'is-home')

{{--
    Premium redesign — Refined Botanical Editorial
    Author note: standalone styles in @push('styles'), standalone scripts in @push('scripts').
    Asumsi master.blade.php memiliki @stack('styles') di <head> dan @stack('scripts') sebelum </body>.
    Jika belum ada, tambahkan dua direktif tersebut di master.blade.php.
--}}

@push('styles')
{{-- Font sudah dimuat di head.blade.php (Fraunces + Manrope + JetBrains Mono) --}}

<style>
    /* ============================================
       GAPKINDO PUSAT — PREMIUM HOME
       Refined Botanical Editorial Design System
       ============================================ */

    :root {
        --c-bg: #FAF7F0;
        --c-bg-soft: #F2EDE0;
        --c-bg-dark: #0E1A11;
        --c-ink: #1A2E1F;
        --c-ink-soft: #4A5D4F;
        --c-fade: #8B8B7E;
        --c-line: #D5CCB5;
        --c-line-soft: #E8E2D0;
        --c-gold: #B8911E;
        --c-gold-soft: #D4B143;
        --c-leaf: #2C5530;
        --c-leaf-deep: #14331A;
        --c-cream: #FFFBF2;

        --f-display: 'Fraunces', Georgia, serif;
        --f-body: 'Manrope', -apple-system, sans-serif;
        --f-mono: 'JetBrains Mono', monospace;

        --max-w: 1320px;
        --gutter: clamp(1.5rem, 4vw, 3rem);

        --ease-out: cubic-bezier(0.16, 1, 0.3, 1);
        --ease-in-out: cubic-bezier(0.65, 0, 0.35, 1);
    }

    /* Override base only inside our scoped sections */
    .gpk-premium {
        background: var(--c-bg);
        color: var(--c-ink);
        font-family: var(--f-body);
        font-weight: 400;
        line-height: 1.6;
        font-size: 16px;
        letter-spacing: -0.005em;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        overflow-x: hidden;
    }

    .gpk-premium *,
    .gpk-premium *::before,
    .gpk-premium *::after {
        box-sizing: border-box;
    }

    .gpk-premium img { max-width: 100%; height: auto; display: block; }

    .gpk-premium a { color: inherit; text-decoration: none; }

    .gpk-premium h1, .gpk-premium h2, .gpk-premium h3, .gpk-premium h4 {
        font-family: var(--f-display);
        font-weight: 500;
        letter-spacing: -0.02em;
        line-height: 1.05;
        color: var(--c-ink);
        margin: 0;
    }

    .gpk-container {
        max-width: var(--max-w);
        margin: 0 auto;
        padding-left: var(--gutter);
        padding-right: var(--gutter);
    }

    /* ============================================
       1. HERO CAROUSEL
       ============================================ */

    .gpk-hero {
        position: relative;
        width: 100%;
        height: 100vh;
        min-height: 640px;
        max-height: 920px;
        overflow: hidden;
        background: var(--c-bg-dark);
    }

    .gpk-hero__track {
        position: absolute;
        inset: 0;
    }

    .gpk-hero__slide {
        position: absolute;
        inset: 0;
        opacity: 0;
        visibility: hidden;
        transition: opacity 1.2s var(--ease-out), visibility 0s 1.2s;
    }
    .gpk-hero__slide.is-active {
        opacity: 1;
        visibility: visible;
        transition: opacity 1.2s var(--ease-out), visibility 0s;
    }

    .gpk-hero__image {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        transform: scale(1.08);
        transition: transform 7s var(--ease-out);
    }
    .gpk-hero__slide.is-active .gpk-hero__image {
        transform: scale(1);
    }

    .gpk-hero__veil {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(180deg, rgba(14,26,17,0.15) 0%, rgba(14,26,17,0.35) 50%, rgba(14,26,17,0.85) 100%),
            linear-gradient(90deg, rgba(14,26,17,0.55) 0%, rgba(14,26,17,0.1) 60%, rgba(14,26,17,0) 100%);
    }

    .gpk-hero__grain {
        position: absolute;
        inset: 0;
        opacity: 0.08;
        mix-blend-mode: overlay;
        pointer-events: none;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.5'/%3E%3C/svg%3E");
    }

    /* ===== RIBBON MODERN (kategori badge, ala gapkindosu.org) ===== */
    .gpk-hero__ribbon {
        position: absolute;
        top: clamp(1.2rem, 4vh, 2.2rem);
        left: 0;
        z-index: 3;
        display: inline-block;
        padding: 0.55rem 1.4rem 0.55rem 1.8rem;
        font-family: 'Manrope', 'Open Sans', sans-serif;
        font-size: clamp(0.78rem, 1vw, 0.92rem);
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: white;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
        clip-path: polygon(0 0, calc(100% - 14px) 0, 100% 50%, calc(100% - 14px) 100%, 0 100%);
        opacity: 0;
        transform: translateX(-20px);
    }
    .gpk-hero__slide.is-active .gpk-hero__ribbon {
        animation: gpkRibbonIn 0.7s var(--ease-out) 0.3s forwards;
    }
    @keyframes gpkRibbonIn {
        to { opacity: 1; transform: translateX(0); }
    }

    /* Ribbon Bootstrap-style color utilities */
    .gpk-hero__ribbon.bg-success    { background: #198754; color: white; }
    .gpk-hero__ribbon.bg-warning    { background: #ffc107; color: #212529; }
    .gpk-hero__ribbon.bg-primary    { background: #0d6efd; color: white; }
    .gpk-hero__ribbon.bg-info       { background: #0dcaf0; color: white; }
    .gpk-hero__ribbon.bg-danger     { background: #dc3545; color: white; }
    .gpk-hero__ribbon.bg-secondary  { background: #6c757d; color: white; }

    /* ===== CAROUSEL CAPTION (center bottom, ala Bootstrap 5) ===== */
    .gpk-hero__content {
        position: absolute;
        bottom: clamp(2.5rem, 8vh, 5rem);
        left: 0;
        right: 0;
        z-index: 2;
        padding: 0 clamp(1.2rem, 4vw, 3rem);
    }

    .gpk-hero__inner {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        color: white;
    }

    .gpk-hero__title {
        font-family: 'Manrope', 'Open Sans', sans-serif;
        font-weight: 700;
        font-size: clamp(1.6rem, 3.6vw, 2.8rem);
        line-height: 1.15;
        letter-spacing: 0.015em;
        text-transform: uppercase;
        color: white;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        margin-bottom: 1.1rem;
        opacity: 0;
        transform: translateY(30px);
    }
    .gpk-hero__slide.is-active .gpk-hero__title {
        animation: gpkRise 1s var(--ease-out) 0.5s forwards;
    }

    .gpk-hero__lead {
        font-family: 'Manrope', 'Open Sans', sans-serif;
        font-size: clamp(0.95rem, 1.25vw, 1.18rem);
        line-height: 1.55;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.92);
        text-shadow: 0 1px 6px rgba(0, 0, 0, 0.5);
        max-width: 760px;
        margin: 0 auto 1.6rem;
        opacity: 0;
        transform: translateY(30px);
    }
    .gpk-hero__slide.is-active .gpk-hero__lead {
        animation: gpkRise 1s var(--ease-out) 0.65s forwards;
    }

    .gpk-hero__cta {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.85rem 2rem;
        background: #f8f9fa;
        color: #212529;
        font-family: 'Manrope', 'Open Sans', sans-serif;
        font-size: 0.92rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25);
        transition: all 0.3s var(--ease-out);
        opacity: 0;
        transform: translateY(20px);
    }
    .gpk-hero__slide.is-active .gpk-hero__cta {
        animation: gpkRise 1s var(--ease-out) 0.8s forwards;
    }
    .gpk-hero__cta:hover {
        background: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.35);
        color: #212529;
        text-decoration: none;
    }
    .gpk-hero__cta::after {
        content: "→";
        font-weight: 400;
        transition: transform 0.3s var(--ease-out);
    }
    .gpk-hero__cta:hover::after {
        transform: translateX(4px);
    }

    /* Caption position adjustments */
    @media (max-width: 768px) {
        .gpk-hero__content {
            bottom: 5rem; /* leave space for indicators */
        }
        .gpk-hero__ribbon {
            top: 1rem;
            font-size: 0.72rem;
            padding: 0.45rem 1.1rem 0.45rem 1.4rem;
        }
    }

    @keyframes gpkRise {
        to { opacity: 1; transform: translateY(0); }
    }

    /* Hero Side Indicator (right side) */
    .gpk-hero__indicator {
        position: absolute;
        right: clamp(1.5rem, 3vw, 3rem);
        top: 50%;
        transform: translateY(-50%);
        z-index: 3;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 1rem;
    }
    .gpk-hero__num {
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 500;
        color: var(--c-cream);
        letter-spacing: 0.15em;
        opacity: 0.6;
    }
    .gpk-hero__num strong {
        font-weight: 500;
        color: var(--c-gold-soft);
        opacity: 1;
    }
    .gpk-hero__progress {
        width: 1px;
        height: 200px;
        background: rgba(255, 251, 242, 0.15);
        position: relative;
        overflow: hidden;
    }
    .gpk-hero__progress-bar {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 0%;
        background: var(--c-gold-soft);
        transition: height 0.1s linear;
    }

    /* Hero Bottom Controls */
    .gpk-hero__controls {
        position: absolute;
        bottom: clamp(1.5rem, 4vh, 3rem);
        right: clamp(1.5rem, 3vw, 3rem);
        z-index: 3;
        display: flex;
        gap: 0.6rem;
    }
    .gpk-hero__btn {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 1px solid rgba(255, 251, 242, 0.25);
        background: rgba(255, 251, 242, 0.04);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        color: var(--c-cream);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.35s var(--ease-out);
    }
    .gpk-hero__btn:hover {
        background: var(--c-gold);
        border-color: var(--c-gold);
        transform: translateY(-2px);
    }
    .gpk-hero__btn svg { width: 14px; height: 14px; }

    /* Hero scroll cue */
    .gpk-hero__scroll {
        position: absolute;
        bottom: clamp(1.5rem, 4vh, 3rem);
        left: clamp(1.5rem, 3vw, 3rem);
        z-index: 3;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-family: var(--f-mono);
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: rgba(255, 251, 242, 0.7);
    }
    .gpk-hero__scroll-line {
        width: 40px;
        height: 1px;
        background: rgba(255, 251, 242, 0.4);
        position: relative;
        overflow: hidden;
    }
    .gpk-hero__scroll-line::after {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--c-gold-soft);
        animation: gpkScrollCue 2.4s var(--ease-in-out) infinite;
    }
    @keyframes gpkScrollCue {
        0%   { left: -100%; }
        50%  { left: 100%; }
        100% { left: 100%; }
    }

    @media (max-width: 768px) {
        .gpk-hero__indicator { display: none; }
        .gpk-hero__scroll { display: none; }
    }

    /* ============================================
       2. SECTION BASE
       ============================================ */

    .gpk-section {
        padding: clamp(5rem, 11vh, 9rem) 0;
        position: relative;
    }
    .gpk-section--dark {
        background: var(--c-bg-dark);
        color: var(--c-cream);
    }
    .gpk-section--dark h1,
    .gpk-section--dark h2,
    .gpk-section--dark h3,
    .gpk-section--dark h4 {
        color: var(--c-cream);
    }
    .gpk-section--soft {
        background: var(--c-bg-soft);
    }

    .gpk-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.32em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin-bottom: 1.4rem;
    }
    .gpk-eyebrow::before {
        content: "";
        width: 32px;
        height: 1px;
        background: var(--c-gold);
    }
    .gpk-section--dark .gpk-eyebrow { color: var(--c-gold-soft); }
    .gpk-section--dark .gpk-eyebrow::before { background: var(--c-gold-soft); }

    .gpk-section__title {
        font-family: var(--f-display);
        font-weight: 400;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.05;
        letter-spacing: -0.025em;
        max-width: 720px;
    }
    .gpk-section__title em {
        font-style: italic;
        font-weight: 300;
        color: var(--c-gold);
    }
    .gpk-section--dark .gpk-section__title em { color: var(--c-gold-soft); }

    .gpk-section__lead {
        font-size: 1.05rem;
        line-height: 1.7;
        color: var(--c-ink-soft);
        max-width: 580px;
        margin-top: 1.4rem;
        font-weight: 400;
    }
    .gpk-section--dark .gpk-section__lead { color: rgba(255, 251, 242, 0.7); }

    .gpk-section__head {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2.5rem;
        margin-bottom: clamp(3rem, 6vh, 4.5rem);
        align-items: end;
    }
    @media (min-width: 880px) {
        .gpk-section__head { grid-template-columns: 1fr 1fr; gap: 4rem; }
    }

    /* Number tag */
    .gpk-section__num {
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        color: var(--c-fade);
        margin-bottom: 1rem;
        display: block;
    }

    /* ============================================
       3. INTRO BRAND SECTION
       ============================================ */

    .gpk-intro {
        background: var(--c-bg);
        padding: clamp(5rem, 12vh, 8rem) 0;
        position: relative;
    }

    .gpk-intro__grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 3rem;
        align-items: center;
    }
    @media (min-width: 880px) {
        .gpk-intro__grid { grid-template-columns: 1.1fr 1fr; gap: 5rem; }
    }

    .gpk-intro__num {
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        color: var(--c-fade);
        margin-bottom: 1rem;
    }

    .gpk-intro__title {
        font-family: var(--f-display);
        font-weight: 400;
        font-size: clamp(2rem, 4.2vw, 3.2rem);
        line-height: 1.08;
        letter-spacing: -0.025em;
        margin-bottom: 1.8rem;
    }
    .gpk-intro__title em {
        font-style: italic;
        font-weight: 300;
        color: var(--c-gold);
    }

    .gpk-intro__body {
        font-size: 1.05rem;
        line-height: 1.75;
        color: var(--c-ink-soft);
        margin-bottom: 2rem;
    }

    .gpk-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0;
        margin-top: 2.5rem;
        border-top: 1px solid var(--c-line);
    }
    @media (min-width: 600px) { .gpk-stats { grid-template-columns: repeat(3, 1fr); } }

    .gpk-stat {
        padding: 1.6rem 1.4rem 1.6rem 0;
        border-right: 1px solid var(--c-line);
    }
    .gpk-stat:last-child { border-right: none; }
    .gpk-stat__num {
        font-family: var(--f-display);
        font-size: clamp(2rem, 3.5vw, 2.8rem);
        font-weight: 400;
        line-height: 1;
        color: var(--c-leaf);
        margin-bottom: 0.6rem;
        letter-spacing: -0.02em;
    }
    .gpk-stat__label {
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--c-fade);
    }

    .gpk-intro__visual {
        position: relative;
        aspect-ratio: 4 / 5;
        background: var(--c-bg-soft);
        overflow: hidden;
        border-radius: 2px;
    }
    .gpk-intro__visual img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .gpk-intro__badge {
        position: absolute;
        bottom: 1.6rem;
        left: 1.6rem;
        background: var(--c-cream);
        padding: 1.2rem 1.4rem;
        max-width: 280px;
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }
    .gpk-intro__badge-label {
        font-family: var(--f-mono);
        font-size: 0.65rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin-bottom: 0.4rem;
    }
    .gpk-intro__badge-text {
        font-family: var(--f-display);
        font-size: 1.05rem;
        font-style: italic;
        line-height: 1.3;
        color: var(--c-ink);
    }

    /* ============================================
       4. NEWS SECTION
       ============================================ */

    .gpk-news__grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    @media (min-width: 680px) { .gpk-news__grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 980px) { .gpk-news__grid { grid-template-columns: repeat(3, 1fr); } }

    .gpk-news-card {
        background: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        gap: 1.4rem;
        transition: transform 0.5s var(--ease-out);
    }
    .gpk-news-card:hover { transform: translateY(-6px); }

    .gpk-news-card__image {
        aspect-ratio: 4 / 3;
        overflow: hidden;
        background: var(--c-bg-soft);
        position: relative;
    }
    .gpk-news-card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 1.2s var(--ease-out);
    }
    .gpk-news-card:hover .gpk-news-card__image img { transform: scale(1.06); }

    .gpk-news-card__meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--c-fade);
    }
    .gpk-news-card__meta-tag {
        color: var(--c-gold);
    }
    .gpk-news-card__meta-tag::before { content: "—"; margin-right: 0.4rem; color: var(--c-fade); }

    .gpk-news-card__title {
        font-family: var(--f-display);
        font-size: 1.4rem;
        font-weight: 500;
        line-height: 1.2;
        letter-spacing: -0.015em;
        color: var(--c-ink);
        transition: color 0.3s var(--ease-out);
    }
    .gpk-news-card:hover .gpk-news-card__title { color: var(--c-leaf); }

    .gpk-news-card__cta {
        margin-top: auto;
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-ink);
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
    }
    .gpk-news-card__cta::after {
        content: "→";
        transition: transform 0.3s var(--ease-out);
    }
    .gpk-news-card:hover .gpk-news-card__cta::after { transform: translateX(6px); }

    /* ============================================
       5. QUICK ACCESS
       ============================================ */

    .gpk-quick {
        background: var(--c-bg-dark);
        color: var(--c-cream);
        padding: clamp(4rem, 9vh, 6rem) 0;
        position: relative;
        overflow: hidden;
    }
    .gpk-quick::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(circle at 20% 30%, rgba(184, 145, 30, 0.07), transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(44, 85, 48, 0.15), transparent 50%);
        pointer-events: none;
    }
    .gpk-quick__inner { position: relative; z-index: 1; }

    .gpk-quick__grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0;
        border-top: 1px solid rgba(212, 177, 67, 0.2);
        border-left: 1px solid rgba(212, 177, 67, 0.2);
    }
    @media (min-width: 780px) { .gpk-quick__grid { grid-template-columns: repeat(4, 1fr); } }

    .gpk-quick-link {
        padding: 2.4rem 1.8rem;
        border-right: 1px solid rgba(212, 177, 67, 0.2);
        border-bottom: 1px solid rgba(212, 177, 67, 0.2);
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
        transition: background 0.5s var(--ease-out);
        position: relative;
    }
    .gpk-quick-link:hover { background: rgba(212, 177, 67, 0.06); }

    .gpk-quick-link__num {
        font-family: var(--f-mono);
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        color: var(--c-gold-soft);
    }
    .gpk-quick-link__icon {
        width: 36px;
        height: 36px;
        color: var(--c-gold-soft);
    }
    .gpk-quick-link__title {
        font-family: var(--f-display);
        font-size: 1.3rem;
        font-weight: 500;
        line-height: 1.2;
        color: var(--c-cream);
    }
    .gpk-quick-link__arrow {
        margin-top: auto;
        font-family: var(--f-mono);
        font-size: 0.7rem;
        letter-spacing: 0.25em;
        color: rgba(255, 251, 242, 0.5);
        text-transform: uppercase;
        transition: color 0.3s var(--ease-out);
    }
    .gpk-quick-link:hover .gpk-quick-link__arrow { color: var(--c-gold-soft); }

    /* ============================================
       6. ORGANIZATION (Badan Pengawas/Pengurus)
       ============================================ */

    .gpk-org__chief {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2.5rem;
        margin-bottom: 4rem;
        padding-bottom: 4rem;
        border-bottom: 1px solid var(--c-line);
        align-items: center;
    }
    @media (min-width: 780px) {
        .gpk-org__chief { grid-template-columns: 1fr 1.4fr; gap: 4rem; }
    }

    .gpk-org__chief-photo {
        aspect-ratio: 3 / 4;
        overflow: hidden;
        background: var(--c-bg-soft);
        max-width: 420px;
    }
    .gpk-org__chief-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gpk-org__chief-label {
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin-bottom: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
    }
    .gpk-org__chief-label::before {
        content: "";
        width: 28px;
        height: 1px;
        background: var(--c-gold);
    }
    .gpk-org__chief-name {
        font-family: var(--f-display);
        font-size: clamp(2rem, 3.6vw, 2.8rem);
        font-weight: 400;
        line-height: 1.05;
        letter-spacing: -0.02em;
        margin-bottom: 1rem;
    }
    .gpk-org__chief-role {
        font-family: var(--f-display);
        font-style: italic;
        font-weight: 300;
        font-size: 1.3rem;
        color: var(--c-gold);
        margin-bottom: 1.4rem;
    }
    .gpk-org__chief-bio {
        color: var(--c-ink-soft);
        font-size: 0.98rem;
        line-height: 1.7;
        max-width: 480px;
    }

    .gpk-org__grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2.5rem 1.8rem;
    }
    @media (min-width: 680px) { .gpk-org__grid { grid-template-columns: repeat(3, 1fr); } }
    @media (min-width: 980px) { .gpk-org__grid { grid-template-columns: repeat(4, 1fr); } }

    .gpk-person {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .gpk-person__photo {
        aspect-ratio: 3 / 4;
        overflow: hidden;
        background: var(--c-bg-soft);
        position: relative;
    }
    .gpk-person__photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 1s var(--ease-out);
        filter: grayscale(0.15);
    }
    .gpk-person:hover .gpk-person__photo img {
        transform: scale(1.05);
        filter: grayscale(0);
    }
    .gpk-person__photo::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 60%, rgba(14, 26, 17, 0.4));
        opacity: 0;
        transition: opacity 0.5s var(--ease-out);
    }
    .gpk-person:hover .gpk-person__photo::after { opacity: 1; }

    .gpk-person__name {
        font-family: var(--f-display);
        font-size: 1.05rem;
        font-weight: 500;
        line-height: 1.2;
        letter-spacing: -0.01em;
        color: var(--c-ink);
    }
    .gpk-person__role {
        font-family: var(--f-mono);
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--c-fade);
        margin-top: 0.2rem;
    }
    .gpk-person__role--gold { color: var(--c-gold); }

    /* Pengurus grid - mixed sizes */
    .gpk-board {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }
    @media (min-width: 780px) {
        .gpk-board {
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: auto;
        }
        .gpk-board__featured { grid-column: span 2; grid-row: span 2; }
    }

    .gpk-board__featured .gpk-person__photo { aspect-ratio: 4 / 5; }
    .gpk-board__featured .gpk-person__name { font-size: 1.6rem; }

    /* ============================================
       7. CONTACT CTA
       ============================================ */

    .gpk-cta {
        background: var(--c-bg-dark);
        color: var(--c-cream);
        padding: clamp(5rem, 12vh, 8rem) 0;
        position: relative;
        overflow: hidden;
    }
    .gpk-cta::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse at top right, rgba(184, 145, 30, 0.12), transparent 60%),
            radial-gradient(ellipse at bottom left, rgba(44, 85, 48, 0.18), transparent 60%);
    }
    .gpk-cta__inner {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 760px;
        margin: 0 auto;
    }
    .gpk-cta__eyebrow {
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.32em;
        text-transform: uppercase;
        color: var(--c-gold-soft);
        margin-bottom: 1.6rem;
    }
    .gpk-cta__title {
        font-family: var(--f-display);
        font-weight: 400;
        font-size: clamp(2rem, 4.5vw, 3.4rem);
        line-height: 1.1;
        letter-spacing: -0.025em;
        color: var(--c-cream);
        margin-bottom: 1.6rem;
    }
    .gpk-cta__title em {
        font-style: italic;
        font-weight: 300;
        color: var(--c-gold-soft);
    }
    .gpk-cta__phone {
        font-family: var(--f-display);
        font-size: clamp(1.4rem, 2.6vw, 2rem);
        font-weight: 400;
        color: var(--c-gold-soft);
        margin: 1.6rem 0;
        letter-spacing: 0.02em;
    }
    .gpk-cta__sub {
        font-size: 1rem;
        color: rgba(255, 251, 242, 0.65);
        line-height: 1.7;
        margin-bottom: 2.4rem;
    }
    .gpk-cta__btn {
        display: inline-flex;
        align-items: center;
        gap: 0.9rem;
        padding: 1.1rem 2.2rem;
        background: var(--c-gold);
        color: var(--c-bg-dark);
        font-family: var(--f-mono);
        font-size: 0.74rem;
        font-weight: 600;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        transition: all 0.4s var(--ease-out);
        cursor: pointer;
    }
    .gpk-cta__btn:hover {
        background: var(--c-gold-soft);
        transform: translateY(-2px);
    }
    .gpk-cta__btn::after { content: "→"; }

    /* ============================================
       8. SECRETARIAT
       ============================================ */

    .gpk-secretariat__grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    @media (min-width: 680px) { .gpk-secretariat__grid { grid-template-columns: 1fr 1fr; } }

    .gpk-sec-card {
        display: grid;
        grid-template-columns: 140px 1fr;
        gap: 1.6rem;
        align-items: center;
        padding: 1.8rem;
        background: var(--c-cream);
        border: 1px solid var(--c-line);
    }
    .gpk-sec-card__photo {
        aspect-ratio: 1 / 1;
        overflow: hidden;
        background: var(--c-bg-soft);
        border-radius: 50%;
    }
    .gpk-sec-card__photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .gpk-sec-card__name {
        font-family: var(--f-display);
        font-size: 1.25rem;
        font-weight: 500;
        line-height: 1.2;
        color: var(--c-ink);
        margin-bottom: 0.4rem;
    }
    .gpk-sec-card__role {
        font-family: var(--f-mono);
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: var(--c-gold);
    }

    /* ============================================
       9. SCROLL REVEAL
       ============================================ */

    .gpk-reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 1s var(--ease-out), transform 1s var(--ease-out);
    }
    .gpk-reveal.is-in {
        opacity: 1;
        transform: translateY(0);
    }
    .gpk-reveal[data-delay="1"] { transition-delay: 0.1s; }
    .gpk-reveal[data-delay="2"] { transition-delay: 0.2s; }
    .gpk-reveal[data-delay="3"] { transition-delay: 0.3s; }
    .gpk-reveal[data-delay="4"] { transition-delay: 0.4s; }
    .gpk-reveal[data-delay="5"] { transition-delay: 0.5s; }
    .gpk-reveal[data-delay="6"] { transition-delay: 0.6s; }

    /* Smooth scroll */
    html { scroll-behavior: smooth; }
</style>
@endpush


@section('content')
<div class="gpk-premium">

    {{-- =====================================================
         HERO CAROUSEL
         ===================================================== --}}
    <section class="gpk-hero" id="gpkHero">
        <div class="gpk-hero__track">

            @php
                $heroSlides = [
                    [
                        'img'    => '1.jpg',
                        'ribbon' => 'NATURAL',
                        'color'  => 'success',
                        'title'  => 'INDUSTRI KARET ALAM INDONESIA',
                        'lead'   => 'GAPKINDO mengawal dan mengembangkan industri primer karet alam Indonesia sebagai komoditas ekspor utama nasional.',
                        'cta'    => null,
                    ],
                    [
                        'img'    => '2.jpg',
                        'ribbon' => 'HERITAGE',
                        'color'  => 'warning',
                        'title'  => 'WARISAN PERKEBUNAN BERKELANJUTAN',
                        'lead'   => 'Dari hulu ke hilir, mengawal mutu dan standar produksi karet Indonesia agar tetap relevan di pasar global.',
                        'cta'    => ['url' => route('sejarah'), 'text' => 'SEJARAH'],
                    ],
                    [
                        'img'    => '3.jpg',
                        'ribbon' => 'PROCESSING',
                        'color'  => 'primary',
                        'title'  => 'PENGOLAHAN BERSTANDAR DUNIA',
                        'lead'   => 'Setiap tahap produksi mengikuti standar mutu internasional, dari pengolahan hingga pengiriman ke pelabuhan tujuan.',
                        'cta'    => null,
                    ],
                    [
                        'img'    => '4.jpg',
                        'ribbon' => 'GLOBAL MARKET',
                        'color'  => 'info',
                        'title'  => 'KOMODITAS EKSPOR UTAMA',
                        'lead'   => 'Karet alam Indonesia menjangkau lebih dari 50 negara dan menjadi penopang devisa nasional yang signifikan.',
                        'cta'    => null,
                    ],
                    [
                        'img'    => '5.jpg',
                        'ribbon' => 'COMMUNITY',
                        'color'  => 'danger',
                        'title'  => 'EKOSISTEM PERKARETAN NASIONAL',
                        'lead'   => 'Menyatukan pelaku usaha, pemerintah, dan petani dalam satu visi pengembangan industri karet alam Indonesia.',
                        'cta'    => ['url' => route('anggota'), 'text' => 'ANGGOTA'],
                    ],
                    [
                        'img'    => '6.jpg',
                        'ribbon' => 'SUSTAINABLE',
                        'color'  => 'success',
                        'title'  => 'KARET ALAM RAMAH LINGKUNGAN',
                        'lead'   => 'Industri yang menyerap karbon, menjaga keanekaragaman hayati, dan menyejahterakan masyarakat sekitar perkebunan.',
                        'cta'    => null,
                    ],
                ];
            @endphp

            @foreach ($heroSlides as $i => $s)
                <div class="gpk-hero__slide {{ $i === 0 ? 'is-active' : '' }}" data-index="{{ $i }}">
                    <div class="gpk-hero__image" style="background-image: url('{{ asset('guest/assets/img/slide1/slideNew/' . $s['img']) }}');"></div>
                    <div class="gpk-hero__veil"></div>
                    <div class="gpk-hero__grain"></div>

                    {{-- RIBBON kategori (kiri-atas) --}}
                    <div class="gpk-hero__ribbon bg-{{ $s['color'] }}">{{ $s['ribbon'] }}</div>

                    {{-- CAPTION (center-bottom) --}}
                    <div class="gpk-hero__content">
                        <div class="gpk-hero__inner">
                            <h3 class="gpk-hero__title">{{ $s['title'] }}</h3>
                            <p class="gpk-hero__lead">{{ $s['lead'] }}</p>
                            @if (!empty($s['cta']))
                                <a class="gpk-hero__cta" href="{{ $s['cta']['url'] }}">{{ $s['cta']['text'] }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Right side indicator --}}
        <div class="gpk-hero__indicator">
            <div class="gpk-hero__num"><strong id="gpkHeroCurrent">01</strong> &nbsp;/&nbsp; <span id="gpkHeroTotal">{{ str_pad(count($heroSlides), 2, '0', STR_PAD_LEFT) }}</span></div>
            <div class="gpk-hero__progress"><div class="gpk-hero__progress-bar" id="gpkHeroProgress"></div></div>
        </div>

        {{-- Scroll cue --}}
        <div class="gpk-hero__scroll">
            <span class="gpk-hero__scroll-line"></span>
            <span>Scroll</span>
        </div>

        {{-- Controls --}}
        <div class="gpk-hero__controls">
            <button class="gpk-hero__btn" id="gpkHeroPrev" aria-label="Previous">
                <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M8.5 2L3.5 7l5 5"/></svg>
            </button>
            <button class="gpk-hero__btn" id="gpkHeroNext" aria-label="Next">
                <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M5.5 2L10.5 7l-5 5"/></svg>
            </button>
        </div>
    </section>


    {{-- =====================================================
         BRAND INTRO
         ===================================================== --}}
    <section class="gpk-intro">
        <div class="gpk-container">
            <div class="gpk-intro__grid">
                <div class="gpk-reveal">
                    <div class="gpk-intro__num">— 01 / Tentang</div>
                    <h2 class="gpk-intro__title">
                        Gabungan <em>Perusahaan Karet</em> Indonesia
                    </h2>
                    <p class="gpk-intro__body">
                        GAPKINDO adalah perkumpulan yang bergerak dalam bidang industri primer karet alam.
                        Tujuan kami adalah mengembangkan serta meningkatkan usaha perkaretan—baik secara
                        kuantitatif maupun kualitatif—ditinjau dari segi produksi, pengolahan, dan pemasarannya
                        sebagai salah satu komoditas ekspor utama Indonesia.
                    </p>

                    <div class="gpk-stats">
                        <div class="gpk-stat">
                            <div class="gpk-stat__num">1947</div>
                            <div class="gpk-stat__label">Tahun Berdiri</div>
                        </div>
                        <div class="gpk-stat">
                            <div class="gpk-stat__num">8</div>
                            <div class="gpk-stat__label">DPW Daerah</div>
                        </div>
                        <div class="gpk-stat">
                            <div class="gpk-stat__num">50+</div>
                            <div class="gpk-stat__label">Negara Tujuan</div>
                        </div>
                    </div>
                </div>

                <div class="gpk-intro__visual gpk-reveal" data-delay="2">
                    <img src="{{ asset('guest/assets/img/slide1/slideNew/8.jpg') }}" alt="Industri Karet Indonesia">
                    <div class="gpk-intro__badge">
                        <div class="gpk-intro__badge-label">— Sejak 1947</div>
                        <div class="gpk-intro__badge-text">Mengawal komoditas karet alam Indonesia ke pasar dunia</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- =====================================================
         GAPKINDO NEWS — DYNAMIC
         ===================================================== --}}
    <section class="gpk-section gpk-section--soft" id="news">
        <div class="gpk-container">
            <div class="gpk-section__head">
                <div class="gpk-reveal">
                    <div class="gpk-section__num">— 02 / Berita</div>
                    <span class="gpk-eyebrow">Latest Update</span>
                    <h2 class="gpk-section__title">Kabar terbaru dari <em>industri karet alam</em></h2>
                </div>
                <div class="gpk-reveal" data-delay="2">
                    <p class="gpk-section__lead">
                        Mengikuti perkembangan harga, regulasi, dan dinamika pasar karet
                        nasional maupun global yang menentukan masa depan industri.
                    </p>
                </div>
            </div>

            <div class="gpk-news__grid">
                @foreach ($dataNews as $idx => $news)
                    <a href="{{ route('detail.news', app(\App\Helpers\Helper::class)->enkrip($news->id)) }}"
                       class="gpk-news-card gpk-reveal"
                       data-delay="{{ ($idx % 3) + 1 }}"
                       title="{{ $news->title }}">
                        <div class="gpk-news-card__image">
                            <img src="{{ asset('guest/assets/img/news/' . $news->image) }}" alt="{{ $news->title }}" loading="lazy">
                        </div>
                        <div class="gpk-news-card__meta">
                            <span>{{ date('d M Y', strtotime($news->created_at)) }}</span>
                            <span class="gpk-news-card__meta-tag">News</span>
                        </div>
                        <h3 class="gpk-news-card__title">{{ \Illuminate\Support\Str::limit($news->title, 80) }}</h3>
                        <span class="gpk-news-card__cta">Baca Selengkapnya</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    {{-- =====================================================
         QUICK ACCESS
         ===================================================== --}}
    <section class="gpk-quick">
        <div class="gpk-container gpk-quick__inner">
            <div class="gpk-section__head" style="margin-bottom: 3rem;">
                <div class="gpk-reveal">
                    <div class="gpk-section__num" style="color: rgba(255,251,242,0.5);">— 03 / Akses Cepat</div>
                    <span class="gpk-eyebrow">Quick Navigation</span>
                    <h2 class="gpk-section__title">Temukan <em>informasi</em> yang Anda butuhkan</h2>
                </div>
            </div>

            <div class="gpk-quick__grid">
                <a href="{{ route('guest.index') }}" class="gpk-quick-link gpk-reveal" data-delay="1">
                    <div class="gpk-quick-link__num">01</div>
                    <svg class="gpk-quick-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M3 11.5L12 4l9 7.5V20a1 1 0 01-1 1h-5v-7h-6v7H4a1 1 0 01-1-1v-8.5z"/></svg>
                    <h3 class="gpk-quick-link__title">{{ __('global.home') }}</h3>
                    <span class="gpk-quick-link__arrow">Beranda →</span>
                </a>

                <a href="{{ route('cabang') }}" class="gpk-quick-link gpk-reveal" data-delay="2">
                    <div class="gpk-quick-link__num">02</div>
                    <svg class="gpk-quick-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="8" r="2.5"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6M15 14c2.8 0 5 2.2 5 5"/></svg>
                    <h3 class="gpk-quick-link__title">{{ __('global.cabang') }}</h3>
                    <span class="gpk-quick-link__arrow">DPW Daerah →</span>
                </a>

                <a href="{{ route('sejarah') }}" class="gpk-quick-link gpk-reveal" data-delay="3">
                    <div class="gpk-quick-link__num">03</div>
                    <svg class="gpk-quick-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M4 4h12a2 2 0 012 2v14l-4-3-4 3-4-3-2 1.5V6a2 2 0 012-2z"/></svg>
                    <h3 class="gpk-quick-link__title">{{ __('global.sejarah') }}</h3>
                    <span class="gpk-quick-link__arrow">Heritage →</span>
                </a>

                <a href="{{ route('kontak') }}" class="gpk-quick-link gpk-reveal" data-delay="4">
                    <div class="gpk-quick-link__num">04</div>
                    <svg class="gpk-quick-link__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.86 19.86 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.86 19.86 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 16.92z"/></svg>
                    <h3 class="gpk-quick-link__title">{{ __('global.kontak') }}</h3>
                    <span class="gpk-quick-link__arrow">Hubungi Kami →</span>
                </a>
            </div>
        </div>
    </section>


    {{-- =====================================================
         BADAN PENGAWAS
         ===================================================== --}}
    <section class="gpk-section">
        <div class="gpk-container">
            <div class="gpk-section__head">
                <div class="gpk-reveal">
                    <div class="gpk-section__num">— 04 / Struktur Organisasi</div>
                    <span class="gpk-eyebrow">Periode 2025 – 2028</span>
                    <h2 class="gpk-section__title">{{ trans('global.badanPengawas') }}</h2>
                </div>
                <div class="gpk-reveal" data-delay="2">
                    <p class="gpk-section__lead">
                        Mengawal jalannya organisasi dan memastikan setiap keputusan strategis
                        sejalan dengan visi GAPKINDO.
                    </p>
                </div>
            </div>

            {{-- Ketua --}}
            <div class="gpk-org__chief gpk-reveal">
                <div class="gpk-org__chief-photo">
                    <a href="{{ route('soon') }}">
                        <img src="{{ asset('guest/assets/img/demo/MARTINUS-S-SINARYA.png') }}" alt="MARTINUS S SINARYA">
                    </a>
                </div>
                <div class="gpk-org__chief-info">
                    <div class="gpk-org__chief-label">Ketua Badan Pengawas</div>
                    <h3 class="gpk-org__chief-name">Martinus S. Sinarya</h3>
                    <div class="gpk-org__chief-role">{{ trans('global.Ketuaaja') }}</div>
                    <p class="gpk-org__chief-bio">
                        Memimpin Badan Pengawas GAPKINDO dengan komitmen pada integritas
                        organisasi dan keberlanjutan industri karet alam Indonesia.
                    </p>
                </div>
            </div>

            {{-- Anggota --}}
            <div class="gpk-org__grid">
                @php
                    $pengawasAnggota = [
                        ['name' => 'Ryanto Wisnuardhy',     'img' => 'RYANTO WISNUARDHI.png'],
                        ['name' => 'Moagraha Gunawan',      'img' => 'MOAGRAHA-GUNAWAN.png'],
                        ['name' => 'Santo Sumono',          'img' => 'SANTO-SUMONO.png'],
                        ['name' => 'Vincentius Oei Kok Sen','img' => 'VINCENTIUS-OEI.png'],
                    ];
                @endphp

                @foreach ($pengawasAnggota as $i => $p)
                    <a href="{{ route('soon') }}" class="gpk-person gpk-reveal" data-delay="{{ $i + 1 }}">
                        <div class="gpk-person__photo">
                            <img src="{{ asset('guest/assets/img/demo/' . $p['img']) }}" alt="{{ $p['name'] }}">
                        </div>
                        <div>
                            <div class="gpk-person__name">{{ $p['name'] }}</div>
                            <div class="gpk-person__role">Anggota</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    {{-- =====================================================
         BADAN PENGURUS
         ===================================================== --}}
    <section class="gpk-section gpk-section--soft">
        <div class="gpk-container">
            <div class="gpk-section__head">
                <div class="gpk-reveal">
                    <div class="gpk-section__num">— 05 / Struktur Organisasi</div>
                    <span class="gpk-eyebrow">Periode 2025 – 2028</span>
                    <h2 class="gpk-section__title">Badan <em>Pengurus</em></h2>
                </div>
                <div class="gpk-reveal" data-delay="2">
                    <p class="gpk-section__lead">
                        Menjalankan operasional organisasi dan mengeksekusi strategi pengembangan
                        industri karet alam nasional.
                    </p>
                </div>
            </div>

            {{-- Ketua Umum + 4 Bidang --}}
            <div class="gpk-board" style="margin-bottom: 4rem;">
                <a href="{{ route('soon') }}" class="gpk-person gpk-board__featured gpk-reveal">
                    <div class="gpk-person__photo">
                        <img src="{{ asset('guest/assets/img/demo/alex-img.png') }}" alt="Alex Kurniawan Edy">
                    </div>
                    <div>
                        <div class="gpk-person__name">Alex Kurniawan Edy</div>
                        <div class="gpk-person__role gpk-person__role--gold">Ketua Umum</div>
                    </div>
                </a>

                @php
                    $pengurus = [
                        ['name' => 'Timmie Melvin',           'role' => 'Sekretaris Umum / Bidang Keuangan',    'img' => 'timmie-img.png'],
                        ['name' => 'Vargo Gunawan',           'role' => 'Bidang Organisasi / Bendahara',         'img' => 'vargo-img.png'],
                        ['name' => 'Erikson Ginting',         'role' => 'Bidang Produksi',                       'img' => 'edrikson-img.png'],
                        ['name' => 'I. Widyantoko Sumarlin',  'role' => 'Bidang Pemasaran',                      'img' => 'widiyantoko-img.png'],
                    ];
                @endphp

                @foreach ($pengurus as $i => $p)
                    <a href="{{ route('soon') }}" class="gpk-person gpk-reveal" data-delay="{{ $i + 2 }}">
                        <div class="gpk-person__photo">
                            <img src="{{ asset('guest/assets/img/demo/' . $p['img']) }}" alt="{{ $p['name'] }}">
                        </div>
                        <div>
                            <div class="gpk-person__name">{{ $p['name'] }}</div>
                            <div class="gpk-person__role">{{ $p['role'] }}</div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Sub-title untuk DPW --}}
            <div class="gpk-reveal" style="margin-bottom: 2.5rem; padding-top: 2.5rem; border-top: 1px solid var(--c-line);">
                <span class="gpk-eyebrow">DPW Daerah</span>
                <h3 style="font-family: var(--f-display); font-size: 1.7rem; font-weight: 400; letter-spacing: -0.02em; margin-top: 0.8rem;">Ketua <em style="font-style: italic; color: var(--c-gold);">Cabang</em> Provinsi</h3>
            </div>

            {{-- 8 Ketua DPW --}}
            <div class="gpk-org__grid">
                @php
                    $dpw = [
                        ['name' => 'Ishak Leono',          'region' => 'Sumatera Utara',                   'img' => 'cabang/ketua/IshakLeono-sumut.png'],
                        ['name' => 'Gusnar Sunardi',       'region' => 'Jambi',                            'img' => 'cabang/ketua/Gusnar Sunardi - Jambi.png'],
                        ['name' => 'Budiman Sutanto',      'region' => 'Bengkulu',                         'img' => 'cabang/ketua/Budiman Sutanto - Bengkulu.png'],
                        ['name' => 'Irwan Mualim',         'region' => 'Sumatera Selatan',                 'img' => 'cabang/ketua/Irwan Mualim - Sumsel.png'],
                        ['name' => 'Tedi Noviandi',        'region' => 'Lampung',                          'img' => 'demo/tedi1.jpg'],
                        ['name' => 'Arif',                 'region' => 'Kalimantan Barat',                 'img' => 'cabang/ketua/Arif - Kalbar.png'],
                        ['name' => 'Andreas Winata',       'region' => 'Kalimantan Selatan-Tengah-Timur',  'img' => 'cabang/ketua/userDefault.png'],
                        ['name' => 'Anthonya M. Saputra',  'region' => 'Jawa',                             'img' => 'cabang/ketua/Anthonya M. Saputera - Jawa'],
                    ];
                @endphp

                @foreach ($dpw as $i => $d)
                    <a href="{{ route('soon') }}" class="gpk-person gpk-reveal" data-delay="{{ ($i % 4) + 1 }}">
                        <div class="gpk-person__photo">
                            <img src="{{ asset('guest/assets/img/' . $d['img']) }}" alt="{{ $d['name'] }}">
                        </div>
                        <div>
                            <div class="gpk-person__name">{{ $d['name'] }}</div>
                            <div class="gpk-person__role gpk-person__role--gold">{{ $d['region'] }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    {{-- =====================================================
         SEKRETARIAT
         ===================================================== --}}
    <section class="gpk-section">
        <div class="gpk-container">
            <div class="gpk-section__head">
                <div class="gpk-reveal">
                    <div class="gpk-section__num">— 06 / Sekretariat</div>
                    <span class="gpk-eyebrow">Operations</span>
                    <h2 class="gpk-section__title">Sekretariat <em>GAPKINDO</em></h2>
                </div>
                <div class="gpk-reveal" data-delay="2">
                    <p class="gpk-section__lead">
                        Menjalankan operasional harian organisasi dan menjadi penghubung antara
                        pengurus, anggota, dan stakeholder.
                    </p>
                </div>
            </div>

            <div class="gpk-secretariat__grid">
                <a href="{{ route('soon') }}" class="gpk-sec-card gpk-reveal">
                    <div class="gpk-sec-card__photo">
                        <img src="{{ asset('guest/assets/img/demo/ERWIN-TUNAS.png') }}" alt="Erwin Tunas">
                    </div>
                    <div>
                        <div class="gpk-sec-card__name">Erwin Tunas</div>
                        <div class="gpk-sec-card__role">Direktur Eksekutif</div>
                    </div>
                </a>

                <a href="{{ route('soon') }}" class="gpk-sec-card gpk-reveal" data-delay="2">
                    <div class="gpk-sec-card__photo">
                        <img src="{{ asset('guest/assets/img/demo/UHENDI-HARIS.png') }}" alt="Uhendi Haris">
                    </div>
                    <div>
                        <div class="gpk-sec-card__name">Uhendi Haris</div>
                        <div class="gpk-sec-card__role">Asisten Direktur Eksekutif</div>
                    </div>
                </a>
            </div>
        </div>
    </section>


    {{-- =====================================================
         CONTACT CTA
         ===================================================== --}}
    <section class="gpk-cta">
        <div class="gpk-container">
            <div class="gpk-cta__inner gpk-reveal">
                <div class="gpk-cta__eyebrow">— Get in touch</div>
                <h2 class="gpk-cta__title">Punya pertanyaan?<br><em>Mari berdiskusi.</em></h2>
                <p class="gpk-cta__sub">
                    Tim GAPKINDO siap membantu Anda dengan informasi seputar industri karet alam,
                    keanggotaan, regulasi, dan kemitraan.
                </p>
                <div class="gpk-cta__phone">(62-21) 3501510, 3501511, 3846813</div>
                <a href="{{ route('kontak') }}" class="gpk-cta__btn">Hubungi Kami</a>
            </div>
        </div>
    </section>

</div>
@endsection


@push('scripts')
<script>
(function() {
    'use strict';

    // ============================================
    // HERO CAROUSEL
    // ============================================
    const hero = document.getElementById('gpkHero');
    if (!hero) return;

    const slides = hero.querySelectorAll('.gpk-hero__slide');
    const total = slides.length;
    const prevBtn = document.getElementById('gpkHeroPrev');
    const nextBtn = document.getElementById('gpkHeroNext');
    const currentLabel = document.getElementById('gpkHeroCurrent');
    const progressBar = document.getElementById('gpkHeroProgress');

    let current = 0;
    let autoTimer = null;
    let progressTimer = null;
    const SLIDE_DURATION = 6500; // ms

    function goTo(index) {
        index = ((index % total) + total) % total;
        slides[current].classList.remove('is-active');
        slides[index].classList.add('is-active');
        current = index;
        if (currentLabel) {
            currentLabel.textContent = String(current + 1).padStart(2, '0');
        }
        resetProgress();
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    function startAuto() {
        stopAuto();
        autoTimer = setInterval(next, SLIDE_DURATION);
        startProgress();
    }

    function stopAuto() {
        if (autoTimer) clearInterval(autoTimer);
        if (progressTimer) clearInterval(progressTimer);
    }

    function resetProgress() {
        if (progressBar) progressBar.style.height = '0%';
        startProgress();
    }

    function startProgress() {
        if (!progressBar) return;
        if (progressTimer) clearInterval(progressTimer);
        let elapsed = 0;
        const step = 50;
        progressTimer = setInterval(() => {
            elapsed += step;
            const pct = Math.min((elapsed / SLIDE_DURATION) * 100, 100);
            progressBar.style.height = pct + '%';
            if (elapsed >= SLIDE_DURATION) clearInterval(progressTimer);
        }, step);
    }

    if (nextBtn) nextBtn.addEventListener('click', () => { next(); startAuto(); });
    if (prevBtn) prevBtn.addEventListener('click', () => { prev(); startAuto(); });

    // Keyboard nav
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') { next(); startAuto(); }
        if (e.key === 'ArrowLeft')  { prev(); startAuto(); }
    });

    // Touch swipe
    let touchStartX = 0;
    hero.addEventListener('touchstart', (e) => { touchStartX = e.touches[0].clientX; }, { passive: true });
    hero.addEventListener('touchend', (e) => {
        const dx = e.changedTouches[0].clientX - touchStartX;
        if (Math.abs(dx) > 40) { dx < 0 ? next() : prev(); startAuto(); }
    }, { passive: true });

    // Pause on hidden tab
    document.addEventListener('visibilitychange', () => {
        document.hidden ? stopAuto() : startAuto();
    });

    startAuto();


    // ============================================
    // SCROLL REVEAL via IntersectionObserver
    // ============================================
    const reveals = document.querySelectorAll('.gpk-reveal');
    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-in');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

        reveals.forEach(el => io.observe(el));
    } else {
        reveals.forEach(el => el.classList.add('is-in'));
    }

})();
</script>
@endpush
