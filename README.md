# Seller Center of [Dealskoo](https://www.dealskoo.com)

## Install

```base
$ composer require dealskoo\seller
```

### Publish vendor

```base 
$ php artisan vendor:publish --provider="Dealskoo\Seller\Providers\SellerServiceProvider" --tag=public
```

### Publish config

```base 
$ php artisan vendor:publish --provider="Dealskoo\Seller\Providers\SellerServiceProvider" --tag=config
```

### Publish lang

```base 
$ php artisan vendor:publish --provider="Dealskoo\Seller\Providers\SellerServiceProvider" --tag=lang
```
