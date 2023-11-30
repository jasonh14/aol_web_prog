<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
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

        return view("home", ['chatbots' => $chatbots]);
    }
}
