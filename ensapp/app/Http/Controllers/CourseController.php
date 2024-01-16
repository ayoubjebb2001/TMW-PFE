<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use App\Models\Filiere;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::all();

        $modules = Module::with(['modules' => function ($query) {
            $query->orderBy('duration');
        }])->get();
    
        return view('module.index', compact('filieres', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $module = Module::findOrFail($id);

        return view('course.create', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth::user()->role->role_name == 'chef'){
   
            $request->validate([
                'course_name' => 'required|string',
                'description' => 'required|string',
                'duration' => 'required|string',
                'file' => 'required|mimes:pdf,docx,doc,ppt,pptx',
                'module' => 'required|numeric',
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            Course::create([
                'module_id' => $request->input('module'),
                'course_name' => $request->input('course_name'),
                'description' => $request->input('description'),
                'duration' => $request->input('duration'),
                'file_path' => 'storage/' . $filePath,
            ]);
            
            return redirect()->back()->with('success', 'Course registered successfully');

        }else {

            return redirect()->back()->with('error', 'You do not have the rights to access this method.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        if (auth()->user()->role->role_name == 'chef') {
    
            $request->validate([
                'course_name' => 'required|string',
                'description' => 'required|string',
                'duration' => 'required|string',
                'file' => 'required|mimes:pdf,docx,doc,ppt,pptx',
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $course->update([
                'course_name' => $request->input('course_name'),
                'description' => $request->input('description'),
                'duration' => $request->input('duration'),
                'file_path' => 'storage/' . $filePath,
            ]);

            return redirect()->route('module.show', $course->module_id)->with('success', 'Course updated successfully');
            
        } else {
            
            return redirect()->route('module.show', $course->module_id)->with('error', 'You do not have the rights to access this method.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if (auth::user()->role->role_name == 'chef'){

            $course->delete();
            return redirect()->back()->with('success', 'Deleted successfully.');

        }else {
            return redirect()->back()->with('error', 'You do not have the rights to access this method.');

        }
    }
}
