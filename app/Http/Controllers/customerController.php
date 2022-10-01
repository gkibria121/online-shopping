<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class customerController extends Controller
{
    function index(){
      $products =  Product::all();
      return view('home', compact('products'));

    }
    function shoppingCart(Request $request){
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


        return view('shopping-cart',compact('products','amounts','totalItems','totalCost'));
        // $amount = 0;
        // $products = Product::all();
        // return view('shopping-cart',compact('amount','products'));

    }
}
