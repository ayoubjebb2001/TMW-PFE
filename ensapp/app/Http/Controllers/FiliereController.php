<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('filiere.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filiere.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth::user()->role->role_name == 'chef'){
   
            // Validate the incoming request data
            $request->validate([
                'filiere_name' => 'required|unique:filieres,filiere_name',
                'description' => 'required|string',
                'capacity' => 'required|numeric',
            ]);

            // Create a new user
            Filiere::create([
                'filiere_name' => $request->input('filiere_name'),
                'description' => $request->input('description'),
                'capacity' => $request->input('capacity'),
            ]);
            
            // Redirect or return a response
            return redirect()->route('filiere.index')->with('success', 'Filiere registered successfully');
        
        }else {
            
            return redirect()->route('filiere.index')->with('Error', 'You do not have the rights to access this method.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        return view('filiere.edit', compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filiere $filiere)
    {
        if (auth::user()->role->role_name == 'chef') {
            $request->validate([
                'filiere_name' => 'required|unique:filieres,filiere_name,' . $filiere->id,
                'description' => 'required|string',
                'capacity' => 'required|numeric',
            ]);

            $filiere->update([
                'filiere_name' => $request->input('filiere_name'),
                'description' => $request->input('description'),
                'capacity' => $request->input('capacity'),
            ]);

            return redirect()->route('filiere.index')->with('success', 'Filiere updated successfully');

        } else {
            return redirect()->route('filiere.index')->with('error', 'You do not have the rights to access this method.');

        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        if (auth::user()->role->role_name == 'chef'){

            $filiere->delete();
            return redirect()->back()->with('Success', 'Deleted successfully.');

        }else {
            return redirect()->back()->with('Error', 'You do not have the rights to access this method.');

        }
    }
}
