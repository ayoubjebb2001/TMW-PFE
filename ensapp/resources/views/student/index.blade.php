
@extends('layouts.web')
 
@section('title', 'ENS Ecole Normale Superieur')
 
@section('content')
<div class="px-12 py-6">
    
    <div class="pb-8 pt-4">
        <img src="{{ asset('images/ens.jpg') }}" class="w-full h-[450px] rounded-lg" alt="">
    </div>

    <h1 class="text-3xl font-semibold">
        @auth
            Welcome @if(Auth::user()->nom and Auth::user()->prenom)
                {{ Auth::user()->nom }} {{ Auth::user()->prenom }}...
            @endif
        @endauth
    </h1>

    <h4 class="mt-8 mb-2 text-xl">votre liste d'inscriptions</h4>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
        <div class="flex justify-between items-center bg-white dark:bg-gray-900 p-4">
    
            <button class="bg-gray-50 dark:bg-gray-700 py-2 px-8 rounded-sm"><a class="dark:text-slate-300 text-gray-700" href="{{ route('inscription.create') }}">New inscription</a></button>
    
        </div>
    
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
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
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Filiere
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Resultat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($inscriptions as $inscription)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $inscription->user->nom }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $inscription->user->prenom }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $inscription->user->CIN }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inscription->user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inscription->user->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inscription->filiere->filiere_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $inscription->status }}
                        </td>
                        <td class="px-6 py-4">

                            @if ($inscription->status == "Accepted")
                                <a href="{{ route('inscription.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View modules</a>
                                <br>
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View calander</a>
                            @endif
                            
                        </td>
                    </tr>

                    @empty
                        <tr>
                            <td>No inscriptions.</td> 
                        </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection