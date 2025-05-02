<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-light">
            <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">
            <h2>Volunteer Tracker</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.index') }}">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('opportunities.index') }}">View Opportunities</a>
                </li>
                @if(auth()->user()->role === 'organization' || auth()->user()->role === 'teacher' || auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('organization.createOpportunity') }}">Create Opportunities</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leaderboard') }}">Leaderboard</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link btn btn-danger text-white" style="padding: 10px; border: none; background: red; border-radius: 5px;">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content p-4">
            <h1>Messages</h1>

            <style>
                .messages {
                    border: 1px solid #ddd;
                    padding: 10px;
                    max-height: 400px;
                    overflow-y: auto;
                }
                .message {
                    margin-bottom: 15px;
                }
                .text-right {
                    text-align: right;
                }
                .text-left {
                    text-align: left;
                }
            </style>

            <!-- Message Form -->
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="receiver_id">Send To:</label>
                    <select name="receiver_id" id="receiver_id" class="form-control" required>
                        <option value="">Select a user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>

            <!-- Messages List -->
            <h2 class="mt-4">Conversations</h2>
            <div class="messages">
                @foreach ($messages as $message)
                    <div class="message {{ $message->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
                        <strong>{{ $message->sender->first_name }}:</strong>
                        <p>{{ $message->message }}</p>
                        <small>{{ $message->created_at->format('d M Y, h:i A') }}</small>

                        @if ($message->sender_id == auth()->id())
                            <!-- Delete Button -->
                            <form action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-auto">
        <p>&copy; 2025 Volunteer Village. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/footer.js') }}"></script>
</body>
</html>