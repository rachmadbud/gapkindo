{{--
    ===================================================
    MASTER LAYOUT — Guest / Public
    Premium edition
    ===================================================
--}}
@include('guest.partials.head')

<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

{{-- Navbar (premium, sticky) --}}
@include('guest.partials.nav')

{{-- Konten halaman --}}
@yield('content')

{{-- Footer (premium) --}}
@include('guest.partials.footer')

{{-- Scripts (legacy + @stack('scripts')) --}}
@include('guest.partials.scripts')
