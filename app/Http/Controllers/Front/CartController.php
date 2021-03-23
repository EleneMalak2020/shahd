<?php

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function __construct()
    {
        //assign the middleware to all the methods of the controller
        $this->middleware('auth');
    }

    public function index()
    {
        $products = \Cart::session(Session::getId())->getContent();

        return view('front.cart', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);

        \Cart::session(Session::getId())->add(array(
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
            'totalQuantity' => \Cart::session(Session::getId())->getTotalQuantity(),
            'products'      => \Cart::session(Session::getId())->getContent(),
        ]);
    }

    public function deleteItemFromCart(Request $request)
    {
        \Cart::session(Session::getId())->remove($request->id);

        return response()->json([
            'status' => true,
            'msg'    => 'Product removed successfully',
            'id'     => $request->id,
            'total' => \Cart::session(Session::getId())->getTotal(),
            'totalQuantity' => \Cart::session(Session::getId())->getTotalQuantity(),
            'products'      => \Cart::session(Session::getId())->getContent(),
        ]);
    }

    public function plus(Request $request)
    {
        \Cart::session(Session::getId())->update($request->id, array(
            'quantity'  => 1,
        ));

        return response()->json([
            'status' => true,
            'total' => \Cart::session(Session::getId())->getTotal(),
            'priceSum'  => \Cart::get($request->id)->getPriceSum(),
            'id'    => $request->id,
            'totalQuantity' => \Cart::session(Session::getId())->getTotalQuantity(),
            'products'      => \Cart::session(Session::getId())->getContent(),
        ]);

    }

    public function minus(Request $request)
    {
        \Cart::session(Session::getId())->update($request->id, array(
            'quantity'  => -1,
        ));

        return response()->json([
            'status' => true,
            'total' => \Cart::session(Session::getId())->getTotal(),
            'priceSum'  => \Cart::get($request->id)->getPriceSum(),
            'id'    => $request->id,
            'totalQuantity' => \Cart::session(Session::getId())->getTotalQuantity(),
            'products'      => \Cart::session(Session::getId())->getContent(),
        ]);


    }


}
