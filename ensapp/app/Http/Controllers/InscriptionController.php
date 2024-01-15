<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\InscriptionService;
use App\Http\Requests\InscriptionRequest;

class InscriptionController extends Controller
{
    protected $inscriptionService;

    public function __construct(InscriptionService $inscriptionService)
    {
        $this->inscriptionService = $inscriptionService;
    }
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

    public function store(InscriptionRequest $request, UserRequest $userRequest)
    {
        // Créer un nouvel utilisateur en utilisant UserRequest pour la validation
        $user = $this->inscriptionService->createUser($userRequest);

        // Créer un nouvel étudiant associé à l'utilisateur
        $student = $this->inscriptionService->createStudent($user);

        // Enregistrer les informations scolaires dans la table inscriptions
        $this->inscriptionService->createInscription($student, $request);

        // Rediriger vers une page souhaitée
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
