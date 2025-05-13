<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Hours - Volunteer Village</title>
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
            <h1>Submit Volunteer Hours</h1>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('student.submit.hours.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="opportunity">Select Opportunity</label>
                            <select class="form-control" id="opportunity" name="opportunity_id" required>
                                <option value="">Choose an opportunity</option>
                                @foreach($opportunities as $opportunity)
                                    <option value="{{ $opportunity->id }}">{{ $opportunity->Name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hours">Hours Completed</label>
                            <input type="number" class="form-control" id="hours" name="hours" min="0.5" step="0.5" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Date of Service</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Describe what you did during your volunteer service..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="picture">Upload Picture</label>
                            <input type="file" class="form-control-file" id="picture" name="picture" accept="image/*">
                            <small class="form-text text-muted">Upload a picture of your volunteer work (max 5MB)</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Hours</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>