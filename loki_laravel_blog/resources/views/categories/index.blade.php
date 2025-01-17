@extends('layouts.back')

@section('title', 'liste des catégories')

@section('sidebar')

@endsection

@section('content')
<div class="row my-5">
    <div class="col-12">
        <h1 class="pb-3 border-bottom mb-5">Liste des catégories</h1>
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories As $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><img src="{{ $category->image_url }}" alt="" style="width: 100px"></td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><a href="{{ route('categories.edit', $category->id) }}"><i class="bi bi-trash btn btn-warning"></i></a></td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return(confirm('Etes vous sûr ?'))"><i class="bi bi-pencil-square"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection