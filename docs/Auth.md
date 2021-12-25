```php
return [
    'guards' => [
        'seller' => [
            'driver' => 'session',
            'provider' => 'sellers'
        ]
    ],
    'providers' => [
        'driver' => 'eloquent',
        'sellers' => Dealskoo\Seller\Models\Seller::class
    ],
    'passwords' => [
        'sellers' => [
            'provider' => 'sellers',
            'table' => 'seller_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ]
    ]
];
```
