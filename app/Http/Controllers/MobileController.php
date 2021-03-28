<?php

namespace App\Http\Controllers;

use App\Aria;
use App\Category;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class MobileController extends Controller
{
    use GeneralTrait;

    public function get_categories()
    {
        $categories = Category::where('id', '!=', 1)->get();

        if(!$categories){
            return $this->returnError('001', 'لا يوجد اقسام حاليًا');
        }
        return $this->returnData('categories', $categories);
    }


    public function get_products()
    {
        $products = Product::all();

        if(!$products){
            return $this->returnError('001', 'لا يوجد منتجات حاليًا');
        }
        return $this->returnData('products', $products);
    }

    public function get_category_products($category_id)
    {
        $products = Product::where('category_id', $category_id)->get();

        if(!$products){
            return $this->returnError('001', 'لا يوجد منتجات حاليًا لهذا القسم');
        }
        return $this->returnData('products', $products);
    }

    public function get_product($product_id)
    {
        $product = Product::find($product_id);

        if(!$product){
            return $this->returnError('001', 'هذا القسم غير موجود');
        }
        return $this->returnData('product', $product);
    }

    public function get_areas()
    {
        $areas = Aria::all();
        if(!$areas){
            return $this->returnError('001', 'لا يوجد مناطق مسجلة حاليًا');
        }
        return $this->returnData('areas', $areas);
    }

    // public function store_order(Request $request)
    // {
    //     $aria = Aria::find($request->aria);

    //     $order = new Order();
    //     $order->user_id = Auth::id();
    //     $order->name = $request->name;
    //     $order->aria = $aria->name_ar;
    //     $order->address = $request->address;
    //     $order->phone = $request->phone;
    //     $order->price = \Cart::session(Session::getId())->getTotal();
    //     $order->delivery_cost = $aria->delivery_cost;
    //     $order->total = (\Cart::session(Session::getId())->getTotal() + $aria->delivery_cost);
    //     $order->save();

    //     foreach(\Cart::session(Session::getId())->getContent() as $product){
    //         $order->products()->attach($product->id, ['quantity' => $product->quantity]);

    //         $table = Product::find($product->id);
    //         $table->increment('order_count', $product->quantity);
    //     }



    //     \Cart::session(Session::getId())->clear();

    //     //Notification
    //     $admin = Admin::get();
    //     Notification::send($admin, new NewOrder($order));

    //     return response()->json($order);
    // }

    public function get_order_list($user_id)
    {
        $order = Order::where('user_id', $user_id)->get();

        if(!$order){
            return $this->returnError('001', 'هذا الطلب غير موجود');
        }
        return $this->returnData('order', $order);
    }





}
