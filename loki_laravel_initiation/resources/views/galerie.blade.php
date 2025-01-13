@extends('layouts.app') <!-- appel du layout : layouts/app.blade.php -->

@section('title', 'Galerie') <!-- title de la page  -->

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Mentions légales</h1>
    </div>
    <div class="col-sm-4 mb-3">
        <img src="https://cdn.pixabay.com/photo/2025/01/03/06/55/cortina-dampezzo-9307295_1280.jpg" alt="" class="img-thumbnail">
    </div>
    <div class="col-sm-4 mb-3">
        <img src="https://cdn.pixabay.com/photo/2022/09/05/16/17/baltic-sea-7434540_1280.jpg" alt="" class="img-thumbnail">
    </div>
    <div class="col-sm-4 mb-3">
        <img src="https://cdn.pixabay.com/photo/2022/04/01/12/00/welding-7104637_1280.jpg" alt="" class="img-thumbnail">
    </div>
    <div class="col-sm-4 mb-3">
        <img src="{{ asset('images/image1.webp') }}" alt="" class="img-thumbnail">
    </div>
    <div class="col-sm-4 mb-3">
        <img src="{{ asset('images/image2.webp') }}" alt="" class="img-thumbnail">
    </div>
    <div class="col-sm-4 mb-3">
        <img src="{{ asset('images/image3.webp') }}" alt="" class="img-thumbnail">
    </div>
</div>
@endsection