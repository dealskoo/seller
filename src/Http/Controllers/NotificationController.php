<?php

namespace Dealskoo\Seller\Http\Controllers;

use Dealskoo\Seller\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function list(Request $request)
    {
        $notifications = $request->user()->notifications()->paginate(10);
        return view('seller::notifications', ['notifications' => $notifications]);
    }

    public function unread(Request $request)
    {
        $notifications = $request->user()->unreadNotifications()->paginate(10);
        return view('seller::notifications', ['notifications' => $notifications]);
    }

    public function show(Request $request, $id)
    {
        $notification = $request->user()->notifications()->where('id', $id)->first();
        abort_if(!$notification, 404);
        $notification->markAsRead();
        return view('seller::notification', ['notification' => $notification]);
    }

    public function allRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
        return back();
    }
}
