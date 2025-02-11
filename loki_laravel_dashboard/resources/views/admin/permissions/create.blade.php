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
                    <a href="{{ route('admin.permissions.index') }}" class="bg-violet-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        Retour
                    </a>
                    @if($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                            @foreach($errors->all() AS $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('admin.permissions.store') }}" method="POST">
                        @csrf 
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Permission</label>
                            <input type="text" name="name" id="name" value="" required class="w-full border px-3 py-2">
                        </div>                        
                        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
