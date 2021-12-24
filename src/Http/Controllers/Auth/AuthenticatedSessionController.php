<?php

namespace Dealskoo\Seller\Http\Controllers\Auth;

use Dealskoo\Seller\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('seller::auth.login');
    }

    public function store()
    {

    }

    public function destroy()
    {

    }
}
