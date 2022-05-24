<?php

namespace Dealskoo\Seller\Http\Controllers\Auth;

use Dealskoo\Country\Models\Country;
use Dealskoo\Seller\Events\SellerRegistered;
use Dealskoo\Seller\Http\Controllers\Controller;
use Dealskoo\Seller\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class RegisteredSellerController extends Controller
{
    public function create()
    {
        $countries = Country::all();
        return view('seller::auth.register', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:sellers'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
            'password' => ['required', 'confirmed', Rules\Password::min(config('auth.password_length'))],
            'country_id' => ['required', 'exists:countries,id']
        ]);

        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_id' => $request->country_id,
            'source' => $request->cookie('source', null),
        ]);
        event(new SellerRegistered($seller));

        $this->guard()->login($seller);

        return redirect(route('seller.dashboard'));
    }
}
