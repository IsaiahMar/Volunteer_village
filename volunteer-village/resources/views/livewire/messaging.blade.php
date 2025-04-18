<div>
    <h1>Messaging</h1>

    <!-- Display Messages -->
    <div>
        @foreach ($messages as $msg)
            <p>{{ $msg }}</p>
        @endforeach
    </div>

    <!-- Input and Send Button -->
    <div>
        <input type="text" wire:model="message" placeholder="Type your message here..." />
        <button wire:click="sendMessage">Send</button>
    </div>
</div>