
@extends('layouts.app')
 
@section('title', 'Edit filiere')
 
@section('content')
    
<div class="w-[70%] mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Edit filiere details</h1>

    @if(session('Error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
    @endif

    <form class="p-6" action="{{ route('filiere.update', $filiere->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- filiere_name Input -->
        <div class="mb-4">
            <label for="filiere_name" class="block text-sm font-medium text-gray-600">Filiere name</label>
            <input type="text" name="filiere_name" id="filiere_name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ $filiere->filiere_name }}" required>
        </div>

        <!-- description Input -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea rows="10" name="description" id="description" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required> {{ $filiere->description }} </textarea>
        </div>

        <!-- Capacity Input -->
        <div class="mb-4">
            <label for="capacity" class="block text-sm font-medium text-gray-600">Capacity</label>
            <input type="number" name="capacity" id="capacity" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ $filiere->capacity }}" required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                Update filiere
            </button>
        </div>
        
    </form>
</div>

@endsection