{{--
    ===================================================
    GAPKINDO PREMIUM NAVBAR
    Pure CSS + Vanilla JS (tidak butuh Bootstrap 3 navbar JS)
    Mendukung transparent-over-hero & solid-on-scroll
    ===================================================
--}}

<style>
    /* ===== PREMIUM NAVBAR ===== */

    .gpk-nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        height: var(--nav-h-desktop);
        display: flex;
        align-items: center;
        background: rgba(250, 247, 240, 0.0);
        border-bottom: 1px solid rgba(255, 255, 255, 0);
        transition: background 0.5s var(--ease-out), border-color 0.5s var(--ease-out), box-shadow 0.5s var(--ease-out), backdrop-filter 0.5s var(--ease-out);
        font-family: var(--f-body);
    }

    /* Default state: solid (untuk halaman non-home) */
    body:not(.is-home) .gpk-nav,
    .gpk-nav.is-scrolled {
        background: rgba(250, 247, 240, 0.92);
        backdrop-filter: blur(16px) saturate(140%);
        -webkit-backdrop-filter: blur(16px) saturate(140%);
        border-bottom-color: rgba(213, 204, 181, 0.5);
        box-shadow: 0 1px 0 rgba(14, 26, 17, 0.04), 0 8px 24px -12px rgba(14, 26, 17, 0.08);
    }

    /* Home state: transparent at top */
    body.is-home .gpk-nav:not(.is-scrolled) {
        background: linear-gradient(180deg, rgba(14, 26, 17, 0.35) 0%, rgba(14, 26, 17, 0) 100%);
    }

    .gpk-nav__inner {
        width: 100%;
        max-width: 1440px;
        margin: 0 auto;
        padding: 0 clamp(1.2rem, 3vw, 2.4rem);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
    }

    /* ===== LOGO ===== */

    .gpk-nav__brand {
        display: flex;
        align-items: center;
        gap: 0.9rem;
        text-decoration: none;
        flex-shrink: 0;
        transition: opacity 0.3s var(--ease-out);
    }
    .gpk-nav__brand:hover { opacity: 0.85; }

    .gpk-nav__logo {
        width: 48px;
        height: 50px;
        object-fit: contain;
        border-radius: 4px;
    }

    .gpk-nav__brand-text {
        display: none;
        line-height: 1.1;
    }
    @media (min-width: 1280px) { .gpk-nav__brand-text { display: block; } }

    .gpk-nav__brand-name {
        font-family: var(--f-display);
        font-weight: 500;
        font-size: 1.1rem;
        letter-spacing: 0.02em;
        color: var(--c-ink);
        margin: 0;
    }
    .gpk-nav__brand-sub {
        font-family: var(--f-mono);
        font-size: 0.62rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin-top: 2px;
    }

    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__brand-name { color: var(--c-cream); }
    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__brand-sub { color: var(--c-gold-soft); }

    /* ===== MENU LIST (DESKTOP) ===== */

    .gpk-nav__menu {
        display: none;
        align-items: center;
        gap: 0.2rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    @media (min-width: 992px) { .gpk-nav__menu { display: flex; } }

    .gpk-nav__item {
        position: relative;
    }

    .gpk-nav__link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.9rem 1rem;
        font-family: var(--f-body);
        font-size: 0.82rem;
        font-weight: 500;
        letter-spacing: 0.02em;
        color: var(--c-ink);
        text-decoration: none;
        cursor: pointer;
        position: relative;
        transition: color 0.3s var(--ease-out);
        background: none;
        border: none;
    }
    .gpk-nav__link::after {
        content: "";
        position: absolute;
        bottom: 8px;
        left: 1rem;
        right: 1rem;
        height: 1px;
        background: var(--c-gold);
        transform: scaleX(0);
        transform-origin: left center;
        transition: transform 0.4s var(--ease-out);
    }
    .gpk-nav__link:hover::after,
    .gpk-nav__item.is-open > .gpk-nav__link::after,
    .gpk-nav__link.is-active::after {
        transform: scaleX(1);
    }
    .gpk-nav__link:hover { color: var(--c-leaf); }

    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__link { color: var(--c-cream); }
    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__link:hover { color: var(--c-gold-soft); }
    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__link::after { background: var(--c-gold-soft); }

    .gpk-nav__caret {
        width: 9px;
        height: 9px;
        transition: transform 0.3s var(--ease-out);
        stroke: currentColor;
    }
    .gpk-nav__item.is-open > .gpk-nav__link .gpk-nav__caret {
        transform: rotate(180deg);
    }

    /* ===== DROPDOWN PANEL ===== */

    .gpk-nav__panel {
        position: absolute;
        top: calc(100% - 4px);
        left: 50%;
        transform: translateX(-50%) translateY(8px);
        min-width: 240px;
        background: var(--c-cream);
        border: 1px solid var(--c-line-soft);
        box-shadow: 0 20px 50px -20px rgba(14, 26, 17, 0.18), 0 4px 12px -4px rgba(14, 26, 17, 0.08);
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.3s var(--ease-out), transform 0.4s var(--ease-out), visibility 0s 0.3s;
        list-style: none;
        margin: 0;
        padding: 0.6rem;
        z-index: 1001;
    }
    .gpk-nav__panel::before {
        content: "";
        position: absolute;
        top: -6px;
        left: 50%;
        transform: translateX(-50%) rotate(45deg);
        width: 12px;
        height: 12px;
        background: var(--c-cream);
        border-top: 1px solid var(--c-line-soft);
        border-left: 1px solid var(--c-line-soft);
    }
    .gpk-nav__item.is-open > .gpk-nav__panel {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        transform: translateX(-50%) translateY(0);
        transition: opacity 0.3s var(--ease-out), transform 0.4s var(--ease-out), visibility 0s;
    }

    .gpk-nav__panel-item {
        display: block;
    }
    .gpk-nav__panel-link {
        display: block;
        padding: 0.7rem 1rem;
        font-size: 0.85rem;
        font-weight: 500;
        color: var(--c-ink);
        text-decoration: none;
        border-radius: 2px;
        transition: background 0.25s var(--ease-out), color 0.25s var(--ease-out), padding 0.3s var(--ease-out);
        position: relative;
    }
    .gpk-nav__panel-link:hover {
        background: var(--c-bg-soft);
        color: var(--c-leaf);
        padding-left: 1.3rem;
    }
    .gpk-nav__panel-link.is-active {
        background: var(--c-bg-soft);
        color: var(--c-gold);
    }
    .gpk-nav__panel-link.is-active::before {
        content: "";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 3px;
        height: 16px;
        background: var(--c-gold);
    }

    /* ===== MEGA PANEL (Regulasi / Tautan) ===== */

    .gpk-nav__mega {
        position: absolute;
        top: calc(100% - 4px);
        left: 50%;
        transform: translateX(-50%) translateY(8px);
        width: min(720px, 92vw);
        background: var(--c-cream);
        border: 1px solid var(--c-line-soft);
        box-shadow: 0 30px 60px -20px rgba(14, 26, 17, 0.22), 0 6px 16px -4px rgba(14, 26, 17, 0.08);
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.35s var(--ease-out), transform 0.45s var(--ease-out), visibility 0s 0.35s;
        padding: 2rem;
        z-index: 1001;
    }
    .gpk-nav__mega::before {
        content: "";
        position: absolute;
        top: -6px;
        left: 50%;
        transform: translateX(-50%) rotate(45deg);
        width: 12px;
        height: 12px;
        background: var(--c-cream);
        border-top: 1px solid var(--c-line-soft);
        border-left: 1px solid var(--c-line-soft);
    }
    .gpk-nav__item.is-open > .gpk-nav__mega {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        transform: translateX(-50%) translateY(0);
        transition: opacity 0.35s var(--ease-out), transform 0.45s var(--ease-out), visibility 0s;
    }

    .gpk-nav__mega-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }
    .gpk-nav__mega-col-title {
        font-family: var(--f-mono);
        font-size: 0.65rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--c-gold);
        margin: 0 0 1rem;
        padding-bottom: 0.7rem;
        border-bottom: 1px solid var(--c-line-soft);
    }
    .gpk-nav__mega-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }
    .gpk-nav__mega-link {
        display: flex;
        align-items: flex-start;
        gap: 0.7rem;
        padding: 0.55rem 0.6rem 0.55rem 0;
        font-size: 0.78rem;
        font-weight: 500;
        line-height: 1.35;
        color: var(--c-ink);
        text-decoration: none;
        transition: color 0.25s var(--ease-out), padding 0.3s var(--ease-out);
    }
    .gpk-nav__mega-link::before {
        content: "→";
        color: var(--c-gold);
        font-weight: 400;
        opacity: 0;
        transform: translateX(-6px);
        transition: opacity 0.3s var(--ease-out), transform 0.3s var(--ease-out);
    }
    .gpk-nav__mega-link:hover {
        color: var(--c-leaf);
        padding-left: 0.6rem;
    }
    .gpk-nav__mega-link:hover::before {
        opacity: 1;
        transform: translateX(0);
    }

    /* ===== LANGUAGE SWITCHER ===== */

    .gpk-nav__lang {
        display: none;
        align-items: center;
        gap: 0.6rem;
        padding-left: 1rem;
        margin-left: 0.4rem;
        border-left: 1px solid var(--c-line);
        font-family: var(--f-mono);
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.15em;
    }
    @media (min-width: 992px) { .gpk-nav__lang { display: flex; } }

    .gpk-nav__lang-link {
        color: var(--c-fade);
        text-decoration: none;
        padding: 0.3rem 0.2rem;
        transition: color 0.25s var(--ease-out);
        text-transform: uppercase;
    }
    .gpk-nav__lang-link:hover { color: var(--c-gold); }
    .gpk-nav__lang-link.is-active { color: var(--c-ink); }
    .gpk-nav__lang-divider {
        width: 1px;
        height: 12px;
        background: var(--c-line);
    }

    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__lang { border-left-color: rgba(255, 251, 242, 0.25); }
    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__lang-link { color: rgba(255, 251, 242, 0.6); }
    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__lang-link.is-active { color: var(--c-cream); }
    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__lang-divider { background: rgba(255, 251, 242, 0.25); }

    /* ===== MOBILE TOGGLE ===== */

    .gpk-nav__toggle {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 5px;
        width: 44px;
        height: 44px;
        padding: 12px 10px;
        background: none;
        border: 1px solid var(--c-line);
        border-radius: 2px;
        cursor: pointer;
        transition: border-color 0.3s var(--ease-out), background 0.3s var(--ease-out);
    }
    @media (min-width: 992px) { .gpk-nav__toggle { display: none; } }

    .gpk-nav__toggle-bar {
        display: block;
        width: 100%;
        height: 1.5px;
        background: var(--c-ink);
        transition: transform 0.4s var(--ease-out), opacity 0.3s var(--ease-out);
        transform-origin: center;
    }
    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__toggle { border-color: rgba(255, 251, 242, 0.4); }
    body.is-home .gpk-nav:not(.is-scrolled) .gpk-nav__toggle-bar { background: var(--c-cream); }

    body.is-mobile-nav-open .gpk-nav__toggle-bar:nth-child(1) { transform: translateY(6.5px) rotate(45deg); }
    body.is-mobile-nav-open .gpk-nav__toggle-bar:nth-child(2) { opacity: 0; }
    body.is-mobile-nav-open .gpk-nav__toggle-bar:nth-child(3) { transform: translateY(-6.5px) rotate(-45deg); }

    /* ===== MOBILE DRAWER ===== */

    .gpk-mobile-nav {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        width: min(360px, 88vw);
        background: var(--c-bg-dark);
        color: var(--c-cream);
        z-index: 999;
        transform: translateX(100%);
        transition: transform 0.5s var(--ease-in-out);
        overflow-y: auto;
        padding: calc(var(--nav-h-mobile) + 1.5rem) 1.8rem 2rem;
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
    }
    body.is-mobile-nav-open .gpk-mobile-nav {
        transform: translateX(0);
    }

    .gpk-mobile-nav__overlay {
        position: fixed;
        inset: 0;
        background: rgba(14, 26, 17, 0.6);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        z-index: 998;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.4s var(--ease-out), visibility 0s 0.4s;
    }
    body.is-mobile-nav-open .gpk-mobile-nav__overlay {
        opacity: 1;
        visibility: visible;
        transition: opacity 0.4s var(--ease-out), visibility 0s;
    }

    .gpk-mobile-section {
        border-bottom: 1px solid rgba(212, 177, 67, 0.15);
        padding: 0.4rem 0;
    }
    .gpk-mobile-section:last-of-type { border-bottom: none; }

    .gpk-mobile-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 1rem 0;
        font-family: var(--f-display);
        font-size: 1.2rem;
        font-weight: 400;
        letter-spacing: -0.01em;
        color: var(--c-cream);
        text-decoration: none;
        transition: color 0.3s var(--ease-out);
        cursor: pointer;
        background: none;
        border: none;
        width: 100%;
        text-align: left;
    }
    .gpk-mobile-link:hover { color: var(--c-gold-soft); }
    .gpk-mobile-link__caret {
        width: 12px;
        height: 12px;
        transition: transform 0.4s var(--ease-out);
        stroke: currentColor;
    }
    .gpk-mobile-section.is-open .gpk-mobile-link__caret {
        transform: rotate(180deg);
    }

    .gpk-mobile-submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s var(--ease-in-out);
    }
    .gpk-mobile-section.is-open .gpk-mobile-submenu {
        max-height: 1000px;
    }
    .gpk-mobile-submenu__inner {
        padding: 0.6rem 0 1.2rem 0;
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
    }
    .gpk-mobile-submenu__link {
        padding: 0.5rem 0;
        padding-left: 1.2rem;
        font-family: var(--f-body);
        font-size: 0.88rem;
        font-weight: 500;
        color: rgba(255, 251, 242, 0.7);
        text-decoration: none;
        border-left: 1px solid rgba(212, 177, 67, 0.25);
        transition: color 0.25s var(--ease-out), border-color 0.25s var(--ease-out);
    }
    .gpk-mobile-submenu__link:hover {
        color: var(--c-gold-soft);
        border-left-color: var(--c-gold-soft);
    }
    .gpk-mobile-submenu__group-title {
        font-family: var(--f-mono);
        font-size: 0.6rem;
        font-weight: 500;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        color: var(--c-gold-soft);
        margin: 0.8rem 0 0.4rem 1.2rem;
    }

    .gpk-mobile-lang {
        margin-top: auto;
        padding-top: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-family: var(--f-mono);
        font-size: 0.7rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
    }
    .gpk-mobile-lang__label {
        color: var(--c-gold-soft);
    }
    .gpk-mobile-lang__link {
        color: rgba(255, 251, 242, 0.55);
        text-decoration: none;
        padding: 0.3rem 0.2rem;
    }
    .gpk-mobile-lang__link.is-active { color: var(--c-cream); }
    .gpk-mobile-lang__divider { width: 1px; height: 12px; background: rgba(255, 251, 242, 0.3); }

    /* ===== RESPONSIVE HEIGHT ===== */

    @media (max-width: 991px) {
        .gpk-nav { height: var(--nav-h-mobile); }
        .gpk-nav__logo { width: 40px; height: 42px; }
    }

    /* ===== Lock body scroll when drawer open ===== */
    body.is-mobile-nav-open {
        overflow: hidden;
    }

    /* ===== Override beberapa style lama yang konflik ===== */
    .gpk-nav .nav,
    .gpk-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
