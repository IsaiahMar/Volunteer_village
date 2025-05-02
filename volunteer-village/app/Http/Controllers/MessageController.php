<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $messages = Message::where('sender_id', Auth::id())
            ->orWhere('receiver_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return view('messages.index', compact('users', 'messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('messages.index')->with('success', 'Message sent!');
    }
    public function destroy($id)
{
    $message = Message::findOrFail($id);

    // Ensure the user can only delete their own messages
    if ($message->sender_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $message->delete();

    return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
}
}