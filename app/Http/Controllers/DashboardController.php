<?php

namespace App\Http\Controllers;

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
            return view('dashboard', ['user'=>$user]);
            // Do something with the $user object
        } else {
            // No user is logged in
            return redirect()->route('login');
        }

    }
}
