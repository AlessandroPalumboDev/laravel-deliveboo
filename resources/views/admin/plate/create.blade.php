@extends('layouts.app')

@section('content')
@vite(['resources/js/validation/plateCreateValidation.js'])

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('admin.Plates.index') }}">
                    <button class="btn btn-outline-orange   mb-3">
                        Indietro
                    </button>
                </a>
                <div class="card shadow-lg rounded-3 bg-dark-light text-light">
                    <div class="card-header card-header-orange text-center ">
                        <h1 class="mb-0">{{ __('Crea il tuo piatto') }}</h1>
                    </div>

                    @include('shared.errors')

                    <form id="form-crea-piatto" action="{{ route('admin.Plates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nome del piatto <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control border-orange" id="name" name="name"
                                    value="{{ old('name') }}" required />
                            </div>
                            <div class='text-center text-danger mt-2 d-none' id="error-name">
                                Campo Obbligatorio
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <input type="text" class="form-control border-orange" id="description"
                                    name="description" value="{{ old('description') }}" />
                            </div>

                            <div class="mb-3">
                                <label for="ingredients" class="form-label">Ingredienti <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control border-orange" id="ingredients"
                                    name="ingredients" value="{{ old('ingredients') }}" />
                                    {{-- messaggio di errore --}}
                                    <div id="errore-ingredienti" class="d-none text-danger text-center">
                                        <span>
                                            Campo Obbligatorio
                                        </span>
                                    </div>
                            </div>

                            <div class="mb-4">
                                <label for="price" class="form-label">Prezzo del piatto <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control border-orange" id="price" name="price"
                                    value="{{ old('price') }}" required step="0.01" min="0.01" />
                            </div>
                            {{-- messaggio di errore --}}
                            <div id="errore-price" class="d-none text-danger text-center mb-3">
                                <span>
                                    Campo Obbligatorio
                                </span>
                            </div>

                            <div class="d-flex gap-4 mb-3 flex-wrap">
                                <div class="mb-3 form-check">
                                    <input class="form-check-input border-orange" type="checkbox" name="is_vegetarian"
                                        id="is_vegetarian" value="1" {{ old('is_vegetarian') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_vegetarian">Vegetariano</label>
                                </div>

                                <div class="mb-3 form-check">
                                    <input class="form-check-input border-orange" type="checkbox" name="is_vegan"
                                        value="1" {{ old('is_vegan') ? 'checked' : '' }} id="is_vegan">
                                    <label class="form-check-label" for="is_vegan">Vegano</label>
                                </div>

                                <div class="mb-3 form-check">
                                    <input class="form-check-input border-orange" type="checkbox" name="is_gluten_free"
                                        value="1" {{ old('is_gluten_free') ? 'checked' : '' }} id="is_gluten_free">
                                    <label class="form-check-label" for="is_gluten_free">Senza Glutine</label>
                                </div>

                                <div class="mb-3 form-check">
                                    <input class="form-check-input border-orange" type="checkbox" name="is_lactose_free"
                                        value="1" {{ old('is_lactose_free') ? 'checked' : '' }} id="is_lactose_free">
                                    <label class="form-check-label" for="is_lactose_free">Senza Lattosio</label>
                                </div>

                                <div class="mb-3 form-check">
                                    <input class="form-check-input border-orange" type="checkbox" name="is_spicy"
                                        value="1" {{ old('is_spicy') ? 'checked' : '' }} id="is_spicy">
                                    <label class="form-check-label" for="is_spicy">Piccante</label>
                                </div>

                            </div>
                            <div class="mb-3 form-check">
                                <input class="form-check-input border-orange" type="checkbox" name="is_visible"
                                    value="1" {{ old('is_visible') ? 'checked' : '' }} id="is_visible">
                                <label class="form-check-label" for="is_visible">Visibile</label>
                            </div>

                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Immagine del Piatto</label>
                                <input class="form-control  border-orange" type="file" id="cover_image"
                                    name="cover_image" value="{{ old('cover_image') }}">

                            </div>
                        </div>

                        <div class="card-footer card-footer-orange d-flex justify-content-between">
                            <a href="{{ route('admin.Plates.index') }}">
                                <button type="button" class="btn btn-outline-brown" >
                                    Annulla
                                </button>
                            </a>
                            <button id="crea-piatto" class="btn btn-outline-brown" type="submit">
                                Crea
                            </button>
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
    </div>
@endsection
