
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Volunteer Village</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('CSS/login.css') }}">
    </head>
    <body>
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

        <script>
            document.getElementById('toggleRegisterForm').addEventListener('click', function() {
                var registerForm = document.getElementById('registerForm');
                if (registerForm.style.display === 'none') {
                    registerForm.style.display = 'block';
                } else {
                    registerForm.style.display = 'none';
                }
            });
        </script>
    </body>
</html>



