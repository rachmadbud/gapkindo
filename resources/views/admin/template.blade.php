@include('admin.partials.head')

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('admin.partials.navbar')

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('assets/17-55-41-668_512.webp') }}" alt="logo" class="brand-image  elevation-3 "
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            @include('admin.partials.sidebar')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            @yield('content')


        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Dev</b>
            </div>
            <strong>Copyright &copy; 2023 <a href="#"><img src="{{ asset('assets/17-55-41-668_512.webp') }}"
                        alt="" style="height: 25px;"> save Palestine</a>.</strong>
            {{--  --}}
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin.partials.script')

</body>

</html>
