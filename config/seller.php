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
    'profile_prefix' => 'http://127.0.0.1/b/',
    'copyright' => '2014 - ' . date('Y') . ' ' . config('app.name'),
    'footer_menus' => [[
        'name' => 'About',
        'url' => 'seller.dashboard'
    ], [
        'name' => 'Support',
        'url' => 'seller.register'
    ], [
        'name' => 'Contact US',
        'url' => 'seller.login'
    ]],
    'terms_and_conditions_url' => 'seller.login',
    'languages' => ['en' => [
        'icon' => '/vendor/seller/images/flags/us.svg',
        'name' => 'English'
    ], 'zh_CN' => [
        'icon' => '/vendor/seller/images/flags/cn.svg',
        'name' => '简体中文'
    ]],
];
