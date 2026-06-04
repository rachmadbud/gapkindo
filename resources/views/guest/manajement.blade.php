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
            --m1: #3b82f6;
            /* 1967 blue */
            --m2: #06b6d4;
            /* 1968 cyan */
            --m3: #22c55e;
            /* 1971 green */
            --m4: #f59e0b;
            /* 1972 amber */
            --m5: #14b8a6;
            /* 1982 teal */
            --m6: #8b5cf6;
            /* 1988 purple */
            --m7: #ef4444;
            /* 1989 red */
            --m8: #fd7e14;
            /* 2016 orange */

            --f-display: 'Fraunces', Georgia, serif;
            --f-sans: 'Manrope', 'Open Sans', sans-serif;
            --f-mono: 'JetBrains Mono', monospace;
        }

        /* GLOBAL RESET (scoped) */
        .gpk-sejarah,
        .gpk-sejarah *,
        .gpk-sejarah *::before,
        .gpk-sejarah *::after {
            box-sizing: border-box;
        }

        .gpk-sejarah {
            background: var(--c-bg);
            color: var(--c-ink);
            font-family: var(--f-sans);
            line-height: 1.6;
        }

        .gpk-sejarah a {
            color: inherit;
            text-decoration: none;
        }

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
            min-width: 1100px;
            /* horizontal scroll on small viewports */
        }

        /* Connecting Rail (horizontal bar) */
        .timeline-rail {
            position: absolute;
            top: 175px;
            /* aligned to bottom of circles */
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

        .timeline-rail::before {
            left: -11px;
        }

        .timeline-rail::after {
            right: -11px;
        }

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
            .timeline-scroll-hint {
                display: block;
            }
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

        .sj-card__text b {
            color: var(--c-leaf);
            font-weight: 700;
        }

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
            .sj-lingkup {
                grid-template-columns: 1fr 1fr;
                gap: 1.2rem;
            }
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
            .timeline-track {
                min-width: 900px;
            }

            .timeline-circle {
                width: 78px;
                height: 78px;
            }

            .timeline-circle svg {
                width: 34px;
                height: 34px;
            }

            .timeline-year {
                font-size: 1.4rem;
            }

            .timeline-content {
                padding: 1.1rem 0.9rem 1.3rem;
                min-height: 240px;
            }

            .timeline-content__title {
                font-size: 1.25rem;
            }

            .timeline-content__desc {
                font-size: 0.92rem;
            }

            .timeline-number {
                font-size: 1.2rem;
            }

            .sj-card__head {
                padding: 1.2rem 1.4rem;
                gap: 0.9rem;
            }

            .sj-card__head svg {
                width: 32px;
                height: 32px;
            }

            .sj-card__title {
                font-size: 1.85rem;
            }

            .sj-card__body {
                padding: 1.4rem 1.4rem 1.6rem;
            }

            .sj-card__text {
                font-size: 1.4rem;
            }

            .sj-list-alpha li {
                font-size: 1.4rem;
            }

            .sj-lingkup__text {
                font-size: 1.3rem;
            }

            .sj-lingkup__icon {
                width: 44px;
                height: 44px;
            }

            .sj-lingkup__icon svg {
                width: 22px;
                height: 22px;
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
                        Manajemen <em>GAPKINDO</em>
                    </h1>
                    <p class="sejarah-hero__lead">
                        Menjalankan operasional organisasi dan mengeksekusi strategi pengembangan industri karet alam
                        nasional.
                    </p>
                </div>
            </div>
        </section>

        @include('guest.partials.ticker')

        {{-- =====================================================
         BADAN PENGAWAS
         ===================================================== --}}
        <section class="gpk-section">
            <div class="gpk-container">
                <div class="gpk-section__head">
                    <div class="gpk-reveal">
                        <span class="gpk-eyebrow">Periode 2025 – 2028</span>
                        <h2 class="gpk-section__title">Badan <em>Pengawas</em></h2>
                    </div>
                    <div class="gpk-reveal" data-delay="2">
                        <p class="gpk-section__lead">
                            Mengawal jalannya organisasi dan memastikan setiap keputusan strategis
                            sejalan dengan visi GAPKINDO.
                        </p>
                    </div>
                </div>

                {{-- Team: 1 baris (Ketua + 4 Anggota) --}}
                <div class="gpk-team gpk-reveal">

                    {{-- Ketua (featured dengan gold ring) --}}
                    <a href="{{ route('soon') }}" class="gpk-team__member gpk-team__member--featured">
                        <div class="gpk-team__photo">
                            <img src="{{ asset('guest/assets/img/demo/MARTINUS-S-SINARYA.png') }}" alt="Martinus S. Sinarya"
                                draggable="false" oncontextmenu="return false">
                        </div>
                        <div class="gpk-team__name">Martinus S. Sinarya</div>
                        <div class="gpk-team__role gpk-team__role--gold">Ketua</div>
                    </a>

                    {{-- 4 Anggota --}}
                    @php
                        $pengawasAnggota = [
                            ['name' => 'Ryanto Wisnuardhy', 'img' => 'RYANTO WISNUARDHI.png'],
                            ['name' => 'Moagraha Gunawan', 'img' => 'MOAGRAHA-GUNAWAN.png'],
                            ['name' => 'Santo Sumono', 'img' => 'SANTO-SUMONO.png'],
                            ['name' => 'Vincentius Oei Kok Sen', 'img' => 'VINCENTIUS-OEI.png'],
                        ];
                    @endphp

                    @foreach ($pengawasAnggota as $p)
                        <a href="{{ route('soon') }}" class="gpk-team__member">
                            <div class="gpk-team__photo">
                                <img src="{{ asset('guest/assets/img/demo/' . $p['img']) }}" alt="{{ $p['name'] }}"
                                    draggable="false" oncontextmenu="return false">
                            </div>
                            <div class="gpk-team__name">{{ $p['name'] }}</div>
                            <div class="gpk-team__role">Anggota</div>
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

                {{-- Team: 1 baris (Ketua Umum + 4 Bidang) --}}
                <div class="gpk-team gpk-reveal" style="margin-bottom: 3rem;">

                    {{-- Ketua Umum (featured dengan gold ring) --}}
                    <a href="{{ route('soon') }}" class="gpk-team__member gpk-team__member--featured">
                        <div class="gpk-team__photo">
                            <img src="{{ asset('guest/assets/img/demo/alex-img.png') }}" alt="Alex Kurniawan Edy"
                                draggable="false" oncontextmenu="return false">
                        </div>
                        <div class="gpk-team__name">Alex Kurniawan Edy</div>
                        <div class="gpk-team__role gpk-team__role--gold">Ketua Umum</div>
                    </a>

                    {{-- 4 Bidang --}}
                    @php
                        $pengurus = [
                            ['name' => 'Timmie Melvin', 'role' => 'Sekretaris Umum', 'img' => 'timmie-img.png'],
                            [
                                'name' => 'Vargo Gunawan',
                                'role' => 'Ketua Bidang Organisasi/Bendahara',
                                'img' => 'vargo-img.png',
                            ],
                            [
                                'name' => 'Erikson Ginting',
                                'role' => 'Ketua Bidang Produksi',
                                'img' => 'edrikson-img.png',
                            ],
                            [
                                'name' => 'I. Widyantoko Sumarlin',
                                'role' => 'Ketua Bidang Pemasaran',
                                'img' => 'widiyantoko-img.png',
                            ],
                        ];
                    @endphp

                    @foreach ($pengurus as $p)
                        <a href="{{ route('soon') }}" class="gpk-team__member">
                            <div class="gpk-team__photo">
                                <img src="{{ asset('guest/assets/img/demo/' . $p['img']) }}" alt="{{ $p['name'] }}"
                                    draggable="false" oncontextmenu="return false">
                            </div>
                            <div class="gpk-team__name">{{ $p['name'] }}</div>
                            <div class="gpk-team__role">{{ $p['role'] }}</div>
                        </a>
                    @endforeach

                </div>

                {{-- Sub-title untuk DPW --}}
                <div class="gpk-reveal"
                    style="margin-bottom: 1.5rem; padding-top: 2rem; border-top: 1px solid var(--c-line); text-align: center;">
                    <h3
                        style="font-family: var(--f-display); font-size: 1.6rem; font-weight: 500; letter-spacing: -0.02em; margin-top: 0.6rem; margin-bottom: 0;">
                        Ketua <em style="font-style: italic; color: var(--c-gold); font-weight: 400;">Cabang / </em>
                        Anggota
                    </h3>
                </div>

                {{-- 8 Ketua DPW dalam 1 baris, rata kiri-kanan sejajar Quick Access --}}
                <div class="gpk-team gpk-team--cabang gpk-reveal">
                    @php
                        $dpw = [
                            [
                                'name' => 'Ishak Leono',
                                'region' => 'Sumatera Utara',
                                'img' => 'cabang/ketua/IshakLeono-sumut.png',
                            ],
                            [
                                'name' => 'Gusnar Sunardi',
                                'region' => 'Jambi',
                                'img' => 'cabang/ketua/Gusnar Sunardi - Jambi.png',
                            ],
                            [
                                'name' => 'Budiman Sutanto',
                                'region' => 'Bengkulu',
                                'img' => 'cabang/ketua/Budiman Sutanto - Bengkulu.png',
                            ],
                            [
                                'name' => 'Irwan Mualim',
                                'region' => 'Sumatera Selatan',
                                'img' => 'cabang/ketua/Irwan Mualim - Sumsel.png',
                            ],
                            ['name' => 'Tedi Noviandi', 'region' => 'Lampung', 'img' => 'demo/tedi1.jpg'],
                            [
                                'name' => 'Arif',
                                'region' => 'Kalimantan Barat',
                                'img' => 'cabang/ketua/Arif - Kalbar.png',
                            ],
                            [
                                'name' => 'Andreas Winata',
                                'region' => 'Kalsel-Teng-Tim',
                                'img' => 'cabang/ketua/userDefault.png',
                            ],
                            [
                                'name' => 'Anthonya M. Saputra',
                                'region' => 'Jawa',
                                'img' => 'cabang/ketua/Anthonya M. Saputera - Jawa',
                            ],
                        ];
                    @endphp

                    @foreach ($dpw as $d)
                        <a href="{{ route('soon') }}" class="gpk-team__member">
                            <div class="gpk-team__photo">
                                <img src="{{ asset('guest/assets/img/' . $d['img']) }}" alt="{{ $d['name'] }}"
                                    draggable="false" oncontextmenu="return false">
                            </div>
                            <div class="gpk-team__name">{{ $d['name'] }}</div>
                            <div class="gpk-team__role gpk-team__role--gold">{{ $d['region'] }}</div>
                        </a>
                    @endforeach
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

    </div>

@endsection
