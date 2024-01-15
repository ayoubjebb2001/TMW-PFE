
@extends('layouts.auth')
 
@section('title', 'Sign up')
 
@section('content')

<form action="{{ route('student.store') }}" method="post" class="max-w-md mx-auto mt-8 bg-white p-8 rounded shadow-md">

    @csrf

    <div class="mb-4">
        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
        <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
        <input type="text" name="lastname" id="lastname" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="cin" class="block text-gray-700 text-sm font-bold mb-2">CIN</label>
        <input type="text" name="CIN" id="CIN" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
        <input type="text" name="phone" id="phone" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
        <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-6">
        <button type="submit" class="w-full bg-orange-500 text-white p-3 rounded-md hover:bg-orange-600 focus:outline-none focus:shadow-outline-orange">Sign up</button>
    </div>

    <div class="text-center text-sm">
        <p>Already have an account? <a href="{{ route('login') }}" class="text-orange-500 hover:underline">Sign in</a></p>
    </div>

</form>


@endsection