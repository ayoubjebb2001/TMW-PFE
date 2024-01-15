
@extends('layouts.app')
 
@section('title', 'New teacher')
 
@section('content')
    
<div class="w-[70%] mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Create a Teacher Profile</h1>

    <form class="p-6" action="{{route('teacher.store')}}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
            <input type="text" name="prenom" id="first_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>
    
        <div class="mb-4">
            <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
            <input type="text" name="nom" id="last_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="naissance" class="block text-gray-700 text-sm font-bold mb-2">date naissance</label>
            <input type="date" name="date_naissance" id="naissance" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">adresse</label>
            <input type="text" name="adresse" id="adresse" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">phone</label>
            <input type="text" name="phone" id="phone" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>
    
        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>

        <!-- Specialization Select -->
        <div class="mb-4">
            <label for="specialization" class="block text-sm font-medium text-gray-600">Specialization</label>
            <select name="specialization" id="specialization" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                @foreach ($modules as $module)
                    <option value="{{ $module->id}}"> {{$module->module_name }} </option>
                @endforeach
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