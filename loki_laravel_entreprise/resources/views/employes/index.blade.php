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
                       
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection

