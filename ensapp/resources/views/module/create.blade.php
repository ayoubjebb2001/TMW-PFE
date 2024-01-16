
@extends('layouts.app')
 
@section('title', 'New module')
 
@section('content')
    
<div class="w-[70%] mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Add module for {{ $filiere->filiere_name }}</h1>

    <form class="p-6" action="{{ route("module.store") }}" method="POST">
        @csrf

        <!-- Teacher Select -->
        <div class="mb-4">
            <label for="teacher" class="block text-sm font-medium text-gray-600">Teacher</label>
            <select name="teacher" id="teacher" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                @forelse ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->nom }} {{ $teacher->prenom }}</option>
                @empty
                    <option>No teachers</option>
                @endforelse
                
            </select>
        </div>

        <input type="hidden" name="filiere" id="filiere" value="{{ $filiere->id }}" required>

        <!-- module_name Input -->
        <div class="mb-4">
            <label for="module_name" class="block text-sm font-medium text-gray-600">Module name</label>
            <input type="text" name="module_name" id="module_name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <!-- description Input -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea rows="10" name="description" id="description" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required></textarea>
        </div>

        <!-- Capacity Input -->
        <div class="mb-4">
            <label for="duration" class="block text-sm font-medium text-gray-600">Duration</label>

            <select name="duration" id="duration" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                
                <option value="1 semester">Semester 1</option>
                <option value="2 semester">Semester 2</option>
                <option value="3 semester">Semester 3</option>
                <option value="4 semester">Semester 4</option>
                <option value="5 semester">Semester 5</option>
                <option value="6 semester">Semester 6</option>
                
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                Create module
            </button>
        </div>

    </form>
    
</div>

@endsection