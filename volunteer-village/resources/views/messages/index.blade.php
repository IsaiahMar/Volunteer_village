<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>

    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body, html { margin: 0; padding: 0; height: 100%; box-sizing: border-box; }

        .wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
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
            max-width: 150px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .logo {
            max-width: 50px;
        }

        .sidebar .nav-link {
            color: #333;
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            min-width: 20px;
        }

        .sidebar .nav-link:hover {
            background-color: #e2e6ea;
            border-radius: 5px;
        }

        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
        }

        .content {
            flex: 1;
            padding: 30px;
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        .content.shifted {
            margin-left: 70px;
        }

        footer {
            transition: margin-left 0.3s ease;
            margin-left: 250px;
        }

        footer.shifted {
            margin-left: 70px;
        }

        .chat-container {
            display: flex;
            height: 80vh;
            border: 1px solid #ddd;
        }

        .user-list {
            width: 25%;
            border-right: 1px solid #ddd;
            overflow-y: auto;
        }

        .user-list .user {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }

        .user-list .user:hover {
            background-color: #f8f9fa;
        }

        .chat-window {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            background-color: #f8f9fa;
            display: flex;
            justify-content: space-between;
        }

        .chat-messages {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
        }

        .chat-input {
            padding: 10px;
            border-top: 1px solid #ddd;
            background-color: #f8f9fa;
        }

        .chat-input textarea {
            width: 100%;
            resize: none;
        }
    </style>
</head>
<body>
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
                    <a class="nav-link" href="{{ route('opportunities.index') }}" data-toggle="tooltip" title="Opportunities">
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
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-danger text-white w-100 mt-2" data-toggle="tooltip" title="Logout">
                            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content" id="mainContent">
            <h1>Messages</h1>
            <div class="chat-container">
                <div class="user-list">
                    <button class="btn btn-primary btn-block mb-2" type="button" data-toggle="collapse" data-target="#userList">
                        Toggle User List
                    </button>
                    <div class="collapse show" id="userList">
                        @foreach ($users as $user)
                        <div class="user" onclick="openChat({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')">
                            <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="chat-window">
                    <div class="chat-header" id="chat-header">
                        <h5>Select a user to start chatting</h5>
                        <button class="btn btn-sm btn-danger" id="close-chat" style="display: none;" onclick="closeChat()">Close Chat</button>
                    </div>
                    <div class="chat-messages" id="chat-messages">
                        <p class="text-muted text-center">No conversation selected</p>
                    </div>
                    <div class="chat-input" id="chat-input" style="display: none;">
                        <form id="chat-form">
                            @csrf
                            <input type="hidden" name="receiver_id" id="receiver_id">
                            <input type="hidden" name="parent_id" id="parent_id">
                            <textarea name="message" id="message" rows="2" class="form-control" placeholder="Type a message..." required></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center py-3" id="mainFooter">
        <p>&copy; 2025 Volunteer Village. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

        document.getElementById('chat-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const receiverId = document.getElementById('receiver_id').value;
            const message = document.getElementById('message').value;

            fetch('{{ route('messages.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ receiver_id: receiverId, message }),
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('message').value = '';
                const msg = document.createElement('div');
                msg.className = data.sender_id === {{ auth()->id() }} ? 'text-right' : 'text-left';
                msg.innerHTML = `<strong>${data.sender_name}:</strong><p>${data.message}</p><small>${new Date(data.created_at).toLocaleString()}</small>`;
                document.getElementById('chat-messages').appendChild(msg);
                document.getElementById('chat-messages').scrollTop = chatMessages.scrollHeight;
            });
        });

        function openChat(userId, userName) {
            document.getElementById('chat-header').innerHTML = `
                <h5>Chat with ${userName}</h5>
                <button class="btn btn-sm btn-danger" onclick="closeChat()">Close Chat</button>
            `;
            document.getElementById('receiver_id').value = userId;
            document.getElementById('chat-input').style.display = 'block';

            fetch(`/messages/${userId}`)
                .then(res => res.json())
                .then(data => {
                    const msgContainer = document.getElementById('chat-messages');
                    msgContainer.innerHTML = '';
                    data.messages.forEach(m => {
                        const msg = document.createElement('div');
                        msg.className = m.sender_id === {{ auth()->id() }} ? 'text-right' : 'text-left';
                        msg.innerHTML = `<strong>${m.sender_name}:</strong><p>${m.message}</p><small>${new Date(m.created_at).toLocaleString()}</small>`;
                        msgContainer.appendChild(msg);
                    });
                    msgContainer.scrollTop = msgContainer.scrollHeight;
                });
        }

        function closeChat() {
            document.getElementById('chat-header').innerHTML = '<h5>Select a user to start chatting</h5>';
            document.getElementById('chat-input').style.display = 'none';
            document.getElementById('chat-messages').innerHTML = '<p class="text-muted text-center">No conversation selected</p>';
        }
    </script>
</body>
</html>
