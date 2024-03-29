<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UserRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Module::all();
        return view('teacher.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        // Create a new user
        $user = User::create([
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Create a new teacher associated with the user
        $teacher = Teacher::create([
            'specialization' => $request->input('specialization'),
            'user_id' => $user->id,
        ]);
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
        return view('teacher.edit',[
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, Teacher $teacher)
    {
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
