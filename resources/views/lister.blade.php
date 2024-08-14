@extends('layouts.todo')
@section('content')
{{-- <form action="{{route('store')}}" method="post">
    @csrf
    <div class='flex items-center justify-center bg-black p-10'>
        <div class="flex items-center max-w-md mx-auto bg-white rounded-lg " x-data="{ search: '' }">
            <div class="w-full">
                <input type="text" class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                    placeholder="Ajoutez une tâche" x-model="search" name="tache">
            </div>
            
            <div>
                <button type="submit" class="flex items-center bg-blue-500 justify-center w-20 h-12 text-white rounded-r-lg"
                    :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                    :disabled="search.length == 0">
                    Ajouter
                </button>
            </div>
        </div>
    </div>
    @session('valid')
        <div class="alert alert-dismissible alert-success">
            <strong>{{session('valid')}}</strong>
        </div>
    @endsession
</form>
<!-- This is an example component -->
<div class="max-w-2xl mx-auto">

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
        <table class="w-full text-sm text-left text-gray-500">
            
            <tbody>
                @forelse ($tasks as $rowTask)
                    @if ($rowTask->state == 0)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$rowTask->tache}}
                            </th>
                            <td class="px-6 py-4">
                                <a href="{{route('update', $rowTask)}}" class='middle none center rounded-lg bg-orange-500 py-3 px-6 font-sans text-xs font-bold uppercase text-black shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none'>Réalisée</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route('destroy', $rowTask)}}" class='middle none center rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-black shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none'>Supprimer</a>
                            </td>
                        </tr>
                    @else
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap line-through">
                                {{$rowTask->tache}}
                            </th>
                            <td class="px-6 py-4">
                                <a href="{{route('update', $rowTask)}}" class='middle none center rounded-lg bg-orange-500 py-3 px-6 font-sans text-xs font-bold uppercase text-black shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none'>Non réalisée</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route('destroy', $rowTask)}}" class='middle none center rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-black shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none'>Supprimer</a>
                            </td>
                        </tr>
                    @endif
                    
                @empty
                    
                @endforelse
                
            </tbody>
        </table>
    
    </div>
    
</div> --}}

<div class="w-full h-screen bg-gray-100 pt-8">
    <div class="bg-white p-3 max-w-md mx-auto">
        <div class="text-center">
            <h1 class="text-3xl font-bold">ToDo ECF</h1>
            <div class="mt-4 flex">
                <form class="flex" action="{{route('store')}}" method="post">
                    @csrf
                    <input
                        class="w-80 border-b-2 border-gray-500 text-black"
                        name="tache"
                        type="text" placeholder="Entrer votre tâche" 
                    />
                    <input class="ml-2 border-2 border-green-500 p-2 text-green-500 hover:text-white hover:bg-green-500 rounded-lg" type="submit" value="Ajouter">  
                </form>
            </div>        
            @session('valid')
            <div>
                <strong>{{session('valid')}}</strong>
            </div>
        @endsession
        </div>
        <div class="mt-8">
            <ul>
                @forelse ($tasks as $rowTask)
                    <li class="p-2 rounded-lg" >
                        <div class="flex align-middle flex-row justify-between">
                            @if ($rowTask->state == 0)
                                <div class="p-2">
                                    <p class="text-lg text-black">{{$rowTask->tache}}</p>
                                </div>
                                <a href="{{route("update", $rowTask)}}" class="flex text-green-500 border-2 border-green-500 p-2 rounded-lg">   
                                    <span>Réaliser</span>
                                </a>
                            @else
                                <div class="p-2">
                                    <p class="text-lg line-through text-gray-400">{{$rowTask->tache}}</p>
                                </div>
                                <a href="{{route("update", $rowTask)}}" class="flex text-red-500 border-2 border-red-500 p-2 rounded-lg">   
                                    <span>Non réaliser</span>
                                </a>
                            @endif
                            <a href="{{route("destroy", $rowTask)}}" class="flex text-red-500 border-2 border-red-500 p-2 rounded-lg">
                                <span>Supprimer</span>
                            </a>
                        </div>
                        <hr class="mt-2"/>
                    </li>
                @empty
                <h3>Vous n'avez aucune tâches a réaliser</h3>
                @endforelse
        </div>
        <div class="mt-8">
            <a href="{{route('destroyIfRealised')}}" class="border-2 border-red-500 p-2 text-red-500">
                Supprimer les tâches réalisées
            </a>
            <a href="{{route('destroyAll')}}" class="border-2 border-indigo-500 p-2 text-indigo-500 ml-4">
                Réinitialiser la liste
            </a>
        </div>
    </div>    
</div>
@endsection

