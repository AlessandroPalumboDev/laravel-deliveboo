@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg bg-dark-light text-light rounded-3">
                    <div class="card-header card-header-orange text-brown text-center">
                        <h1 class="mb-0 text-capitalize">{{ $plate->name }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('storage/' . $plate->cover_image) }}" class="img-fluid my-4" style="max-height: 300px"
                                alt="Immagine del piatto">
                        </div>
                        <h4 class="orange text-capitalize">Descrizione:</h4>
                        <p>{{ $plate->description }}</p>

                        <h4 class="orange text-capitalize">Ingredienti:</h4>
                        <p class="text-capitalize">{{ $plate->ingredients }}</p>

                        <h4 class="orange">Prezzo:</h4>
                        <p>{{ $plate->price }} €</p>
                    </div>
                    <div class="card-footer card-footer-orange text-brown text-end">
                        <a href="{{ route('admin.Plates.index') }}" class="btn btn-outline-brown">Torna ai piatti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
