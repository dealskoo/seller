<?php

namespace Dealskoo\Seller\Http\Controllers;

use Dealskoo\Seller\Notifications\EmailChangeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\throwException;

class AccountController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $seller = $request->user();
        $seller->fill($request->only(['name', 'bio', 'company_name', 'website']));
        $seller->save();
        return redirect()->back()->with('success', __('seller::seller.update_success'));
    }

    public function avatar(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'max:1000']
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $seller = $request->user();
            $filename = $seller->id . '.' . $image->guessExtension();
            $path = $request->file('file')->storeAs('seller/avatars', $filename);
            $seller->avatar = $path;
            $seller->save();
            return ['url' => Storage::url($path)];
        } else {
            throwException(__('Please upload file'));
        }
    }

    public function email(Request $request)
    {
        $request->validate(['email' => ['required', 'email', 'unique:sellers']]);
        Notification::route('mail', $request->input('email'))->notify(new EmailChangeNotification());
        return redirect()->back()->withInput($request->only(['email']))->with('success', __('Email Verify Notification Send Success'));
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
            'password' => ['required', 'min:' . config('seller.password_length')],
            'new_password' => ['required', 'min:' . config('seller.password_length')],
            'new_password_confirmation' => ['required', 'min:' . config('seller.password_length'), 'same:new_password']
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
            $seller->password = bcrypt($request->input('new_password'));
            $seller->save();
            return redirect()->back()->with('success', __('seller::seller.update_success'));
        }
    }
}
