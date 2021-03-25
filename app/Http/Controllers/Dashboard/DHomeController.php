<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DHomeController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('dashboard.home', compact('admin'));
    }

    public function MarkAsRead_all()
    {
        $userUnreadNotification = Auth::guard('admin')->user()->unreadNotifications;

        if($userUnreadNotification){
            $userUnreadNotification->MarkAsRead();
            return redirect()->route('dashboard.orders.waiting');
        }
    }
}
