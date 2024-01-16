
@extends('layouts.app')
 
@section('title', 'Edit module')
 
@section('content')
    
<div class="w-[70%] mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Edit filiere details</h1>

    @if(session('Error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
    @endif

    <form class="p-6" action="{{ route('module.update', $module->id) }}" method="POST">
        @csrf
        @method('PUT')

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

        <input type="hidden" name="filiere" id="filiere" value="{{ $module->filiere_id }}" required>

        <!-- module_name Input -->
        <div class="mb-4">
            <label for="module_name" class="block text-sm font-medium text-gray-600">Module name</label>
            <input type="text" name="module_name" id="module_name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ $module->module_name }}" required>
        </div>

        <!-- description Input -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea rows="10" name="description" id="description" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required> {{ $module->description }} </textarea>
        </div>

        <!-- Capacity Input -->
        <div class="mb-4">
            <label for="duration" class="block text-sm font-medium text-gray-600">Duration</label>
            <input type="number" name="duration" id="duration" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ $module->duration }}" required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                Update module
            </button>
        </div>
        
    </form>
</div>

@endsection