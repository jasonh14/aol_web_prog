<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use App\Models\User;
use App\Models\ChatMessage;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

        return view("home", [
            'chatbots' => $chatbots,
            'avgRatings' => $avgRating,
            'usersCount' => $usersCount,
            'messagesCount' => $messagesCount,
            'chatbotsCount' => $chatbotsCount
        ]);
    }

}
