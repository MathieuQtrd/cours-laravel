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
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf 
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nom</label>
                            <input type="text" name="name" id="name" value="" required class="w-full border px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="" required class="w-full border px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Mot de passe</label>
                            <input type="password" name="password" id="password" value="" required class="w-full border px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-gray-700">Rôle</label>
                            <select name="role" id="role" value="" required class="w-full border px-3 py-2">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
