<?php

namespace App\Http\Controllers\Front;

use App\Aria;
use App\Info;
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
        $info = Info::find(1);
        return view('front.checkout', compact('user', 'arias', 'info'));
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
