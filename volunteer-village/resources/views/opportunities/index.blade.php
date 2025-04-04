<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Opportunities</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
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
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('leaderboard') }}">Leaderboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('opportunities.index') }}">View Opportunities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Verify Service Hours</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link">@livewire('messaging')</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="#">View Feedback from Students</a>
                </li>
            </ul>
        </div>
        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Available Volunteer Opportunities</h1>
                @if($opportunities->isEmpty())
                    <p>No opportunities available at the moment.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Max Students</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($opportunities as $opportunity)
                                <tr>
                                    <td>{{ $opportunity->Name }}</td>
                                    <td>{{ $opportunity->Date }}</td>
                                    <td>{{ $opportunity->Location }}</td>
                                    <td>{{ $opportunity->Max_students }}</td>
                                    <td>{{ $opportunity->Description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
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