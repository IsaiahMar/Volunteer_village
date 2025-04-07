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
        <div class="bg-white p-8 rounded-lg shadow-md w-[500px]"> <!-- Increased width -->
            <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
            
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700">First Name</label>
                    <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700">Last Name</label>
                    <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
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
                        <option value="">Select Role</option>
                        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Phone Number</label>
                    <input id="phone" type="text" name="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <div class="mb-4">
                    <label for="dateOfBirth" class="block text-gray-700">Date of Birth</label>
                    <input id="dateOfBirth" type="date" name="dateOfBirth" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" class="mr-2">
                    <label for="terms" class="text-gray-700 text-sm">I accept all terms & conditions</label>
                </div>
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-black py-2 rounded-lg hover:bg-blue-600">Register Now</button> <!-- Submit button -->
                </div>
                <div class="mt-4 text-center">
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Already registered? Login now</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>