<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Volunteer VIllage</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('CSS/app.css') }}">


    </head>
    <body>
        <div class="navbar">
            @if (Route::has('login'))
                <div class="navbar_items">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="word">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="word">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="word">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="container">
        <!-- Login Form -->
        <div class="form-box">
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label>Email</label>
                <input type="email" name="email" required>
                
                <label>Password</label>
                <input type="password" name="password" required>
                
                <button type="submit">Login</button>
            </form>
        </div>

        <!-- Register Form -->
        <div class="form-box">
            <h2>Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label>Name</label>
                <input type="text" name="name" required>
                
                <label>Email</label>
                <input type="email" name="email" required>
                
                <label>Password</label>
                <input type="password" name="password" required>
                
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required>
                
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
                        
        

    </body>
</html>
