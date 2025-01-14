@extends('layouts.app') <!-- appel du layout : layouts/app.blade.php -->

@section('title', 'Contacts') <!-- title de la page  -->

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Affichage des Contacts</h1>
            <hr>            
            <!-- affichage du message flash -->
            @if($contacts->isEmpty())
                <p class="alert alert-success">Aucun contacts</p>
            @else
                @dump($contacts)
            @endif
        </div>
    </div>

@endsection