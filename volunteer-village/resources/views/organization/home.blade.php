<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Home</title>
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
                    <a class="nav-link" href="{{ route('organization.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('organization.createOpportunity') }}">Create Opportunities</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-link btn btn-link" type="submit">Logout</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Verify Service Hours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Student Hours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Personal Messaging</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Feedback from Students</a>
                </li>
            </ul>
        </div>
        <div class="content p-4">
            <h1>Welcome, Organization</h1>

            <h2>Pending Verifications</h2>
            {{-- <ul>
                @foreach($verifications as $verification)
                    <li>
                        Verification ID: {{ $verification->Verification_id }},
                        Student ID: {{ $verification->Student_ID }},
                        Hours ID: {{ $verification->Hours_ID }},
                        Status: {{ $verification->Status }}
                    </li>
                @endforeach
            </ul>

            <h2>Volunteer Hours Logged</h2>
            <ul>
                @foreach($hoursLogged as $hours)
                    <li>
                        Hours ID: {{ $hours->Hours_ID }},
                        Hours Logged: {{ $hours->Hours_Logged }},
                        Date Logged: {{ $hours->Date_logged }},
                        Verified: {{ $hours->Verified ? 'Yes' : 'No' }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div> --}}

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>