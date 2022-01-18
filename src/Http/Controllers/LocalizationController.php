<?php

namespace Dealskoo\Seller\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function __invoke($locale)
    {
        if (array_key_exists($locale, config('seller.languages'))) {
            App::setLocale($locale);
            Session::put('seller_locale', $locale);
        }
        return back();
    }
}
