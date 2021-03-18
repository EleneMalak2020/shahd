<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('front.products', compact('products', 'categories'));
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);

        return view('front.single-product', compact('product'));
    }
}