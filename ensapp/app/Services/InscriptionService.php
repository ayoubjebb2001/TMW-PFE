<?php

namespace App\Services;

use App\Http\Requests\InscriptionRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Student;
use App\Models\Inscription;
use Illuminate\Support\Facades\Hash;

class InscriptionService
{
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

    public function createInscription(Student $student, InscriptionRequest $request)
    {
        // Logique pour créer une inscription
        return Inscription::create([
            'etat_inscription' => 'en attente',
            'note_bac' => $request->input('note_bac'),
            'annee_bac' => $request->input('annee_bac'),
            'intitule_diplome' => $request->input('intitule_diplome'),
            'note_diplome' => $request->input('note_diplome'),
            'annee_diplome' => $request->input('annee_diplome'),
            'student_id' => $student->id,
        ]);
    }
}
