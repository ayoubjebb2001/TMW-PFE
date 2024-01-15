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

            $authUser = User::with('role')->where('user_id', 2)->firstOrFail();

            $roleName = $authUser->role->role_name;

            dd($roleName);
            
            if ($user->role && ($user->role->name === 'teacher' || $user->role->name === 'chef')) {
                return redirect('/dashboard')->with('message', 'You are now logged in!');
            } 
    
            if ($user->role && $user->role->name === 'student') {
                return redirect('/')->with('message', 'You are now logged in!');
            }
        }
    
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
    
    
}
