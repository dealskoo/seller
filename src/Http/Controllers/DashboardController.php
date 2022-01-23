<?php

namespace Dealskoo\Seller\Http\Controllers;

use Dealskoo\Seller\Contracts\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function handle(Request $request, Dashboard $dashboard)
    {
        return $dashboard->handle($request);
    }
}
