
@extends('layouts.web')
 
@section('title', 'Modules')
 
@section('content')
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-8">
    
    @if(session('Error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
    @endif

    @if(session('Success'))
        <div class="alert alert-danger">
            {{ session('Success') }}
        </div>
    @endif

    <h4 class="text-2xl my-4 mx-4">List de module la filieres {{ $filiere->filiere_name }}</h4>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Filiere nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Capacity
                </th>
            </tr>
        </thead>
        <tbody>
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
            </tr>
        </tbody>
    </table>

    <br>
    <br>
        
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Module nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Duration (total heurs)
                </th>
                <th scope="col" class="px-6 py-3">
                    Courses
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
        
            @forelse ($modules as $module)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $module->module_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $module->description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $module->duration }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('module.show',$module->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show courses</a>
                        <br>
                        <a href="{{ route('course.create', ['id' => $module->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Add course</a>
                        
                    </td>
                    <td class="px-6 py-4">
                        
                        <a href="{{ route('module.edit', ['module' => $module->id, 'id' => $filiere->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>


                        <form action="{{ route('module.destroy', $module->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                
                @empty

                No records.
        
            @endforelse
        </tbody>
    </table>

</div>

@endsection