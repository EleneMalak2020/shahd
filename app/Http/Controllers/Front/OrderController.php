<?php

namespace App\Http\Controllers\Front;

use App\Aria;
use App\Info;
use App\User;
use App\Admin;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Notifications\NewOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $aria = Aria::find($request->aria);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->aria = $aria->name_ar;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->price = \Cart::session(Session::getId())->getTotal();
        $order->delivery_cost = $aria->delivery_cost;
        $order->total = (\Cart::session(Session::getId())->getTotal() + $aria->delivery_cost);
        $order->save();

        foreach(\Cart::session(Session::getId())->getContent() as $product){
            $order->products()->attach($product->id, ['quantity' => $product->quantity]);

            $table = Product::find($product->id);
            $table->increment('order_count', $product->quantity);
        }



        \Cart::session(Session::getId())->clear();

        //Notification
        $admin = Admin::get();
        Notification::send($admin, new NewOrder($order));

        toastr()->success('order sent successfully');
        return redirect()->route('home');
    }

    public function order_list()
    {
        $info = Info::find(1);
        $orders = Order::where('user_id', Auth::id())->get();
        return view('front.order_list', compact('info', 'orders'));
    }

    public function cancel_order($order_id)
    {
        $order = Order::find($order_id);
        $order->status = 4;
        $order->save();


        toastr()->success('order canceld successfully');
        return redirect()->back();
    }
}
