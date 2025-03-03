<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Volunteer Opportunity</title>
    <link rel="stylesheet" href="{{ asset('css/organization.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create Volunteer Opportunity</h1>
        <form action="{{ route('organization.storeOpportunity') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" required>
            </div>
            <div class="form-group">
                <label for="Date">Date</label>
                <input type="date" class="form-control" id="Date" name="Date" required>
            </div>
            <div class="form-group">
                <label for="Location">Location</label>
                <input type="text" class="form-control" id="Location" name="Location" required>
            </div>
            <div class="form-group">
                <label for="Max_students">Max Students</label>
                <input type="number" class="form-control" id="Max_students" name="Max_students" required>
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>