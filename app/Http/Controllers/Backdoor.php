<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Backdoor extends Controller
{
    public function access()
    {
        $user = Auth::user();

        if ($user) {
            // Redirect based on role if needed, for example, 'school_owner'
            if ($user->accounttype == 'school_owner') { // Use '==' for comparison
                return redirect()->route('ownerdasboard'); // Redirect to the 'dashboard' route
            } else {
                // Handle other roles or cases
                return redirect()->route('/'); // Redirect to a default route
            }
        } else {
            // If the user is not authenticated, send to welcome page
            return view('welcome');
        }
    }

    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Optional: Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to protect against CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to the login page or desired route
        return redirect()->route('login')->with('success', 'You have been logged out successfully!');
    }

    public function teacherLogin(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to log the teacher in
    if (Auth::guard('school_teacher')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
        // Redirect to intended route after successful login
        return redirect()->intended('/teacherindex'); // Change '/your-redirect-route' as needed
    }

    // If authentication fails, redirect back with an error
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    
    public function tlogin(){
        return view('teacher.login');
    }
}
