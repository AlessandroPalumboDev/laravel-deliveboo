@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">{{ __('I tuoi ristoranti.') }}</h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h5 class="mb-4">{{ __('Sei loggato!') }}</h5>

                        @if ($restaurants && $restaurants->count() > 0)
                            @foreach ($restaurants as $restaurant)
                                <div class="card mb-4 shadow-sm border-0 rounded">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ $restaurant->image_path }}" class="img-fluid rounded-start"
                                                alt="Restaurant Image">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h4 class="card-title text-success">{{ $restaurant->business_name }}</h4>
                                                <p class="card-text text-muted">Indirizzo: {{ $restaurant->address }}</p>
                                                @foreach ($users as $user)
                                                    <p class="card-text">Gestito da: <strong>{{ $user->name }}
                                                            {{ $user->surname }}</strong></p>
                                                    <p class="card-text">Partita IVA: <strong>{{ $user->p_iva }}</strong>
                                                    </p>
                                                @endforeach
                                                <div class="d-flex justify-content-between mt-4">
                                                    <a href="{{ route('admin.plates.index') }}"
                                                        class="btn btn-outline-success">I miei Piatti</a>
                                                    <a href="#" class="btn btn-outline-success">I miei Ordini</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning text-center">
                                <h4 class="alert-heading">Non hai ancora creato il tuo ristorante!</h4>
                                <p>Clicca qui sotto per creare subito il tuo ristorante e iniziare a vendere.</p>
                                <a href="{{ route('admin.Restaurants.create') }}" class="btn btn-success">Crea
                                    Ristorante</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
