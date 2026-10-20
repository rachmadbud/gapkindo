@include('guest.layouts.sidebar', [
    'sidebarTitle' => 'Informasi Harga',
    'sidebarToggleLabel' => 'Menu Harga',
    'sidebarItems' => [
        ['route' => 'harga', 'icon' => 'fa-tachometer-alt', 'label' => 'Dashboard'],
        ['route' => 'sicom-tsr20', 'icon' => 'fa-chart-line', 'label' => 'SICOM-TSR20'],
    ],
])
