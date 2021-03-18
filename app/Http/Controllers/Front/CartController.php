<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $products = \Cart::session(Auth::id())->getContent();

        return view('front.cart', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);

        \Cart::session(Auth::id())->add(array(
            "id"        =>  $product->id,
            "name"      =>  $product->name_en,
            "price"     => $product->price,
            "image"     => asset('storage/products/'.$product->image),
            "quantity"  => 1,
            "attributes"    => array(
                "name_ar"   => $product->name_ar,
                "image"     => asset('storage/products/'.$product->image),
            ),

        ));
        // $itemsCount = \Cart::session(Auth::id())->getTotalQuantity();

        return response()->json([
            'status'    => true,
            'msg'       => 'Successfully added to your cart',
        ]);


    }
}
