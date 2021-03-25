<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $admin = Auth::guard('admin')->user();
        return view('dashboard.users', compact('users', 'admin'));
    }
}
