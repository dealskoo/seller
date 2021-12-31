<?php
return [
    'route' => [
        'prefix' => env('SELLER_ROUTE_PREFIX', 'seller'),
    ],
    'title' => 'Seller Center',
    'logo' => '/vendor/seller/images/logo.svg',
    'logo_dark' => '/vendor/seller/images/logo_dark.svg',
    'logo_sm' => '/vendor/seller/images/logo_sm.svg',
    'logo_sm_dark' => '/vendor/seller/images/logo_sm_dark.svg',
    'password_length' => 8,
    'copyright' => '2014 - ' . date('Y') . ' ' . config('app.name'),
    'footer_menus' => [[
        'name' => 'about',
        'url' => 'seller.dashboard'
    ], [
        'name' => 'support',
        'url' => 'seller.register'
    ], [
        'name' => 'contact_us',
        'url' => 'seller.login'
    ]],
    'terms_and_conditions_url' => 'seller.login',
];
