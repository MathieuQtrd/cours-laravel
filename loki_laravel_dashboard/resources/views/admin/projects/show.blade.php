<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('admin.projects.index') }}" class="bg-violet-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        Retour
                    </a>
                    @if(session('success'))
                        <p class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">{{ session('success') }}</p>
                    @endif
                    @if(session('error'))
                        <p class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">{{ session('error') }}</p>
                    @endif
                    @if($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                            @foreach($errors->all() AS $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <h1 class="text-2xl font-bold mb-4">Projet : {{ $project->title }}</h1>
                    <p class="p-3 border rounder mb-3">
                        Créateur du projet : {{ $project->owner->name }}
                    </p>
                    <p class="p-3 border rounder mb-3">
                        Client : {{ $project->client->name }}
                    </p>
                    <p class="p-3 border rounder mb-3">
                        {{ $project->description }}
                    </p>





                    <form action="{{ route('admin.projects.addDeveloper', $project->id) }}" method="POST">
                        @csrf 
                        <div class="mb-4">
                            <p class="text-xl mb-2">Developpeurs disponibles</p>
                            <select name="developer_id" id="developer_id" value="" required class="w-full border px-3 py-2">
                                @foreach($availableDevelopers as $developer)
                                <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded">Ajouter un développeur</button>
                    </form>
                    <table class="w-full border-collapse text-left">
                        <tr class="border-b">
                            <th class="p-3">Développeur</th>
                            <th class="p-3">Supprimer</th>
                        </tr>
                        {{-- @dump($project) --}}
                        @foreach($project->developers AS $developer)
                            <tr class="border-b">
                                <td class="p-3">{{ $developer->name }}</td>
                                <td class="p-3">
                                    <form action="{{ route('admin.projects.removeDeveloper', [$project->id, $developer->id]) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" onclick="return(confirm('Etes vous sur ?'))" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
