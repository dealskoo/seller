<?php

namespace Dealskoo\Seller\Contracts\Support;

use Dealskoo\Seller\Contracts\Dashboard;
use Illuminate\Http\Request;

class DefaultDashboard implements Dashboard
{
    public function handle(Request $request)
    {
        return view('seller::dashboard');
    }
}
