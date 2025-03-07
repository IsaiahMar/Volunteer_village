<link rel="stylesheet" href="{{ asset('CSS/app.css') }}">
<x-guest-layout>
    <div class="navbar">
        @if (Route::has('register'))
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

    <div class="flex items-center justify-center min-h-screen bg-blue-500">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input id="name" type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input id="email" type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input id="password" type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700">Role</label>
                    <select id="role" name="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="organization">Organization</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" class="mr-2">
                    <label for="terms" class="text-gray-700 text-sm">I accept all terms & conditions</label>
                </div>
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Register Now</button>
                </div>
                <div class="mt-4 text-center">
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login now</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
