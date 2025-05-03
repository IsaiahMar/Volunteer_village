<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>

    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #f8f9fa;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 70px;
            padding: 20px 10px;
        }

        .sidebar.collapsed h2,
        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar .logo {
            width: 100%;
            max-width: 150px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .logo {
            max-width: 50px;
        }

        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .sidebar .nav-link {
            color: #333;
            font-size: 16px;
            display: flex;
            align-items: center;
            padding: 10px;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            min-width: 20px;
            text-align: center;
        }

        .sidebar .nav-link:hover {
            background-color: #e2e6ea;
            border-radius: 5px;
            text-decoration: none;
        }

        .content {
            flex: 1;
            padding: 30px;
            transition: margin-left 0.3s ease;
            margin-left: 250px;
        }

        .content.shifted {
            margin-left: 70px;
        }

        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }

        footer {
            transition: margin-left 0.3s ease;
            margin-left: 250px;
        }

        footer.shifted {
            margin-left: 70px;
        }

        /* Leaderboard Styles */
        .leaderboard-table {
            font-size: 1.2rem;
            color: darkblue;
        }

        .leaderboard-table .chess-piece {
            font-size: 2rem;
        }

        .leaderboard-table .chess-piece.king {
            color: gold;
        }

        .leaderboard-table .chess-piece.queen {
            color: silver;
        }

        .leaderboard-table .chess-piece.rook {
            color: #cd7f32; /* bronze */
        }
    </style>
</head>

<body>
    <!-- Toggle Button -->
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
                    <a class="nav-link" href="{{ route('opportunities.index') }}" data-toggle="tooltip" title="View Opportunities">
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
        <div class="content" id="mainContent">
            <h1>Leaderboard</h1>
            <table class="table table-bordered leaderboard-table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Total Hours</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaderboard as $index => $student)
                        <tr>
                            <td>
                                @if($index == 0)
                                    <span class="chess-piece king">♔</span>
                                @elseif($index == 1)
                                    <span class="chess-piece queen">♕</span>
                                @elseif($index == 2)
                                    <span class="chess-piece rook">♖</span>
                                @else
                                    {{ $index + 1 }}
                                @endif
                            </td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->total_hours }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
    <script src="/js/footer.js"></script>
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
    </script>
</body>
</html>
