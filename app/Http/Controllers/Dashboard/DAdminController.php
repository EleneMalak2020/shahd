<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        return view('dashboard.admins', compact('admins'));
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
