<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|max:255',
            'rating' => 'required|max:5|min:0.5'
        ]);

        $comment = new Comment();
        $comment->content = $validatedData['comment'];
        // Assuming you have a user_id associated with the comment
        $user = Auth::user();
        $user_id = $user->id;
        $comment->user_id = $user_id;
        $comment->rating = $validatedData['rating'];
        $comment->chatbot_id = $request->chatbot_id;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
