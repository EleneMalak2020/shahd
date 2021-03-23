<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class DEndController extends Controller
{
    public function index()
    {
        $products = Product::where('order_count', '>', '0')->get();
        $deliveries = Order::all()->pluck('delivery_cost')->sum();
        $total = Order::all()->pluck('total')->sum();
        return view('dashboard.end', compact('products', 'deliveries', 'total'));
    }

    public function store()
    {
        $orders = Order::all();
        foreach($orders as $order){
            $order->products()->detach();
            $order->delete();
        }
        $products = Product::where('order_count', '>', '0')->get();
        foreach($products as $product){
            $product->order_count = 0;
            $product->save();
        }

        return redirect()->route('dashboard.home');
    }
}