</style>


{{-- ============================================================
     NAVBAR MARKUP
     ============================================================ --}}
<nav class="gpk-nav" id="gpkNav" role="navigation" aria-label="Primary navigation">
    <div class="gpk-nav__inner">

        {{-- LOGO --}}
        <a href="{{ url('/') }}" class="gpk-nav__brand" aria-label="GAPKINDO Home">
            <img src="{{ asset('guest/assets/img/logo-gapkindo.jpg') }}" alt="GAPKINDO" class="gpk-nav__logo">
            <div class="gpk-nav__brand-text">
                <div class="gpk-nav__brand-name">GAPKINDO</div>
                <div class="gpk-nav__brand-sub">— Karet Indonesia</div>
            </div>
        </a>

        {{-- DESKTOP MENU --}}
        <ul class="gpk-nav__menu" id="gpkNavMenu">

            <li class="gpk-nav__item">
                <a href="{{ url('/') }}" class="gpk-nav__link {{ Route::is('guest.index') ? 'is-active' : '' }}">
                    {{ __('global.home') }}
                </a>
            </li>

            <li class="gpk-nav__item" data-dropdown>
                <button type="button" class="gpk-nav__link" aria-expanded="false">
                    {{ __('global.tentangKami') }}
                    <svg class="gpk-nav__caret" viewBox="0 0 10 10" fill="none" stroke-width="1.4"><path d="M2 4l3 3 3-3"/></svg>
                </button>
                <ul class="gpk-nav__panel">
                    <li class="gpk-nav__panel-item">
                        <a href="{{ route('sejarah') }}" class="gpk-nav__panel-link {{ Route::is('sejarah') ? 'is-active' : '' }}">{{ __('global.sejarah') }}</a>
                    </li>
                    <li class="gpk-nav__panel-item">
                        <a href="{{ route('cabang') }}" class="gpk-nav__panel-link {{ Route::is('cabang') ? 'is-active' : '' }}">{{ __('global.cabang') }}</a>
                    </li>
                </ul>
            </li>

            <li class="gpk-nav__item" data-dropdown>
                <button type="button" class="gpk-nav__link" aria-expanded="false">
                    Media
                    <svg class="gpk-nav__caret" viewBox="0 0 10 10" fill="none" stroke-width="1.4"><path d="M2 4l3 3 3-3"/></svg>
                </button>
                <ul class="gpk-nav__panel">
                    <li class="gpk-nav__panel-item">
                        <a href="{{ route('galeri') }}" class="gpk-nav__panel-link {{ Route::is('galeri') ? 'is-active' : '' }}">{{ __('global.galeri') }}</a>
                    </li>
                    <li class="gpk-nav__panel-item">
                        <a href="{{ route('berita') }}" class="gpk-nav__panel-link {{ Route::is('berita') ? 'is-active' : '' }}">{{ __('global.news') }}</a>
                    </li>
                </ul>
            </li>

            <li class="gpk-nav__item" data-dropdown>
                <button type="button" class="gpk-nav__link" aria-expanded="false">
                    {{ __('global.regulasi') }}
                    <svg class="gpk-nav__caret" viewBox="0 0 10 10" fill="none" stroke-width="1.4"><path d="M2 4l3 3 3-3"/></svg>
                </button>
                <div class="gpk-nav__mega">
                    <div class="gpk-nav__mega-grid">
                        <div>
                            <h5 class="gpk-nav__mega-col-title">Mitra Nasional</h5>
                            <ul class="gpk-nav__mega-list">
                                <li><a href="https://www.ekon.go.id/" target="_blank" rel="noopener" class="gpk-nav__mega-link">Kementerian Koordinator Bidang Perekonomian</a></li>
                                <li><a href="https://www.pertanian.go.id/" target="_blank" rel="noopener" class="gpk-nav__mega-link">Kementerian Pertanian</a></li>
                                <li><a href="https://kemenperin.go.id/" target="_blank" rel="noopener" class="gpk-nav__mega-link">Kementerian Perindustrian</a></li>
                                <li><a href="https://dephub.go.id/" target="_blank" rel="noopener" class="gpk-nav__mega-link">Kementerian Perhubungan</a></li>
                                <li><a href="https://www.kemenkeu.go.id/home" target="_blank" rel="noopener" class="gpk-nav__mega-link">Kementerian Keuangan</a></li>
                                <li><a href="https://kadin.id/" target="_blank" rel="noopener" class="gpk-nav__mega-link">KADIN Indonesia</a></li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="gpk-nav__mega-col-title">Mitra Internasional</h5>
                            <ul class="gpk-nav__mega-list">
                                <li><a href="https://www.thainr.com/en/?" target="_blank" rel="noopener" class="gpk-nav__mega-link">The Thai Rubber Association</a></li>
                                <li><a href="https://www.lgm.gov.my/webv2/home" target="_blank" rel="noopener" class="gpk-nav__mega-link">Malaysian Rubber Board</a></li>
                                <li><a href="https://www.rtas.sg/" target="_blank" rel="noopener" class="gpk-nav__mega-link">Rubber Trade Association of Singapore</a></li>
                                <li><a href="https://www.vra.com.vn/gioi-thieu.html" target="_blank" rel="noopener" class="gpk-nav__mega-link">The Viet Nam Rubber Association</a></li>
                                <li><a href="https://www.anrpc.org/" target="_blank" rel="noopener" class="gpk-nav__mega-link">Association of Natural Rubber Producing Countries (ANRPC)</a></li>
                                <li><a href="https://ircorubber.com/about-us/" target="_blank" rel="noopener" class="gpk-nav__mega-link">International Rubber Consortium Limited (IRCo)</a></li>
                                <li><a href="https://sustainablenaturalrubber.org/" target="_blank" rel="noopener" class="gpk-nav__mega-link">Global Platform for Sustainable Natural Rubber</a></li>
                                <li><a href="https://www.sgx.com/" target="_blank" rel="noopener" class="gpk-nav__mega-link">Singapore Exchange</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <li class="gpk-nav__item" data-dropdown>
                <button type="button" class="gpk-nav__link" aria-expanded="false">
                    {{ __('global.anggota') }}
                    <svg class="gpk-nav__caret" viewBox="0 0 10 10" fill="none" stroke-width="1.4"><path d="M2 4l3 3 3-3"/></svg>
                </button>
                <ul class="gpk-nav__panel">
                    <li class="gpk-nav__panel-item">
                        <a href="{{ route('anggota') }}" class="gpk-nav__panel-link {{ Route::is('anggota') ? 'is-active' : '' }}">{{ __('global.anggota') }}</a>
                    </li>
                </ul>
            </li>

            <li class="gpk-nav__item">
                <a href="{{ route('kontak') }}" class="gpk-nav__link {{ Route::is('kontak') ? 'is-active' : '' }}">
                    {{ __('global.kontak') }}
                </a>
            </li>

        </ul>

        {{-- LANG SWITCHER --}}
        <div class="gpk-nav__lang">
            <a href="{{ route('langSwitch', 'id') }}" class="gpk-nav__lang-link {{ app()->getLocale() === 'id' ? 'is-active' : '' }}">ID</a>
            <span class="gpk-nav__lang-divider"></span>
            <a href="{{ route('langSwitch', 'en') }}" class="gpk-nav__lang-link {{ app()->getLocale() === 'en' ? 'is-active' : '' }}">EN</a>
        </div>

        {{-- MOBILE TOGGLE --}}
        <button type="button" class="gpk-nav__toggle" id="gpkNavToggle" aria-label="Toggle menu" aria-expanded="false">
            <span class="gpk-nav__toggle-bar"></span>
            <span class="gpk-nav__toggle-bar"></span>
            <span class="gpk-nav__toggle-bar"></span>
        </button>

    </div>
