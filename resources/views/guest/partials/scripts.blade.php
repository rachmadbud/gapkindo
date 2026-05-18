{{-- Legacy scripts (dibutuhkan halaman lain yg masih pakai Bootstrap 3 / Owl Carousel / WOW) --}}
<script src="{{ asset('guest/assets/js/modernizr-2.6.2.min.js') }}"></script>
<script src="{{ asset('guest/assets/js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('guest/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('guest/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('guest/assets/js/bootstrap-hover-dropdown.js') }}"></script>
<script src="{{ asset('guest/assets/js/easypiechart.min.js') }}"></script>
<script src="{{ asset('guest/assets/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('guest/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('guest/assets/js/wow.js') }}"></script>
<script src="{{ asset('guest/assets/js/icheck.min.js') }}"></script>
<script src="{{ asset('guest/assets/js/price-range.js') }}"></script>
<script src="{{ asset('guest/assets/js/main.js') }}"></script>

<script>
    // Legacy tooltip — jangan diaktifkan di navbar premium kita supaya tidak konflik
    $(function() {
        $('[title]').not('.gpk-nav *, .gpk-footer *, .gpk-premium *').tooltip({
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
    });
</script>

{{-- Stack untuk scripts dari halaman individual (index.blade.php, dll) --}}
@stack('scripts')

</body>

</html>
