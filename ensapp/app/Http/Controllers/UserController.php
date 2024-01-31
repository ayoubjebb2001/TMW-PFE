<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Inscription;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function dash(){
        $teachers = User::whereHas('role', function ($query) {
            $query->where('role_name', 'teacher');
        })->count();

        $students = User::whereHas('role', function ($query) {
            $query->where('role_name', 'student');
        })->count();

        $inscriptions = Inscription::count();


        $modules = Module::count();

        return view("dashboard", compact('teachers', 'students', 'modules', 'inscriptions'));
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out!');

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
                return redirect('/home')->with('message', 'You are now logged in!');
            }
        }
    
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
    
    
}
