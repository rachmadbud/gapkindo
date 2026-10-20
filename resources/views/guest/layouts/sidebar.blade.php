@include('guest.partials.sidebar-styles')

<!-- Tombol Burger Mobile untuk memunculkan Sidebar -->
<button type="button" class="gpk-sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
    <i class="fas fa-bars"></i> {{ $sidebarToggleLabel ?? 'Menu Statistik' }}
</button>

<!-- Backdrop Gelap di Mobile -->
<div class="gpk-sidebar-backdrop" id="sidebarBackdrop"></div>

<!-- SIDEBAR KIRI -->
<aside class="gpk-sidebar" id="gpkSidebar">
    <div class="gpk-sidebar-title">{{ $sidebarTitle ?? 'Statistik Karet' }}</div>

    <ul class="gpk-sidebar-menu">
        @foreach ($sidebarItems ?? [
            ['route' => 'statistik', 'icon' => 'fa-tachometer-alt', 'label' => 'Dashboard'],
            ['route' => 'tujuan-ekspor', 'icon' => 'fa-shipping-fast', 'label' => 'Tujuan Ekspor'],
            ['route' => 'produksi-indonesia', 'icon' => 'fa-flag', 'label' => 'Produksi Indonesia'],
        ] as $item)
            <li>
                <a href="{{ route($item['route']) }}" class="{{ request()->routeIs($item['route']) ? 'active' : '' }}">
                    <i class="nav-icon fas {{ $item['icon'] }}"></i> {{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</aside>

{{-- Script kecil untuk interaksi buka/tutup sidebar mobile --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('gpkSidebar');
        const backdrop = document.getElementById('sidebarBackdrop');

        if (toggleBtn && sidebar && backdrop) {
            function toggleSidebar() {
                sidebar.classList.toggle('is-open');
                backdrop.classList.toggle('is-visible');
            }

            toggleBtn.addEventListener('click', toggleSidebar);
            backdrop.addEventListener('click', toggleSidebar);
        }
    });
</script>
