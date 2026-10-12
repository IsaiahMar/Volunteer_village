<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Volunteer Opportunities</title>
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
                    <a class="nav-link active" href="{{ route('organization.opportunities.index') }}">Your Opportunities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaderboard') }}">Leaderboard</a>
                </li>
            </ul>
        </div>
        <div class="container mt-5" style="margin-left: 270px;">
            <h1>Your Volunteer Opportunities</h1>
            <a href="{{ route('organization.createOpportunity') }}" class="btn btn-primary mb-3">Create New Opportunity</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Max Students</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($opportunities as $opportunity)
                        <tr>
                            <form action="{{ route('organization.opportunities.update', $opportunity->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>
                                    <input type="text" class="form-control" name="Name" value="{{ $opportunity->Name }}" required>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="Date" value="{{ $opportunity->Date }}" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="Location" value="{{ $opportunity->Location }}" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="Max_students" value="{{ $opportunity->Max_students }}" required>
                                </td>
                                <td>
                                    <textarea class="form-control" name="Description" rows="2">{{ $opportunity->Description }}</textarea>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                    <form action="{{ route('organization.opportunities.destroy', $opportunity->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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