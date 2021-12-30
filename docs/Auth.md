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

```php
namespace App\Http\Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('seller/*')) {
                return route('seller.login');
            } else {
                return route('login');
            }
        }
    }
```
