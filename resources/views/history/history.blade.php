@extends('layouts.app')
@section('content')
<div class="container my-3">
   <h1>History</h1>
   <table class="table">
    <tr>
        <th>Name</th>
        <th>Date</th>
        <th></th>
    </tr>
   @foreach ($orders as $order)
           <tr>
            <td>{{$order->name}}</td>
            <td>{{$order->created_at->format('d-m-Y')}}</td>
            <td><a href="/orders/history/{{$order->id}}" class="nav-link" style="color: rgba(42, 42, 206, 0.89)">View</a></td>
        </tr>
    @endforeach
    </table>
        </div>
@endsection
