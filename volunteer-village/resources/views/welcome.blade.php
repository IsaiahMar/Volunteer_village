<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Volunteer Village</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #444;
            color: white;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
        }

        .logo {
            width: 200px; /* Make it larger */
            height: auto;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            margin: 10px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">

        <h1>Welcome to Volunteer Village</h1>

        <div>
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
            <a href="{{ route('admin.login') }}" class="btn">Admin Login</a>

        </div>
    </div>
</body>

</html>
