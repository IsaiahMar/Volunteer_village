<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home - Volunteer Village</title>
    <link rel="stylesheet" href="{{ asset('css/StudentHome.css') }}">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <a href="{{ route('student.home') }}">Home</a>
            <a href="{{ route('student.profile') }}">Profile</a>
            <form method="POST" action="{{ route('student.logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <a href="{{ route('student.submit.hours') }}">Submit Service Hours</a>
            <a href="{{ route('student.your.hours') }}">Your Hours/Awards</a>
            <a href="{{ route('student.messaging') }}">Personal Messaging</a>
            <a href="{{ route('student.opportunity.board') }}">Opportunity Board</a>
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Hour Counter -->
            <div class="hour-counter">
                Total Hours: <span class="hour-count">20 Hours</span> This Month!
            </div>

            <h1>Impact Stream</h1>

            <div class="impact-stream">
                <!-- Hardcoded Post -->
                <div class="post-box">
                    <h3>Helping with youth baseball coaching!</h3>
                    <img src="{{ asset('storage/pictures/volunteer.jpeg') }}" alt="Volunteer Coaching!">
                </div>


                @foreach($verifiedHours as $hour) 
                    <div class="post-box">
                        <h3>{{ $hour->caption }}</h3>
                        <img src="{{ asset('storage/' . $hour->image_path) }}" alt="Service Image">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <button id="toggle-sidebar" class="toggle-button">☰</button>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // JavaScript to toggle the sidebar visibility
        const toggleButton = document.getElementById('toggle-sidebar');
        const sidebar = document.getElementById('sidebar');
        
        toggleButton.addEventListener('click', function() {
            sidebar.classList.toggle('closed'); // Toggle the 'closed' class on the sidebar
        });
    </script>
</body>
</html>
