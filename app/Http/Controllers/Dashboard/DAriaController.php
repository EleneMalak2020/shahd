<?php

namespace App\Http\Controllers\Dashboard;

use App\Aria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DAriaController extends Controller
{
    public function index()
    {
        $arias = Aria::all();
        $admin = Auth::guard('admin')->user();

        return view('dashboard.aria', compact('arias', 'admin'));
    }

    public function store(Request $request)
    {
        $aria = new Aria();
        $aria->name_en = $request->name_en;
        $aria->name_ar = $request->name_ar;
        $aria->delivery_cost = $request->delivery_cost;
        $aria->save();

        toastr()->success('تمت الاضافة بنجاح');
        return redirect()->back();
    }


    public function update(Request $request)
    {
        $aria = Aria::find($request->id);
        $aria->name_en = $request->name_en;
        $aria->name_ar = $request->name_ar;
        $aria->delivery_cost = $request->delivery_cost;
        $aria->update();

        return response()->json([
            'status'    => 'success',
            'msg'       => 'تم التعديل بنجاح'
        ]);
    }





    public function delete($aria_id)
    {
        $aria = Aria::find($aria_id);
        $aria->delete();

        toastr()->success('تمت المسح بنجاح');
        return redirect()->back();
    }
}
