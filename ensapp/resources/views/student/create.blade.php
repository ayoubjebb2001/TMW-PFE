
@extends('layouts.auth')
 
@section('title', 'Sign up')
 
@section('content')

<form action="{{ route('student.store') }}" method="post" class="max-w-md mx-auto mt-8 bg-white p-8 rounded shadow-md">
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

    <div class="mb-6">
        <button type="submit" class="w-full bg-orange-500 text-white p-3 rounded-md hover:bg-orange-600 focus:outline-none focus:shadow-outline-orange">Sign up</button>
    </div>

    <div class="text-center text-sm">
        <p>Already have an account? <a href="{{ route('login') }}" class="text-orange-500 hover:underline">Sign in</a></p>
    </div>
</form>


@endsection