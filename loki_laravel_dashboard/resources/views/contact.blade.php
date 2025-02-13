<x-guest-layout>
    @if(session('success'))
        <p class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">{{ session('success') }}</p>
    @endif
    <form method="POST" action="{{ route('send.mail') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Subject -->
        <div class="mt-4">
            <x-input-label for="subject" :value="__('Sujet')" />
            <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required  />
            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Message -->
        <div class="mt-4">
            <x-input-label for="message" :value="__('Message')" />

            <textarea id="message" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="message" required ></textarea>

            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Nous contacter') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
