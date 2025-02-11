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

                    <a href="{{ route('admin.roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        Ajouter un rôle
                    </a>

                    <table class="w-full border-collapse text-left">
                        <tr class="border-b">
                            <th class="p-3">Nom</th>
                            <th class="p-3">Permissions</th>
                            <th class="p-3">Action</th>
                            <th class="p-3">Supprimer</th>
                        </tr>
                        @foreach($roles AS $role)
                            <tr class="border-b">
                                <td class="p-3">{{ $role->name }}</td>
                                <td class="p-3">
                                    @foreach($role->permissions as $permission)
                                     {{-- @dump($permission->name) --}}
                                    {{ $permission->name }}<br>
                                    @endforeach
                                </td>                                
                                <td class="p-3">
                                    <a href="{{ route('admin.roles.show', $role->id) }}"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                </td>
                                <td class="p-3">
                                   
                                        <form action="{{ route('admin.roles.delete', $role->id) }}" method="POST">
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
