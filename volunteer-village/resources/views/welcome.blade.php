
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Volunteer Village</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
    
    <div class="hero">
        <h1>Welcome to Volunteer Village</h1>
        <p>Connecting volunteers with opportunities to make a difference.</p>
        <a href="{{ route('register') }}" class="btn-primary">Get Started</a>
    </div>
    
    <div class="features">
        <div class="feature-box">
            <img src="{{ asset('images/icon1.png') }}" alt="Icon">
            <h3>Course Management</h3>
            <p>Organize and manage volunteer training programs easily.</p>
        </div>
        <div class="feature-box">
            <img src="{{ asset('images/icon2.png') }}" alt="Icon">
            <h3>Communication Hub</h3>
            <p>Stay connected with volunteers and organizations.</p>
        </div>
        <div class="feature-box">
            <img src="{{ asset('images/icon3.png') }}" alt="Icon">
            <h3>Engagement Platform</h3>
            <p>Find and participate in meaningful volunteer work.</p>
        </div>
    </div>
</body>
</html>
