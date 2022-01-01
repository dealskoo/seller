<?php

namespace Dealskoo\Seller\Http\Controllers\Auth;

use Dealskoo\Seller\Events\SellerEmailVerified;
use Dealskoo\Seller\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('seller.dashboard'));
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new SellerEmailVerified($request->user()));
        }

        return redirect()->intended(route('seller.dashboard'));
    }
}