</nav>


{{-- ============================================================
     MOBILE DRAWER
     ============================================================ --}}
<div class="gpk-mobile-nav__overlay" id="gpkMobileOverlay"></div>
<aside class="gpk-mobile-nav" id="gpkMobileNav" role="dialog" aria-label="Mobile menu">

    <div class="gpk-mobile-section">
        <a href="{{ url('/') }}" class="gpk-mobile-link">{{ __('global.home') }}</a>
    </div>

    <div class="gpk-mobile-section" data-mobile-accordion>
        <button type="button" class="gpk-mobile-link" aria-expanded="false">
            {{ __('global.tentangKami') }}
            <svg class="gpk-mobile-link__caret" viewBox="0 0 10 10" fill="none" stroke-width="1.4"><path d="M2 4l3 3 3-3"/></svg>
        </button>
        <div class="gpk-mobile-submenu">
            <div class="gpk-mobile-submenu__inner">
                <a href="{{ route('sejarah') }}" class="gpk-mobile-submenu__link">{{ __('global.sejarah') }}</a>
                <a href="{{ route('cabang') }}" class="gpk-mobile-submenu__link">{{ __('global.cabang') }}</a>
            </div>
        </div>
    </div>

    <div class="gpk-mobile-section" data-mobile-accordion>
        <button type="button" class="gpk-mobile-link" aria-expanded="false">
            Media
            <svg class="gpk-mobile-link__caret" viewBox="0 0 10 10" fill="none" stroke-width="1.4"><path d="M2 4l3 3 3-3"/></svg>
        </button>
        <div class="gpk-mobile-submenu">
            <div class="gpk-mobile-submenu__inner">
                <a href="{{ route('galeri') }}" class="gpk-mobile-submenu__link">{{ __('global.galeri') }}</a>
                <a href="{{ route('berita') }}" class="gpk-mobile-submenu__link">{{ __('global.news') }}</a>
            </div>
        </div>
    </div>

    <div class="gpk-mobile-section" data-mobile-accordion>
        <button type="button" class="gpk-mobile-link" aria-expanded="false">
            {{ __('global.regulasi') }}
            <svg class="gpk-mobile-link__caret" viewBox="0 0 10 10" fill="none" stroke-width="1.4"><path d="M2 4l3 3 3-3"/></svg>
        </button>
        <div class="gpk-mobile-submenu">
            <div class="gpk-mobile-submenu__inner">
                <div class="gpk-mobile-submenu__group-title">Mitra Nasional</div>
                <a href="https://www.ekon.go.id/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Kemenko Perekonomian</a>
                <a href="https://www.pertanian.go.id/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Kementerian Pertanian</a>
                <a href="https://kemenperin.go.id/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Kementerian Perindustrian</a>
                <a href="https://dephub.go.id/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Kementerian Perhubungan</a>
                <a href="https://www.kemenkeu.go.id/home" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Kementerian Keuangan</a>
                <a href="https://kadin.id/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">KADIN Indonesia</a>

                <div class="gpk-mobile-submenu__group-title">Mitra Internasional</div>
                <a href="https://www.thainr.com/en/?" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">The Thai Rubber Association</a>
                <a href="https://www.lgm.gov.my/webv2/home" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Malaysian Rubber Board</a>
                <a href="https://www.rtas.sg/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Rubber Trade Association of Singapore</a>
                <a href="https://www.vra.com.vn/gioi-thieu.html" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Viet Nam Rubber Association</a>
                <a href="https://www.anrpc.org/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">ANRPC</a>
                <a href="https://ircorubber.com/about-us/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">IRCo</a>
                <a href="https://sustainablenaturalrubber.org/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Sustainable Natural Rubber</a>
                <a href="https://www.sgx.com/" target="_blank" rel="noopener" class="gpk-mobile-submenu__link">Singapore Exchange</a>
            </div>
        </div>
    </div>

    <div class="gpk-mobile-section">
        <a href="{{ route('anggota') }}" class="gpk-mobile-link">{{ __('global.anggota') }}</a>
    </div>

    <div class="gpk-mobile-section">
        <a href="{{ route('kontak') }}" class="gpk-mobile-link">{{ __('global.kontak') }}</a>
    </div>

    <div class="gpk-mobile-lang">
        <span class="gpk-mobile-lang__label">— Bahasa</span>
        <a href="{{ route('langSwitch', 'id') }}" class="gpk-mobile-lang__link {{ app()->getLocale() === 'id' ? 'is-active' : '' }}">ID</a>
        <span class="gpk-mobile-lang__divider"></span>
        <a href="{{ route('langSwitch', 'en') }}" class="gpk-mobile-lang__link {{ app()->getLocale() === 'en' ? 'is-active' : '' }}">EN</a>
    </div>

