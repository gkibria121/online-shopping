@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-3 col-md-3 my-5 category">
                <table class="table table-hover">
                    <tr class="trow">
                        <td>All Categories</td>
                    </tr>
                    <tr class="trow">
                        <td>Bread</td>
                    </tr>
                    <tr class="trow">
                        <td>Dairy</td>
                    </tr>
                    <tr class="trow">
                        <td>Fruits</td>
                    </tr>
                    <tr class="trow">
                        <td>Spices</td>
                    </tr>
                    <tr class="trow">
                        <td>vegetables</td>
                    </tr>

                </table>
            </div>


            @foreach ($products as $product)
                <div class="card col-8" style="width: 18rem;">
                    <img src="storage/product/image/{{$product->image_url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                       <p class="card-text">{{$product->price}}  Taka</p>
                       <div class="btn btn-primary" data-productId="{{$product->id}}" id="item-{{$product->id}}" onclick="addItem({{$product->id}})">Add to cart</div>
                       <div class="text-center" id="hidden-cart-box-{{$product->id}}" style="display: none">
                        <div class="btn btn-secondary btn-sm" onclick="addLessItem({{$product->id}})">-</div>
                        <div class="btn btn-secondary btn-sm px-5" id="total-item-{{$product->id}}" data-total-item=1 >Add</div>
                        <div class="btn btn-secondary btn-sm" onclick="addMoreItem({{$product->id}})">+</div>
                       </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
