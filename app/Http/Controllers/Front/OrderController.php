<?php

namespace App\Http\Controllers\Front;

use App\Admin;
use App\Aria;
use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NewOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

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
}
