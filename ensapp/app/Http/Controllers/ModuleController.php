<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Module;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::with(['modules' => function ($query) {
            $query->orderBy('duration');
        }])->get();
    
        return view('module.index', compact('filieres'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $filiere = Filiere::findOrFail($id);
        $teachers = User::whereHas('role', function($query){
            $query->where('role_name', 'teacher')->orWhere('role_name', 'chef');
        })->get();
        
        return view('module.create', compact('filiere', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth::user()->role->role_name == 'chef'){
   
            $request->validate([
                'module_name' => 'required|unique:modules,module_name',
                'description' => 'required|string',
                'duration' => 'required|string',
                'teacher' => 'required|numeric',
                'filiere' => 'required|numeric',
            ]);

            Module::create([
                'user_id' => $request->input('teacher'),
                'filiere_id' => $request->input('filiere'),
                'module_name' => $request->input('module_name'),
                'description' => $request->input('description'),
                'duration' => $request->input('duration'),
            ]);
            
            return redirect()->back()->with('success', 'Filiere registered successfully');
        
        }else {
            
            return redirect()->back()->with('Error', 'You do not have the rights to access this method.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module, $id)
    {
        $filiere = Filiere::findOrFail($id);
        $teachers = User::whereHas('role', function($query){
            $query->where('role_name', 'teacher')->orWhere('role_name', 'chef');
        })->get();
        
        return view('module.edit', compact('module', 'filiere', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        if (auth()->user()->role->role_name == 'chef') {
    
            $request->validate([
                'module_name' => 'required|unique:modules,module_name,' . $module->id,
                'description' => 'required|string',
                'duration' => 'required|string',
                'teacher' => 'required|numeric',
                'filiere' => 'required|numeric',
            ]);

            $module->update([
                'user_id' => $request->input('teacher'),
                'filiere_id' => $request->input('filiere'),
                'module_name' => $request->input('module_name'),
                'description' => $request->input('description'),
                'duration' => $request->input('duration'),
            ]);

            return redirect()->route('module.index')->with('Success', 'Module updated successfully');
            
        } else {
            
            return redirect()->route('module.index')->with('Error', 'You do not have the rights to access this method.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        if (auth::user()->role->role_name == 'chef'){

            $module->delete();
            return redirect()->back()->with('Success', 'Deleted successfully.');

        }else {
            return redirect()->back()->with('Error', 'You do not have the rights to access this method.');

        }
    }
}
