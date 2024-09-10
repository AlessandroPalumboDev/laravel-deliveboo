@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if ($restaurants && $restaurants->count() > 0)
                            @foreach ($restaurants as $restaurant)
                                <div class="card">
                                    <div class="card-header">
                                        {{ $restaurant->business_name }}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">ADDRESS:{{ $restaurant->address }}</h5>
                                        <h5 class="card-title">IMG:{{ $restaurant->image_path }}</h5>
                                        <a href="#" class="btn btn-primary">descrizione</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger" role="alert">
                                NON CI SONO RISTORANTI PRESENTI
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
