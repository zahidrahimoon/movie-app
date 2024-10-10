<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display the list of users in a table
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('admins.user.index', compact('users')); // Correct the view path
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user
        $user->delete(); // Delete the user

        return redirect()->route('user.index')->with('success', 'User deleted successfully'); // Redirect to user listing
    }

    // Grant admin access to a user
    public function grantAdmin($id)
    {
        $user = User::findOrFail($id); // Find the user
        $user->is_admin = true; // Make the user an admin
        $user->save(); // Save changes

        return redirect()->route('user.index')->with('success', 'Admin access granted'); // Redirect to user listing
    }
}
