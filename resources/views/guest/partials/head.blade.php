<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'GAPKINDO — Gabungan Perusahaan Karet Indonesia')</title>
    <meta name="description" content="GAPKINDO - Gabungan Perusahaan Karet Indonesia">
    <meta name="author" content="Sekretariat GAPKINDO">
    <meta name="keyword" content="GAPKINDO - Gabungan Perusahaan Karet Indonesia">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Premium fonts (Fraunces serif + Manrope sans + JetBrains Mono) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,500;9..144,600;9..144,700&family=Manrope:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500&display=swap" rel="stylesheet">

    {{-- Legacy font for backward compat (halaman-halaman lain masih pakai) --}}
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('guest/assets/img/icon/logo-gapkindo.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('guest/assets/img/icon/logo-gapkindo.ico') }}" type="image/x-icon">

    {{-- Legacy CSS (dibutuhkan halaman lain yang masih pakai Bootstrap 3) --}}
    <link rel="stylesheet" href="{{ asset('guest/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/fontello.css') }}">
    <link href="{{ asset('guest/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet">
    <link href="{{ asset('guest/assets/fonts/icon-7-stroke/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('guest/assets/css/animate.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/icheck.min_all.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/price-range.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/assets/css/custom.css') }}">

    {{-- Font Awesome Pro & Leaflet --}}
    <link rel="stylesheet" href="https://raw.githack.com/mrbudbud/fontawesome-pro/master/src/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    {{-- ========================================================
         PREMIUM DESIGN TOKENS (Global, dipakai navbar, footer, dll)
         ======================================================== --}}
    <style>
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

            --ease-out: cubic-bezier(0.16, 1, 0.3, 1);
            --ease-in-out: cubic-bezier(0.65, 0, 0.35, 1);

            --nav-h-desktop: 84px;
            --nav-h-mobile: 68px;
        }

        /* Preloader supaya tetap putih clean, bukan bumerang */
        #preloader { background: var(--c-bg); }

        /* Non-home pages: push konten ke bawah navbar fixed */
        body:not(.is-home) {
            padding-top: var(--nav-h-desktop);
        }
        @media (max-width: 991px) {
            body:not(.is-home) {
                padding-top: var(--nav-h-mobile);
            }
        }
    </style>

    {{-- Stack untuk styles dari halaman individual (index.blade.php dll) --}}
    @stack('styles')

</head>

<body class="@yield('bodyClass')">
