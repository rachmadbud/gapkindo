{{--
    ===================================================
    MASTER LAYOUT — GAPKINDO (Navbar + Sidebar + Content)
    ===================================================
--}}
@include('guest.partials.head')

<style>
    html,
    body {
        height: 100%;
        margin: 0;
        font-family: 'Open Sans', system-ui, -apple-system, sans-serif;
        background-color: #f8fafc;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        padding-top: 61px;
        /* Mengikuti tinggi navbar */
    }

    @media (max-width: 1199.98px) {
        body {
            padding-top: 56px;
        }
    }

    /* Wrapper utama menampung Sidebar dan Konten berdampingan */
    .gpk-wrapper {
        display: flex;
        flex: 1;
        width: 100%;
        min-height: 0;
        /* Penting agar flex child tidak meluber */
        align-items: stretch;
    }

    /* Area Konten di Kanan */
    .gpk-content-area {
        flex: 1;
        min-width: 0;
        /* Mencegah tabel/grafik meluber */
        display: flex;
        flex-direction: column;
        background-color: #f8fafc;
    }

    .gpk-main-inner {
        flex: 1 0 auto;
        padding: 1.5rem;
    }

    .gpk-footer-min {
        flex-shrink: 0;
    }

    @media (max-width: 900px) {
        .gpk-wrapper {
            flex-direction: column;
        }
    }
</style>

<body class="{{ $bodyClass ?? '' }}">

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    {{-- Navbar Utama (Fix di atas) --}}
    @include('guest.partials.nav')

    {{-- Wrapper yang menampung Sidebar dan Konten Utama secara berdampingan --}}
    <div class="gpk-wrapper">

        {{-- Area Konten & Footer Kanan --}}
        <div class="gpk-content-area">

            <main class="gpk-main-inner">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('guest.partials.footer')
        </div>

    </div>

    {{-- Scripts --}}
    @include('guest.partials.scripts')
    @stack('scripts')
</body>

</html>
