<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\ChatMessageStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class ChatController extends Controller
{
    public function chatPage()
    {
        return view('chat.chat');
    }

    public function chatRoomCreate(User $user)
    {
        $currentUser = auth()->user();
        $params = array(
            'currentUser' => $currentUser,
            'contact' => $user
        );

        return view('chat.chat-room', $params);
    }

    public function chatRoom(Chat $chat)
    {
        $currentUser = auth()->user();
        $contact = $chat->members->except($currentUser->id)->first();
        $params = array(
            'currentUser' => $currentUser,
            'currentChat' => $chat,
            'contact' => $contact,
        );

        foreach ($chat->messages as $message) {
            if (!$message->messageViewed($currentUser)) {
                ChatMessageStatus::create([
                    'message_id' => $message->id,
                    'user_id' => $currentUser->id,
                    'is_read' => 1,
                ]);
            }
        }
        return view('chat.chat-room', $params);
    }

    public function sendFirstMessage(Request $request, User $user)
    {
        $request->validate(['chat_message' => 'required']);

        try {
            $currentUser = auth()->user();

            $userChats = Chat::where('user_id', $currentUser->id)->get();
            foreach ($userChats as $userChat) {
                if ($userChat->members->contains($user->id) && $userChat->members->contains($currentUser->id)) {
                    $chat = $userChat;
                    break;
                }
            }
            if (!isset($chat)) {
                $chat = Chat::create([
                    'name' => 'chat_' . Str::random(10),
                    'user_id' => $currentUser->id
                ]);
                $chat->members()->attach([$currentUser->id, $user->id]);
            }

            $msg = ChatMessage::create([
                'chat_id' => $chat->id,
                'user_id' => $currentUser->id,
                'content' => $request->input('chat_message'),
                'date' => now()
            ]);

            ChatMessageStatus::create([
                'message_id' => $msg->id,
                'user_id' => $currentUser->id,
                'is_read' => 1
            ]);
            return redirect()->route('chat.room', $chat);

        } catch (Throwable $e) {
            return response()->json($e);
        }
    }

    public function sendMessage(Request $request, Chat $chat)
    {
        $request->validate(['chat_message' => 'required']);

        try {
            $currentUser = auth()->user();
            $msg = ChatMessage::create([
                'chat_id' => $chat->id,
                'user_id' => $currentUser->id,
                'content' => $request->input('chat_message'),
                'date' => now()
            ]);

            ChatMessageStatus::create([
                'message_id' => $msg->id,
                'user_id' => $currentUser->id,
                'is_read' => 1
            ]);

            return response()->json([
                'msg' => $msg->content,
                'date' => $msg->getTime()
            ]);
        } catch (Throwable $e) {
            return response()->json($e);
        }
    }

    public function destroyChat(Chat $chat)
    {
        $chat->delete();
        return redirect()->route('chat');
    }
}
