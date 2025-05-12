<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }
        .dark-mode .content {
            background-color: #1e1e1e;
            color: #f5f5f5;
        }
        .dark-mode .card,
        .dark-mode .table {
            background-color: #2c2c2c;
            color: #ffffff;
        }
        .dark-mode .btn-dark-mode {
            background-color: #ffffff;
            color: #121212;
        }
    </style>
</head>
<body class="{{ session('dark_mode') ? 'dark-mode' : '' }}">
    
    <!-- Toggle Sidebar Button -->
    <button class="toggle-btn" id="toggleSidebar">
        <i class="fas fa-bars"></i>
    </button>

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">
            <h2>Volunteer Tracker</h2>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profile.show') }}"><i class="fas fa-user"></i> <span>Profile</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('messages.index') }}"><i class="fas fa-envelope"></i> <span>Messages</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('opportunities.index') }}"><i class="fas fa-search"></i> <span>View Opportunities</span></a></li>
                @if(auth()->user()->role === 'organization' || auth()->user()->role === 'teacher' || auth()->user()->role === 'admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('organization.createOpportunity') }}"><i class="fas fa-plus"></i> <span>Create Opportunities</span></a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{ route('leaderboard') }}"><i class="fas fa-trophy"></i> <span>Leaderboard</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('settings') }}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
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

        <!-- Content -->
        <div class="content p-4" id="mainContent">
            <h1>Settings</h1>
            <form method="POST" action="{{ route('toggle.darkmode') }}">
                @csrf
                <div class="form-group mt-3">
                    <label for="darkModeToggle" class="d-flex align-items-center">
                        <span class="mr-2">Dark Mode</span>
                        <label class="switch">
                            <input type="checkbox" id="darkModeToggle" name="dark_mode" onchange="this.form.submit()" {{ session('dark_mode') ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </form>
        </div>
        
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 34px;
                height: 20px;
            }
        
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }
        
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: 0.4s;
                border-radius: 20px;
            }
        
            .slider:before {
                position: absolute;
                content: "";
                height: 14px;
                width: 14px;
                left: 3px;
                bottom: 3px;
                background-color: white;
                transition: 0.4s;
                border-radius: 50%;
            }
        
            input:checked + .slider {
                background-color: #2196F3;
            }
        
            input:checked + .slider:before {
                transform: translateX(14px);
            }
        </style>
        

    <footer class="bg-light text-center py-3" id="mainFooter">
        <p>&copy; 2025 Volunteer Village. All rights reserved.</p>
    </footer>

    <!-- Script -->
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
