<?php

namespace Dealskoo\Seller\Http\Controllers\Auth;

use Dealskoo\Seller\Events\SellerPasswordReset;
use Dealskoo\Seller\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('seller::auth.reset-password', ['request' => $request]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::min(config('auth.password_length'))],
        ]);

        $status = Password::broker('sellers')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($seller) use ($request) {
                $seller->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new SellerPasswordReset($seller));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('seller.login')->withInput($request->only('email'))->with('status', __($status))
            : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }
}
