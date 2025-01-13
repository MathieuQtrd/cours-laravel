<?php 
/*

# Permet de hériter d'un layout (structure principale)
@extends('layouts.app') // Utilise le layout "app.blade.php"

---

# @section définit le contenu d'une section
@section('section_name')

    @section('content')
        <h1>Page d'accueil</h1>
    @endsection


# @yield insère ce contenu dans le layout.
@yield('section_name')

    <!-- Dans le layout -->
    @yield('content')  // Affiche le contenu défini

---

# Permet d'inclure une vue Blade dans une autre
@include('partials.navbar')  // Inclut la vue "navbar.blade.php"

---

# Instructions conditionnelles pour afficher ou masquer du contenu.
@if, @elseif, @else, @endif

    @if($user)
        <p>Bonjour, {{ $user->name }}</p>
    @else
        <p>Bienvenue, invité.</p>
    @endif

---

# Boucles pour afficher des listes d'éléments.
@for, @foreach, @forelse, @endfor, @endforeach, @empty, @endforelse

    @foreach($articles as $article)
        <p>{{ $article->title }}</p>
    @endforeach

    ---

    @forelse($articles as $article)
        <p>{{ $article->title }}</p>
    @empty
        <p>Aucun article trouvé.</p>
    @endforelse


# Utilisé pour effectuer des choix multiples (équivalent au switch en PHP)
@switch, @case, @default, @endswitch

    @switch($status)
        @case('admin')
            <p>Bienvenue, Admin !</p>
            @break
        @case('user')
            <p>Bienvenue, Utilisateur !</p>
            @break
        @default
            <p>Rôle inconnu.</p>
    @endswitch

---

# Affiche une variable PHP tout en protégeant contre les attaques XSS.
{{ }}

    <p>{{ $message }}</p>  // Affiche le contenu de $message

# Affiche du contenu brut (avec l'html)
{!! !!}

    <p>{!! $htmlMessage !!}</p>

# Pour écrire un commentaire
{{-- un commentaire --}}

# Ajoute un token CSRF (protection contre les attaques) dans les formulaires.
@csrf
    <form method="POST" action="/submit">
        @csrf
        <input type="text" name="name">
        <button type="submit">Envoyer</button>
    </form>

# Vérifie si un utilisateur est authentifié (@auth) ou invité (@guest).
@auth et @guest

    @auth
        <p>Vous êtes connecté.</p>
    @endauth

    @guest
        <p>Veuillez vous connecter pour accéder à cette page.</p>
    @endguest

---

# Affiche un message d'erreur de validation pour un champ de formulaire.
@error('field_name')

    <input type="text" name="name">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

# Vérifie si une variable est définie (@isset) ou vide (@empty).
@isset et @empty

    @isset($user)
        <p>Nom d'utilisateur : {{ $user->name }}</p>
    @endisset

    @empty($posts)
        <p>Aucun post disponible.</p>
    @endempty

# Inclut une vue uniquement si une condition est remplie.
@includeWhen($user->isAdmin, 'partials.admin-menu')

---

# Permet d’ajouter du contenu spécifique dans une pile, souvent utilisé pour insérer des scripts ou styles supplémentaires dans certaines pages.
// dans le layout
@stack('scripts') 
// Dans la vue
@push('scripts')
    <script src="/js/custom.js"></script>
@endpush

---

---------------------------
# Quelques fonctions utiles
---------------------------

# Récupère la valeur soumise d'un champ en cas d'échec de validation.
old('field_name')
    <input type="text" name="name" value="{{ old('name') }}">

# Génère l'URL vers un fichier (image, CSS, JS).
asset('path/to/file')
    <img src="{{ asset('images/logo.png') }}" alt="Logo">

# Génère l'URL d'une route nommée.
route('route_name', ['param' => value])
    <a href="{{ route('articles.show', ['id' => $article->id]) }}">Voir l'article</a>

# Génère l'URL complète d'un chemin.
<a href="{{ url('/about') }}">À propos</a>

# Retourne le token CSRF si besoin en PHP natif.
<input type="hidden" name="_token" value="{{ csrf_token() }}">
















*/

