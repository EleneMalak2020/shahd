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
        $orders = Order::where('status', '1')->latest()->get();
        $admin = Auth::guard('admin')->user();

        return view('dashboard.orders_waiting', compact('orders', 'admin'));
    }

    public function in_progress()
    {
        $admin = Auth::guard('admin')->user();
        $orders = Order::where('status', '2')->latest()->get();
        return view('dashboard.orders_in_progress', compact('orders', 'admin'));
    }

    public function post_in_progress(Request $request)
    {

        $order = Order::find($request->id);
        $order->status = '2';
        $order->save();

        toastr()->success('تم نقل الطلب الى جاري التحضير');
        return redirect()->back();
    }

    public function finished()
    {
        $admin = Auth::guard('admin')->user();
        $orders = Order::where('status', '3')->latest()->get();
        return view('dashboard.orders_finished', compact('orders', 'admin'));
    }


    public function post_finished(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = '3';
        $order->save();

        toastr()->success('تم الانتهاء من الطلب');
        return redirect()->back();
    }

    public function canceld()
    {
        $admin = Auth::guard('admin')->user();
        $orders = Order::where('status', '4')->orWhere('status', '5')->latest()->get();
        return view('dashboard.orders_canceld', compact('orders', 'admin'));

    }

    public function cancel_order(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = '5';
        $order->save();

        toastr()->success('تم الغاء الاوردر');
        return redirect()->back();
    }

}
