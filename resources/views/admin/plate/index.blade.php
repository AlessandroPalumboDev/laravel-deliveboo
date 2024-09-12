@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row">
            <h3 class="mb-4 text-center text-primary">I tuoi piatti</h3>
            
            <div class="col text-center">
                <a href="{{ route('admin.plates.create') }}" class="btn btn-outline-primary   mb-3">Aggiungi un piatto</a>
            </div>
        </div>
        <div class="row justify-content-center gap-3">
            

                        @if ($plates && $plates->count() > 0)
                                @foreach ($plates as $plate)

                                    <div class="card p-1 col-3 shadow-sm border-primary rounded">
    
                                                <img src="{{ asset('storage/' . $plate->cover_image) }}" class="card-img-top mb-3">
                                            
    
                                        <div class="card-body">
                                            <h4 class="card-title text-primary ">{{ $plate->name }}</h4>
              
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
                                

                                
                                @endforeach
                            
                        @else
                            <div class="alert alert-warning text-center">
                                <h3 class="alert-heading">Non hai ancora alcun piatto nel menu</h3>
                                <a href="{{ route('admin.plates.create') }}" class="btn btn-primary">Aggiungi un piatto</a>
                            </div>
                        @endif
            
        </div>
    </div>
@endsection
