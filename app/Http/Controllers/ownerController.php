<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orders_history;

class ownerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'price' => 'integer',
        ]);
        $file = $request->file('image');
        $filenameWithExt= $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $path = $file->StoreAs('public/product/image/',$filenameToStore);
        $product_name = $request->input('name');
        $product_price = $request->input('price');
        $product = new Product;
        $product->name =  $product_name;
        $product->price =  $product_price;
        $product->image_url = $filenameToStore;
        $product->user_id =1;
        $product->save();
        return redirect('/product');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
       return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'price' => 'integer',
        ]);
        $file = $request->file('image');
        $filenameWithExt= $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = pathinfo($filenameWithExt, PATHINFO_EXTENSION);
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $path = $file->StoreAs('public/product/image/',$filenameToStore);
        $product_name = $request->input('name');
        $product_price = $request->input('price');
        $product = Product::find($id);
        $product->name =  $product_name;
        $product->price =  $product_price;
        $product->image_url = $filenameToStore;
        $product->user_id =1;
        $product->save();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }
    public function orders(){
        $orders = Order::all();
        return view('orders.orders',compact('orders'));
    }
    public function showOrders($id){
        $order = Order::find($id);
        $products =json_decode($order->products)  ;
        $amounts=json_decode($order->amounts) ;
        $product = Product::class;
        return view('orders.show',compact('order','products','amounts','product'));
    }
    public function makeHistory($id){
        $order = Order::find($id);
        $addOrder = $order->replicate();
        $addOrder->setTable('orders_histories');
        $addOrder->save();
        $order->delete();
        return redirect('/orders')->with('message','Successfully Delivered');

    }
    public function showHistory($id){
        $order = Orders_history::find($id);
        $products =json_decode($order->products)  ;
        $amounts=json_decode($order->amounts) ;
        $product = Product::class;
        return view('history.show',compact('order','products','amounts','product')); ;
    }
    public function history(){
        $orders = Orders_history::all();;
        return view('history.history',compact('orders'));
    }

}
