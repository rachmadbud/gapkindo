{{--
    ============================================================
    GAPKINDO FOOTER — Ultra Minimal (2-column grid)
    Brand kiri, Meta kanan (3 items dalam 1 baris dengan separator)
    ============================================================
--}}

<style>
    .gpk-footer-min {
        background: var(--c-bg, #FAF7F0);
        color: var(--c-ink, #1A2E1F);
        border-top: 1px solid var(--c-line, rgba(26, 46, 31, 0.10));
    }
    .gpk-footer-min__bar {
        padding: 1.6rem 0;
        background: rgba(26, 46, 31, 0.03);
    }
    /* 2 × 1 GRID — Brand kiri, Meta kanan */
    .gpk-footer-min__bar-inner {
        display: grid;
        grid-template-columns: auto 1fr;
        align-items: center;
        gap: 1.2rem 2rem;
        font-family: 'Manrope', sans-serif;
        font-size: 12pt;
        color: var(--c-fade, #6b7770);
        line-height: 1.55;
    }

    /* LEFT: Brand */
    .gpk-footer-min__brand {
        display: inline-flex;
        align-items: center;
        gap: 0.85rem;
        text-decoration: none;
        color: inherit;
        transition: opacity 0.3s ease;
        justify-self: start;
        white-space: nowrap;
    }
    .gpk-footer-min__brand:hover { opacity: 0.7; color: inherit; }
    .gpk-footer-min__brand img {
        height: 36px;
        width: auto;
        flex-shrink: 0;
    }
    .gpk-footer-min__brand strong {
        font-weight: 700;
        color: var(--c-ink, #1A2E1F);
        letter-spacing: 0.02em;
    }

    /* RIGHT: Meta — 3 items dalam 1 baris dengan separator */
    .gpk-footer-min__meta {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: flex-end;
        gap: 0;
        justify-self: end;
        white-space: nowrap;
    }
    .gpk-footer-min__meta span {
        display: inline-flex;
        align-items: center;
        white-space: nowrap;
    }
    .gpk-footer-min__meta span + span::before {
        content: "•";
        margin: 0 0.85rem;
        color: rgba(26, 46, 31, 0.30);
        font-weight: 700;
        flex-shrink: 0;
    }
    .gpk-footer-min__meta a {
        color: inherit;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.25s ease;
    }
    .gpk-footer-min__meta a:hover { color: #5a40f0; }

    /* Tablet medium: kalau terlalu sempit, sedikit kompak */
    @media (max-width: 1200px) {
        .gpk-footer-min__bar-inner {
            font-size: 11pt;
            gap: 1rem 1.5rem;
        }
        .gpk-footer-min__meta span + span::before {
            margin: 0 0.65rem;
        }
    }

    /* Mobile: stack ke 1 kolom + meta vertikal */
    @media (max-width: 900px) {
        .gpk-footer-min__bar-inner {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 1rem;
            font-size: 12pt;
        }
        .gpk-footer-min__brand {
            justify-self: center;
        }
        .gpk-footer-min__meta {
            flex-direction: column;
            flex-wrap: wrap;
            justify-self: center;
            align-items: center;
            gap: 0.4rem;
            white-space: normal;
        }
        .gpk-footer-min__meta span + span::before {
            display: none;
        }
        .gpk-footer-min__meta span {
            white-space: normal;
            text-align: center;
        }
        .gpk-footer-min__brand img {
            height: 34px;
        }
    }
</style>


<footer class="gpk-footer-min">
    <div class="gpk-footer-min__bar">
        <div class="gpk-container gpk-footer-min__bar-inner">

            {{-- COLUMN 1: BRAND --}}
            <a href="{{ url('/') }}" class="gpk-footer-min__brand">
                <img src="{{ asset('guest/assets/img/logo-gapkindo.jpg') }}" alt="Logo GAPKINDO">
                <span>© {{ date('Y') }} <strong>GAPKINDO</strong> — All rights reserved.</span>
            </a>

            {{-- COLUMN 2: META (3 items dalam 1 baris) --}}
            <div class="gpk-footer-min__meta">
                <span>Jl. Cideng Barat No.62-A, Jakarta Pusat 10150</span>
                <span><a href="tel:+622135015100">(62-21) 3501510</a></span>
                <span><a href="mailto:gapkindo.pusat@gmail.com">gapkindo.pusat@gmail.com</a></span>
            </div>

        </div>
    </div>
</footer>
