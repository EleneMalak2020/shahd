<?php

namespace App\Http\Controllers\Front;

use App\Aria;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $order->price = \Cart::session(Auth::id())->getTotal();
        $order->delivery_cost = $aria->delivery_cost;
        $order->total = (\Cart::session(Auth::id())->getTotal() + $aria->delivery_cost);
        $order->save();

        foreach(\Cart::session(Auth::id())->getContent() as $product){
            $order->products()->attach($product->id, ['quantity' => $product->quantity]);

            $table = Product::find($product->id);
            $table->increment('order_count', $product->quantity);
        }

        \Cart::session(Auth::id())->clear();

        toastr()->success('order sent successfully');
        return redirect()->route('home');


    }
}
