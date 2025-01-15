@extends('layouts.app')

@section('title', 'create')

@section('content')
    <div class="row my-5">
        <div class="col-12">
            <h1 class="pb-3 border-bottom">Liste des services</h1>
            @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services As $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->service_name }}</td>
                            <td><a href="{{ route('services.edit', $service->id) }}"><i class="bi bi-trash btn btn-warning"></i></a></td>
                            <td><i class="bi bi-pencil-square btn btn-danger"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

