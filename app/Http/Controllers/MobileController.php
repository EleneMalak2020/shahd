<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function get_category()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

}
