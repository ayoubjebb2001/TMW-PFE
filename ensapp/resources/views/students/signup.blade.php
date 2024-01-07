
@extends('layouts.auth')
 
@section('title', 'Sign up')
 
@section('content')

<form action="" method="post" class="max-w-md mx-auto mt-20 bg-white p-8 rounded shadow-md">

    <h1 class="mx-auto text-center font-extrabold text-2xl mb-4">Create your account</h1>

    <div class="mb-4">
        <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
        <input type="text" name="first_name" id="first_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
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
        <p>Already have an account? <a href="{{ route('students.signin') }}" class="text-orange-500 hover:underline">Sign in</a></p>
    </div>

</form>


@endsection