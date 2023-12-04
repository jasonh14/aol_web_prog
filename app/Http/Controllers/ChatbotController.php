<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function index()
    {
        $chatbots = Chatbot::all();

        return view("explore", ['chatbots' => $chatbots]);
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
        $comments = Comment::where('chatbot_id', $id)->with('user')->get();
        return view('chat', ["chatbot_id" => $id, "comments" => $comments]);
    }

    public function sendClientMessage(Request $request, $id)
    {
        $user = Auth::user();
        $chatbot = Chatbot::findOrFail($id);

        $replyToken = Str::random(40);

        $payload = [
            'client_display_name' => $user->name,
            'message' => $request->message,
            'timestamp' => now(),
            'replyToken' => $replyToken,
        ];

        Http::post($chatbot->chatbot_webhook_url, $payload);

        $session = ChatSession::firstOrCreate([
            'chatbot_id' => $id,
            'user_id' => $user->id,
        ]);

        $message = ChatMessage::create([
            'session_id' => $session->id,
            'sender' => 0, // 0 for user
            'message' => $request->message,
        ]);

        ReplyToken::create([
            'session_id' => $session->id,
            'message_id' => $message->id,
            'token' => $replyToken,
            'usage_left' => 5,
        ]);
    }

    public function onMessageReceived(Request $request)
    {
        $replyToken = $request->header('ReplyToken');

        $tokenRecord = ReplyToken::where('token', $replyToken)->first();

        if ($tokenRecord && $tokenRecord->usage_left > 0) {
            $tokenRecord->decrement('usage_left');

            if ($request->has('message')) {
                $message = new ChatMessage();
                $message->session_id = $tokenRecord->session_id;
                $message->sender = 1; // 1 for bot
                $message->message = $request->message;
                $message->save();
            }
        }
    }

}
