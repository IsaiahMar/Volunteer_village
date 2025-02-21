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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('teacher.home') }}">Volunteer Tracker</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">My Hours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Students</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item disabled" href="#">Profile</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item disabled" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
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

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>