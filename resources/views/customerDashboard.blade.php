@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h1>Welcome to your dashboard, {{ Auth::user()->name }}!</h1>

                    <nav>
                        <ul>
                        <li><a href="{{ route('carts.index') }}">Carts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
