<style>
    /* --- SIDEBAR KIRI --- */
    .gpk-sidebar {
        width: 260px;
        background-color: #1e3a8a;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        flex-shrink: 0;
        padding: 1.25rem 1rem;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease-in-out;
    }

    .gpk-sidebar-title {
        font-size: 1.25rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #93c5fd;
        margin-bottom: 0.75rem;
        font-weight: 700;
    }

    .gpk-sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
    }

    .gpk-sidebar-menu li a {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.65rem 0.85rem;
        color: #e2e8f0;
        text-decoration: none;
        border-radius: 6px;
        font-size: 1.89rem;
        font-weight: 400;
        transition: background 0.2s;
    }

    .gpk-sidebar-menu li a:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .gpk-sidebar-menu li a.active {
        background-color: #10b981;
        color: #ffffff;
        font-weight: 600;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* --- TOMBOL BURGER KHUSUS SIDEBAR (Mobile Only) --- */
    .gpk-sidebar-toggle {
        display: none;
        /* Default desktop disembunyikan */
        background: #1e3a8a;
        color: white;
        border: none;
        padding: 0.5rem 0.75rem;
        font-size: 1.1rem;
        border-radius: 4px;
        cursor: pointer;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        width: fit-content;
    }

    /* Backdrop untuk menutup sidebar mobile saat diklik di luar */
    .gpk-sidebar-backdrop {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1035;
    }

    /* --- RESPONSIF UNTUK MOBILE / TABLET (< 900px) --- */
    @media (max-width: 900px) {
        .gpk-sidebar-toggle {
            display: inline-flex;
            /* Munculkan tombol burger di mobile */
        }

        .gpk-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1040;
            transform: translateX(-100%);
            /* Sembunyikan sidebar di luar layar kiri */
        }

        /* Saat class 'is-open' ditambahkan via JS, sidebar akan geser muncul */
        .gpk-sidebar.is-open {
            transform: translateX(0);
        }

        .gpk-sidebar-backdrop.is-visible {
            display: block;
        }
    }
</style>

<!-- Tombol Burger Mobile untuk memunculkan Sidebar -->
<button type="button" class="gpk-sidebar-toggle" id="sidebarToggle" aria-label="Toggle Sidebar">
    <i class="fas fa-bars"></i> Menu Statistik
</button>

<!-- Backdrop Gelap di Mobile -->
<div class="gpk-sidebar-backdrop" id="sidebarBackdrop"></div>

<!-- SIDEBAR KIRI -->
<aside class="gpk-sidebar" id="gpkSidebar">
    <div class="gpk-sidebar-title">Statistik Karet</div>

    <ul class="gpk-sidebar-menu">
        <li>
            <a href="{{ route('statistik') }}" class="{{ request()->routeIs('statistik') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('tujuan-ekspor') }}" class="{{ request()->routeIs('tujuan-ekspor') ? 'active' : '' }}">
                <i class="nav-icon fas fa-shipping-fast"></i> Tujuan Ekspor
            </a>
        </li>
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
