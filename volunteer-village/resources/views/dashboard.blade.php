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
        <div class="content" id="mainContent">
            <h1>Welcome to Your Dashboard</h1>
            <p>{{ __("You're logged in!") }}</p>

            <h2>Quick Links</h2>
            <ul>
                <li><a href="{{ route('profile.show') }}">Edit Your Profile</a></li>
                <li><a href="{{ route('opportunities.index') }}">Browse Volunteer Opportunities</a></li>
                <li><a href="{{ route('leaderboard') }}">View Leaderboard</a></li>
            </ul>

            <!-- Volunteer Leaders Section -->
            <h2 class="mt-5 mb-4">Volunteer Leaders</h2>

            @if($leaders->isNotEmpty())
                <canvas id="confettiCanvas" style="position:absolute; top:180px; left:0; width:100%; height:200px; pointer-events:none;"></canvas>
            @endif

            <div class="col-lg-6 mx-auto">
                @foreach($leaders->values() as $index => $leader)
                    <div class="mb-3">
                        <div class="card shadow-sm d-flex flex-row align-items-center p-3 leader-animate delay-{{ $index + 1 }} {{ $index === 0 ? 'sparkle-king' : '' }}">
                            <div class="mr-3 chess-icon">
                                @switch($index)
                                    @case(0) <span class="gold">♔</span> @break
                                    @case(1) <span class="silver">♕</span> @break
                                    @case(2) <span class="bronze">♖</span> @break
                                    @case(3) ♗ @break
                                    @case(4) ♘ @break
                                @endswitch
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-1">{{ $leader->name }}</h5>
                                <p class="mb-0 text-muted">{{ $leader->total_hours }} hours</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3" id="mainFooter">
        <p>&copy; 2025 Volunteer Village. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
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

        // Confetti if first place exists
        if (document.querySelector('.sparkle-king')) {
            const canvas = document.getElementById('confettiCanvas');
            const myConfetti = confetti.create(canvas, { resize: true });
            myConfetti({
                particleCount: 100,
                spread: 120,
                origin: { y: 0.6 }
            });
        }
    </script>
</body>
</html>
