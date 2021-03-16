<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class DCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('dashboard.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name_en  = $request->name_en;
        $category->name_ar  = $request->name_ar;
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
