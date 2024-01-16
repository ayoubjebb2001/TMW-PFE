
@extends('layouts.app')
 
@section('title', 'New course')
 
@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-danger">
            {{ session('success') }}
        </div>
    @endif

<div class="w-[70%] mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Add course for {{ $module->module_name }}</h1>

    <form class="p-6" action="{{ route("course.store") }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="module" id="module" value="{{ $module->id }}" required>

        <!-- module_name Input -->
        <div class="mb-4">
            <label for="course_name" class="block text-sm font-medium text-gray-600">Course name</label>
            <input type="text" name="course_name" id="course_name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <!-- description Input -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea rows="10" name="description" id="description" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required></textarea>
        </div>

        <!-- Duration Input -->
        <div class="mb-4">
            <label for="duration" class="block text-sm font-medium text-gray-600">Duration (heurs)</label>
            <input type="number" name="duration" id="duration" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <!-- Files Input -->
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-600">Files</label>
            <input type="file" name="file" id="file" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                Create course
            </button>
        </div>

    </form>
    
</div>

@endsection