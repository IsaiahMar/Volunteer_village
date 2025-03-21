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
            background-color: blue;
        }
        .hero {
            background: url('{{ asset('images/hero-bg.jpg') }}') no-repeat center center/cover;
            text-align: center;
            color: white;
            padding: 80px 20px;
        }
        .hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }
        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .features {
            display: flex;
            justify-content: space-around;
            text-align: center;
            padding: 50px 20px;
        }
        .feature-box {
            width: 30%;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .feature-box img {
            width: 50px;
            margin-bottom: 10px;
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

    <!-- Authentication Forms -->
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

        <button id="toggleRegisterForm">New here? Click to register</button>

        <div class="form-box" id="registerForm" style="display: none;">
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
    @dd('Welcome page is loading');
    <!-- Script for Toggle Register Form -->
    <script>
        document.getElementById('toggleRegisterForm').addEventListener('click', function() {
            var registerForm = document.getElementById('registerForm');
            registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>
</html>




