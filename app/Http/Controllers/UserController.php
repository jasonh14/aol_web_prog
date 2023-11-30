<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view("edit");
    }

    public function processUpload(Request $request)
    {
        // dd($request->all());

        $user = Auth::user();

        $imagePath = $request->image->store('public'); // Store the image in storage
        $imageUrl = Storage::url($imagePath); // Get the URL of the stored image

        $user->display_name = $request->user_name;
        $user->image_url = $imageUrl;

        $user->save();


        return redirect()->route('dashboard');
    }
}
