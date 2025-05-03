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
        // Fetch all users except the currently authenticated user
        $users = User::where('id', '!=', Auth::id())->get();

        // Fetch all messages involving the authenticated user
        $messages = Message::where('sender_id', Auth::id())
            ->orWhere('receiver_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return view('messages.index', compact('users', 'messages'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:messages,id', // Validate parent_id
        ]);

        // Create a new message
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'parent_id' => $request->parent_id, // Save parent_id if provided
        ]);

        // Return the created message as a JSON response
        return response()->json([
            'id' => $message->id,
            'sender_id' => $message->sender_id,
            'receiver_id' => $message->receiver_id,
            'message' => $message->message,
            'created_at' => $message->created_at->toDateTimeString(),
            'sender_name' => $message->sender->first_name . ' ' . $message->sender->last_name,
        ]);
    }

    public function destroy($id)
    {
        // Find the message by ID
        $message = Message::findOrFail($id);

        // Ensure the user can only delete their own messages
        if ($message->sender_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the message
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }

    public function getMessages($userId)
    {
        // Fetch messages between the authenticated user and the selected user
        $messages = Message::where(function ($query) use ($userId) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        // Return the messages as a JSON response
        return response()->json([
            'messages' => $messages->map(function ($message) {
                return [
                    'id' => $message->id,
                    'sender_id' => $message->sender_id,
                    'receiver_id' => $message->receiver_id,
                    'message' => $message->message,
                    'created_at' => $message->created_at,
                    'sender_name' => $message->sender->first_name . ' ' . $message->sender->last_name,
                ];
            }),
        ]);
    }
}