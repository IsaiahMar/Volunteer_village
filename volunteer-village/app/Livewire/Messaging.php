<?php
namespace App\Livewire;

use Livewire\Component;

class Messaging extends Component
{
    public $message = ''; // Holds the current message being typed
    public $messages = []; // Holds the list of messages

    public function sendMessage()
    {
        if (!empty($this->message)) {
            // Add the new message to the messages array
            $this->messages[] = $this->message;

            // Clear the input field
            $this->message = '';
        }
    }

    public function render()
    {
        return view('livewire.messaging')->with(['layout' => 'layouts.message_layout']);
    }
}
