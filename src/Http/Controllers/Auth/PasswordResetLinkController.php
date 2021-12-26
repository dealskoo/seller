<?php

namespace Dealskoo\Seller\Http\Controllers\Auth;

use Dealskoo\Seller\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordResetLinkController extends Controller
{
    public function create(Request $request)
    {
        return view('seller::auth.reset-password', ['request' => $request]);
    }

    public function store()
    {

    }
}
