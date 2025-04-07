<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Inline CSS for blue text, green buttons, and dark gray background */
        .profile-content {
            background-color: #333; /* Dark gray background */
            color: white; /* White text for better contrast */
            padding: 20px;
            border-radius: 10px;
        }

        .profile-content h3 {
            color: lightblue; /* Light blue text for headings */
        }

        .profile-content button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-content button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar bg-light">
            <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">
            <h2>Volunteer Tracker</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teacher.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaderboard') }}">Leaderboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Verify Service Hours</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('messaging') }}">Personal Messaging</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">View Feedback from Students</a>
                </li>
            </ul>
        </div>
        <div class="content p-4 profile-content">
            <x-app-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Profile') }}
                    </h2>
                </x-slot>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="bg-dark overflow-hidden shadow-xl sm:rounded-lg p-6">
                            <h3 class="text-lg font-medium">Name: {{ $user->name }}</h3>
                            <h3 class="text-lg font-medium">Email: {{ $user->email }}</h3>
                            <h3 class="text-lg font-medium">Role: {{ $user->role }}</h3>
                        </div>

                        <div class="p-4 sm:p-8 bg-dark shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                                <button type="button">Update Profile</button>
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-dark shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                                <button type="button">Update Password</button>
                            </div>
                        </div>

                        {{-- <div class="p-4 sm:p-8 bg-dark shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                                <button type="button">Delete Account</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </x-app-layout>
        </div>
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/js/footer.js"></script>
    <footer class="bg-light text-center py-3 mt-auto">
        <p>&copy; 2025 Volunteer Village. All rights reserved.</p>
    </footer>
</body>
</html>