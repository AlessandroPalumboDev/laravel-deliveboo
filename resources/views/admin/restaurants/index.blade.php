@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if ($restaurants && $restaurants->count() > 0)
                    @foreach ($restaurants as $restaurant)
                        <div class="card mb-4 shadow-lg  rounded-3 bg-dark-light text-white">

                            <!-- Header Arancione -->
                            <div class="card-header bg-orange text-brown">
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
                                    <p class="card-text "><span class="orange">Indirizzo:</span> {{ $restaurant->address }}</p>

                                    @foreach ($users as $user)
                                        <p class="card-text"><span class="orange">Proprietario:</span> <strong>{{ $user->name }}
                                                {{ $user->surname }}</strong></p>
                                        <p class="card-text"><span class="orange">Partita IVA:</span> <strong>{{ $user->p_iva }}</strong></p>
                                    @endforeach

                                    <div class="d-flex gap-3">
                                        <a href="{{ route('admin.Plates.index') }}" class="btn btn-outline-orange">I miei
                                            Piatti</a>
                                        <a href="#" class="btn btn-outline-orange">I miei Ordini</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Arancione -->
                            <div class="card-footer bg-orange d-flex justify-content-between">
                                <a href="{{ route('admin.Restaurants.edit', $restaurant) }}"
                                    class="btn btn-outline-brown">Modifica</a>

                                <!-- Bottone Elimina -->
                                <button type="button" class="btn btn-brown" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    Elimina
                                </button>
                            </div>
                        </div>

                        <!-- Modal Elimina -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content border-danger bg-dark-light text-light">
                                    <div class="modal-header border-danger ">
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
                <div class="card bg-dark-light shadow-lg rounded-3">   
                    <div class="card-body text-center">
                     
                        <h4 class="text-light">Non hai ancora creato il tuo ristorante!</h4>
                        <p class="text-light">Clicca qui sotto per creare subito il tuo ristorante e iniziare a vendere.</p>
                        <a href="{{ route('admin.Restaurants.create') }}" class="btn btn-outline-orange btn-lg">Crea il tuo
                            Ristorante</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
