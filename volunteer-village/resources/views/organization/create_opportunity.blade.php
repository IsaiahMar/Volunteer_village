<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Volunteer Opportunity</title>
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
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.index') }}">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('opportunities.index') }}">View Opportunities</a>
                </li>
                @if(auth()->user()->role === 'organization' || auth()->user()->role === 'teacher' || auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('organization.createOpportunity') }}">Create Opportunities</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaderboard') }}">Leaderboard</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Verify Service Hours</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">View Feedback from Students</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('settings') }}">Settings</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-danger text-white w-100 mt-2" style="border: none; border-radius: 5px;">
                            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="container mt-5" style="margin-left: 270px;">
            <h1>Create Volunteer Opportunity</h1>
            <form action="{{ route('organization.storeOpportunity') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="Name" name="Name" required>
                </div>
                <div class="form-group">
                    <label for="Date">Date</label>
                    <input type="date" class="form-control" id="Date" name="Date" required>
                </div>
                <div class="form-group">
                    <label for="Location">Location</label>
                    <input type="text" class="form-control" id="Location" name="Location" required>
                </div>
                <div class="form-group">
                    <label for="Max_students">Max Students</label>
                    <input type="number" class="form-control" id="Max_students" name="Max_students" required>
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
