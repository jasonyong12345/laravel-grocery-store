<!DOCTYPE html>
<html>
    <head>
        <title>My Grocery Store</title>
    </head>
    <body>
        <h1>Welcome to My Grocery Store</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Use Laravel's built-in authentication views and routes -->
        <br>
        <div>
        <a href="{{ route('user.login') }}">User Login</a>
        <a href="{{ route('user.register') }}">User Registration</a>
        </div>
        <div>
        <a href="{{ route('customer.login') }}">Customer Login</a>
       
       <a href="{{ route('customer.register') }}">Customer Registration</a>
        </div>
    </body>
</html>
