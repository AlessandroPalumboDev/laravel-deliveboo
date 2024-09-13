@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                @if ($restaurants && $restaurants->count() > 0)
                    @foreach ($restaurants as $restaurant)
                        <div class="card mb-4 shadow-lg border-primary rounded">

                            <div class="card-header bg-primary text-white">
                                <h3 class="mb-0">Il tuo ristorante</h3>
                            </div>

                            <div class="card-body d-flex g-0">

                                <div class="card-img my-3">
                                    <img src="{{ asset('storage/' . $restaurant->image_path) }}"
                                        class="img-fluid rounded-start">
                                </div>

                                <div class="col-md-8 my-3 ms-3">
                                    <h4 class="card-title text-primary">{{ $restaurant->business_name }}</h4>
                                    <h4 class="card-title text-primary">id ristorante: {{ $restaurant->id }}</h4>
                                    <h4 class="card-title text-primary">id uente: {{ $restaurant->user_id }}</h4>
                                    <p class="card-text text-muted">Indirizzo: {{ $restaurant->address }}</p>
                                    @foreach ($users as $user)
                                        <p class="card-text">Gestito da: <strong>{{ $user->name }}
                                                {{ $user->surname }}</strong></p>
                                        <p class="card-text">Partita IVA: <strong>{{ $user->p_iva }}</strong> </p>
                                    @endforeach
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('admin.Plates.index') }}" class="btn btn-outline-primary">I
                                            miei
                                            Piatti</a>
                                        <a href="#" class="btn btn-outline-primary">I miei Ordini</a>

                                    </div>

                                </div>
                            </div>

                            <div class="card-footer bg-primary  d-flex justify-content-between">
                                <a href={{ route('admin.Restaurants.edit', $restaurant) }}
                                    class="btn btn-outline-light">Modifica</a>




                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    Elimina
                                </button>



                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content  border-danger">
                                    <div class="modal-header  border-danger">
                                        <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel">Elimina Ristorante
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Sei proprio sicuro di voler eliminare il tuo ristorante?
                                            Questa azione sarà irreversibile!
                                        </p>
                                    </div>
                                    <div class="modal-footer  border-danger ">

                                        <button type="button" class="btn btn-outline-primary"
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
                        <a href="{{ route('admin.Restaurants.create') }}" class="btn btn-primary">Crea il tupo
                            Ristorante</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>



@endsection
