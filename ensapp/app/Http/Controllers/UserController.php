<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // Show Login Form
    public function login() {
        return view('login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
    
            $user = auth()->user();

            $roleName = $user->role->role_name;
            
            if ($roleName && ($roleName === 'teacher' || $roleName === 'chef')) {
                return redirect('/dashboard')->with('message', 'You are now logged in!');
            } 
    
            if ($roleName && $roleName === 'student') {
                return redirect('/')->with('message', 'You are now logged in!');
            }
        }
    
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
    
    
}
