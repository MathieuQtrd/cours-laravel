<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-xl font-bold text-center mb-6">Gestion des concerts</h1>
    
        <table class="w-full border-collapse text-left">
            <tr>
                <th class="p-3">Nom</th>
                <th class="p-3">Date</th>
                <th class="p-3">Location</th>
                <th class="p-3">Capacité</th>
                <th class="p-3">Prix</th>
                <th class="p-3">Image</th>
                <th class="p-3">Modifier</th>
                <th class="p-3">Supprimer</th>
            </tr>
            @foreach($concerts AS $concert)
                <tr class="border-b">
                    <td class="p-3">{{ $concert->title }}</td>
                    <td class="p-3">{{ $concert->date }}</td>
                    <td class="p-3">{{ $concert->location }}</td>
                    <td class="p-3">{{ $concert->capacity }}</td>
                    <td class="p-3">{{ $concert->price }}</td>
                    <td class="p-3"><img src="{{ asset('storage/' . $concert->image) }}" alt="{{ $concert->title }}" width="140"></td>
                    <td class="p-3">
                        <a href="{{ route('admin.concerts.edit', $concert->id) }}" class="bg-orange-500 text-white px-3 py-1 rounded inline-block">Modifier</a>
                    </td>
                    <td class="p-3">
                        <form action="{{ route('admin.concerts.destroy', $concert->id) }}" method="POST" class="inline-block">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" onclick="return(confirm('Etes vous sur ?'))" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>