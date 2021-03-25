<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Info;
use Illuminate\Support\Facades\Auth;

class DInfoController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $info = Info::find(1);

        return view('dashboard.info', compact('admin', 'info'));
    }

    public function update(Request $request)
    {
        Info::find(1)->update($request->all());

        toastr()->success('تم التعديل بنجاح');
        return redirect()->back();
    }
}
