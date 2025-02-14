<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home - Volunteer Village</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

        
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
