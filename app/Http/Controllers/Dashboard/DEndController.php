<?php

namespace App\Http\Controllers\Dashboard;

use App\End;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Sproduct;
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
        return view('dashboard.reports', compact('ends'));
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
