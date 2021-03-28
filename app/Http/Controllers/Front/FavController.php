<?php

namespace App\Http\Controllers\Front;

use App\Fav;
use App\Info;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavController extends Controller
{
    public function add(Request $request)
    {
        $fav = new Fav();
        $fav->user_id = Auth::id();
        $fav->product_id = $request->id;
        $fav->save();

        return response()->json([
            'status' => true,
            'msg' => 'تم الاضافة الى المفضلة',
        ]);
    }

    public function index($user_id)
    {
        $fav_products_id = Fav::where('user_id', $user_id)->pluck('id')->toArray();
        $products = Product::WhereIn('id', $fav_products_id)->get();
        $info = Info::find(1);

        return view('front.fav', compact('products', 'info'));
    }
}
