@include('guest.layouts.sidebar', [
    'sidebarTitle' => __('global.guest.priceInformation'),
    'sidebarToggleLabel' => __('global.guest.priceMenu'),
    'sidebarItems' => [
        ['route' => 'harga', 'icon' => 'fa-tachometer-alt', 'label' => __('global.guest.dashboard')],
        ['route' => 'sicom-tsr20', 'icon' => 'fa-chart-line', 'label' => 'SICOM-TSR20'],
    ],
])
