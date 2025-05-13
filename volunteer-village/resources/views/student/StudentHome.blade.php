<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home - Volunteer Village</title>
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-light" id="sidebar">
            <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">
            <h2>Volunteer Tracker</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.home') }}"><i class="fas fa-home"></i> <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.profile') }}"><i class="fas fa-user"></i> <span>Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.submit.hours') }}"><i class="fas fa-clock"></i> <span>Submit Hours</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.your.hours') }}"><i class="fas fa-award"></i> <span>Your Hours</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('opportunities.index') }}"><i class="fas fa-search"></i> <span>Opportunities</span></a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('student.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-danger text-white w-100 mt-2" style="border: none; border-radius: 5px;">
                            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content p-4">
            <h1>Student Home</h1>
            
            <!-- Hour Counter -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2>Total Hours This Month</h2>
                    <p class="display-4">{{ $verifiedHours->sum('hours') }} Hours</p>
                </div>
            </div>

            <h2>Impact Stream</h2>
            <div class="row">
                <!-- Hardcoded Post -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Helping with youth baseball coaching!</h3>
                            <img src="{{ asset('storage/pictures/volunteer.jpeg') }}" alt="Volunteer Coaching!" class="img-fluid">
                        </div>
                    </div>
                </div>

                @foreach($verifiedHours as $hour)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h3>{{ $hour->opportunity->Name ?? 'Volunteer Service' }}</h3>
                                <p><strong>Hours:</strong> {{ $hour->hours }}</p>
                                <p><strong>Date:</strong> {{ $hour->date }}</p>
                                @if($hour->description)
                                    <p><strong>Description:</strong> {{ $hour->description }}</p>
                                @endif
                                @if($hour->picture)
                                    <img src="{{ asset('storage/' . $hour->picture) }}" alt="Volunteer Service Picture" class="img-fluid mt-3">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
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
    <script src="{{ asset('js/footer.js') }}"></script>
</body>
</html>
