<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Volunteer Village</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: grey;
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .logo {
            margin: 50px auto 20px;
            display: block;
            width: 150px;
        }
        .header {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .btn-container {
            margin-top: 20px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            margin: 10px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
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

    <!-- Centered Logo and Welcome Message -->
    <div class="container">
        <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">
        <h1 class="header">Welcome to Volunteer Village</h1>
        
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

        <div class="form-box" id="registerForm" style="display: none;">
            <h2>Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label>First Name</label>
                <input type="text" name="first_name" required>

                <label>Last Name</label>
                <input type="text" name="last_name" required>
                
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