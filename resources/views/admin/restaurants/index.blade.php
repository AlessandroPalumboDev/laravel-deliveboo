@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if ($restaurants && $restaurants->count() > 0)
                    @foreach ($restaurants as $restaurant)
                        <div class="card mb-4 shadow-lg border-orange rounded">

                            <!-- Header Arancione -->
                            <div class="card-header bg-orange text-white">
                                <h3 class="mb-0">Il tuo ristorante</h3>
                            </div>

                            <div class="card-body d-flex g-0">

                                <!-- Immagine del ristorante -->
                                <div class="card-img my-3">
                                    <img src="{{ asset('storage/' . $restaurant->image_path) }}"
                                        class="img-fluid rounded-start">
                                </div>

                                <div class="col-md-8 my-3 ms-3">
                                    <!-- Titoli Arancioni -->
                                    <h4 class="card-title orange">{{ $restaurant->business_name }}</h4>
                                    <h4 class="card-title orange">ID Ristorante: {{ $restaurant->id }}</h4>
                                    <h4 class="card-title orange">ID Utente: {{ $restaurant->user_id }}</h4>
                                    <p class="card-text text-muted">Indirizzo: {{ $restaurant->address }}</p>

                                    @foreach ($users as $user)
                                        <p class="card-text">Gestito da: <strong>{{ $user->name }}
                                                {{ $user->surname }}</strong></p>
                                        <p class="card-text">Partita IVA: <strong>{{ $user->p_iva }}</strong></p>
                                    @endforeach

                                    <div class="d-flex gap-3">
                                        <a href="{{ route('admin.plates.index') }}" class="btn btn-orange">I miei
                                            Piatti</a>
                                        <a href="#" class="btn btn-orange">I miei Ordini</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Arancione -->
                            <div class="card-footer bg-orange d-flex justify-content-between">
                                <a href="{{ route('admin.Restaurants.edit', $restaurant) }}"
                                    class="btn btn-outline-light">Modifica</a>

                                <!-- Bottone Elimina -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    Elimina
                                </button>
                            </div>
                        </div>

                        <!-- Modal Elimina -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content border-danger">
                                    <div class="modal-header border-danger">
                                        <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel">Elimina Ristorante
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Sei proprio sicuro di voler eliminare il tuo ristorante? Questa azione sarà
                                            irreversibile!</p>
                                    </div>
                                    <div class="modal-footer border-danger">
                                        <button type="button" class="btn btn-outline-orange"
                                            data-bs-dismiss="modal">Annulla</button>

                                        <form action="{{ route('admin.Restaurants.destroy', $restaurant) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">
                        <h4 class="alert-heading">Non hai ancora creato il tuo ristorante!</h4>
                        <p>Clicca qui sotto per creare subito il tuo ristorante e iniziare a vendere.</p>
                        <a href="{{ route('admin.Restaurants.create') }}" class="btn btn-orange">Crea il tuo Ristorante</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
