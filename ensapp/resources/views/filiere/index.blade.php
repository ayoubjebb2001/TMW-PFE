
@extends('layouts.app')
 
@section('title', 'Filieres')
 
@section('content')
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    @if(session('Error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
    @endif

    <h4 class="text-2xl">List de filieres</h4>
    <div class="flex justify-between items-center bg-white dark:bg-gray-900 p-4">
    
        <div class="">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
            </div>
        </div>

        <button class="bg-gray-50 dark:bg-gray-700 py-2 px-8 rounded-sm"><a class="dark:text-slate-300 text-gray-700" href="{{ route('filiere.create') }}">Add new filier</a></button>

    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Filiere name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Capacity
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($filieres as $filiere)
            
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ $filiere->filiere_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $filiere->description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $filiere->capacity }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('filiere.edit', $filiere->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                        <form action="{{ route('filiere.destroy', $filiere->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>

            @empty
            
                <tr>
                    <td>No records yet.</td>
                </tr>

            @endforelse

            
        </tbody>
    </table>
</div>

@endsection