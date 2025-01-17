@extends('layouts.back')

@section('title', 'Création de catégorie')

@section('sidebar')

@endsection

@section('content')
    <div class="row my-5">
        <div class="col-12">
            <h1 class="pb-3 border-bottom mb-5">Ajouter une catégorie</h1>
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
            <form action="{{ route('categories.store') }}" class="form border p-3" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="" class="form-control">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection