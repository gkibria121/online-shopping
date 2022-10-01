@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-3">Add Product</h1>
        <form action="/product" method="POST" enctype="multipart/form-data" class="my-3">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="text" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="due" class="form-label">Price</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="mb-3">
                <input type="file" name="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
