    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link d-block">
                        <i class="nav-icon fas fa-tachometer-alt-slowest fa-2x"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folders"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cover</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('admin.news') }}" class="nav-link">
                        <i class="nav-icon fad fa-newspaper"></i>
                        <p>
                            News
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.cabang') }}" class="nav-link">
                        <i class="nav-icon fal fa-code-branch"></i>
                        <p>
                            Cabang
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.galery') }}" class="nav-link">
                        <i class="nav-icon fas fa-folders"></i>
                        <p>
                            Galery
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.publikasi') }}" class="nav-link">
                        <i class="nav-icon fad fa-newspaper"></i>
                        <p>
                            Publikasi
                        </p>
                    </a>
                </li>

                <li class="nav-item statistics-treeview {{ request()->routeIs('admin.exportDestinations*', 'admin.indonesiaProduction*', 'admin.globalProduction*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.exportDestinations*', 'admin.indonesiaProduction*', 'admin.globalProduction*') ? 'active' : '' }}"
                        aria-expanded="{{ request()->routeIs('admin.exportDestinations*', 'admin.indonesiaProduction*', 'admin.globalProduction*') ? 'true' : 'false' }}"
                        aria-controls="statisticsSubmenu">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Statistics
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" id="statisticsSubmenu">
                        <li class="nav-item">
                            <a href="{{ route('admin.exportDestinations') }}" class="nav-link {{ request()->routeIs('admin.exportDestinations*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Export Destinations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.indonesiaProduction') }}" class="nav-link {{ request()->routeIs('admin.indonesiaProduction*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Production in Indonesia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.globalProduction') }}" class="nav-link {{ request()->routeIs('admin.globalProduction*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('global.guest.productionGlobal') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <style>
        .statistics-treeview > .nav-link .right {
            transition: transform 0.2s ease-in-out;
        }

        .statistics-treeview.menu-open > .nav-link .right {
            transform: rotate(-90deg);
        }
    </style>
