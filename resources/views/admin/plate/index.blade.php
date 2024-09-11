@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if ($plates && $plates->count() > 0)
                            @foreach ($plates as $plate)
                                <div class="row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">{{ $plate->name }}</h4>
                                            </div>
                                            <div class="card-body">
{{-- 
                                                <div class="card-img">
                                                    <img :src="{{$plate->cover_image}}" :alt="{{ $plate->name }}">
                                                </div> --}}
                                                
                                                <div class="card-text mb-3">
                                                    <h6>Descrizione:</h6>
                                                    <p>{{ $plate->description }}</p>
                                                </div>
                                                <div class="card-text mb-3">
                                                    <h6>Ingredienti:</h6>
                                                    <p>{{ $plate->ingredients }}</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            
                            
                        </div>
                        
                    </div>
                    <a href="{{ route('admin.plates.create') }}" class="btn btn-outline-primary">aggiungi un piatto</a>
                @else
                    <div class="alert alert-danger" role="alert">
                        <h3>
                            Non hai ancora alcun piatto nel menu
                        </h3>
                        <a href="{{ route('admin.plates.create') }}" class="btn btn-outline-primary ">aggiungi
                            un piatto</a>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
