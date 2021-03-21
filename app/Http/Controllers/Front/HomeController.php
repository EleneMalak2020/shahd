<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $c = Category::all();
        if (!$c->isEmpty()){
            $categories = $c->random(6);
        }else{
            $categories = Category::all();
        }

        $p = Product::all();
        if (!$p->isEmpty()){
            $products = $p->random(8);
        }else{
            $products = Product::all();
        }
        return view('front.index', compact('categories', 'products'));
    }
}
