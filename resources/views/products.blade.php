@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <a class="btn btn-primary" href="/product/create">New Product</a>
        <input type="text" class="form-control my-3" placeholder="Search..." id="btn-search">
        <table class="table table-border">
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} Taka</td>
                        <td>
                            <form action="/product/{{$product->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/product/{{$product->id}}/edit" class="btn btn-primary mx-2">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                        </td>


                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
