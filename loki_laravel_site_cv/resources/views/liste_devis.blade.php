@extends('layouts.app') <!-- appel du layout : layouts/app.blade.php -->

@section('title', 'Contacts') <!-- title de la page  -->

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Affichage des Devis</h1>
            <hr>            
            <!-- affichage du message flash -->
            @if($devis->isEmpty())
                <p class="alert alert-success">Aucun Devis</p>
            @else
                {{-- @dump($contacts) --}}
                {{-- @dd($contacts) --}}
                <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>email</th>
                        <th>sujet</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                    @foreach($devis AS $ligne)
                        <tr>
                         {{-- @dump($contact) --}}
                            <td>{{ $ligne->id }}</td>
                            <td>{{ $ligne->name }}</td>
                            <td>{{ $ligne->email }}</td>
                            <td>{{ $ligne->subject }}</td>
                            <td>{{ $ligne->message }}</td>
                            <td>{{ $ligne->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

@endsection