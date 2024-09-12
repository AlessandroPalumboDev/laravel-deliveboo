@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if ($restaurants && $restaurants->count() > 0)
                            @foreach ($restaurants as $restaurant)
                                <div class="card mb-4 shadow-lg border-primary rounded">

                                    <div class="card-header bg-primary text-white">
                                        <h3 class="mb-0">Il tuo ristorante</h3>
                                    </div>

                                    <div class="card-body d-flex g-0">

                                        <div class="card-img my-3">
                                            <img src="{{ asset('storage/' . $restaurant->image_path) }}" class="img-fluid rounded-start">
                                        </div> 

                                        <div class="col-md-8 my-3 ms-3">
                                            <h4 class="card-title text-primary">{{ $restaurant->business_name }}</h4>
                                            <p class="card-text text-muted">Indirizzo: {{ $restaurant->address }}</p>
                                            @foreach ($users as $user)
                                                <p class="card-text">Gestito da: <strong>{{ $user->name }}
                                                        {{ $user->surname }}</strong></p>
                                                <p class="card-text">Partita IVA: <strong>{{ $user->p_iva }}</strong> </p>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    <div class="card-footer bg-primary  d-flex justify-content-between">
                                            <a href="{{ route('admin.plates.index') }}" class="btn btn-outline-light">I miei Piatti</a>
                                            <a href="#" class="btn btn-outline-light">I miei Ordini</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning text-center">
                                <h4 class="alert-heading">Non hai ancora creato il tuo ristorante!</h4>
                                <p>Clicca qui sotto per creare subito il tuo ristorante e iniziare a vendere.</p>
                                <a href="{{ route('admin.Restaurants.create') }}" class="btn btn-primary">Crea
                                    Ristorante</a>
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection
