@extends('layouts.app')

@section('title', 'create')

@section('content')
    <div class="row my-5">
        <div class="col-12">
            <h1 class="pb-3 border-bottom">Ajouter un employé</h1>
            @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() AS $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('employes.store') }}" class="form border p-3" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="lastname">Nom</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="">
                </div>
                <div class="mb-3">
                    <label for="fristname">Prénom</label>
                    <input type="text" name="fristname" id="fristname" class="form-control" value="">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="">
                </div>
                <div class="mb-3">
                    <label for="salary">Salaire</label>
                    <input type="text" name="salary" id="salary" class="form-control" value="">
                </div>
                <div class="mb-3">
                    <label for="hiring_date">Date d'embauche</label>
                    <input type="date" name="hiring_date" id="hiring_date" class="form-control" value="">
                </div>
                <div class="mb-3">
                    <label for="service_id">Service</label>
                    <select name="service_id" id="service_id" class="form-control">
                        <option value="" disabled>Choisir</option>
                        @foreach($services AS $service)
                        <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection

