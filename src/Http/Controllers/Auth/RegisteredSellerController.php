<?php

namespace Dealskoo\Seller\Http\Controllers\Auth;

use Dealskoo\Seller\Events\SellerRegistered;
use Dealskoo\Seller\Http\Controllers\Controller;
use Dealskoo\Seller\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredSellerController extends Controller
{
    public function create()
    {
        return view('seller::auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
            'password' => ['required', 'confirmed', Rules\Password::min(config('seller.password_length'))],
            'country_id' => ['required']
        ]);

        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_id' => $request->country_id,
        ]);

        event(new SellerRegistered($seller));

        $this->guard()->login($seller);

        return redirect(route('seller.dashboard'));
    }
}
