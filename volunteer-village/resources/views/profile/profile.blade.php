<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
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
                    <a class="nav-link" href="{{ route('dashboard') }}" data-toggle="tooltip" title="Dashboard">
                        <i class="fas fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.show') }}" data-toggle="tooltip" title="Profile">
                        <i class="fas fa-user"></i> <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.index') }}" data-toggle="tooltip" title="Messages">
                        <i class="fas fa-envelope"></i> <span>Messages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('opportunities.index') }}" data-toggle="tooltip" title="Opportunities">
                        <i class="fas fa-search"></i> <span>Opportunities</span>
                    </a>
                </li>
                @if(auth()->user()->role === 'organization' || auth()->user()->role === 'teacher' || auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('organization.createOpportunity') }}" data-toggle="tooltip" title="Create Opportunities">
                            <i class="fas fa-plus"></i> <span>Create</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaderboard') }}" data-toggle="tooltip" title="Leaderboard">
                        <i class="fas fa-trophy"></i> <span>Leaderboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content profile-content" id="mainContent">
            <h3>Name: {{ $user->first_name }} {{ $user->last_name }}</h3>
            <h3>Email: {{ $user->email }}</h3>
            <h3>Role: {{ $user->role }}</h3>

            <div class="mt-4 p-4 bg-dark shadow rounded">
                @include('profile.partials.update-profile-information-form')
                <button type="button" class="update-btn" style="display: none;">Update Profile</button>
            </div>

            <div class="mt-4 p-4 bg-dark shadow rounded">
                @include('profile.partials.update-password-form')
                <button type="button" class="update-btn" style="display: none;">Update Password</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3" id="mainFooter">
        <p>&copy; 2025 Volunteer Village. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('mainContent');
        const footer = document.getElementById('mainFooter');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('shifted');
            footer.classList.toggle('shifted');
        });

        // Auto-show buttons when user changes a field
        document.querySelectorAll('form input, form select, form textarea').forEach(input => {
            input.addEventListener('input', () => {
                const button = input.closest('form').nextElementSibling;
                if (button && button.classList.contains('update-btn')) {
                    button.style.display = 'inline-block';
                }
            });
        });
    </script>
</body>
</html>
