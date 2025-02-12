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
                    @if(session('success'))
                    <p class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">{{ session('success') }}</p>
                    @endif
                    @if(session('error'))
                    <p class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">{{ session('error') }}</p>
                    @endif

                    <table class="w-full border-collapse text-left border">
                        <tr class="border">
                            <th class="p-3 border">Titre</th>
                            {{-- <th class="p-3 border">Description</th> --}}
                            <th class="p-3 border">Client</th>
                            <th class="p-3 border">Créateur</th>
                            <th class="p-3 border">Développeurs</th>
                            <th class="p-3 border">Status</th>
                            <th class="p-3 border">Détails</th>
                        </tr>
                        @foreach($projects AS $project)
                            <tr class="border">
                                <td class="p-3 border">{{ $project->title }}</td>
                                {{-- <td class="p-3 border">{{ $project->description }}</td> --}}
                                <td class="p-3 border">{{ $project->client->name }}</td>
                                <td class="p-3 border">{{ $project->owner->name }}</td>
                                <td class="p-3 border">
                                    @if(!$project->developers->isEmpty())
                                        {{ $project->developers->pluck('name')->join(', ') }}
                                    @else 
                                    <span class="text-red-400">Aucun développeur pour le moment</span>
                                    @endif
                                </td>
                                <td class="p-3 border">{{ $project->status }}</td>
                                <td class="p-3 border"><a href="{{ route('developpeur.projects.show', $project->id) }}" class="bg-teal-500 text-white px-3 py-1 rounded inline-block">Détails</a></td>
                            </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
