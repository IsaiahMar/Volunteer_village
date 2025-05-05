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
        .chess-piece {
    font-size: 1.5rem;
    display: inline-block;
    width: 24px;
}

.king {
    color: #FFD700;
    animation: sparkle 1.2s infinite ease-in-out;
}
.queen {
    color: #C0C0C0;
}
.rook {
    color: #CD7F32;
}

@keyframes sparkle {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.2); opacity: 0.7; }
    100% { transform: scale(1); opacity: 1; }
}

    </style>

</head>

<body>
    <!-- Toggle Button -->
    <button class="toggle-btn" id="toggleSidebar">
        <i class="fas fa-bars"></i>
    </button>

    <div class="wrapper d-flex justify-content-center align-items-center flex-column">
        <!-- Sidebar -->
        <div class="sidebar text-center" id="sidebar">
            <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo mx-auto">
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
                <li>
                    <a class="nav-link" href="{{ route('settings') }}" data-toggle="tooltip" title="Settings">
                        <i class="fas fa-cog"></i> <span>Settings</span>
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

        <!-- Main Content -->
        <div class="content text-center" id="mainContent">
            <h1>Leaderboard</h1>
            <table class="table table-bordered leaderboard-table mx-auto" style="max-width: 800px;">
                <thead>
                    <tr>
                        <th><i class="fas fa-ranking-star text-warning mr-1"></i> Rank</th>
                        <th><i class="fas fa-user text-primary mr-1"></i> Name</th>
                        <th><i class="fas fa-hourglass-half text-success mr-1"></i> Total Hours</th>
                    </tr>
                </thead>
                           
                <tbody>
                    @foreach($leaderboard as $index => $student)
                        <tr>
                            <td class="text-center">
                                @switch($index)
                                    @case(0) <span class="chess-piece king">♔</span> @break
                                    @case(1) <span class="chess-piece queen">♕</span> @break
                                    @case(2) <span class="chess-piece rook">♖</span> @break
                                    @default {{ $index + 1 }}
                                @endswitch
                            </td>                            
                            <td class="d-flex align-items-center justify-content-center gap-2">
                                <img src="{{ $student->profile_photo_url }}"
                                     alt="{{ $student->first_name }}'s profile photo"
                                     class="rounded-circle mr-2"
                                     style="width: 40px; height: 40px; object-fit: cover;">
                                <span>{{ $student->first_name }} {{ $student->last_name }}</span>
                            </td>
                                                   
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
