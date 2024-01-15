
@extends('layouts.app')
 
@section('title', 'Chefs')
 
@section('content')
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    @if(session('Error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
    @endif

    <div class="flex justify-between items-center bg-white dark:bg-gray-900 p-4">
    
        <button class="bg-gray-50 dark:bg-gray-700 py-2 px-8 rounded-sm"><a class="dark:text-slate-300 text-gray-700" href="{{ route('chef.create') }}">Add new chef</a></button>
    
        <button class="bg-gray-50 dark:bg-gray-700 py-2 px-8 rounded-sm"><a class="dark:text-slate-300 text-gray-700" href="{{ route('teacher.create') }}">Add new teacher</a></button>

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
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Prenom
                </th>
                <th scope="col" class="px-6 py-3">
                    CIN
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Specialization
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($chefs as $chef)
            
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ $chef->nom }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $chef->prenom }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $chef->CIN }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $chef->phone }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $chef->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $chef->role->Specialization }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('teacher.edit', $chef->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                        <form action="{{ route('teacher.destroy', $chef->id) }}" method="post">
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