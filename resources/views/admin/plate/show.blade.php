@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-orange rounded">
                    <div class="card-header card-header-orange text-white text-center">
                        <h1 class="mb-0">{{ $plate->name }}</h1>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $plate->cover_image) }}" class="img-fluid mb-4"
                            alt="Immagine del piatto">
                        <h4 class="orange">Descrizione:</h4>
                        <p>{{ $plate->description }}</p>

                        <h4 class="orange">Ingredienti:</h4>
                        <p>{{ $plate->ingredients }}</p>

                        <h4 class="orange">Prezzo:</h4>
                        <p>{{ $plate->price }} €</p>
                    </div>
                    <div class="card-footer card-footer-orange text-white text-end">
                        <a href="{{ route('admin.Plates.index') }}" class="btn btn-outline-light">Torna ai piatti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
