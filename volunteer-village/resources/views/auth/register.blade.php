<x-guest-layout>
    <style>
        @keyframes pulse-soft {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }

        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .pulse-hover:hover {
            animation: pulse-soft 1s ease-in-out infinite;
        }

        .animate-load {
            animation: fade-in 0.8s ease-out forwards;
        }
    </style>

    <!-- Page Background and Centering -->
    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 px-4">

        <!-- App Logo -->
        <div class="mb-6">
            <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="w-28 h-28 object-contain">
        </div>

        <!-- Registration Card -->
        <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-2xl animate-load border border-gray-200">
            <h2 class="text-3xl font-bold text-center mb-6 text-gray-800 uppercase tracking-wide">Create an Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- First and Last Name -->
                <div class="flex gap-4 mb-4">
                    <div class="w-1/2">
                        <label for="first_name" class="block text-gray-700 font-medium mb-1">First Name</label>
                        <input id="first_name" name="first_name" type="text" required autofocus placeholder="First Name"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" />
                    </div>

                    <div class="w-1/2">
                        <label for="last_name" class="block text-gray-700 font-medium mb-1">Last Name</label>
                        <input id="last_name" name="last_name" type="text" required placeholder="Last Name"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" />
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
                    <input id="email" name="email" type="email" required placeholder="you@example.com"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" />
                </div>

                <!-- Password and Confirm -->
                <div class="flex gap-4 mb-4">
                    <div class="w-1/2">
                        <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                        <input id="password" name="password" type="password" required placeholder="••••••••"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" />
                    </div>

                    <div class="w-1/2">
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="••••••••"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" />
                    </div>
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 font-medium mb-1">Role</label>
                    <select id="role" name="role" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="">Select Role</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="organization">Organization</option>
                    </select>
                </div>

                <!-- Phone & DOB -->
                <div class="flex gap-4 mb-4">
                    <div class="w-1/2">
                        <label for="phone" class="block text-gray-700 font-medium mb-1">Phone</label>
                        <input id="phone" name="phone" type="text" required placeholder="123-456-7890"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" />
                    </div>

                    <div class="w-1/2">
                        <label for="dateOfBirth" class="block text-gray-700 font-medium mb-1">Date of Birth</label>
                        <input id="dateOfBirth" name="dateOfBirth" type="date" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" />
                    </div>
                </div>

                <!-- Terms -->
                <div class="flex items-center mb-4">
                    <input id="terms" name="terms" type="checkbox" class="mr-2">
                    <label for="terms" class="text-sm text-gray-600">I agree to the terms & conditions</label>
                </div>

                <!-- Submit -->
                <div class="mt-6">
                    <button type="submit"
                        style="background-color: #2563eb; color: white;"
                        class="w-full py-2 rounded-lg font-semibold shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 pulse-hover">
                        Register Now
                    </button>
                </div>

                <!-- Login link -->
                <div class="mt-4 text-center">
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline text-sm">
                        Already have an account? Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
