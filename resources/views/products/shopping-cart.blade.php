@extends('layouts.app')
@section('content')
    <div class='container my-3'>
        <h2> Shopping Cart</h2>
        <div class="cart-box py-4 my-2">
            <div class=" px-3">

                You have <span id="total-items" data-total-items='{{ $totalItems }}'>{{ $totalItems }} </span> items in
                your shopping cart
                <button class="btn btn-secondary btn-sm mx-2" style="float: right" id="clear-cart" onclick="clearCart()"> Cleart
                    Shopping Cart</button>
            </div>
            <hr>
            <form action="/shipping" id="sumitItemToCheckOut" method="post">
                @csrf
                @method('post')
            <table class="table" id="table">

                <thead>
                    <th></th>
                    <th>Product</th>
                    <th style="padding-left: 50px">Quantity</th>
                    <th>Price</th>
                    <th>Cost</th>
                </thead>
                <tbody>

                    @for ($i = 0; $i < count($products); $i++)
                    <tr id="item-in-the-cart-{{ $products[$i]->id }}">
                        <input type="hidden" name="{{ $products[$i]->id }}" class="check-out-items" id="item-id-{{ $products[$i]->id }}" value="" data=''>
                        <td class="cart-image-container"><img src="storage/product/image/{{ $products[$i]->image_url }}" alt="" class="cart-image"></td>
                        <td class="py-3"> <b>{{ $products[$i]->name }}</b></td>
                        <td>
                                <div class="text-center py-3" id="hidden-cart-box-{{ $products[$i]->id }}"
                                    style="display: block;float:left;">
                                    <div class="btn btn-secondary btn-sm" onclick="addLessItem({{ $products[$i]->id }})">-
                                    </div>
                                    <div class="btn btn-secondary btn-sm px-5" id="total-item-{{ $products[$i]->id }}"
                                        data-total-item={{ $amounts[$i] }}>{{ $amounts[$i] }}</div>
                                    <div class="btn btn-secondary btn-sm" onclick="addMoreItem({{ $products[$i]->id }})">+
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">{{ $products[$i]->price }} Taka</td>
                            <td class="py-3"> <span id="total-cost-for-item-{{ $products[$i]->id }}"
                                    data-price="{{ $products[$i]->price }}">{{ $products[$i]->price * $amounts[$i] }}</span> Taka</td>
                        </tr>
                    @endfor

                    <tr>
                        <td></td>
                        <td><b> Total Cost</b></td>
                        <td></td>
                        <td></td>
                        <td> <b><span id="total-cost" data-total-cost={{ $totalCost }}>{{ $totalCost }}</span>.00 Taka</b></td>
                    </tr>
                </tbody>
            </table>
            <div class='btn btn-primary mx-4 ' id="item-submit" onclick="sumitItem()">Check Out</div>
        </form>

        </div>
    </div>
    <script>
        function clearCart() {
            document.getElementById('table').innerHTML = '';
            try {
                document.getElementById('total-items').innerHTML = 0;
            } catch {}
            document.getElementById('count-cart').innerHTML = 0;
        }
        function sumitItem(){


           var inputList =document.getElementsByClassName('check-out-items');
        console.log(inputList);
        for (let index = 0; index < inputList.length; index++) {
            const element = inputList[index];
            console.log(element.id)
            let amount=  document.getElementById('total-item-'+element.name).getAttribute('data-total-item');
            element.value = amount;
            console.log(element.name);
            console.log();
            document.getElementById('sumitItemToCheckOut').submit();

    }}



        </script>
@endsection
