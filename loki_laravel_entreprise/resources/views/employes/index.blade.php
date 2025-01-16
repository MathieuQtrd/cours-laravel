@extends('layouts.app')

@section('title', 'create')

@section('content')
    <div class="row my-5">
        <div class="col-12">
            <h1 class="pb-3 border-bottom">Liste des employés</h1>
            @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Nom prénom</th>
                        <th>Email</th>
                        <th>Date d'embauche</th>
                        <th>Service</th>
                        <th>Détails</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employes AS $employe)
                        <tr>
                            <td><img src="{{ $employe->photo_url }}" class="img-thumbnail" style="width: 50px"></td>
                            <td>{{ $employe->full_name }}</td>
                            <td>{{ $employe->email }}</td>
                            <td>{{ $employe->hiring_date->format('d/m/Y') }}</td>
                            <td>{{ $employe->service->service_name }}</td>
                            <td><a href="{{ route('employes.show', $employe->id) }}"><i class="bi bi-eye btn btn-success"></i></a></td>
                            <td><a href="{{ route('employes.edit', $employe->id) }}"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                            <td>
                                <form action="{{ route('employes.destroy', $employe->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return(confirm('Etes vous sûr ?'))"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

