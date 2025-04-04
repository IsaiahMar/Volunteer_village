<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Home</title>
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                    <a class="nav-link" href="{{ route('opportunities.index') }}">View Opportunities</a>
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
        <div class="content p-4">
            <h1>Welcome, Teacher</h1>

            <h2>Pending Verifications</h2>
            <ul>
                @foreach($verifications as $verification)
                    <li>
                        Verification ID: {{ $verification->Verification_id }},
                        Student ID: {{ $verification->Student_ID }},
                        Hours ID: {{ $verification->Hours_ID }},
                        Status: {{ $verification->Status }}
                    </li>
                @endforeach
            </ul>

            <h3>Your students hours</h3>

        </div>

    
    
    </div>
    <footer class="bg-light text-center py-3 mt-auto">
        <p>&copy; 2025 Volunteer Village. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/js/footer.js"></script>
</body>
</html>