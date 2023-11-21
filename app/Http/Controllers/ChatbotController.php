<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChatbotController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function processUpload(Request $request)
    {

        // $validateData = $request->validate([
        //     'chatbot_name' => 'required',
        //     'chatbot_webhook_url' => 'required',
        //     'image_url' => 'required|image',
        //     'req_url' => 'required',
        //     'chatbot_description' => 'required',
        // ]);
        $imagePath = $request->file('image')->store('public/images'); // Store the image in storage
        $imageUrl = Storage::url($imagePath); // Get the URL of the stored image

        $chatbot = new Chatbot();
        // $chatbot->chatbot_name = $validateData['chatbot_name'];
        // $chatbot->chatbot_webhook_url = $validateData['chatbot_webhook_url'];
        // $chatbot->image_url = $imageUrl; // Save the image URL to the database
        // $chatbot->req_url = $validateData['req_url'];
        // $chatbot->chatbot_description = $validateData['chatbot_description'];
        $chatbot->chatbot_name = $request->chatbot_name;
        $chatbot->chatbot_webhook_url = $request->chatbot_webhook_url;
        $chatbot->image_url = $imageUrl; // Save the image URL to the database
        $chatbot->req_url = $request->req_url;
        $chatbot->chatbot_description = $request->chatbot_description;
        $chatbot->save();

        return redirect()->route('dashboard');
    }
}
