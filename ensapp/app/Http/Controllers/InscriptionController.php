<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InscriptionRequest;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inscription.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("inscriptions.create");
    }

    public function store(InscriptionRequest $request)
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = Auth::user();

        // Récupérer l'étudiant associé à l'utilisateur
        $student = $user->student;

        // Ajouter les informations supplémentaires dans la table inscriptions
        Inscription::create([
            'etat_inscription' => 'en attente',
            'note_bac' => $request->input('note_bac'),
            'annee_bac' => $request->input('annee_bac'),
            'intitule_diplome' => $request->input('intitule_diplome'),
            'note_diplome' => $request->input('note_diplome'),
            'annee_diplome' => $request->input('annee_diplome'),
            'student_id' => $student->id,
        ]);

        // Rediriger vers une page souhaitée après l'inscription
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscription $inscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscription $inscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscription $inscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscription $inscription)
    {
        //
    }
}
