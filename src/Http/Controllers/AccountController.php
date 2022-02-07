<?php

namespace Dealskoo\Seller\Http\Controllers;

use Dealskoo\Seller\Exceptions\SellerException;
use Dealskoo\Seller\Notifications\EmailChangeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;

class AccountController extends Controller
{

    public function store(Request $request)
    {
        $seller = $request->user();
        if ($seller->slug) {
            $request->validate([
                'name' => ['required', 'unique:sellers,name,' . $request->user()->id . ',id'],
            ]);
            $seller->fill($request->only(['name', 'bio', 'company_name', 'website']));
        } else {
            $request->validate([
                'name' => ['required', 'unique:sellers,name,' . $request->user()->id . ',id'],
                'slug' => ['required', 'regex:/^[\w\d_]+$/i', 'unique:sellers,slug,' . $request->user()->id . ',id'],
            ]);
            $seller->fill($request->only(['name', 'bio', 'company_name', 'website', 'slug']));
        }
        $seller->save();
        return back()->with('success', __('seller::seller.update_success'));
    }

    public function avatar(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'max:1000']
        ]);

        $image = $request->file('file');
        $seller = $request->user();
        $filename = $seller->id . '.' . $image->guessExtension();
        $path = $image->storeAs('seller/avatars', $filename);
        $seller->avatar = $path;
        $seller->save();
        return ['url' => $seller->avatar_url];
    }

    public function email(Request $request)
    {
        $request->validate(['email' => ['required', 'email', 'unique:sellers']]);
        Notification::route('mail', $request->input('email'))->notify(new EmailChangeNotification());
        return back()->withInput($request->only(['email']))->with('success', __('Email Verify Notification Send Success'));
    }

    public function emailVerify(Request $request)
    {
        $email = Session::get('seller_email_change_verify');
        if (hash_equals($request->route('hash'), sha1($email))) {
            $seller = $request->user();
            $seller->email = $email;
            $seller->save();
            return redirect()->route('seller.account.email')->with('success', __('Email Change Success'));
        } else {
            return redirect()->route('seller.account.email')->withErrors([__('Link expired')]);
        }
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => ['required', Rules\Password::min(config('auth.password_length'))],
            'new_password' => ['required', 'confirmed', Rules\Password::min(config('auth.password_length'))],
        ]);

        if (!$this->guard()->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            return back()->withErrors([
                'password' => [__('The provided password does not match our records.')]
            ]);
        } else {
            $seller = $request->user();
            $seller->password = Hash::make($request->input('new_password'));
            $seller->save();
            return back()->with('success', __('seller::seller.update_success'));
        }
    }
}
