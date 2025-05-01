@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Admin Login</h3>
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login as Admin</button>
            </form>
            
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-decoration-none">Back to Regular Login</a>
            </div>
        </div>
    </div>
@endsection
