
@extends('layouts.app')
 
@section('title', 'Teachers')
 
@section('content')
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <div class="flex justify-between items-center bg-white dark:bg-gray-900 p-4">
    
 

        <button class="bg-gray-50 dark:bg-gray-700 py-2 px-8 rounded-sm"><a class="dark:text-slate-300 text-gray-700" href="{{ route('teacher.create') }}">Add new teacher</a></button>

    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom et prénom
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Specialisation
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $teacher->user->nom." ".$teacher->user->prenom }}
                </th>
                <td class="px-6 py-4">
                    {{ $teacher->user->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $teacher->Specialization }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline px-3">Delete</a>

                </td>
            </tr>
            @endforeach    
        </tbody>
    </table>
</div>

@endsection