<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Info;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public function index()
    {
        $c = $categories = Category::select('id', 'name_'.LaravelLocalization::getCurrentLocale().' as name', 'image')->get();
        if (count($c) > 6){
            $categories = $c->random(6);
        }else{
            $categories = Category::select('id', 'name_'.LaravelLocalization::getCurrentLocale().' as name', 'image')->get();
        }

        $p = Product::select('id', 'category_id', 'name_'.LaravelLocalization::getCurrentLocale().' as name', 'price', 'image')->get();
        if (count($p) > 8){
            $products = $p->random(8);
        }else{
            $products = Product::select('id', 'category_id', 'name_'.LaravelLocalization::getCurrentLocale().' as name', 'price', 'image')->get();
        }

        $info = Info::find(1);
        return view('front.index', compact('categories', 'products', 'info'));
    }
}
