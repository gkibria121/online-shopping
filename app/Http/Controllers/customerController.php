<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;

use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index(Request $request){
    // return $request;
    if ($request->input('items')==NUll){
      $products =  Product::all();
      return view('home', compact('products'));
    }
    else{
        return $request;
    }


    }
    public function shoppingCart(Request $request){
        $products = [];
        $amounts = [];
        $totalItems = 0;
        $totalCost = 0;
        foreach ($request->input() as $key => $value) {
           if ($key == '_token'){
            #nothing
           }
           else {
            $product = Product::find($key);
             array_push($products, $product);
             array_push($amounts,$value);
             $totalCost += $product->price*$value;
             $totalItems += $value;
           }

        }
        return view('products.shopping-cart',compact('products','amounts','totalItems','totalCost'));

    }
    public function shipping(Request $request){

        $products = [];
        $product_ids = [];
        $amounts = [];
        $totalItems = 0;
        $totalCost = 0;
        foreach ($request->input() as $key => $value) {
           if ($key == '_token' || $key=='_method'){
            #nothing
           }
           else {
            $product = Product::find($key);
             array_push($product_ids, $key);
             array_push($products, $product);
             array_push($amounts,$value);
             $totalCost += $product->price*$value;
             $totalItems += $value;
           }
        }
        $request->session()->put('products',$product_ids);
        $request->session()->put('amounts',$amounts);
        $request->session()->put('totalItems',$totalItems);
        $request->session()->put('totalCost',$totalCost);
        return view('products.shipping',compact('products','amounts','totalItems','totalCost'));
    }
    public function confirm(Request $request){
        $order = new Order;
        $order->name =$request->input('name') ;
        $order->address =$request->input('address') ;
        $order->city = $request->input('city');
        $order->phone = $request->input('phone');
        $order->products = json_encode($request->session()->get('products')) ;
        $order->amounts = json_encode($request->session()->get('amounts')) ;
        $order->save();
        return view('products.confirm');;
    }
}
