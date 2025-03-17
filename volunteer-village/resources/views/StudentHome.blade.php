<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home - Volunteer Village</title>
    <link href="{{ asset('css/StudentHome.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('profile') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <a href="{{ route('submit.hours') }}">Submit Service Hours</a>
            <a href="{{ route('your.hours') }}">Your Hours/Awards</a>
            <a href="{{ route('messaging') }}">Personal Messaging</a>
            <a href="{{ route('opportunity.board') }}">Opportunity Board</a>
        </div>
        <div class="content">
            <h1>Impact Stream</h1>
            <div class="impact-stream">
                <!-- @foreach($verifiedHours as $hour)
                    <div class="post-box">
                        <h3>{{ $hour->caption }}</h3>
                        <img src="{{ asset('storage/' . $hour->image_path) }}" alt="Service Image">
                    </div>
                @endforeach -->
            </div>
        
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
