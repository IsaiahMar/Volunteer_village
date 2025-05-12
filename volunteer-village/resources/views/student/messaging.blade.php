<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Messaging - Volunteer Village</title>
    <link rel="stylesheet" href="{{ asset('css/StudentHome.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .message-container {
            height: 500px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f8f9fa;
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
        }
        .message.sent {
            background-color: #007bff;
            color: white;
            margin-left: 20%;
        }
        .message.received {
            background-color: #e9ecef;
            margin-right: 20%;
        }
        .message-time {
            font-size: 0.8em;
            opacity: 0.7;
        }
        .message-input {
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <img src="{{ asset('images/Logo.png') }}" alt="App Logo" class="logo">
            <h2>Volunteer Tracker</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.submit.hours') }}">Submit Service Hours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.your.hours') }}">Your Hours/Awards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.messaging') }}">Personal Messaging</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('opportunities.index') }}">Opportunity Board</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('student.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h1>Personal Messaging</h1>
            
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <!-- Conversations List -->
                        <div class="col-md-4">
                            <div class="list-group">
                                @foreach($conversations as $conversation)
                                    <a href="{{ route('student.messaging.show', $conversation->id) }}" 
                                       class="list-group-item list-group-item-action {{ $activeConversation && $activeConversation->id == $conversation->id ? 'active' : '' }}">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">
                                                @if($conversation->sender_id == auth()->id())
                                                    {{ $conversation->receiver->first_name }} {{ $conversation->receiver->last_name }}
                                                @else
                                                    {{ $conversation->sender->first_name }} {{ $conversation->sender->last_name }}
                                                @endif
                                            </h5>
                                            <small>{{ $conversation->updated_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1">{{ Str::limit($conversation->last_message, 50) }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Messages Area -->
                        <div class="col-md-8">
                            @if($activeConversation)
                                <div class="message-container" id="messageContainer">
                                    @foreach($activeConversation->messages as $message)
                                        <div class="message {{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">
                                            <p>{{ $message->content }}</p>
                                            <small class="message-time">{{ $message->created_at->format('g:i A') }}</small>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="message-input">
                                    <form action="{{ route('student.messaging.send', $activeConversation->id) }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="content" class="form-control" placeholder="Type your message...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="text-center mt-5">
                                    <h4>Select a conversation to start messaging</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
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
    <script>
        // Scroll to bottom of messages when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const messageContainer = document.getElementById('messageContainer');
            if (messageContainer) {
                messageContainer.scrollTop = messageContainer.scrollHeight;
            }
        });
    </script>
</body>
</html> 