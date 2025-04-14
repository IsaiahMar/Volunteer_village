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
            display: flex; /* Add flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
        }
        .container {
            text-align: center; /* Ensure text remains centered */
        }
        .logo {
            margin: 0 auto 20px; /* Adjust margin for centering */
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
                    {{-- <a href="{{ url('/dashboard') }}" class="word">Dashboard</a> --}}
                @endauth
            </div>
        @endif
    </div>

    <!-- Centered Logo and Welcome Message -->
    <div class="container">
        <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">
        <h1 class="header">Welcome to Volunteer Village</h1>
        
        <!-- Buttons -->
        <div class="btn-container">
            <a href="{{ route('login') }}" class="btn">Log In</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        </div>
    </div>
</body>
</html>
