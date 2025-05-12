@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(120deg, #7f53ac 0%, #657ced 50%, #f95794 100%);
        min-height: 100vh;
    }
</style>
<div class="min-h-screen flex items-center justify-center" style="background: linear-gradient(120deg, #7f53ac 0%, #657ced 50%, #f95794 100%);">
    <div class="w-full max-w-4xl bg-white bg-opacity-80 rounded-2xl shadow-2xl flex overflow-hidden">
        <!-- Left: Welcome -->
        <div class="w-1/2 p-10 flex flex-col justify-center items-start bg-gradient-to-br from-indigo-600 via-purple-500 to-pink-400 text-white">
            <h1 class="text-4xl font-bold mb-4 drop-shadow-lg">Welcome to Admin Portal</h1>
            <p class="mb-8 text-lg opacity-90">Sign in to manage Volunteer Village. Please use your admin credentials to access the dashboard and manage users, schools, and more.</p>
            <img src="{{ asset('images/Logo.png') }}" alt="Volunteer Village Logo" class="h-24 w-auto mt-auto opacity-90">
        </div>
        <!-- Right: Login Form -->
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">USER LOGIN</h2>
            <form class="space-y-6" method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <!-- Email -->
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-indigo-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12A4 4 0 1 1 8 12a4 4 0 0 1 8 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0 0H9m3 0h3"/></svg>
                    </span>
                    <input id="email" name="email" type="email" required placeholder="Email address"
                        class="pl-10 pr-4 py-3 w-full rounded-full border border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 text-gray-700 bg-white shadow-sm @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password -->
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-indigo-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z"/><path stroke-linecap="round" stroke-linejoin="round" d="M17 21v-2a4 4 0 0 0-8 0v2"/></svg>
                    </span>
                    <input id="password" name="password" type="password" required placeholder="Password"
                        class="pl-10 pr-4 py-3 w-full rounded-full border border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 text-gray-700 bg-white shadow-sm @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="rounded text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2 text-gray-700">Remember</span>
                    </label>
                    <a href="#" class="text-indigo-500 hover:underline">Forgot password?</a>
                </div>
                <!-- Error Messages -->
                @if($errors->any())
                    <div class="rounded-md bg-red-50 p-3">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-red-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            <span class="text-sm text-red-700">Authentication failed. Please check your credentials.</span>
                        </div>
                    </div>
                @endif
                <!-- Login Button -->
                <button type="submit">
                    LOGIN
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
