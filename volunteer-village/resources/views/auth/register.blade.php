<x-guest-layout>
    <!-- Centered Logo -->
    <div class="flex justify-center mt-6">
        <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="w-32 h-32">
    </div>

    <!-- Gradient Background and Registration Form -->
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
        <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-xl">
            <h2 class="text-2xl font-bold text-center mb-8 text-gray-800 uppercase">Register</h2>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- First and Last Name -->
                <div class="flex gap-4 mb-4">
                    <div class="w-1/2">
                        <label for="first_name" class="block text-gray-700 mb-1">First Name</label>
                        <input id="first_name" type="text" name="first_name" placeholder="First Name"
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                               required autofocus>
                    </div>
                    <div class="w-1/2">
                        <label for="last_name" class="block text-gray-700 mb-1">Last Name</label>
                        <input id="last_name" type="text" name="last_name" placeholder="Last Name"
                               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                               required>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-1">Email</label>
                    <input id="email" type="email" name="email" placeholder="example@email.com"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                           required>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 mb-1">Password</label>
                    <input id="password" type="password" name="password" placeholder="••••••••"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                           required>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 mb-1">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                           required>
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 mb-1">Role</label>
                    <select id="role" name="role"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                            required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="organization">Organization</option>
                    </select>
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 mb-1">Phone Number</label>
                    <input id="phone" type="text" name="phone" placeholder="123-456-7890"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                           required>
                </div>

                <!-- Date of Birth -->
                <div class="mb-4">
                    <label for="dateOfBirth" class="block text-gray-700 mb-1">Date of Birth</label>
                    <input id="dateOfBirth" type="date" name="dateOfBirth"
                           class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-400"
                           required>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="terms" name="terms" class="mr-2">
                    <label for="terms" class="text-gray-700 text-sm">I accept all terms & conditions</label>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                            class="w-full bg-pink-500 hover:bg-pink-600 text-black font-semibold py-2 rounded-lg transition shadow-lg">
                        Register Now
                    </button>
                </div>

                <!-- Login Link -->
                <div class="mt-4 text-center">
                    <a href="{{ route('login') }}" class="text-pink-500 hover:underline">Login now</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
