<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if a user is authenticated
        if (Auth::check()) {
            // User is logged in
            $user = Auth::user();
            $user_id = $user->id;
            $chatbots = Chatbot::where('user_id', $user_id)->get();
            $comments = Comment::where("user_id", $user_id)->get();
            return view('dashboard', ['user' => $user, 'chatbots' => $chatbots, "comments" => $comments]);
            // Do something with the $user object
        } else {
            // No user is logged in
            return redirect()->route('login');
        }
    }
}
