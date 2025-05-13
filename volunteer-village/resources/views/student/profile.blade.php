<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile - Volunteer Village</title>
    <link rel="stylesheet" href="{{ asset('css/StudentHome.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">
            <h2>Volunteer Tracker</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.submit.hours') }}">Submit Service Hours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.your.hours') }}">Your Hours/Awards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.messaging') }}">Personal Messaging</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('opportunities.index') }}">Opportunity Board</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('student.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h1>Student Profile</h1>
            
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                <h3>{{ $student->first_name }} {{ $student->last_name }}</h3>
                                <p class="text-muted">{{ $student->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4>Personal Information</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Phone:</strong> {{ $student->phone ?? 'Not provided' }}</p>
                                    <p><strong>Date of Birth:</strong> {{ $student->date_of_birth ? $student->date_of_birth->format('m/d/Y') : 'Not provided' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Student ID:</strong> {{ $student->student_id ?? 'Not provided' }}</p>
                                    <p><strong>Role:</strong> {{ ucfirst($student->role) }}</p>
                                </div>
                            </div>
                            
                            <h4 class="mt-4">Account Information</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Email Verified:</strong> 
                                        @if($student->email_verified_at)
                                            <span class="text-success">Yes</span>
                                        @else
                                            <span class="text-danger">No</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Account Created:</strong> {{ $student->created_at->format('m/d/Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-auto">
        <p>&copy; 2025 Volunteer Village. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 