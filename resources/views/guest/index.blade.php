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

        .gpk-premium img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .gpk-premium a {
            color: inherit;
            text-decoration: none;
        }

        .gpk-premium h1,
        .gpk-premium h2,
        .gpk-premium h3,
        .gpk-premium h4 {
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

        /* Body sections (di bawah hero, di atas footer): padding kanan/kiri 16px */
        .gpk-premium .gpk-intro .gpk-container,
        .gpk-premium .gpk-section .gpk-container,
        .gpk-premium .gpk-quick .gpk-container,
        .gpk-premium .gpk-cta .gpk-container {
            padding-left: 16px;
            padding-right: 16px;
            max-width: 100%;
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
            /* Veil DIMATIKAN — foto 100% asli, tanpa overlay sama sekali */
            background: transparent;
            pointer-events: none;
        }

        .gpk-hero__grain {
            position: absolute;
            inset: 0;
            /* Grain DIMATIKAN */
            opacity: 0;
            pointer-events: none;
        }

        /* ===== Optional: brightness booster jika foto asli memang gelap ===== */
        /* Kalau foto asli sendiri gelap (low exposure), aktifkan filter di bawah
                                                   dengan menghapus tanda komentar pada baris brightness(...) saturate(...) */
        .gpk-hero__image {
            /* filter: brightness(1.12) saturate(1.10) contrast(1.05); */
        }

        /* ===== RIBBON MODERN (kategori badge, ala gapkindosu.org) ===== */
        /* ===== RIBBON CORNER (rotated 45° di sudut kanan-atas) ===== */
        .gpk-hero__ribbon {
            position: absolute;
            top: 48px;
            right: -68px;
            width: 260px;
            padding: 0.65rem 0;
            text-align: center;
            color: white;
            font-family: 'Manrope', 'Open Sans', sans-serif;
            font-size: clamp(0.78rem, 1vw, 0.92rem);
            font-weight: 800;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
            transform: rotate(45deg) translateY(-30px);
            transform-origin: center;
            box-shadow:
                0 8px 22px rgba(0, 0, 0, 0.40),
                inset 0 1px 0 rgba(255, 255, 255, 0.25),
                inset 0 -1px 0 rgba(0, 0, 0, 0.18);
            z-index: 4;
            opacity: 0;
        }

        /* "Fold" effect — dark triangle di kedua ujung simulasi ribbon wrap */
        .gpk-hero__ribbon::before,
        .gpk-hero__ribbon::after {
            content: "";
            position: absolute;
            bottom: -8px;
            width: 0;
            height: 0;
            border-style: solid;
            z-index: -1;
        }

        .gpk-hero__ribbon::before {
            left: 0;
            border-width: 8px 8px 0 0;
            border-color: rgba(0, 0, 0, 0.55) transparent transparent transparent;
        }

        .gpk-hero__ribbon::after {
            right: 0;
            border-width: 8px 0 0 8px;
            border-color: rgba(0, 0, 0, 0.55) transparent transparent transparent;
        }

        .gpk-hero__slide.is-active .gpk-hero__ribbon {
            animation: gpkRibbonIn 0.85s var(--ease-out) 0.4s forwards;
        }

        @keyframes gpkRibbonIn {
            from {
                opacity: 0;
                transform: rotate(45deg) translateY(-30px);
            }

            to {
                opacity: 1;
                transform: rotate(45deg) translateY(0);
            }
        }

        /* Ribbon color variants — gradient untuk dimensional feel */
        .gpk-hero__ribbon.bg-success {
            background: linear-gradient(135deg, #2d8657 0%, #198754 50%, #0f5c39 100%);
        }

        .gpk-hero__ribbon.bg-warning {
            background: linear-gradient(135deg, #ffd54a 0%, #ffc107 50%, #c69500 100%);
            color: #212529;
            text-shadow: 0 1px 2px rgba(255, 255, 255, 0.45);
        }

        .gpk-hero__ribbon.bg-primary {
            background: linear-gradient(135deg, #4a92ff 0%, #0d6efd 50%, #0747a3 100%);
        }

        .gpk-hero__ribbon.bg-info {
            background: linear-gradient(135deg, #4cdaf3 0%, #0dcaf0 50%, #0997b3 100%);
        }

        .gpk-hero__ribbon.bg-danger {
            background: linear-gradient(135deg, #ed5868 0%, #dc3545 50%, #a02530 100%);
        }

        .gpk-hero__ribbon.bg-secondary {
            background: linear-gradient(135deg, #8a9197 0%, #6c757d 50%, #4a5158 100%);
        }

        /* ===== CAROUSEL CAPTION (bottom position, hampir mepet bawah) ===== */
        .gpk-hero__content {
            position: absolute;
            bottom: clamp(4rem, 9vh, 6rem);
            left: 0;
            right: 0;
            z-index: 2;
            padding: 0 clamp(1.2rem, 4vw, 3rem);
        }

        .gpk-hero__inner {
            max-width: 1100px;
            margin: 0 auto;
            text-align: center;
            color: white;
            /* Glass box — sangat transparan */
            background: rgba(0, 0, 0, 0.14);
            backdrop-filter: blur(6px) saturate(125%);
            -webkit-backdrop-filter: blur(6px) saturate(125%);
            border: 1px solid rgba(255, 255, 255, 0.10);
            border-radius: 16px;
            padding: clamp(1.5rem, 4vw, 2.5rem) clamp(1.5rem, 5vw, 4rem);
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.20);
        }

        /* FORCE WHITE — override base .gpk-premium h1 rule */
        .gpk-premium .gpk-hero__title,
        h1.gpk-hero__title {
            font-family: 'Manrope', 'Open Sans', sans-serif !important;
            font-weight: 800 !important;
            font-size: clamp(2.2rem, 5vw, 4.2rem) !important;
            line-height: 1.1 !important;
            letter-spacing: 0.02em !important;
            text-transform: uppercase !important;
            color: #ffffff !important;
            text-align: center !important;
            text-shadow:
                0 3px 6px rgba(0, 0, 0, 0.85),
                0 0 30px rgba(0, 0, 0, 0.7),
                0 2px 14px rgba(0, 0, 0, 0.5) !important;
            margin: 0 0 1.2rem !important;
            opacity: 0;
            transform: translateY(30px);
        }

        .gpk-hero__slide.is-active .gpk-hero__title {
            animation: gpkRise 1s var(--ease-out) 0.5s forwards;
        }

        .gpk-premium .gpk-hero__lead,
        p.gpk-hero__lead {
            font-family: 'Manrope', 'Open Sans', sans-serif !important;
            font-size: clamp(1.15rem, 1.7vw, 1.55rem) !important;
            line-height: 1.5 !important;
            font-weight: 500 !important;
            color: #ffffff !important;
            text-align: center !important;
            text-shadow:
                0 2px 5px rgba(0, 0, 0, 0.8),
                0 0 18px rgba(0, 0, 0, 0.55) !important;
            max-width: 880px !important;
            margin: 0 auto 1.6rem !important;
            opacity: 0;
            transform: translateY(30px);
        }

        .gpk-hero__slide.is-active .gpk-hero__lead {
            animation: gpkRise 1s var(--ease-out) 0.65s forwards;
        }

        /* ===== CTA BUTTON (purple, match navbar accent) ===== */
        .gpk-hero__cta {
            display: inline-flex;
            align-items: center;
            gap: 0.85rem;
            padding: 1rem 2.2rem;
            background: linear-gradient(135deg, #7256ff 0%, #5a40f0 50%, #4830d8 100%);
            color: white;
            font-family: 'Manrope', 'Open Sans', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            text-decoration: none;
            border: none;
            border-radius: 100px;
            box-shadow:
                0 8px 24px rgba(90, 64, 240, 0.45),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transition: all 0.4s var(--ease-out);
            opacity: 0;
            transform: translateY(20px);
            position: relative;
            overflow: hidden;
        }

        /* Shimmer effect on hover */
        .gpk-hero__cta::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transition: left 0.6s cubic-bezier(0.65, 0, 0.35, 1);
            pointer-events: none;
        }

        .gpk-hero__cta:hover::before {
            left: 100%;
        }

        .gpk-hero__slide.is-active .gpk-hero__cta {
            animation: gpkRise 1s var(--ease-out) 0.8s forwards;
        }

        .gpk-hero__cta:hover {
            background: linear-gradient(135deg, #8466ff 0%, #6c50ff 50%, #5840e8 100%);
            transform: translateY(-3px);
            box-shadow:
                0 14px 30px rgba(90, 64, 240, 0.55),
                inset 0 1px 0 rgba(255, 255, 255, 0.25);
            color: white;
            text-decoration: none;
        }

        /* Modern arrow icon — line + arrowhead SVG */
        .gpk-hero__cta::after {
            content: "";
            display: inline-block;
            width: 32px;
            height: 16px;
            background-color: white;
            -webkit-mask-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 16' fill='none' stroke='black' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'><line x1='2' y1='8' x2='28' y2='8'/><polyline points='22,2 30,8 22,14'/></svg>");
            mask-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 16' fill='none' stroke='black' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'><line x1='2' y1='8' x2='28' y2='8'/><polyline points='22,2 30,8 22,14'/></svg>");
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            -webkit-mask-position: center;
            mask-position: center;
            -webkit-mask-size: 32px 16px;
            mask-size: 32px 16px;
            transition: transform 0.45s cubic-bezier(0.34, 1.5, 0.6, 1);
            flex-shrink: 0;
            position: relative;
            z-index: 1;
        }

        .gpk-hero__cta:hover::after {
            transform: translateX(8px);
        }

        /* Caption position adjustments */
        @media (max-width: 768px) {
            .gpk-hero__content {
                bottom: 5rem;
                /* leave space for indicators */
                padding: 0 1rem;
            }

            .gpk-hero__inner {
                padding: 1.6rem 1.4rem;
                border-radius: 12px;
            }

            .gpk-hero__ribbon {
                top: 32px;
                right: -55px;
                width: 210px;
                font-size: 0.7rem;
                letter-spacing: 0.18em;
                padding: 0.5rem 0;
            }
        }

        @keyframes gpkRise {
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        .gpk-hero__btn svg {
            width: 14px;
            height: 14px;
        }

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
            0% {
                left: -100%;
            }

            50% {
                left: 100%;
            }

            100% {
                left: 100%;
            }
        }

        @media (max-width: 768px) {
            .gpk-hero__indicator {
                display: none;
            }

            .gpk-hero__scroll {
                display: none;
            }
        }

        /* ============================================
                                                   2. SECTION BASE
                                                   ============================================ */

        .gpk-section {
            padding: clamp(2.5rem, 5vh, 4rem) 0;
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
            margin-bottom: 1rem;
        }

        .gpk-eyebrow::before {
            content: "";
            width: 32px;
            height: 1px;
            background: var(--c-gold);
        }

        .gpk-section--dark .gpk-eyebrow {
            color: var(--c-gold-soft);
        }

        .gpk-section--dark .gpk-eyebrow::before {
            background: var(--c-gold-soft);
        }

        .gpk-section__title {
            font-family: var(--f-display);
            font-weight: 500;
            font-size: clamp(2rem, 4.5vw, 3.4rem);
            line-height: 1.05;
            letter-spacing: -0.025em;
            max-width: 720px;
            color: var(--c-ink);
        }

        .gpk-section--dark .gpk-section__title {
            color: var(--c-cream);
        }

        .gpk-section__title em {
            font-style: italic;
            font-weight: 400;
            color: var(--c-gold);
        }

        .gpk-section--dark .gpk-section__title em {
            color: var(--c-gold-soft);
        }

        .gpk-section__lead {
            font-size: 1.05rem;
            line-height: 1.6;
            color: var(--c-ink-soft);
            max-width: 580px;
            margin-top: 1rem;
            font-weight: 400;
        }

        .gpk-section--dark .gpk-section__lead {
            color: rgba(255, 251, 242, 0.7);
        }

        .gpk-section__head {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.4rem;
            margin-bottom: clamp(1.5rem, 3vh, 2.2rem);
            align-items: end;
        }

        @media (min-width: 880px) {
            .gpk-section__head {
                grid-template-columns: 1fr 1fr;
                gap: 3rem;
            }
        }

        /* Number tag */
        .gpk-section__num {
            font-family: var(--f-mono);
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.3em;
            color: var(--c-fade);
            margin-bottom: 0.6rem;
            display: block;
        }


        /* ============================================
                                                   3. INTRO BRAND SECTION
                                                   ============================================ */

        .gpk-intro {
            background: var(--c-bg);
            padding: clamp(2rem, 4vh, 3rem) 0;
            position: relative;
        }

        /* HEAD: centered text di atas */
        .gpk-intro__head {
            max-width: 920px;
            margin: 0 auto;
            text-align: center;
        }

        .gpk-intro__num {
            font-family: var(--f-mono);
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.3em;
            color: var(--c-fade);
            margin-bottom: 0.4rem;
        }

        .gpk-intro__head .gpk-eyebrow {
            justify-content: center;
            font-size: 0.95rem;
            letter-spacing: 0.28em;
            margin-bottom: 0.6rem;
        }

        .gpk-intro__head .gpk-eyebrow::before {
            width: 44px;
        }

        .gpk-intro__title {
            font-family: var(--f-display);
            font-weight: 500;
            font-size: clamp(2.4rem, 4.6vw, 3.8rem);
            line-height: 1.1;
            letter-spacing: -0.02em;
            color: var(--c-ink);
            margin-bottom: 0.8rem;
        }

        .gpk-intro__title em {
            font-style: italic;
            font-weight: 400;
            color: var(--c-gold);
        }

        .gpk-intro__body {
            font-size: 1.32rem;
            line-height: 1.6;
            color: var(--c-ink-soft);
            margin: 0 auto;
            max-width: 860px;
        }

        /* STATS: 3 angka horizontal full-width, dengan separator */
        .gpk-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            margin: clamp(1.5rem, 3vh, 2rem) 0;
            border-top: 1px solid var(--c-line);
            border-bottom: 1px solid var(--c-line);
        }

        @media (max-width: 600px) {
            .gpk-stats {
                grid-template-columns: 1fr;
            }

            .gpk-stats .gpk-stat {
                border-right: none !important;
                border-bottom: 1px solid var(--c-line);
            }

            .gpk-stats .gpk-stat:last-child {
                border-bottom: none;
            }
        }

        .gpk-stat {
            padding: clamp(1rem, 2.5vh, 1.5rem) 1.5rem;
            text-align: center;
            border-right: 1px solid var(--c-line);
        }

        .gpk-stat:last-child {
            border-right: none;
        }

        .gpk-stat__num {
            font-family: var(--f-display);
            font-size: clamp(2.6rem, 5vw, 4rem);
            font-weight: 500;
            line-height: 1;
            color: var(--c-leaf);
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
        }

        .gpk-stat__label {
            font-family: var(--f-mono);
            font-size: 0.92rem;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--c-fade);
        }

        /* VISUAL: image full-width landscape */
        .gpk-intro__visual {
            position: relative;
            aspect-ratio: 21 / 9;
            background: var(--c-bg-soft);
            overflow: hidden;
            border-radius: 2px;
            max-width: 100%;
            margin-top: clamp(1.5rem, 3vh, 2rem);
        }

        @media (max-width: 768px) {
            .gpk-intro__visual {
                aspect-ratio: 16 / 10;
            }
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
            bottom: clamp(1.2rem, 3vh, 2rem);
            left: clamp(1.2rem, 3vw, 2rem);
            background: rgba(255, 251, 242, 0.95);
            padding: 1.2rem 1.6rem;
            max-width: 380px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.18);
        }

        .gpk-intro__badge-label {
            font-family: var(--f-mono);
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--c-gold);
            margin-bottom: 0.5rem;
        }

        .gpk-intro__badge-text {
            font-family: var(--f-display);
            font-size: 1.18rem;
            font-style: italic;
            line-height: 1.35;
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

        @media (min-width: 680px) {
            .gpk-news__grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 980px) {
            .gpk-news__grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .gpk-news-card {
            background: transparent;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 1.4rem;
            transition: transform 0.5s var(--ease-out);
        }

        .gpk-news-card:hover {
            transform: translateY(-6px);
        }

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

        .gpk-news-card:hover .gpk-news-card__image img {
            transform: scale(1.06);
        }

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

        .gpk-news-card__meta-tag::before {
            content: "—";
            margin-right: 0.4rem;
            color: var(--c-fade);
        }

        .gpk-news-card__title {
            font-family: var(--f-display);
            font-size: 1.4rem;
            font-weight: 500;
            line-height: 1.2;
            letter-spacing: -0.015em;
            color: var(--c-ink);
            transition: color 0.3s var(--ease-out);
        }

        .gpk-news-card:hover .gpk-news-card__title {
            color: var(--c-leaf);
        }

        .gpk-news-card__cta {
            align-self: flex-start;
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            margin-top: auto;
            padding: 0.7rem 1.5rem;
            background: linear-gradient(180deg, #7256ff 0%, #5a40f0 55%, #4830d8 100%);
            color: #ffffff !important;
            font-family: 'Manrope', 'Open Sans', sans-serif;
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            border-radius: 10px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);
            text-decoration: none !important;
            /* Soft floating 3D */
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.35),
                inset 0 -1px 0 rgba(0, 0, 0, 0.15),
                0 2px 4px rgba(90, 64, 240, 0.22),
                0 5px 10px rgba(90, 64, 240, 0.3),
                0 10px 20px rgba(90, 64, 240, 0.18);
            transition:
                transform 0.35s cubic-bezier(0.34, 1.4, 0.6, 1),
                box-shadow 0.35s cubic-bezier(0.34, 1.4, 0.6, 1),
                background 0.3s ease,
                letter-spacing 0.3s ease;
        }

        .gpk-news-card:hover .gpk-news-card__cta {
            background: linear-gradient(180deg, #8c72ff 0%, #6b51f0 55%, #5a40e0 100%);
            color: #ffffff !important;
            transform: translateY(-3px);
            letter-spacing: 0.2em;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.45),
                inset 0 -1px 0 rgba(0, 0, 0, 0.18),
                0 3px 6px rgba(90, 64, 240, 0.28),
                0 8px 16px rgba(90, 64, 240, 0.4),
                0 16px 28px rgba(90, 64, 240, 0.22);
        }

        .gpk-news-card__cta::after {
            display: none;
        }

        .gpk-news-card__cta-arrow {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            transition: transform 0.4s cubic-bezier(0.34, 1.6, 0.5, 1);
            filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.25));
        }

        .gpk-news-card:hover .gpk-news-card__cta-arrow {
            transform: translateX(6px) scale(1.18);
        }

        /* ============================================
                                                   5. QUICK ACCESS — Colorful Card Style
                                                   ============================================ */

        .gpk-quick {
            background: var(--c-bg);
            color: var(--c-ink);
            padding: clamp(2.5rem, 5vh, 3.5rem) 0;
            position: relative;
        }

        .gpk-quick__head {
            text-align: center;
            max-width: 920px;
            margin: 0 auto clamp(2rem, 4vh, 2.5rem);
        }

        .gpk-quick__num {
            font-family: var(--f-mono);
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.3em;
            color: var(--c-fade);
            margin-bottom: 0.4rem;
        }

        .gpk-quick__head .gpk-eyebrow {
            justify-content: center;
            font-size: 0.95rem;
            letter-spacing: 0.28em;
            margin-bottom: 0.6rem;
        }

        .gpk-quick__head .gpk-eyebrow::before {
            width: 44px;
        }

        .gpk-quick__title {
            font-family: var(--f-display);
            font-weight: 500;
            font-size: clamp(2rem, 4vw, 3.2rem);
            line-height: 1.1;
            letter-spacing: -0.02em;
            color: var(--c-ink);
            margin: 0;
        }

        .gpk-quick__title em {
            font-style: italic;
            font-weight: 400;
            color: var(--c-gold);
        }

        /* === COLORFUL CARDS GRID === */
        .gpk-quick__grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.2rem;
        }

        @media (min-width: 600px) {
            .gpk-quick__grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 980px) {
            .gpk-quick__grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .gpk-quick-card {
            position: relative;
            padding: 1.6rem 1.5rem;
            border-radius: 14px;
            color: white;
            overflow: hidden;
            text-decoration: none;
            transition: transform 0.4s var(--ease-out), box-shadow 0.4s var(--ease-out);
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-family: 'Manrope', 'Open Sans', sans-serif;
        }

        .gpk-quick-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.18);
            text-decoration: none;
            color: white;
        }

        .gpk-quick-card:hover .gpk-quick-card__icon-bg {
            transform: rotate(-8deg) scale(1.05);
            opacity: 0.22;
        }

        .gpk-quick-card:hover .gpk-quick-card__cta-arrow {
            transform: translateX(5px);
        }

        /* Color variants — match referensi user */
        .gpk-quick-card--teal {
            background: #0F766E;
        }

        /* teal */
        .gpk-quick-card--purple {
            background: #6B21A8;
        }

        /* purple */
        .gpk-quick-card--emerald {
            background: #047857;
        }

        /* emerald green */
        .gpk-quick-card--amber {
            background: #B45309;
        }

        /* amber/orange */

        /* Background icon (decorative) */
        .gpk-quick-card__icon-bg {
            position: absolute;
            right: 0.8rem;
            bottom: 4.2rem;
            width: 100px;
            height: 100px;
            opacity: 0.18;
            color: white;
            pointer-events: none;
            transition: transform 0.5s var(--ease-out), opacity 0.5s var(--ease-out);
        }

        /* Card content */
        .gpk-quick-card__top {
            position: relative;
            z-index: 1;
        }

        .gpk-quick-card__label {
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.88);
            margin-bottom: 0.6rem;
        }

        .gpk-quick-card__title {
            font-size: clamp(1.5rem, 2.2vw, 1.85rem);
            font-weight: 700;
            line-height: 1.15;
            color: white;
            margin: 0 0 0.4rem;
            letter-spacing: -0.01em;
        }

        .gpk-quick-card__title small {
            font-size: 0.6em;
            font-weight: 500;
            opacity: 0.85;
            margin-left: 0.4rem;
        }

        .gpk-quick-card__sub {
            font-size: 0.88rem;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.78);
            line-height: 1.4;
            margin: 0;
        }

        /* CTA at bottom */
        .gpk-quick-card__cta {
            position: relative;
            z-index: 1;
            font-size: 0.92rem;
            font-weight: 600;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding-top: 0.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.22);
            margin-top: 1rem;
        }

        .gpk-quick-card__cta-arrow {
            transition: transform 0.3s var(--ease-out);
            display: inline-block;
        }

        /* ============================================
                                                   6. ORGANIZATION (Team Thumbnail Row)
                                                   Foto thumbnail circle, mencegah download/drag
                                                   ============================================ */

        .gpk-team {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 2rem 2.4rem;
            margin-top: 2rem;
        }

        /* Modifier untuk Cabang Provinsi: rata kiri-kanan (sejajar Quick Access) */
        .gpk-team--cabang {
            justify-content: space-between;
            gap: 2rem 1rem;
        }

        .gpk-team__member {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 0.8rem;
            flex: 0 0 auto;
            max-width: 180px;
            text-decoration: none;
            color: inherit;
            transition: transform 0.4s var(--ease-out);
        }

        .gpk-team__member:hover {
            transform: translateY(-4px);
            text-decoration: none;
            color: inherit;
        }

        /* Cabang member — flex grow agar 8 sejajar penuh container */
        .gpk-team--cabang .gpk-team__member {
            flex: 1 1 calc(12.5% - 1rem);
            min-width: 120px;
            max-width: 160px;
        }

        .gpk-team__photo {
            width: clamp(120px, 13vw, 150px);
            height: clamp(120px, 13vw, 150px);
            border-radius: 50%;
            overflow: hidden;
            background: var(--c-bg-soft);
            border: 2px solid transparent;
            position: relative;
            transition: border-color 0.4s var(--ease-out), box-shadow 0.4s var(--ease-out);
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            -webkit-user-drag: none;
        }

        .gpk-team__photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
            -webkit-user-drag: none;
            user-drag: none;
        }

        .gpk-team__member:hover .gpk-team__photo {
            border-color: var(--c-gold-soft);
            box-shadow: 0 10px 24px rgba(184, 145, 30, 0.25);
        }

        /* Featured (Ketua/Ketua Umum) — gold ring, lebih besar */
        .gpk-team__member--featured .gpk-team__photo {
            width: clamp(145px, 15vw, 175px);
            height: clamp(145px, 15vw, 175px);
            border: 3px solid var(--c-gold);
            box-shadow: 0 8px 22px rgba(184, 145, 30, 0.25);
        }

        .gpk-team__member--featured:hover .gpk-team__photo {
            box-shadow: 0 12px 28px rgba(184, 145, 30, 0.4);
        }

        /* Cabang thumbnail size (lebih kecil sedikit karena 8 dalam 1 baris) */
        .gpk-team--cabang .gpk-team__photo {
            width: clamp(110px, 11vw, 135px);
            height: clamp(110px, 11vw, 135px);
        }

        .gpk-team__name {
            font-family: var(--f-display);
            font-size: 1rem;
            font-weight: 500;
            line-height: 1.25;
            letter-spacing: -0.01em;
            color: var(--c-ink);
            margin: 0;
        }

        .gpk-team__member--featured .gpk-team__name {
            font-size: 1.1rem;
        }

        .gpk-team__role {
            font-family: var(--f-mono);
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--c-fade);
            line-height: 1.4;
        }

        .gpk-team__role--gold {
            color: var(--c-gold);
        }

        /* Dark section variant */
        .gpk-section--dark .gpk-team__name {
            color: var(--c-cream);
        }

        .gpk-section--dark .gpk-team__role {
            color: rgba(255, 251, 242, 0.55);
        }

        .gpk-section--dark .gpk-team__role--gold {
            color: var(--c-gold-soft);
        }

        .gpk-section--dark .gpk-team__photo {
            background: rgba(255, 255, 255, 0.05);
        }

        /* Mobile: 5-person rows wrap, cabang juga wrap proporsional */
        @media (max-width: 720px) {
            .gpk-team--cabang {
                justify-content: center;
                gap: 1.6rem 1.4rem;
            }

            .gpk-team--cabang .gpk-team__member {
                flex: 0 0 auto;
            }
        }

        /* ============================================
                                                   7. CONTACT CTA
                                                   ============================================ */

        .gpk-cta {
            background: var(--c-bg);
            color: var(--c-ink);
            padding: clamp(2.5rem, 5vh, 4rem) 0;
            position: relative;
            overflow: hidden;
        }

        .gpk-cta::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at top right, rgba(184, 145, 30, 0.08), transparent 60%),
                radial-gradient(ellipse at bottom left, rgba(44, 85, 48, 0.06), transparent 60%);
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
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.32em;
            text-transform: uppercase;
            color: var(--c-gold);
            margin-bottom: 1.2rem;
        }

        .gpk-cta__title {
            font-family: var(--f-display);
            font-weight: 500;
            font-size: clamp(2rem, 4.5vw, 3.4rem);
            line-height: 1.1;
            letter-spacing: -0.025em;
            color: var(--c-ink);
            margin-bottom: 1.2rem;
        }

        .gpk-cta__title em {
            font-style: italic;
            font-weight: 400;
            color: var(--c-gold);
        }

        .gpk-cta__phone {
            font-family: var(--f-display);
            font-size: clamp(1.4rem, 2.6vw, 2rem);
            font-weight: 500;
            color: var(--c-leaf);
            margin: 1.2rem 0;
            letter-spacing: 0.02em;
        }

        .gpk-cta__sub {
            font-size: 1.1rem;
            color: var(--c-ink-soft);
            line-height: 1.6;
            margin-bottom: 1.8rem;
            max-width: 640px;
            margin-left: auto;
            margin-right: auto;
        }

        .gpk-cta__btn,
        .gpk-premium .gpk-cta__btn {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            padding: 1.05rem 2.5rem;
            background: linear-gradient(180deg, #7256ff 0%, #5a40f0 55%, #4830d8 100%);
            color: #ffffff !important;
            font-family: 'Manrope', 'Open Sans', sans-serif;
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            text-decoration: none !important;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            position: relative;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
            /* Soft floating 3D — no stacked solid edge */
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.4),
                /* top highlight */
                inset 0 -1px 0 rgba(0, 0, 0, 0.15),
                /* subtle bottom inset */
                0 2px 4px rgba(90, 64, 240, 0.25),
                /* tight close */
                0 6px 14px rgba(90, 64, 240, 0.35),
                /* mid float */
                0 14px 28px rgba(90, 64, 240, 0.25),
                /* far drift */
                0 22px 44px rgba(90, 64, 240, 0.15);
            /* ambient */
            transition:
                transform 0.35s cubic-bezier(0.34, 1.4, 0.6, 1),
                box-shadow 0.35s cubic-bezier(0.34, 1.4, 0.6, 1),
                font-size 0.3s cubic-bezier(0.34, 1.4, 0.6, 1),
                letter-spacing 0.3s ease,
                background 0.3s ease;
            will-change: transform, box-shadow;
        }

        .gpk-cta__btn:hover,
        .gpk-premium .gpk-cta__btn:hover {
            background: linear-gradient(180deg, #8c72ff 0%, #6b51f0 55%, #5a40e0 100%);
            color: #ffffff !important;
            text-decoration: none !important;
            transform: translateY(-5px);
            font-size: 1.05rem;
            letter-spacing: 0.22em;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.5),
                inset 0 -1px 0 rgba(0, 0, 0, 0.18),
                0 4px 8px rgba(90, 64, 240, 0.3),
                0 12px 22px rgba(90, 64, 240, 0.45),
                0 22px 40px rgba(90, 64, 240, 0.32),
                0 32px 60px rgba(90, 64, 240, 0.18);
        }

        .gpk-cta__btn:active,
        .gpk-premium .gpk-cta__btn:active {
            transform: translateY(-1px);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.35),
                inset 0 -1px 0 rgba(0, 0, 0, 0.15),
                0 2px 4px rgba(90, 64, 240, 0.3),
                0 4px 10px rgba(90, 64, 240, 0.35);
        }

        .gpk-cta__btn::after {
            content: "";
            display: none;
        }

        .gpk-cta__btn-arrow {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            transition: transform 0.4s cubic-bezier(0.34, 1.6, 0.5, 1);
            filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.25));
        }

        .gpk-cta__btn:hover .gpk-cta__btn-arrow {
            transform: translateX(8px) scale(1.2);
        }

        /* ============================================
                                                   8. SECRETARIAT
                                                   ============================================ */

        .gpk-secretariat__grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 680px) {
            .gpk-secretariat__grid {
                grid-template-columns: 1fr 1fr;
            }
        }

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

        .gpk-reveal[data-delay="1"] {
            transition-delay: 0.1s;
        }

        .gpk-reveal[data-delay="2"] {
            transition-delay: 0.2s;
        }

        .gpk-reveal[data-delay="3"] {
            transition-delay: 0.3s;
        }

        .gpk-reveal[data-delay="4"] {
            transition-delay: 0.4s;
        }

        .gpk-reveal[data-delay="5"] {
            transition-delay: 0.5s;
        }

        .gpk-reveal[data-delay="6"] {
            transition-delay: 0.6s;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
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
                            'img' => '1.jpg',
                            'ribbon' => 'NATURAL',
                            'color' => 'success',
                            'title' => 'INDUSTRI KARET ALAM INDONESIA',
                            'lead' =>
                                'GAPKINDO mengawal dan mengembangkan industri primer karet alam Indonesia sebagai komoditas ekspor utama nasional.',
                            'cta' => null,
                        ],
                        [
                            'img' => '2.jpg',
                            'ribbon' => 'HERITAGE',
                            'color' => 'warning',
                            'title' => 'WARISAN PERKEBUNAN BERKELANJUTAN',
                            'lead' =>
                                'Dari hulu ke hilir, mengawal mutu dan standar produksi karet Indonesia agar tetap relevan di pasar global.',
                            'cta' => ['url' => route('sejarah'), 'text' => 'SEJARAH'],
                        ],
                        [
                            'img' => '3.jpg',
                            'ribbon' => 'PROCESSING',
                            'color' => 'primary',
                            'title' => 'PENGOLAHAN BERSTANDAR DUNIA',
                            'lead' =>
                                'Setiap tahap produksi mengikuti standar mutu internasional, dari pengolahan hingga pengiriman ke pelabuhan tujuan.',
                            'cta' => null,
                        ],
                        [
                            'img' => '4.jpg',
                            'ribbon' => 'GLOBAL MARKET',
                            'color' => 'info',
                            'title' => 'KOMODITAS EKSPOR UTAMA',
                            'lead' =>
                                'Karet alam Indonesia menjangkau lebih dari 50 negara dan menjadi penopang devisa nasional yang signifikan.',
                            'cta' => null,
                        ],
                        [
                            'img' => '5.jpg',
                            'ribbon' => 'COMMUNITY',
                            'color' => 'danger',
                            'title' => 'EKOSISTEM PERKARETAN NASIONAL',
                            'lead' =>
                                'Menyatukan pelaku usaha, pemerintah, dan petani dalam satu visi pengembangan industri karet alam Indonesia.',
                            'cta' => ['url' => route('anggota'), 'text' => 'ANGGOTA'],
                        ],
                        [
                            'img' => '6.jpg',
                            'ribbon' => 'SUSTAINABLE',
                            'color' => 'success',
                            'title' => 'KARET ALAM RAMAH LINGKUNGAN',
                            'lead' =>
                                'Industri yang menyerap karbon, menjaga keanekaragaman hayati, dan menyejahterakan masyarakat sekitar perkebunan.',
                            'cta' => null,
                        ],
                    ];
                @endphp

                @foreach ($heroSlides as $i => $s)
                    <div class="gpk-hero__slide {{ $i === 0 ? 'is-active' : '' }}" data-index="{{ $i }}">
                        <div class="gpk-hero__image"
                            style="background-image: url('{{ asset('guest/assets/img/slide1/slideNew/' . $s['img']) }}');">
                        </div>
                        <div class="gpk-hero__veil"></div>
                        <div class="gpk-hero__grain"></div>

                        {{-- RIBBON kategori (kiri-atas) --}}
                        <div class="gpk-hero__ribbon bg-{{ $s['color'] }}">{{ $s['ribbon'] }}</div>

                        {{-- CAPTION (center-bottom) --}}
                        <div class="gpk-hero__content">
                            <div class="gpk-hero__inner">
                                <h1 class="gpk-hero__title">{{ $s['title'] }}</h1>
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
                <div class="gpk-hero__num"><strong id="gpkHeroCurrent">01</strong> &nbsp;/&nbsp; <span
                        id="gpkHeroTotal">{{ str_pad(count($heroSlides), 2, '0', STR_PAD_LEFT) }}</span></div>
                <div class="gpk-hero__progress">
                    <div class="gpk-hero__progress-bar" id="gpkHeroProgress"></div>
                </div>
            </div>

            {{-- Scroll cue --}}
            <div class="gpk-hero__scroll">
                <span class="gpk-hero__scroll-line"></span>
                <span>Scroll</span>
            </div>

            {{-- Controls --}}
            <div class="gpk-hero__controls">
                <button class="gpk-hero__btn" id="gpkHeroPrev" aria-label="Previous">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.4">
                        <path d="M8.5 2L3.5 7l5 5" />
                    </svg>
                </button>
                <button class="gpk-hero__btn" id="gpkHeroNext" aria-label="Next">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.4">
                        <path d="M5.5 2L10.5 7l-5 5" />
                    </svg>
                </button>
            </div>
        </section>


        {{-- =====================================================
         DATE + RUNNING TEXT BAND (via partial — used across all pages)
         ===================================================== --}}
        @include('guest.partials.ticker')


        {{-- =====================================================
         BRAND INTRO
         ===================================================== --}}
        <section class="gpk-intro">
            <div class="gpk-container">

                {{-- HEAD: centered intro --}}
                <div class="gpk-intro__head gpk-reveal">
                    <span class="gpk-eyebrow">Tentang GAPKINDO</span>
                    <h2 class="gpk-intro__title">
                        Gabungan <em>Perusahaan Karet</em> Indonesia
                    </h2>
                    <p class="gpk-intro__body">
                        GAPKINDO adalah perkumpulan yang bergerak dalam bidang industri primer karet alam.
                        Tujuan kami adalah mengembangkan serta meningkatkan usaha perkaretan—baik secara
                        kuantitatif maupun kualitatif—ditinjau dari segi produksi, pengolahan, dan pemasarannya
                        sebagai salah satu komoditas ekspor utama Indonesia.
                    </p>
                </div>

                {{-- STATS: 3 angka horizontal full-width --}}
                <div class="gpk-stats gpk-reveal" data-delay="2">
                    <div class="gpk-stat">
                        <div class="gpk-stat__num">1947</div>
                        <div class="gpk-stat__label">Tahun Berdiri</div>
                    </div>
                    <div class="gpk-stat">
                        <div class="gpk-stat__num">8</div>
                        <div class="gpk-stat__label">Cabang</div>
                    </div>
                    <div class="gpk-stat">
                        <div class="gpk-stat__num">100+</div>
                        <div class="gpk-stat__label">Negara Tujuan Ekspor</div>
                    </div>
                </div>

            </div>
        </section>

        {{-- =====================================================
            ORGANIZATION — Team thumbnail row
         ===================================================== --}}


        {{-- =====================================================
         QUICK NAVIGATION — Cards menuju halaman utama
         Posisi: sebelum CTA Kontak (sebelum footer)
         ===================================================== --}}
        <section class="gpk-quick">
            <div class="gpk-container">

                {{-- HEAD --}}
                <div class="gpk-quick__head gpk-reveal">
                    <div class="gpk-quick__num">— Quick Navigation</div>
                    <span class="gpk-eyebrow">Akses Cepat</span>
                    <h2 class="gpk-quick__title">Jelajahi lebih lanjut <em>GAPKINDO</em></h2>
                </div>

                {{-- GRID 4 COLORFUL CARDS --}}
                <div class="gpk-quick__grid">

                    {{-- Card 1: LINK EKSTERNAL (teal) → buka menu Tautan di navbar --}}
                    <a href="#" class="gpk-quick-card gpk-quick-card--teal gpk-reveal" data-delay="1"
                        id="quickOpenTautan">
                        <div class="gpk-quick-card__top">
                            <div class="gpk-quick-card__label">Mitra Resmi</div>
                            <div class="gpk-quick-card__title">Link Eksternal</div>
                            <p class="gpk-quick-card__sub">Akses cepat ke menu Tautan: kementerian & mitra internasional
                            </p>
                        </div>
                        <svg class="gpk-quick-card__icon-bg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z" />
                        </svg>
                        <span class="gpk-quick-card__cta">Buka Menu Tautan <span
                                class="gpk-quick-card__cta-arrow">→</span></span>
                    </a>

                    {{-- Card 2: ARSIP BERITA (purple) → Media › Berita --}}
                    <a href="{{ route('berita') }}" class="gpk-quick-card gpk-quick-card--purple gpk-reveal"
                        data-delay="2">
                        <div class="gpk-quick-card__top">
                            <div class="gpk-quick-card__label">Media › Berita</div>
                            <div class="gpk-quick-card__title">Arsip Berita</div>
                            <p class="gpk-quick-card__sub">Kabar terbaru industri karet alam Indonesia</p>
                        </div>
                        <svg class="gpk-quick-card__icon-bg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M20 3H3c-1.1 0-2 .9-2 2v11c0 1.1.9 2 2 2h3v3l3-3h11c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 7h13v2H5V7zm8 7H5v-2h8v2zm5-3H5V9h13v2z" />
                        </svg>
                        <span class="gpk-quick-card__cta">Baca Berita <span
                                class="gpk-quick-card__cta-arrow">→</span></span>
                    </a>

                    {{-- Card 3: GALERI (emerald) → Media › Galeri --}}
                    <a href="{{ route('galeri') }}" class="gpk-quick-card gpk-quick-card--emerald gpk-reveal"
                        data-delay="3">
                        <div class="gpk-quick-card__top">
                            <div class="gpk-quick-card__label">Media › Galeri</div>
                            <div class="gpk-quick-card__title">Galeri Kegiatan</div>
                            <p class="gpk-quick-card__sub">Dokumentasi acara, kongres, dan kegiatan GAPKINDO</p>
                        </div>
                        <svg class="gpk-quick-card__icon-bg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z" />
                        </svg>
                        <span class="gpk-quick-card__cta">Lihat Galeri <span
                                class="gpk-quick-card__cta-arrow">→</span></span>
                    </a>

                    {{-- Card 4: CABANG GAPKINDO (amber) → About Us › Cabang --}}
                    <a href="{{ route('cabang') }}" class="gpk-quick-card gpk-quick-card--amber gpk-reveal"
                        data-delay="4">
                        <div class="gpk-quick-card__top">
                            <div class="gpk-quick-card__label">Tentang Kami › Cabang</div>
                            <div class="gpk-quick-card__title">Cabang GAPKINDO</div>
                            <p class="gpk-quick-card__sub">Jaringan 8 cabang di provinsi penghasil karet</p>
                        </div>
                        <svg class="gpk-quick-card__icon-bg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                        <span class="gpk-quick-card__cta">Lihat Cabang <span
                                class="gpk-quick-card__cta-arrow">→</span></span>
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
                    <a href="{{ route('kontak') }}" class="gpk-cta__btn">
                        <span>Peta Lokasi</span>
                        <svg class="gpk-cta__btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 12h14" />
                            <path d="M13 6l6 6-6 6" />
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

            function next() {
                goTo(current + 1);
            }

            function prev() {
                goTo(current - 1);
            }

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

            if (nextBtn) nextBtn.addEventListener('click', () => {
                next();
                startAuto();
            });
            if (prevBtn) prevBtn.addEventListener('click', () => {
                prev();
                startAuto();
            });

            // Keyboard nav
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') {
                    next();
                    startAuto();
                }
                if (e.key === 'ArrowLeft') {
                    prev();
                    startAuto();
                }
            });

            // Touch swipe
            let touchStartX = 0;
            hero.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            }, {
                passive: true
            });
            hero.addEventListener('touchend', (e) => {
                const dx = e.changedTouches[0].clientX - touchStartX;
                if (Math.abs(dx) > 40) {
                    dx < 0 ? next() : prev();
                    startAuto();
                }
            }, {
                passive: true
            });

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
                }, {
                    threshold: 0.12,
                    rootMargin: '0px 0px -60px 0px'
                });

                reveals.forEach(el => io.observe(el));
            } else {
                reveals.forEach(el => el.classList.add('is-in'));
            }


            // ============================================
            // QUICK ACCESS: Link Eksternal card → buka navbar Tautan dropdown
            // ============================================
            const quickOpenTautan = document.getElementById('quickOpenTautan');
            if (quickOpenTautan) {
                quickOpenTautan.addEventListener('click', (e) => {
                    e.preventDefault();

                    // Scroll ke atas dulu
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    // Buka dropdown Tautan setelah scroll selesai
                    setTimeout(() => {
                        // Cari dropdown Tautan via icon fa-book (yang unik untuk menu ini)
                        const navDropdowns = document.querySelectorAll('.gpk-nav__item--dropdown');
                        let tautanFound = false;

                        navDropdowns.forEach(item => {
                            const icon = item.querySelector('.fa-book');
                            if (icon) {
                                // Close other dropdowns first
                                navDropdowns.forEach(d => d.classList.remove('is-open'));
                                // Open Tautan
                                item.classList.add('is-open');
                                const trigger = item.querySelector('.gpk-nav__link');
                                if (trigger) trigger.setAttribute('aria-expanded', 'true');
                                tautanFound = true;
                            }
                        });

                        // Highlight visual: scroll to navbar position
                        if (tautanFound) {
                            const nav = document.getElementById('gpkNav');
                            if (nav) nav.style.top = '0';
                        }
                    }, 700);
                });
            }

        })();
    </script>
@endpush
