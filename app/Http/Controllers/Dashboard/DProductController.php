<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('dashboard.products', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->category_id   = $request->category_id;
        $product->name_en       = $request->name_en;
        $product->name_ar       = $request->name_ar;
        $product->price          = $request->price;

        $imageurl = $request->file('image');
        $imageurl->getClientOriginalName();
        $ext    = $imageurl->getClientOriginalExtension();
        $file   = date('YmdHis').rand(1,99999).'.'.$ext;
        $imageurl->storeAs('public/products', $file);
        $product->image = $file;

        $product->save();

        toastr()->success('تم اضافة المنتج بنجاح');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name_en       = $request->name_en;
        $product->name_ar       = $request->name_ar;
        $product->price          = $request->price;

        if($request->hasFile('image')){
            File::delete('public/products/'.$product->image);
            Storage::disk('local')->delete('public/products/'.$product->image);

            $imageurl = $request->file('image');
            $imageurl->getClientOriginalName();
            $ext    = $imageurl->getClientOriginalExtension();
            $file   = date('YmdHis').rand(1,99999).'.'.$ext;
            $imageurl->storeAs('public/products', $file);
            $product->image = $file;
        }
        $product->save();

        return response()->json([
            'status'    => 'success',
            'msg'       => 'تم تعديل المنتج بنجاح'
        ]);
    }

    public function delete(Request $request, $id)
    {
        $product = Product::find($id);

        File::delete('public/products/'.$product->image);
        Storage::disk('local')->delete('public/products/'.$product->image);
        $product->delete();

        return redirect()->back();
    }
}
