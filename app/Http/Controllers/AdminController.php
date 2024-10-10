<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Method for showing the login form
    public function showLoginForm()
    {
        return view('auth.admin-login'); // Ensure this view exists
    }
}
