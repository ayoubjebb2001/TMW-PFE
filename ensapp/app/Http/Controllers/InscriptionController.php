<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Filiere;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscriptions = Inscription::all();
        return view('inscription.index', compact('inscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userID = Auth::user()->id;
        $user = User::findOrFail($userID);
        $filieres = Filiere::all();
        return view('inscription.create', compact('filieres', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'filiere' => 'required|numeric',
            'user_id' => 'required|numeric',
            'deplome' => 'required|string',
            'deplome_year' => 'required|numeric',
            'bac_note' => 'required|numeric',
            'deplome_note' => 'required|numeric',
            'file' => 'required|mimes:pdf,docx,doc,ppt,pptx,zip,rar',
        ]);
        
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        Inscription::create([
            'user_id' => $validatedData['user_id'],
            'filiere_id' => $validatedData['filiere'],
            'status' => 'Pinned',
            'bac_note' => $validatedData['bac_note'],
            'deplome' => $validatedData['deplome'],
            'deplome_year' => $validatedData['deplome_year'],
            'deplome_note' => $validatedData['deplome_note'],
            'file_path' => 'storage/' . $filePath,
        ]);

        return redirect()->back()->with('success', 'Inscription registered successfully');
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
