@extends('layouts.app')

@section('content')
@vite(['resources/js/validation/addressValidation.js'])

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg bg-dark-light text-light rounded-4">
                    <div class="card-header bg-orange text-brown text-center">
                        <h1 class="mb-0">{{ __('Modifica il tuo ristorante!') }}</h1>
                    </div>

                    @include('shared.errors')

                    <form id="form-crea-ristorante" action="{{ route('admin.Restaurants.update', $restaurant->slug) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            {{-- {{dd($restaurant)}} --}}

                            <div class="mb-3">
                                <label for="business_name" class="form-label">Nome Ristorante <span class="text-danger">*</span></label>
                                <input type="text" class="form-control border-orange" id="business_name"
                                    name="business_name" value="{{ old('business_name', $restaurant->business_name) }}" required/>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Indirizzo Ristorante <span class="text-danger">*</span></label>
                                <input type="text" class="form-control border-orange" id="address" name="address"
                                    value="{{ old('address', $restaurant->address) }}" required/>
                            </div>
                            <div id="errore-indirizzo" class="d-none text-danger ">
                                <span>
                                    Indirizzo già occupato da un altro ristorante
                                </span>
                            </div>

                        
                            <div class="mb-3">
                                <label class="form-label">Scegli le tipologie del tuo ristorante: <span class="text-danger">*</span></label>
                                <div>
                                    <div class="input-group mb-3">
                                        @foreach ($types as $type)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input border-orange 
                                                    @error('types') is-invalid @enderror" 
                                                    type="checkbox" name="types[]" id="type-{{ $type->id }}" 
                                                    value="{{ $type->id }}" {{ in_array($type->id, old('types', [])) ? 'checked' : '' }} />
                                                <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Mostra messaggio di errore se nessuna checkbox è selezionata -->
                                    @error('types')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image_path" class="form-label">Immagine del Ristorante</label>
                                <input class="form-control border-orange" type="file" id="image_path"
                                    name="image_path">
                                <img src="{{ asset('storage/' . $restaurant->image_path) }}" alt="Piatto"
                                    class="img-fluid mt-3" style="max-height: 200px;">
                            </div>

                        </div>

                        <div class="card-footer bg-orange text-end d-flex justify-content-between">
                            </button>
                            <a href="{{ route('admin.Restaurants.index') }}" class="btn btn-outline-brown"
                                as="button">Torna al Ristorante</a>
                            <script>
                                // Rendi disponibile l'array degli indirizzi come variabile globale
                                window.restaurantAddresses = @json($restaurantAddresses);
                            </script>
                            <button id="crea-ristorante" class="btn btn-outline-brown" type="submit">
                                Modifica

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
