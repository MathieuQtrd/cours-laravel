<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Événements' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans">

    <nav class="bg-gray-800 p-4 text-white flex justify-between">
        <div class="max-w-4xl mx-auto flex space-x-4">
            <a href="{{ route('concerts.index') }}" class="text-lg font-bold">Accueil</a>
            <a href="{{ route('concerts.index') }}" class="text-lg font-bold hover:underline">Tous les concerts</a>
        </div>
        <div class="space-x-4">
            @auth
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                <a href="{{ route('register') }}" class="hover:underline">Register</a>
            @endauth
        </div>
    </nav>

    <main class="max-w-4xl mx-auto p-6">
        {{ $slot }}
    </main>

</body>
</html>