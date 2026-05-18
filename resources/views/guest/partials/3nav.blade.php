{{--
    ============================================================
    GAPKINDO PUSAT — NAVBAR (1:1 dengan gapkindosu.org)
    Adaptasi dari header.php gapkindosu.org
    Gradient darkblue → darkgreen, sticky, auto-hide on scroll
    ============================================================
--}}

<style>
    /* ==========================================
       SECTION 1: NAVBAR BASE STYLING
       ========================================== */
    .gpk-nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1030;
        background: linear-gradient(to right, darkblue, darkgreen) !important;
        border-bottom: none !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
        min-height: 61px !important;
        height: 61px !important;
        display: flex !important;
        align-items: center !important;
        transition: top 0.3s ease-in-out;
        font-family: 'Open Sans', system-ui, -apple-system, sans-serif;
    }

    .gpk-nav__container {
        width: 100%;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        height: 100%;
        display: flex;
        align-items: center;
    }

    /* ==========================================
       SECTION 2: NAVBAR BRAND (LOGO)
       ========================================== */
    .gpk-nav__brand {
        padding: 0;
        margin-right: 1rem;
        text-decoration: none !important;
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
    }
    .gpk-nav__brand img {
        height: 45px;
        width: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
    }
    .gpk-nav__brand:hover {
        text-decoration: none !important;
        background-color: transparent !important;
        color: white;
    }
    .gpk-nav__brand:hover img { transform: scale(1.05); }
    .gpk-nav__brand-text {
        display: inline-block;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        white-space: nowrap;
    }

    /* ==========================================
       SECTION 3: NAV LINKS
       ========================================== */
    .gpk-nav__collapse {
        display: flex;
        flex: 1;
        align-items: center;
        height: 100%;
    }
    .gpk-nav__menu {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }
    .gpk-nav__menu--center {
        margin: 0 auto;
        gap: 15px;
        justify-content: center;
        flex: 1 1 auto;
    }
    .gpk-nav__menu--right {
        margin-left: auto;
        flex: 0 0 auto;
    }
    .gpk-nav__item { position: relative; margin: 0; }
    .gpk-nav__link {
        color: white !important;
        white-space: nowrap !important;
        display: inline-flex !important;
        align-items: center !important;
        transition: all 0.3s ease;
        padding: 12px 16px !important;
        font-size: 15px;
        font-weight: 500;
        min-height: 44px;
        border-radius: 5px;
        text-decoration: none !important;
        cursor: pointer;
        background: none;
        border: none;
        font-family: inherit;
    }
    .gpk-nav__link:hover {
        background-color: #5a40f0 !important;
        transform: scale(1.05);
        color: white !important;
        text-decoration: none !important;
    }
    .gpk-nav__link i { margin-right: 8px; }
    .gpk-nav__caret { margin-left: 0.5rem; font-size: 0.75rem; }

    /* ==========================================
       SECTION 4: ACTIVE STATES
       ========================================== */
    .gpk-nav__link.is-active,
    .gpk-nav__item--dropdown.is-active > .gpk-nav__link {
        background-color: #0056b3 !important;
        color: white !important;
        border-radius: 5px;
        border-right: 3px solid white;
        border-left: 3px solid white;
    }
    .gpk-nav__dropdown-item.is-active {
        background-color: #0056b3 !important;
        color: white !important;
        font-weight: bold;
    }

    /* ==========================================
       SECTION 5: HAMBURGER BUTTON (inline SVG, animated)
       ========================================== */
    .gpk-nav__toggler {
        border: none !important;
        background: transparent !important;
        padding: 0 !important;
        border-radius: 8px !important;
        width: 44px !important;
        height: 44px !important;
        align-items: center !important;
        justify-content: center !important;
        transition: background 0.3s ease;
        margin-left: auto;
        cursor: pointer;
        display: none;
        position: relative;
        z-index: 1051;
        color: white;
        flex-shrink: 0;
    }
    .gpk-nav__toggler:hover {
        background: rgba(255, 255, 255, 0.15) !important;
    }
    .gpk-nav__toggler:focus,
    .gpk-nav__toggler:focus-visible {
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3) !important;
    }
    .gpk-nav__toggler:active {
        background: rgba(255, 255, 255, 0.25) !important;
        transform: scale(0.95);
    }

    /* Hamburger 3-line icon */
    .gpk-nav__toggler-icon {
        position: relative;
        width: 26px;
        height: 20px;
        display: block;
        pointer-events: none;
    }
    .gpk-nav__toggler-icon span {
        position: absolute;
        left: 0;
        width: 100%;
        height: 3px;
        background: white;
        border-radius: 2px;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        transform-origin: center;
    }
    .gpk-nav__toggler-icon span:nth-child(1) { top: 0; }
    .gpk-nav__toggler-icon span:nth-child(2) { top: 50%; transform: translateY(-50%); }
    .gpk-nav__toggler-icon span:nth-child(3) { bottom: 0; }

    /* Hamburger → X animation when open */
    .gpk-nav__toggler.is-open .gpk-nav__toggler-icon span:nth-child(1) {
        top: 50%;
        transform: translateY(-50%) rotate(45deg);
    }
    .gpk-nav__toggler.is-open .gpk-nav__toggler-icon span:nth-child(2) {
        opacity: 0;
        transform: translateY(-50%) scaleX(0);
    }
    .gpk-nav__toggler.is-open .gpk-nav__toggler-icon span:nth-child(3) {
        bottom: 50%;
        transform: translateY(50%) rotate(-45deg);
    }

    /* Backdrop when mobile menu open */
    .gpk-nav__backdrop {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1029;
        opacity: 0;
        transition: opacity 0.3s ease;
        backdrop-filter: blur(2px);
        -webkit-backdrop-filter: blur(2px);
    }
    .gpk-nav__backdrop.is-visible {
        display: block;
        opacity: 1;
    }

    /* ==========================================
       SECTION 6: DESKTOP DROPDOWN (≥1200px)
       ========================================== */
    @media (min-width: 1200px) {
        .gpk-nav__dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            list-style: none;
            margin: 0;
            padding: 0.5rem 0;
            background: white;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            min-width: 250px;
            max-width: 90vw;
            border-radius: 0.25rem;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(8px);
            transition: opacity 0.25s ease, transform 0.25s ease, visibility 0s 0.25s;
            z-index: 1050;
        }
        .gpk-nav__item--dropdown:hover > .gpk-nav__dropdown,
        .gpk-nav__item--dropdown.is-open > .gpk-nav__dropdown {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0);
            transition: opacity 0.25s ease, transform 0.25s ease, visibility 0s;
        }
        .gpk-nav__dropdown-item {
            color: #212529;
            padding: 10px 20px;
            min-height: 44px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }
        .gpk-nav__dropdown-item:hover {
            background-color: rgb(85, 85, 248);
            color: white !important;
            text-decoration: none;
        }
        .gpk-nav__dropdown-item i { margin-right: 8px; }
        .gpk-nav__dropdown-divider { height: 1px; background: #e9ecef; margin: 0; }

        /* Right-aligned dropdown (Bahasa) */
        .gpk-nav__menu--right .gpk-nav__dropdown {
            left: auto;
            right: 0;
            min-width: 180px;
        }

        /* Wide dropdown (Regulasi/Tautan dengan 14 link) */
        .gpk-nav__dropdown--wide {
            min-width: 560px;
            padding: 0.6rem;
            left: 50%;
            transform: translateX(-50%) translateY(8px);
        }
        .gpk-nav__item--dropdown:hover > .gpk-nav__dropdown--wide,
        .gpk-nav__item--dropdown.is-open > .gpk-nav__dropdown--wide {
            transform: translateX(-50%) translateY(0);
        }
        .gpk-nav__dropdown--wide .gpk-nav__dropdown-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.4rem;
        }
        .gpk-nav__dropdown--wide .gpk-nav__dropdown-col-title {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #5a40f0;
            padding: 8px 12px 6px;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 4px;
        }
        .gpk-nav__dropdown--wide .gpk-nav__dropdown-item {
            font-size: 13px;
            padding: 8px 12px;
            min-height: auto;
            border-radius: 4px;
            line-height: 1.35;
        }
    }

    /* ==========================================
       SECTION 7: MOBILE & TABLET (<1200px)
       ========================================== */
    @media (max-width: 1199.98px) {
        .gpk-nav { height: 56px !important; min-height: 56px !important; }
        .gpk-nav__toggler { display: flex !important; }

        /* Brand: pastikan tidak overflow + truncate kalau text panjang */
        .gpk-nav__brand {
            margin-right: 0.5rem;
            min-width: 0;
            flex-shrink: 1;
        }
        .gpk-nav__brand img {
            height: 38px !important;
            flex-shrink: 0;
        }
        .gpk-nav__brand-text {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .gpk-nav__collapse {
            position: fixed !important;
            top: 56px !important;
            left: 0 !important;
            right: 0 !important;
            bottom: auto !important;
            background: linear-gradient(to bottom, darkblue, darkgreen) !important;
            padding: 15px !important;
            border-radius: 0 0 12px 12px !important;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4) !important;
            max-height: calc(100vh - 56px) !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            -webkit-overflow-scrolling: touch;
            flex-direction: column !important;
            flex: none !important;
            display: none !important;
            z-index: 1040 !important;
            height: auto !important;
            align-items: stretch !important;
        }
        .gpk-nav__collapse.is-open {
            display: flex !important;
            animation: gpkSlideDown 0.35s ease-out;
        }
        @keyframes gpkSlideDown {
            from { opacity: 0; transform: translateY(-15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .gpk-nav__menu,
        .gpk-nav__menu--center,
        .gpk-nav__menu--right {
            flex-direction: column !important;
            width: 100% !important;
            gap: 0 !important;
            margin: 0 !important;
            align-items: stretch !important;
            flex: none !important;
        }

        .gpk-nav__item {
            margin-bottom: 5px !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
            width: 100% !important;
        }

        .gpk-nav__link {
            padding: 14px 16px !important;
            border-radius: 6px !important;
            display: flex !important;
            text-align: left !important;
            width: 100% !important;
            min-height: 48px !important;
            justify-content: flex-start;
            font-size: 15px !important;
        }
        .gpk-nav__link:hover {
            background: rgba(255, 255, 255, 0.15) !important;
            transform: none;
        }

        .gpk-nav__caret {
            margin-left: auto;
            transition: transform 0.3s ease;
        }
        .gpk-nav__item--dropdown.is-open > .gpk-nav__link .gpk-nav__caret {
            transform: rotate(180deg);
        }

        /* Mobile dropdown - glassmorphism */
        .gpk-nav__dropdown {
            list-style: none;
            margin: 5px 0 0;
            padding: 0;
            background: rgba(255, 255, 255, 0.15) !important;
            backdrop-filter: blur(10px) !important;
            -webkit-backdrop-filter: blur(10px) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            border-radius: 8px !important;
            width: 100% !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2) !important;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.4s ease, margin 0.4s ease;
        }
        .gpk-nav__item--dropdown.is-open > .gpk-nav__dropdown {
            max-height: 1200px;
            padding: 0.4rem;
        }
        .gpk-nav__dropdown-item {
            color: white !important;
            padding: 12px 20px !important;
            text-align: left !important;
            min-height: 48px !important;
            border-radius: 5px !important;
            margin: 2px 5px !important;
            transition: all 0.3s ease !important;
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 14px;
        }
        .gpk-nav__dropdown-item:hover {
            background: rgba(255, 255, 255, 0.25) !important;
            transform: translateX(5px);
            color: white !important;
            text-decoration: none;
        }
        .gpk-nav__dropdown-item.is-active {
            background: rgba(255, 255, 255, 0.3) !important;
            font-weight: 600 !important;
            border-left: 3px solid white !important;
        }
        .gpk-nav__dropdown-item i { margin-right: 8px; }
        .gpk-nav__dropdown-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.15);
            margin: 0;
        }

        /* Mobile wide dropdown: jadi single column */
        .gpk-nav__dropdown--wide { min-width: auto; }
        .gpk-nav__dropdown--wide .gpk-nav__dropdown-grid {
            display: flex;
            flex-direction: column;
            gap: 0;
        }
        .gpk-nav__dropdown--wide .gpk-nav__dropdown-col-title {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.7);
            padding: 12px 15px 6px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            margin: 4px 0 4px;
        }
    }

    /* Small mobile (<576px) */
    @media (max-width: 576px) {
        .gpk-nav__brand-text {
            font-size: 0.95rem;
            max-width: 100px;
        }
        .gpk-nav { height: 56px !important; min-height: 56px !important; }
        .gpk-nav__brand img { height: 34px !important; }
        .gpk-nav__toggler {
            width: 42px !important;
            height: 42px !important;
        }
        .gpk-nav__toggler-icon {
            width: 24px;
            height: 18px;
        }
        .gpk-nav__collapse {
            top: 56px !important;
            max-height: calc(100vh - 56px) !important;
        }
    }

    /* Extra small mobile (<400px) — hide brand text, show only logo */
    @media (max-width: 400px) {
        .gpk-nav__brand-text { display: none; }
        .gpk-nav__brand img { height: 38px !important; }
    }

    /* Update body padding-top untuk match navbar height */
    body { padding-top: 61px !important; }
    @media (max-width: 1199.98px) { body { padding-top: 56px !important; } }

    /* Override premium hero supaya tetap fit di bawah navbar */
    .gpk-hero { height: auto !important; min-height: calc(100vh - 61px) !important; max-height: none !important; }
    @media (max-width: 1199.98px) { .gpk-hero { min-height: calc(100vh - 56px) !important; } }

    /* Lock body scroll when mobile menu open */
    body.gpk-nav-locked {
        overflow: hidden;
    }
