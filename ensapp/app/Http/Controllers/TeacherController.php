<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'Phone' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'Specialization' => 'required|string',
        ]);

        // Create a new user
        $user = User::create([
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
            'Phone' => $request->input('Phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Create a new teacher associated with the user
        $teacher = Teacher::create([
            'Specialization' => $request->input('Specialization'),
            'user_id' => $user->user_id,
        ]);
        
        //Login the new created user

        Auth::login($user);
        
        // Redirect or return a response
        return redirect()->route('teacher.index')->with('success', 'Teacher registered successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('teacher.show',[
            'Teacher' => $teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        // Check if the authenticated user is a department chief or super admin
       /*  if (!Auth::user()->isDepartmentChief() && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        } */
        return view('teacher.edit',[
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, Teacher $teacher)
    {
        // Check if the authenticated user is a department chief or super admin

        // Validate the incoming request data
        $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'Phone' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $teacher->user_id,
            'Specialization' => 'required|string',
        ]);

        // Update the associated user's information
        $teacher->user->update([
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
            'Phone' => $request->input('Phone'),
            'email' => $request->input('email'),
        ]);

        // Update the teacher's information
        $teacher->update([
            'Specialization' => $request->input('Specialization'),
        ]);

        // Redirect or return a response
        return redirect()->route('teacher.index')->with('success', 'Teacher information updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
    
    /**
     * show signup form for teacher
     */
    public function signup(){
        return view('teacher.signup');
    }
}
