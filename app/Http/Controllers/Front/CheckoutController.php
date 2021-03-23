<?php

namespace App\Http\Controllers\Front;

use App\Aria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $arias = Aria::all();
        return view('front.checkout', compact('user', 'arias'));
    }

    public function choseAria(Request $request)
    {
        $aria = Aria::find($request->id);;

        return response()->json([
            'data' => $aria->delivery_cost,
            'subtotal' => \Cart::session(Session::getId())->getTotal()
        ]);

    }
}
