<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\DepartmentChif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DepartmentChifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs = User::whereHas('role', function($query){
            $query->where('role_name', 'chef');
        })->get();

        return view('teacher.chef.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.chef.create');
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
                'role_name' => 'chef',
            ]);
            
            // Redirect or return a response
            return redirect()->route('teacher.index')->with('success', 'Chef registered successfully');
        
        }else {
            return redirect()->route('teacher.index')->with('Error', 'You do not have the rights to access this method.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $departmentChif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $departmentChif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $departmentChif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $departmentChif)
    {
        //
    }
}
