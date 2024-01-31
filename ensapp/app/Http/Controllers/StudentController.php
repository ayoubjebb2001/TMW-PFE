<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Student;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $inscriptions = Inscription::where('user_id', $user->id)->get()->sortByDesc('created_at');
        return view('student.index', compact('inscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("student.signup");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
/*         $validatedData = $request->validate([
            'lastname' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'CIN' => 'required|unique:users,cin',
            'password' => 'required|string',
        ]); */
        
        // Create a new user
        $user = User::create([
            'prenom' => $request->input('name'),
            'nom' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'CIN' => $request->input('CIN'),
            'password' => Hash::make($request->input('Password')),
        ]);

        // Create a new student associated with the user
        Role::create([
            'Specialization' => 'student',
            'user_id' => $user->id,
            'role_name' => 'student',
        ]);

        if($user){
            Auth::login($user);

            // Redirect or return a response
            return redirect()->route('/home')->with('success', 'Student registered successfully');
        }
        // Login the new created user

    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    /**
     * Show the sign up form
     */
    public function signup(){
        return view('student.signup');
    }
}
