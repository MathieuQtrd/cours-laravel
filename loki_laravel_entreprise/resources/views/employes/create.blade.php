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
            <form action="" class="form border p-3" method="post">
                @csrf
                <div class="mb-3">
                    <label for="service_name">Nom service</label>
                    <input type="text" name="service_name" id="" class="form-control" value="">
                </div>
                <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection

