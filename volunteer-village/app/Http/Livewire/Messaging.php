<?php
// app/Http/Livewire/Messaging.php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;        // ← add this
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.message_layout')]   
class Messaging extends Component
{
    public $users;
    public $selectedUser = null;
    public $messages = [];
    public $message = '';

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::id())->get();
    }

    public function selectUser($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->loadMessages();
    }

    public function loadMessages()
    {
        if ($this->selectedUser) {
            $this->messages = Message::where(fn($q) => 
                    $q->where('sender_id', Auth::id())
                      ->where('receiver_id', $this->selectedUser->id)
                )->orWhere(fn($q) => 
                    $q->where('sender_id', $this->selectedUser->id)
                      ->where('receiver_id', Auth::id())
                )
                ->orderBy('created_at')
                ->get();
        }
    }

    public function sendMessage()
    {
        if ($this->selectedUser && $this->message) {
            Message::create([
                'sender_id'   => Auth::id(),
                'receiver_id' => $this->selectedUser->id,
                'message'     => $this->message,
            ]);
            $this->message = '';
            $this->loadMessages();
        }
    }

    public function render()
    {
        return view('livewire.messaging')
            ->with([
                'title'       => 'Messaging',
                'description' => 'Send and receive messages with other users.',
            ]);
    }
}
