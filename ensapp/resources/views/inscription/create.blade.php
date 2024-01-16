
@extends('layouts.web')
 
@section('title', 'New inscription')
 
@section('content')
    <div class="mt-6">
    
        <h1 class="ml-10 text-3xl font-bold mb-6">New inscription.</h1>
        <div class="w-[70%] mx-auto bg-white p-6 rounded-md shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Inscription table</h1>

            <form class="p-6" action="{{ route("inscription.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Filiere Select -->
                <div class="mb-4">
                    <label for="filiere" class="block text-sm font-medium text-gray-600">Filiere: </label>
                    <select name="filiere" id="filiere" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                        @forelse ($filieres as $filiere)
                            <option value="{{ $filiere->id }}">{{ $filiere->filiere_name }}</option>
                        @empty
                            <option>No filiere</option>
                        @endforelse
                        
                    </select>
                </div>

                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" required>

                <!-- user Input -->
                <div class="mb-4">
                    <label for="user_name" class="block text-sm font-medium text-gray-600">Prenom</label>
                    <input type="text" name="prenom" id="prenom" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ $user->prenom }}" required readonly>
                </div>

                <div class="mb-4">
                    <label for="user_nom" class="block text-sm font-medium text-gray-600">Nom</label>
                    <input type="text" name="nom" id="nom" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ $user->nom }}" required readonly>
                </div>

                <div class="mb-4">
                    <label for="CIN" class="block text-sm font-medium text-gray-600">CIN</label>
                    <input type="text" name="CIN" id="CIN" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ $user->CIN }}" required readonly>
                </div>

                <!-- email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ $user->email }}" required readonly>
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-600">Phone</label>
                    <input type="text" name="phone" id="phone" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ $user->phone }}" required readonly>
                </div>

                <div class="mb-4">
                    <label for="deplome" class="block text-sm font-medium text-gray-600">Deplome:</label>
                    <input type="text" name="deplome" id="deplome" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <div class="mb-4">
                    <label for="deplome_year" class="block text-sm font-medium text-gray-600">Deplome year:</label>
                    <input type="number" min="2019" max="2025" name="deplome_year" id="deplome_year" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <div class="mb-4">
                    <label for="bac_note" class="block text-sm font-medium text-gray-600">Bac note:</label>
                    <input type="number" min="10" max="20" name="bac_note" id="bac_note" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <div class="mb-4">
                    <label for="deplome_note" class="block text-sm font-medium text-gray-600">Deplome note:</label>
                    <input type="number" min="10" max="20" name="deplome_note" id="deplome_note" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-600">Files and documents:</label>
                    <input type="file" name="file" id="file" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                        Inscription
                    </button>
                </div>

            </form>
            
        </div>

    </div>

@endsection