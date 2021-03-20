<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

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
            "quantity"  => $request->quantity,
            "attributes"    => array(
                "name_ar"   => $product->name_ar,
                "image"     => asset('storage/products/'.$product->image),
            ),

        ));

        return response()->json([
            'status'        => true,
            'msg'           => 'Successfully added to your cart',
            'totalQuantity' => \Cart::session(Auth::id())->getTotalQuantity(),
            'products'      => \Cart::session(Auth::id())->getContent(),
        ]);
    }

    public function deleteItemFromCart(Request $request)
    {
        \Cart::session(Auth::id())->remove($request->id);

        return response()->json([
            'status' => true,
            'msg'    => 'Product removed successfully',
            'id'     => $request->id,
            'total' => \Cart::session(Auth::id())->getTotal(),
            'totalQuantity' => \Cart::session(Auth::id())->getTotalQuantity(),
            'products'      => \Cart::session(Auth::id())->getContent(),
        ]);
    }

    public function plus(Request $request)
    {
        \Cart::session(Auth::id())->update($request->id, array(
            'quantity'  => 1,
        ));

        return response()->json([
            'status' => true,
            'total' => \Cart::session(Auth::id())->getTotal(),
            'priceSum'  => \Cart::get($request->id)->getPriceSum(),
            'id'    => $request->id,
            'totalQuantity' => \Cart::session(Auth::id())->getTotalQuantity(),
            'products'      => \Cart::session(Auth::id())->getContent(),
        ]);

    }

    public function minus(Request $request)
    {
        \Cart::session(Auth::id())->update($request->id, array(
            'quantity'  => -1,
        ));

        return response()->json([
            'status' => true,
            'total' => \Cart::session(Auth::id())->getTotal(),
            'priceSum'  => \Cart::get($request->id)->getPriceSum(),
            'id'    => $request->id,
            'totalQuantity' => \Cart::session(Auth::id())->getTotalQuantity(),
            'products'      => \Cart::session(Auth::id())->getContent(),
        ]);


    }


}
