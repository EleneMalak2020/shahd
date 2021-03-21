<?php

namespace App\Http\Controllers\Front;

use App\Aria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $aria = Aria::find($request->id);

        return response()->json([
            'data' => $aria
        ]);

    }
}
