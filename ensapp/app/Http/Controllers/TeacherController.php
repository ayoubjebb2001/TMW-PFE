<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
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
        $teachers = User::whereHas('role', function($query){
            $query->where('role_name', 'teacher')->orWhere('role_name', 'chef');
        })->get();

        return view('teacher.index', compact('teachers'));
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
        if (auth::user()->role->role_name === 'chef'){

            
            // Validate the incoming request data
            $request->validate([
                'lastname' => 'required|string',
                'name' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'cin' => 'required|unique:users,cin',
                'password' => 'required|string',
                'specialization' => 'required|string',
            ]);

            // dd($request);

            // Create a new user
            $user = User::create([
                'prenom' => $request->input('name'),
                'nom' => $request->input('lastname'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'CIN' => $request->input('cin'),
                'password' => Hash::make($request->input('password')),
            ]);


            // Create a new teacher associated with the user
            Role::create([
                'Specialization' => $request->input('specialization'),
                'user_id' => $user->id,
                'role_name' => 'teacher',
            ]);
            
            // Redirect or return a response
            return redirect()->route('teacher.index')->with('success', 'Teacher registered successfully');
        
        }else {
            return redirect()->route('teacher.index')->with('Error', 'You do not have the rights to access this method.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $teacher)
    {
        return view('teacher.show',[
            'Teacher' => $teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $teacher)
    {

        return view('teacher.edit',[
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, User $teacher)
    {
        if (auth::user()->role->role_name == 'chef' || auth::user()->id === $teacher->id) {

            $request->validate([
                'lastname' => 'required|string',
                'name' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $teacher->id,
                'cin' => 'required|unique:users,cin,' . $teacher->id,
                'old_password' => 'required|string',
                'new_password' => 'required|string',
                'specialization' => 'required|string',
            ]);

            if ($request->input('old_password') != $request->input('new_password') || !Hash::check($request->input('old_password'), $teacher->password)) {
                return redirect()->back()->with('Error', 'Passwords do not match');

            } else {

                $teacher->update([
                    'prenom' => $request->input('name'),
                    'nom' => $request->input('lastname'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'CIN' => $request->input('cin'),
                    'password' => bcrypt($request->input('new_password')),
                ]);

                $teacher->role->update([
                    'Specialization' => $request->input('specialization'),
                ]);

                return redirect()->route('teacher.index')->with('success', 'Teacher information updated successfully');

            }

        }else{
            return redirect()->back()->with('Error', 'You do not have the rights to access this method. ');

        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        if (auth::user()->role->role_name == 'chef' || auth::user()->id === $teacher->id){
            $teacher->delete();
            return redirect()->back()->with('Success', 'Deleted successfully.');

        }else {
            return redirect()->back()->with('Error', 'You do not have the rights to access this method.');

        }
    }
    
    /**
     * show signup form for teacher
     */
    public function signup(){
        return view('teacher.signup');
    }
}
