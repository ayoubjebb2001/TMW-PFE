<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("student.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    public function createUser(UserRequest $request)
    {
        // Logique pour créer un utilisateur
        return User::create([
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'date_naissance' => $request->input('date_naissance'),
            'phone' => $request->input('phone'),
            'adresse' => $request->input('adresse'),
        ]);
    }

    public function createStudent(User $user)
    {
        // Logique pour créer un étudiant
        return Student::create([
            'user_id' => $user->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // Créer un utilisateur et un étudiant
        $user = $this->createUser($request);
        $student = $this->createStudent($user);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];        
        // Authentifier l'utilisateur 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Rediriger vers le formulaire d'inscription
            return redirect()->route('inscriptions.create')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
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
