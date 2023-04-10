@extends('layouts.app')

@section('content')
    <h1>Carts</h1>
    <a href="{{ route('carts.create') }}">Add new Cart</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart->id }}</td>
                    <td>{{ optional($cart->product)->name }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>
                        <a href="{{ route('carts.edit', $cart->id) }}">Edit</a>
                        <form action="{{ route('carts.destroy', $cart->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <body>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
    </body>
@endsection