</aside>


{{-- ============================================================
     NAVBAR SCRIPT (Vanilla JS — tidak bergantung jQuery/Bootstrap)
     ============================================================ --}}
<script>
(function() {
    'use strict';

    // Detect home page (has hero) and set body class
    if (document.querySelector('.gpk-hero')) {
        document.body.classList.add('is-home');
    }

    const nav = document.getElementById('gpkNav');
    if (!nav) return;

    // 1. Scroll detection — toggle solid state
    let scrolled = false;
    const onScroll = () => {
        const isScrolled = window.scrollY > 40;
        if (isScrolled !== scrolled) {
            nav.classList.toggle('is-scrolled', isScrolled);
            scrolled = isScrolled;
        }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    // 2. Desktop dropdown — click & hover
    const dropdowns = nav.querySelectorAll('[data-dropdown]');
    dropdowns.forEach(item => {
        const btn = item.querySelector('.gpk-nav__link');
        if (!btn) return;

        // Hover (desktop only)
        item.addEventListener('mouseenter', () => {
            if (window.innerWidth >= 992) {
                closeAllDropdowns();
                item.classList.add('is-open');
                btn.setAttribute('aria-expanded', 'true');
            }
        });
        item.addEventListener('mouseleave', () => {
            if (window.innerWidth >= 992) {
                item.classList.remove('is-open');
                btn.setAttribute('aria-expanded', 'false');
            }
        });

        // Click (for touch devices that don't trigger hover)
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const isOpen = item.classList.contains('is-open');
            closeAllDropdowns();
            if (!isOpen) {
                item.classList.add('is-open');
                btn.setAttribute('aria-expanded', 'true');
            }
        });
    });

    function closeAllDropdowns() {
        dropdowns.forEach(d => {
            d.classList.remove('is-open');
            const b = d.querySelector('.gpk-nav__link');
            if (b) b.setAttribute('aria-expanded', 'false');
        });
    }

    // Close dropdown on outside click
    document.addEventListener('click', (e) => {
        if (!nav.contains(e.target)) closeAllDropdowns();
    });

    // ESC closes everything
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeAllDropdowns();
            closeMobileNav();
        }
    });

    // 3. Mobile drawer
    const toggle = document.getElementById('gpkNavToggle');
    const mobileNav = document.getElementById('gpkMobileNav');
    const overlay = document.getElementById('gpkMobileOverlay');

    function openMobileNav() {
        document.body.classList.add('is-mobile-nav-open');
        if (toggle) toggle.setAttribute('aria-expanded', 'true');
    }
    function closeMobileNav() {
        document.body.classList.remove('is-mobile-nav-open');
        if (toggle) toggle.setAttribute('aria-expanded', 'false');
    }

    if (toggle) {
        toggle.addEventListener('click', () => {
            document.body.classList.contains('is-mobile-nav-open') ? closeMobileNav() : openMobileNav();
        });
    }
    if (overlay) {
        overlay.addEventListener('click', closeMobileNav);
    }

    // Mobile accordion
    const accordions = document.querySelectorAll('[data-mobile-accordion]');
    accordions.forEach(acc => {
        const btn = acc.querySelector('.gpk-mobile-link');
        if (!btn) return;
        btn.addEventListener('click', () => {
            const isOpen = acc.classList.contains('is-open');
            // Close others
            accordions.forEach(other => {
                if (other !== acc) other.classList.remove('is-open');
            });
            acc.classList.toggle('is-open', !isOpen);
            btn.setAttribute('aria-expanded', String(!isOpen));
        });
    });

    // Reset mobile state on resize to desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 992 && document.body.classList.contains('is-mobile-nav-open')) {
            closeMobileNav();
        }
    });

})();
</script>
