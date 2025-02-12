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
                    <a href="{{ route('client.projects.index') }}" class="bg-violet-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        Retour
                    </a>
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
                    
                    
                    <table class="w-full border-collapse text-left">
                        <tr class="border-b">
                            <th class="p-3">Développeurs</th>
                        </tr>
                        @foreach($project->developers AS $developer)
                            <tr class="border-b">
                                <td class="p-3">{{ $developer->name }}</td>                                
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
