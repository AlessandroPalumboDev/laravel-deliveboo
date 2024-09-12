@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">{{ __('I tuoi piatti.') }}</h3>
                    </div>

                    <div class="card-body">
                        @if ($plates && $plates->count() > 0)
                            <div class="d-flex flex-column">
                                @foreach ($plates as $plate)
                                    <div class="mb-4">
                                        <div class="card shadow-sm border-0 rounded">
                                            <div class="card-header bg-secondary text-white">
                                                <h4 class="card-title mb-0">{{ $plate->name }}</h4>
                                            </div>
                                            <div class="card-body">
                                                {{-- 
                                                <div class="card-img mb-3">
                                                    <img src="{{ $plate->cover_image }}" alt="{{ $plate->name }}" class="img-fluid rounded">
                                                </div> 
                                                --}}

                                                <div class="card-text mb-3">
                                                    <h6 class="font-weight-bold">Descrizione:</h6>
                                                    <p>{{ $plate->description }}</p>
                                                </div>
                                                <div class="card-text mb-3">
                                                    <h6 class="font-weight-bold">Ingredienti:</h6>
                                                    <p>{{ $plate->ingredients }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('admin.plates.create') }}" class="btn btn-success mt-3">Aggiungi un piatto</a>
                        @else
                            <div class="alert alert-warning text-center">
                                <h3 class="alert-heading">Non hai ancora alcun piatto nel menu</h3>
                                <a href="{{ route('admin.plates.create') }}" class="btn btn-success">Aggiungi un piatto</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
