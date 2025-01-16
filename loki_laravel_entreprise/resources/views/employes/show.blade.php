@extends('layouts.app')

@section('title', 'create')

@section('content')
    <div class="row my-5">
        <div class="col-12">
            <h1 class="pb-3 border-bottom mb-5">Fiche de l'employé : {{ $employe->full_name }}</h1>
            {{-- @dump($employe)  --}}
           
        </div>
        <div class="col-sm-4">
            <img src="{{ $employe->photo_url }}" alt="Image de l'employé {{ $employe->full_name }}" class="img-fluid rounded">
        </div>
        <div class="col-sm-8">
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between"><strong>Nom : </strong> <span>{{ $employe->lastname }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Prénom : </strong> <span>{{ $employe->fristname }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Email : </strong> <span>{{ $employe->email }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Date d'embauche : </strong> <span>{{ $employe->hiring_date->format('d/m/Y') }}</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Salaire : </strong> <span>{{ number_format($employe->salary, 2, ',', ' ') }} €</span></li>
                <li class="list-group-item d-flex justify-content-between"><strong>Service : </strong> <span>{{ $employe->service->service_name }}</span></li>
                {{-- <li class="list-group-item d-flex justify-content-between"><strong>Service : </strong> <a href="{{ route('employes.listByService', ['service_id' => $employe->service_id]) }}">{{ $employe->service->service_name }}</a></li> --}}
                <li class="list-group-item d-flex justify-content-between"><strong>Service : </strong> <a href="{{ route('employes.listByService', $employe->service->service_name) }}">{{ $employe->service->service_name }}</a></li>
            </ul>
            <a href="{{ route('employes.index') }}" class="btn btn-success"><i class="bi bi-eye"></i> Retour à la liste</a>
            <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Modifier</a>
        </div>
    </div>
@endsection

