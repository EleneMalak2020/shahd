<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $admin = Auth::guard('admin')->user();

        return view('dashboard.categories', compact('categories', 'admin'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name_en  = $request->name_en;
        $category->name_ar  = $request->name_ar;

        $imageurl = $request->file('image');
        $imageurl->getClientOriginalName();
        $ext    = $imageurl->getClientOriginalExtension();
        $file   = date('YmdHis').rand(1,99999).'.'.$ext;
        $imageurl->storeAs('public/categories', $file);
        $category->image = $file;


        $category->save();

        return response()->json([
            'status'    => 'success',
            'msg'       => 'تم انشاء القسم بنجاح',
            'data'  =>  $category,
        ]);
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name_en  =   $request->name_en;
        $category->name_ar  =   $request->name_ar;

        if($request->hasFile('image')){
            File::delete('public/products/'.$category->image);
            Storage::disk('local')->delete('public/categories/'.$category->image);

            $imageurl = $request->file('image');
            $imageurl->getClientOriginalName();
            $ext    = $imageurl->getClientOriginalExtension();
            $file   = date('YmdHis').rand(1,99999).'.'.$ext;
            $imageurl->storeAs('public/categories', $file);
            $category->image = $file;
        }


        $category->save();

        return response()->json([
            'status'    => 'success',
            'msg'       => 'تم تعديل القسم بنجاح',
        ]);
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();

        return response()->json([
            'status'    => 'success',
            'msg'       => 'تم مسح القسم بنجاح',
        ]);
    }
}
