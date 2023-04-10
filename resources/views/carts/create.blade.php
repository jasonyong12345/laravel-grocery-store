@extends('layouts.app')

@section('content')
    <h1>Create Cart</h1>
    <form action="{{ route('carts.store') }}" method="POST">
        @csrf
        <div>
            <label for="product_id">Product Name:</label>
            <select name="product_id" id="product_id" required>
                <option value="">Select a Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" step="1" required>
        </div>
       
        <button type="submit">Create</button>
    </form>
@endsection
