<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        $admin = Auth::guard('admin')->user();
        return view('dashboard.admins', compact('admins', 'admin'));
    }

    public function makeAdmin($id)
    {
        $admin = Admin::find($id);

        if($admin->hasRole('admin')){
            $admin->removeRole('admin');
        }else{
            $admin->assignRole('admin');
        }

        return redirect()->back();
    }
}
