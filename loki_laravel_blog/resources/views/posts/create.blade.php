@extends('layouts.back')

@section('title', 'Création d\'article')

@section('sidebar')

@endsection

@section('content')
<div class="row my-5">
    <div class="col-12">
        <h1 class="pb-3 border-bottom mb-5">Ajouter un article</h1>
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
        <form action="{{ route('posts.store') }}" class="form border p-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">Titre</label>
                <input type="text" name="title" id="" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="author">Auteur</label>
                <input type="text" name="author" id="" class="form-control" value="{{ old('author') }}">
            </div>
            <div class="mb-3">
                <label for="category_id">Catégorie</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="" disabled>Choisir</option>
                    @foreach($categories AS $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price">Prix</label>
                <input type="text" name="price" id="" class="form-control" value="{{ old('price') }}">
            </div>
            <div class="mb-3">
                <label for="event_date">Date</label>
                <input type="date" name="event_date" id="" class="form-control" value="{{ old('event_date') }}">
            </div>
            <div class="mb-3">
                <label for="main_img">Image principale</label>
                <input type="file" name="main_img" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="" class="form-control" value="{{ old('slug') }}">
            </div>
            <div class="mb-3">
                <label for="content">Contenu</label>
                <textarea name="content" id="" class="form-control">{{ old('content') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="short_content">Résumé</label>
                <textarea name="short_content" id="" class="form-control">{{ old('short_content') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="publish_date">Date de publication</label>
                <input type="date" name="publish_date" id="" class="form-control" value="{{ old('publish_date') }}">
            </div>
            <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
        </form>
    </div>
</div>
@endsection