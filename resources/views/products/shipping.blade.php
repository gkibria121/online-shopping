@extends('layouts.app')
@section('content')

<div class="container">
    <div class="summary" >
        <div class="container border">

            <h3> Order Summary</h3>
            You have {{$totalItems}} items in your list.
            <table class="table">
                @foreach ($products as $product)

                    <tr>
                        <td>{{$amounts[$loop->index]}} x {{$product->name}}</td>
                        <td>{{$amounts[$loop->index]*($product->price)}} taka</td>

                    </tr>
                @endforeach
                <tr><td><b>Total</b></td><td><b>{{$totalCost}} Taka</b></td></tr>
            </table>
        </div>
    </div>
    <div class="shipping" style="width: 50%">
        <form action="/confirm" method="POST" class="my-3">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="text" class="form-label">Name *</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="due" class="form-label">Address</label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label for="due" class="form-label">City</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="mb-3">
                <label for="due" class="form-label">Phone Number *</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>





@endsection
