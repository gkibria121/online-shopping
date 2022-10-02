@extends('layouts.app')
@section('content')

<div class="container">

    <form  class="my-3">
        @csrf
    @method('put')
    <div class="mb-3">
        <label for="text" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value='{{$order->name}}' readonly>
    </div>
    <div class="mb-3">
        <label for="due" class="form-label">Address</label>
        <input type="text" name="price" class="form-control" value='{{$order->address}}' readonly>
    </div>
    <div class="mb-3">
        <label for="due" class="form-label">City</label>
        <input type="text" name="price" class="form-control" value='{{$order->city}}' readonly>
    </div>
    <div class="mb-3">
        <label for="due" class="form-label">Phone Number</label>
        <input type="text" name="price" class="form-control" value='{{$order->phone}}' readonly>
    </div>
    <div  class="form-control" readonly>


      @foreach ($products as $id)
      {<br>
      Name = {{$product::find($id)->name}},<br>
      ID = {{$product::find($id)->id}},<br>
      Amount = {{$amounts[$loop->index]}},<br>
      Total = {{$product::find($id)->price*$amounts[$loop->index]}}<br>
      }
      <br>
      <br>
     @endforeach
    </div>
    <a href="/orders" class="btn btn-secondary">Go Back</a>
     <a href="/orders/history/add/{{$order->id}}" class="btn btn-primary">Deliverd</a>



</form>
</div>


@endsection
