<?php

namespace App\Http\Controllers\Dashboard;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DOrderController extends Controller
{
    public function waiting()
    {
        $orders = Order::where('status', 'waiting')->latest()->get();
        $admin = Auth::guard('admin')->user();

        return view('dashboard.orders_waiting', compact('orders', 'admin'));
    }

    public function approve(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 'approved';
        $order->save();

        toastr()->success('تم استلام الطلب بنجاح');
        return redirect()->back();
    }

    public function approved()
    {
        $orders = Order::where('status', 'approved')->latest()->get();

        return view('dashboard.orders_approved', compact('orders'));
    }
}
