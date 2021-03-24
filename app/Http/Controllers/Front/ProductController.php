<?php

namespace App\Http\Controllers\Front;

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

        return view('front.products', compact('products', 'categories'));
    }

    public function show($product_id)
    {
        $product = Product::where('id', $product_id)->select('id', 'category_id', 'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'description_'.LaravelLocalization::getCurrentLocale().' as description', 'price', 'image')->first();

        return view('front.single-product', compact('product'));
    }

    public function category($category_id)
    {
        $categories = Category::select('id', 'name_'.LaravelLocalization::getCurrentLocale().' as name')->get();
        $products = Product::where('category_id', $category_id)->select('id', 'category_id', 'name_'.LaravelLocalization::getCurrentLocale().' as name', 'price', 'image')->get();

        return view('front.category', compact('products', 'categories'));
    }

}
