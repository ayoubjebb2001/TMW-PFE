
@extends('layouts.app')
 
@section('title', 'Dashboard')
 
@section('content')
    <h1 class="text-3xl font-bold underline px-12 py-6">
        {{ Auth::user()->prenom }} {{ Auth::user()->nom }} {{ Auth::user()->role->role_name }}
    </h1>
@endsection