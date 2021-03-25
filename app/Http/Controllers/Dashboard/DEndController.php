<?php

namespace App\Http\Controllers\Dashboard;

use App\End;
use App\Order;
use App\Product;
use App\Sproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DEndController extends Controller
{
    public function index()
    {
        $products = Product::where('order_count', '>', '0')->get();
        $deliveries = Order::all()->pluck('delivery_cost')->sum();
        $total = Order::all()->pluck('total')->sum();
        $admin = Auth::guard('admin')->user();

        return view('dashboard.end', compact('products', 'deliveries', 'total', 'admin'));
    }

    public function store()
    {
        $products = Product::where('order_count', '>', '0')->get();
        $deliveries = Order::all()->pluck('delivery_cost')->sum();
        $total = Order::all()->pluck('total')->sum();

        $end = new End();
        $end->deliveries = $deliveries;
        $end->total = $total;
        $end->save();

        foreach($products as $product)
        {
            $sproduct = new Sproduct();
            $sproduct->end_id = $end->id;
            $sproduct->name = $product->name_ar;
            $sproduct->order_count = $product->order_count;
            $sproduct->subtotal = $product->price * $product->order_count;
            $sproduct->save();
        }

        $orders = Order::all();
        foreach($orders as $order){
            $order->products()->detach();
            $order->delete();
        }

        foreach($products as $product){
            $product->order_count = 0;
            $product->save();
        }

        return redirect()->route('dashboard.home');
    }

    public function reports()
    {
        $ends = End::all();
        $admin = Auth::guard('admin')->user();

        return view('dashboard.reports', compact('ends', 'admin'));
    }

    public function report_select(Request $request)
    {
        $report = End::find($request->id);
        $report_date = $report->created_at->format('Y-m-d');
        $sproducts = Sproduct::where('end_id', $request->id)->get();


        return response()->json([
            'status' => 'success',
            'report' => $report,
            'report_date' => $report_date,
            'products' => $sproducts
        ]);
    }

}
