
@extends('layouts.app')
 
@section('title', 'New filiere')
 
@section('content')
    
<div class="w-[70%] mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Create new filiere</h1>

    <form class="p-6" action="{{ route("filiere.store") }}" method="POST">
        @csrf

        <!-- filiere_name Input -->
        <div class="mb-4">
            <label for="filiere_name" class="block text-sm font-medium text-gray-600">Filiere name</label>
            <input type="text" name="filiere_name" id="filiere_name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <!-- description Input -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea rows="10" name="description" id="description" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required></textarea>
        </div>

        <!-- Capacity Input -->
        <div class="mb-4">
            <label for="capacity" class="block text-sm font-medium text-gray-600">Capacity</label>
            <input type="number" name="capacity" id="capacity" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                Create filiere
            </button>
        </div>
    </form>
    
</div>

@endsection