<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use App\Models\Comment;
use App\Models\User;
use App\Jobs\SendChatResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatSession;
use App\Models\ChatMessage;
use App\Models\ReplyToken;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function index()
    {
        $chatbots = Chatbot::all();

        // Map the chatbot_id with their average rating
        $avgRating = $chatbots->mapWithKeys(function ($chatbot) {
            $averageRating = Comment::where('chatbot_id', $chatbot->id)
                                    ->avg('rating');
            return [$chatbot->id => $averageRating];
        });

        $usersCount = User::count();
        $messagesCount = ChatMessage::count();
        $chatbotsCount = $chatbots->count();

        return view("explore", [
            'chatbots' => $chatbots,
            'avgRatings' => $avgRating,
            'usersCount' => $usersCount,
            'messagesCount' => $messagesCount,
            'chatbotsCount' => $chatbotsCount
        ]);
    }

    public function processUpload(Request $request)
    {
        // dd($request->all())

        // $validateData = $request->validate([
        //     'chatbot_name' => 'required',
        //     'chatbot_webhook_url' => 'required',
        //     'image_url' => 'required|image',
        //     'req_url' => 'required',
        //     'chatbot_description' => 'required',
        // ]);

        $user = Auth::user();

        $imagePath = $request->image->store('public'); // Store the image in storage
        $imageUrl = Storage::url($imagePath); // Get the URL of the stored image

        $chatbot = new Chatbot();
        // $chatbot->chatbot_name = $validateData['chatbot_name'];
        // $chatbot->chatbot_webhook_url = $validateData['chatbot_webhook_url'];
        // $chatbot->image_url = $imageUrl; // Save the image URL to the database
        // $chatbot->req_url = $validateData['req_url'];
        // $chatbot->chatbot_description = $validateData['chatbot_description'];
        $chatbot->chatbot_name = $request->chatbot_name;
        $chatbot->user_id = $user->id;
        $chatbot->chatbot_webhook_url = $request->chatbot_webhook_url;
        $chatbot->image_url = $imageUrl; // Save the image URL to the database
        $chatbot->req_url = $request->req_url;
        $chatbot->chatbot_description = $request->chatbot_description;
        $chatbot->save();

        return redirect()->route('dashboard');
    }

    public function chat(string $id)
    {
        $comments = Comment::where('chatbot_id', $id)->with('user')->orderBy('createdAt','desc')->get();
        $user = Auth::user();
        $session = ChatSession::firstOrCreate([
            'chatbot_id' => $id,
            'user_id' => $user->id
        ]);

        $chatbot = Chatbot::find($id);

        $messages = ChatMessage::where('session_id', $session->id)->get();

        return view('chat', [
            "chatbot_id" => $id,
            "chatbot" => $chatbot,
            "session" => $session,
            "messages" => $messages,
            "comments" => $comments
        ]);
    }


    public function sendClientMessage(Request $request, $id)
    {
        $user = Auth::user();
        $chatbot = Chatbot::findOrFail($id);

        $replyToken = Str::random(40);

        $payload = [
            'client_display_name' => $user->display_name,
            'client_id' => $user->id,
            'message' => $request->message,
            'timestamp' => now(),
            'replyToken' => $replyToken,
        ];

        $session = ChatSession::firstOrCreate([
            'chatbot_id' => $id,
            'user_id' => $user->id,
        ]);

        $message = ChatMessage::create([
            'session_id' => $session->id,
            'sender' => 1, // 1 for user
            'message' => $request->message,
        ]);

        ReplyToken::create([
            'session_id' => $session->id,
            'message_id' => $message->id,
            'token' => $replyToken,
            'usage_left' => 5,
        ]);

        // Http::post($chatbot->chatbot_webhook_url, $payload);
        SendChatResponse::dispatch($chatbot->chatbot_webhook_url, $payload);

        return redirect()->back();
    }

    public function clearChat(Request $request, $id)
    {
        $session = ChatSession::find($id);

        if (!$session) {
            return response()->json(['message' => 'Chat session not found'], 404);
        }

        ChatMessage::where('session_id', $id)->delete();

        return redirect()->back()->with('success', 'Chat history cleared.');
    }

    public function onMessageReceived(Request $request)
    {
        error_log('On Message Received called!');
        $replyToken = $request->header('ReplyToken');

        $tokenRecord = ReplyToken::where('token', $replyToken)->first();

        if ($tokenRecord && $tokenRecord->usage_left > 0) {
            $tokenRecord->decrement('usage_left');

            if ($request->has('message')) {
                $message = new ChatMessage();
                $message->session_id = $tokenRecord->session_id;
                $message->sender = 0; // 0 for bot
                $message->message = $request->message;
                $message->save();
            }
        }
    }

    public function checkNewMessages($id)
    {
        error_log("checkNewMessages called with id: $id");

        $lastMessageId = request()->query('lastMessageId', 0);
        $newMessages = ChatMessage::where('session_id', $id)
            ->where('id', '>', $lastMessageId)
            ->exists();

        return response()->json(['newMessages' => $newMessages]);
    }
}
