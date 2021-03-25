<?php

namespace App\Http\Controllers\Front;

use App\Info;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name_'.LaravelLocalization::getCurrentLocale().' as name')->get();
        $products = Product::select('id', 'category_id', 'name_'.LaravelLocalization::getCurrentLocale().' as name', 'price', 'image')->get();
        $info = Info::find(1);

        return view('front.products', compact('products', 'categories', 'info'));
    }

    public function show($product_id)
    {
        $product = Product::where('id', $product_id)->select('id', 'category_id', 'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'description_'.LaravelLocalization::getCurrentLocale().' as description', 'price', 'image')->first();
        $info = Info::find(1);

        return view('front.single-product', compact('product', 'info'));
    }

    public function category($category_id)
    {
        $categories = Category::select('id', 'name_'.LaravelLocalization::getCurrentLocale().' as name')->get();
        $products = Product::where('category_id', $category_id)->select('id', 'category_id', 'name_'.LaravelLocalization::getCurrentLocale().' as name', 'price', 'image')->get();
        $info = Info::find(1);

        return view('front.category', compact('products', 'categories', 'info'));
    }

}
