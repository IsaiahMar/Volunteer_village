<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Home</title>
</head>
<body>
    <h1>Welcome, Teacher</h1>

    <h2>Pending Verifications</h2>
    <ul>
        @foreach($verifications as $verification)
            <li>
                Verification ID: {{ $verification->Verification_id }},
                Student ID: {{ $verification->Student_ID }},
                Hours ID: {{ $verification->Hours_ID }},
                Status: {{ $verification->Status }}
            </li>
        @endforeach
    </ul>

    <h2>Volunteer Hours Logged</h2>
    <ul>
        @foreach($hoursLogged as $hours)
            <li>
                Hours ID: {{ $hours->Hours_ID }},
                Hours Logged: {{ $hours->Hours_Logged }},
                Date Logged: {{ $hours->Date_logged }},
                Verified: {{ $hours->Verified ? 'Yes' : 'No' }}
            </li>
        @endforeach
    </ul>
</body>
</html>