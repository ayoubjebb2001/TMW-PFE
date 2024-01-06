
@extends('layouts.app')
 
@section('title', 'Edit teacher')
 
@section('content')
    
<div class="w-[70%] mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Create a Teacher Profile</h1>

    <form class="p-6" action="" method="POST">
        @csrf

        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <!-- Phone Input -->
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-600">Phone</label>
            <input type="tel" name="phone" id="phone" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>

        </div>

        <!-- Specialization Select -->
        <div class="mb-4">
            <label for="specialization" class="block text-sm font-medium text-gray-600">Specialization</label>
            <select name="specialization" id="specialization" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="frontend">Frontend Developer</option>
                <option value="backend">Backend Developer</option>
                <option value="fullstack">Fullstack Developer</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                Create Profile
            </button>
        </div>
    </form>
</div>

@endsection