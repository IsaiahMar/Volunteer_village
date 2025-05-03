<!-- resources/views/livewire/messaging.blade.php -->

@extends('layouts.message_layout') <!-- This extends the layout -->

@section('content')
    <div class="row">
        <div class="col-md-3">
            <h5>Users</h5>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item {{ $selectedUser && $selectedUser->id == $user->id ? 'active' : '' }}"
                        wire:click="selectUser({{ $user->id }})"
                        style="cursor:pointer;">
                        {{ $user->name }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            @if($selectedUser)
                <h5>Chat with {{ $selectedUser->name }}</h5>
                <div style="height:300px; overflow-y:auto; border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                    @foreach($messages as $msg)
                        <div>
                            <strong>{{ $msg->sender_id == auth()->id() ? 'You' : $selectedUser->name }}:</strong>
                            {{ $msg->message }}
                            <span class="text-muted" style="font-size:10px;">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="input-group">
                    <input type="text" wire:model="message" class="form-control" placeholder="Type your message...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" wire:click="sendMessage">Send</button>
                    </div>
                </div>
            @else
                <p>Select a user to start chatting.</p>
            @endif
        </div>
    </div>
@endsection
