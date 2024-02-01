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
        $user = Auth::user();
        $acceptedInscription = $user->inscriptions->where('status', 'Accepted')->first();

        if ($acceptedInscription) {
            $filiere = $acceptedInscription->filiere;
            $modules = $filiere->modules()->orderBy('duration')->get();

            return view('inscription.index', compact('filiere', 'modules'));
        } else {

            $inscriptions = Inscription::all();
            return view('student.index', compact('inscriptions'));
        }

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

        $score = ($validatedData['bac_note'] + $validatedData['deplome_note'])/2;
        $data = [
            'user_id' => $validatedData['user_id'],
            'filiere_id' => $validatedData['filiere'],
            'status' => 'Pinned',
            'bac_note' => $validatedData['bac_note'],
            'deplome' => $validatedData['deplome'],
            'deplome_year' => $validatedData['deplome_year'],
            'deplome_note' => $validatedData['deplome_note'],
            'file_path' => 'storage/' . $filePath,
            'score' => $score
        ];

        Inscription::create($data);

        return redirect()->to('home')->with('success', 'Inscription registered successfully');
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

    public function list()
    {

        $filieres = Filiere::with(['inscriptions' => function ($query) {
            $query->where('status', 'Pinned')->orWhere('status','Refused')->orderBy('score', 'desc')->limit(60);
        }])->get();

        $inscriptions = $filieres->flatMap(function ($filiere) {
            return $filiere->inscriptions;
        });
        return view('teacher.inscription.list', compact('filieres', 'inscriptions'));
    }

    public function students()
    {
        $filieres = Filiere::with(['inscriptions' => function ($query) {
            $query->where('status', 'Accepted')->orderBy('score', 'desc');
        }])->get();

        $inscriptions = $filieres->flatMap(function ($filiere) {
            return $filiere->inscriptions;
        });

        return view('teacher.inscription.student', compact('filieres', 'inscriptions'));
    }
    public function action(Request $request){
    if (auth::user()->role->role_name === 'chef'){

        // Get the filiere IDs associated with the selected inscriptions
        $filiereIds = Inscription::whereIn('id', $request->input('inscriptions'))
            ->pluck('filiere_id')
            ->unique()
            ->toArray();

        // Check if accepting these inscriptions will exceed the capacity for any filiere
        foreach ($filiereIds as $filiereId) {
            $filiere = Filiere::findOrFail($filiereId);
            $acceptedCount = Inscription::where('filiere_id', $filiereId)
                ->where('status', 'Accepted')
                ->count();

            // Compare the accepted count with the filiere capacity
            if ($acceptedCount > $filiere->capacity) {
                return redirect()->back()->with('error', 'Accepting these inscriptions will exceed the capacity for one or more filieres.');
            }
        }

        // If capacity is not exceeded, update the inscription statuses
        Inscription::whereIn('id', $request->input('inscriptions'))->update(['status' => 'Accepted']);
        Inscription::whereNotIn('id', $request->input('inscriptions'))->update(['status' => 'Refused']);

        return redirect()->back()->with('success', 'Status updated successfully');
    }
    }
}