</style>


{{-- ============================================================
     NAVBAR MARKUP
     ============================================================ --}}
<nav class="gpk-nav" id="gpkNav" role="navigation" aria-label="Primary navigation">
    <div class="gpk-nav__container">

        {{-- LOGO + BRAND --}}
        <a href="{{ url('/') }}" class="gpk-nav__brand">
            <img src="{{ asset('guest/assets/img/logo-gapkindo.jpg') }}" alt="Logo GAPKINDO">
            <span class="gpk-nav__brand-text">GAPKINDO</span>
        </a>

        {{-- HAMBURGER (mobile/tablet) — animated 3 bars to X --}}
        <button type="button" class="gpk-nav__toggler" id="gpkNavToggler" aria-label="Toggle navigation" aria-expanded="false">
            <span class="gpk-nav__toggler-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

        {{-- COLLAPSIBLE CONTENT --}}
        <div class="gpk-nav__collapse" id="gpkNavCollapse">

            {{-- CENTER MENU --}}
            <ul class="gpk-nav__menu gpk-nav__menu--center">

                <li class="gpk-nav__item">
                    <a class="gpk-nav__link {{ request()->routeIs('guest.index') ? 'is-active' : '' }}" href="{{ url('/') }}">
                        <i class="fas fa-home"></i>{{ __('global.home') }}
                    </a>
                </li>

                <li class="gpk-nav__item gpk-nav__item--dropdown {{ request()->routeIs(['sejarah','cabang']) ? 'is-active' : '' }}" data-dropdown>
                    <a class="gpk-nav__link" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-address-card"></i>{{ __('global.tentangKami') }}
                        <i class="fas fa-chevron-down gpk-nav__caret"></i>
                    </a>
                    <ul class="gpk-nav__dropdown">
                        <li>
                            <a class="gpk-nav__dropdown-item {{ request()->routeIs('sejarah') ? 'is-active' : '' }}" href="{{ route('sejarah') }}">
                                <i class="fas fa-info-circle"></i>{{ __('global.sejarah') }}
                            </a>
                        </li>
                        <li><div class="gpk-nav__dropdown-divider"></div></li>
                        <li>
                            <a class="gpk-nav__dropdown-item {{ request()->routeIs('cabang') ? 'is-active' : '' }}" href="{{ route('cabang') }}">
                                <i class="fas fa-map-marker-alt"></i>{{ __('global.cabang') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="gpk-nav__item gpk-nav__item--dropdown {{ request()->routeIs(['galeri','berita']) ? 'is-active' : '' }}" data-dropdown>
                    <a class="gpk-nav__link" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-photo-video"></i>Media
                        <i class="fas fa-chevron-down gpk-nav__caret"></i>
                    </a>
                    <ul class="gpk-nav__dropdown">
                        <li>
                            <a class="gpk-nav__dropdown-item {{ request()->routeIs('berita') ? 'is-active' : '' }}" href="{{ route('berita') }}">
                                <i class="fas fa-archive"></i>{{ __('global.news') }}
                            </a>
                        </li>
                        <li><div class="gpk-nav__dropdown-divider"></div></li>
                        <li>
                            <a class="gpk-nav__dropdown-item {{ request()->routeIs('galeri') ? 'is-active' : '' }}" href="{{ route('galeri') }}">
                                <i class="fas fa-image"></i>{{ __('global.galeri') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="gpk-nav__item gpk-nav__item--dropdown" data-dropdown>
                    <a class="gpk-nav__link" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-book"></i>{{ __('global.regulasi') }}
                        <i class="fas fa-chevron-down gpk-nav__caret"></i>
                    </a>
                    <div class="gpk-nav__dropdown gpk-nav__dropdown--wide">
                        <div class="gpk-nav__dropdown-grid">
                            <div>
                                <div class="gpk-nav__dropdown-col-title">Mitra Nasional</div>
                                <a class="gpk-nav__dropdown-item" href="https://www.ekon.go.id/" target="_blank" rel="noopener"><i class="fas fa-landmark"></i>Kemenko Perekonomian</a>
                                <a class="gpk-nav__dropdown-item" href="https://www.pertanian.go.id/" target="_blank" rel="noopener"><i class="fas fa-seedling"></i>Kementerian Pertanian</a>
                                <a class="gpk-nav__dropdown-item" href="https://kemenperin.go.id/" target="_blank" rel="noopener"><i class="fas fa-industry"></i>Kementerian Perindustrian</a>
                                <a class="gpk-nav__dropdown-item" href="https://dephub.go.id/" target="_blank" rel="noopener"><i class="fas fa-truck"></i>Kementerian Perhubungan</a>
                                <a class="gpk-nav__dropdown-item" href="https://www.kemenkeu.go.id/home" target="_blank" rel="noopener"><i class="fas fa-coins"></i>Kementerian Keuangan</a>
                                <a class="gpk-nav__dropdown-item" href="https://kadin.id/" target="_blank" rel="noopener"><i class="fas fa-handshake"></i>KADIN Indonesia</a>
                            </div>
                            <div>
                                <div class="gpk-nav__dropdown-col-title">Mitra Internasional</div>
                                <a class="gpk-nav__dropdown-item" href="https://www.thainr.com/en/?" target="_blank" rel="noopener"><i class="fas fa-globe-asia"></i>Thai Rubber Association</a>
                                <a class="gpk-nav__dropdown-item" href="https://www.lgm.gov.my/webv2/home" target="_blank" rel="noopener"><i class="fas fa-globe-asia"></i>Malaysian Rubber Board</a>
                                <a class="gpk-nav__dropdown-item" href="https://www.rtas.sg/" target="_blank" rel="noopener"><i class="fas fa-globe-asia"></i>Rubber Trade Singapore</a>
                                <a class="gpk-nav__dropdown-item" href="https://www.vra.com.vn/gioi-thieu.html" target="_blank" rel="noopener"><i class="fas fa-globe-asia"></i>Vietnam Rubber Association</a>
                                <a class="gpk-nav__dropdown-item" href="https://www.anrpc.org/" target="_blank" rel="noopener"><i class="fas fa-globe"></i>ANRPC</a>
                                <a class="gpk-nav__dropdown-item" href="https://ircorubber.com/about-us/" target="_blank" rel="noopener"><i class="fas fa-globe"></i>IRCo Rubber</a>
                                <a class="gpk-nav__dropdown-item" href="https://sustainablenaturalrubber.org/" target="_blank" rel="noopener"><i class="fas fa-leaf"></i>Sustainable Rubber</a>
                                <a class="gpk-nav__dropdown-item" href="https://www.sgx.com/" target="_blank" rel="noopener"><i class="fas fa-chart-line"></i>Singapore Exchange</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="gpk-nav__item gpk-nav__item--dropdown {{ request()->routeIs('anggota') ? 'is-active' : '' }}" data-dropdown>
                    <a class="gpk-nav__link" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-users"></i>{{ __('global.anggota') }}
                        <i class="fas fa-chevron-down gpk-nav__caret"></i>
                    </a>
                    <ul class="gpk-nav__dropdown">
                        <li>
                            <a class="gpk-nav__dropdown-item {{ request()->routeIs('anggota') ? 'is-active' : '' }}" href="{{ route('anggota') }}">
                                <i class="fas fa-user-friends"></i>{{ __('global.anggota') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="gpk-nav__item">
                    <a class="gpk-nav__link {{ request()->routeIs('kontak') ? 'is-active' : '' }}" href="{{ route('kontak') }}">
                        <i class="fas fa-phone"></i>{{ __('global.kontak') }}
                    </a>
                </li>

            </ul>

            {{-- RIGHT MENU: LANGUAGE SWITCHER --}}
            <ul class="gpk-nav__menu gpk-nav__menu--right">
                <li class="gpk-nav__item gpk-nav__item--dropdown" data-dropdown>
                    <a class="gpk-nav__link" href="#" role="button" aria-expanded="false">
                        <i class="fas fa-globe"></i>{{ strtoupper(app()->getLocale()) }}
                        <i class="fas fa-chevron-down gpk-nav__caret"></i>
                    </a>
                    <ul class="gpk-nav__dropdown">
                        @foreach (['id' => 'Indonesia', 'en' => 'English'] as $lang => $label)
                            <li>
                                <a class="gpk-nav__dropdown-item {{ app()->getLocale() === $lang ? 'is-active' : '' }}" href="{{ route('langSwitch', $lang) }}">
                                    <i class="fas fa-flag"></i>{{ $label }}
                                </a>
                            </li>
                            @if($lang === 'id')
                                <li><div class="gpk-nav__dropdown-divider"></div></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>

{{-- Backdrop overlay (muncul saat mobile menu terbuka) --}}
<div class="gpk-nav__backdrop" id="gpkNavBackdrop" aria-hidden="true"></div>


{{-- ============================================================
     NAVBAR SCRIPTS (Vanilla JS, tidak butuh jQuery/Bootstrap)
     ============================================================ --}}
<script>
(function() {
    'use strict';

    const nav = document.getElementById('gpkNav');
    const toggler = document.getElementById('gpkNavToggler');
    const collapse = document.getElementById('gpkNavCollapse');
    const backdrop = document.getElementById('gpkNavBackdrop');
    if (!nav || !toggler || !collapse) return;

    // ==========================================
    // 1. MOBILE TOGGLE
    // ==========================================
    function openMobileMenu() {
        collapse.classList.add('is-open');
        toggler.classList.add('is-open');
        toggler.setAttribute('aria-expanded', 'true');
        document.body.classList.add('gpk-nav-locked');
        if (backdrop) backdrop.classList.add('is-visible');
    }

    function closeMobileMenu() {
        collapse.classList.remove('is-open');
        toggler.classList.remove('is-open');
        toggler.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('gpk-nav-locked');
        if (backdrop) backdrop.classList.remove('is-visible');
        closeAllDropdowns();
    }

    function toggleMobileMenu() {
        if (collapse.classList.contains('is-open')) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }

    toggler.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        toggleMobileMenu();
    });

    // Close on backdrop click
    if (backdrop) {
        backdrop.addEventListener('click', closeMobileMenu);
    }

    // Close on link click (mobile/tablet only)
    const directLinks = collapse.querySelectorAll('.gpk-nav__link:not([href="#"]), .gpk-nav__dropdown-item');
    directLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 1200) {
                setTimeout(() => {
                    closeMobileMenu();
                }, 100);
            }
        });
    });

    // ==========================================
    // 2. DROPDOWN BEHAVIOR
    // ==========================================
    const dropdowns = nav.querySelectorAll('[data-dropdown]');

    dropdowns.forEach(item => {
        const trigger = item.querySelector('.gpk-nav__link');
        if (!trigger) return;

        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            if (window.innerWidth >= 1200) {
                // Desktop: toggle
                const wasOpen = item.classList.contains('is-open');
                closeAllDropdowns();
                if (!wasOpen) {
                    item.classList.add('is-open');
                    trigger.setAttribute('aria-expanded', 'true');
                }
            } else {
                // Mobile: accordion
                const wasOpen = item.classList.contains('is-open');
                dropdowns.forEach(d => {
                    if (d !== item) d.classList.remove('is-open');
                });
                item.classList.toggle('is-open', !wasOpen);
                trigger.setAttribute('aria-expanded', String(!wasOpen));
            }
        });
    });

    function closeAllDropdowns() {
        dropdowns.forEach(d => {
            d.classList.remove('is-open');
            const t = d.querySelector('.gpk-nav__link');
            if (t) t.setAttribute('aria-expanded', 'false');
        });
    }

    // Close when clicking outside (desktop dropdown)
    document.addEventListener('click', (e) => {
        if (!nav.contains(e.target) && !(backdrop && backdrop.contains(e.target))) {
            closeAllDropdowns();
            if (window.innerWidth < 1200 && collapse.classList.contains('is-open')) {
                closeMobileMenu();
            }
        }
    });

    // ESC closes everything
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeAllDropdowns();
            if (collapse.classList.contains('is-open')) {
                closeMobileMenu();
            }
        }
    });

    // ==========================================
    // 3. AUTO-HIDE NAVBAR ON SCROLL (gapkindosu style)
    // ==========================================
    let prevScrollPos = window.pageYOffset;
    let ticking = false;

    function handleScroll() {
        const currentScrollPos = window.pageYOffset;

        // Jangan hide navbar saat mobile menu open
        if (collapse.classList.contains('is-open')) {
            nav.style.top = '0';
            prevScrollPos = currentScrollPos;
            ticking = false;
            return;
        }

        if (prevScrollPos > currentScrollPos) {
            nav.style.top = '0';
        } else if (currentScrollPos > 50) {
            const navHeight = nav.offsetHeight;
            nav.style.top = `-${navHeight + 15}px`;
            closeAllDropdowns();
        }

        prevScrollPos = currentScrollPos;
        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(handleScroll);
            ticking = true;
        }
    }, { passive: true });

    // ==========================================
    // 4. RESET ON RESIZE
    // ==========================================
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (window.innerWidth >= 1200) {
                closeMobileMenu();
                closeAllDropdowns();
            }
        }, 200);
    });

})();
</script>
