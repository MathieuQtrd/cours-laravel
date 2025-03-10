<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-xl font-bold text-center mb-6">Modifer un concert</h1>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                            @foreach($errors->all() AS $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('admin.concerts.update', $concert->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Titre</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $concert->title) }}" required class="w-full border px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea name="description" id="description" required class="w-full border px-3 py-2">{{ old('description', $concert->description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700">Date</label>
                            <input type="date" name="date" id="date" value="{{ old('date', $concert->date) }}" required class="w-full border px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-gray-700">Location</label>
                            <input type="text" name="location" id="location" value="{{ old('location', $concert->location) }}" required class="w-full border px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="capacity" class="block text-gray-700">Capacité</label>
                            <input type="text" name="capacity" id="capacity" value="{{ old('capacity', $concert->capacity) }}" required class="w-full border px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700">Prix</label>
                            <input type="text" name="price" id="price" value="{{ old('price', $concert->price) }}" required class="w-full border px-3 py-2">
                        </div>
                        @if($concert->image)
                        <img src="{{ asset('storage/' . $concert->image) }}" alt="{{ $concert->title }}" width="140">
                        @endif
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="w-full border px-3 py-2">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>