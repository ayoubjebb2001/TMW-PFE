
@extends('layouts.auth')
 
@section('title', 'Sign in')
 
@section('content')

<form action="" method="post" class="max-w-md mx-auto mt-20 bg-white p-8 rounded shadow-md">

    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
        <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-6">
        <button type="submit" class="w-full bg-orange-500 text-white p-3 rounded-md hover:bg-orange-600 focus:outline-none focus:shadow-outline-orange">Sign in</button>
    </div>

    <div class="text-center text-sm">
        <p>Don't have an account? <a href="{{ route('students.signup') }}" class="text-orange-500 hover:underline">Sign up</a></p>
    </div>

</form>


@endsection