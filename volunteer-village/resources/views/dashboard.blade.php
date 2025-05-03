<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <!-- Toggle button always visible -->
    <button class="toggle-btn" id="toggleSidebar">
        <i class="fas fa-bars"></i>
    </button>

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">
            <h2>Volunteer Tracker</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.show') }}">
                        <i class="fas fa-user"></i> <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.index') }}">
                        <i class="fas fa-envelope"></i> <span>Messages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('opportunities.index') }}">
                        <i class="fas fa-search"></i> <span>View Opportunities</span>
                    </a>
                </li>
                @if(auth()->user()->role === 'organization' || auth()->user()->role === 'teacher' || auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('organization.createOpportunity') }}">
                            <i class="fas fa-plus"></i> <span>Create Opportunities</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaderboard') }}">
                        <i class="fas fa-trophy"></i> <span>Leaderboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link btn btn-danger text-white w-100 mt-2" style="border: none; border-radius: 5px;">
                            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content" id="mainContent">
            <h1>Welcome to Your Dashboard</h1>
            <p>{{ __("You're logged in!") }}</p>

            <h2>Quick Links</h2>
            <ul>
                <li><a href="{{ route('profile.show') }}">Edit Your Profile</a></li>
                <li><a href="{{ route('opportunities.index') }}">Browse Volunteer Opportunities</a></li>
                <li><a href="{{ route('leaderboard') }}">View Leaderboard</a></li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3" id="mainFooter">
        <p>&copy; 2025 Volunteer Village. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('mainContent');
        const footer = document.getElementById('mainFooter');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('shifted');
            footer.classList.toggle('shifted');
        });
    </script>
</body>
</html>
