<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // Show Login Form for User
    public function showLoginForm()
    {
        return view('auth.login'); // Adjust the path if needed
    }

    // Handle User Login
    public function login(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Attempt to log the user in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/');
        }

        return redirect()->back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->withInput($request->except('password'));
    }

    // Show Signup Form
    public function showSignupForm()
    {
        return view('auth.signup'); // Adjust the path if needed
    }

    // Handle User Signup
    public function signUp(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Ensure password confirmation field is included
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }
    public function update(Request $request)
    {
        // Get the current authenticated user
        $user = auth()->user();

        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update user's profile information
        $user->name = $request->name;
        $user->email = $request->email;

        // Check if the password field is filled and update the password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the updated user data
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
?>