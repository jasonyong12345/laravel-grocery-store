@extends('layouts.app')

@section('content')
    <h1>Edit Cart</h1>
    <form action="{{ route('carts.update', $cart->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="product_id">Product:</label>
            <select name="product_id" id="product_id" required>
                <option value="">Select a product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $cart->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="price">Quantity:</label>
            <input type="number" name="quantity" id="quantity" step="1" value="{{ $cart->quantity }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
