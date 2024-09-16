@extends('layouts.app')

@section('content')
    {{-- <form action="{{ route('admin.Restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf --}}
    {{-- <a href="{{ route('admin.Restaurants.index') }}" class="btn btn-primary" as="button">Torna al
                        Ristorante</a> --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg bg-dark-light text-light rounded-4">
                    <div class="card-header bg-orange text-brown text-center">
                        <h1 class="mb-0">{{ __('Modifica il tuo ristorante!') }}</h1>
                    </div>

                    @include('shared.errors')

                    <form action="{{ route('admin.Restaurants.update', $restaurant->slug) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            {{-- {{dd($restaurant)}} --}}

                            <div class="mb-3">
                                <label for="business_name" class="form-label">Nome Ristorante </label>
                                <input type="text" class="form-control border-orange" id="business_name"
                                    name="business_name" value="{{ old('business_name', $restaurant->business_name) }}" />
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Indirizzo Ristorante </label>
                                <input type="text" class="form-control border-orange" id="address" name="address"
                                    value="{{ old('address', $restaurant->address) }}" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Scegli le tipologie del tuo ristorante: </label>
                                <div>
                                    @foreach ($types as $type)
                                        <div class="form-check form-check-inline">


                                            <input class="form-check-input border-orange" type="checkbox" name="types[]"
                                                value="{{ $type->id }}" id="{{ $type->id }}"
                                                @if (old('types', $restaurant->types->pluck('id')->toArray()) &&
                                                        in_array($type->id, old('types', $restaurant->types->pluck('id')->toArray()))) checked @endif>
                                            <label class="form-check-label"
                                                for="{{ $type->id }}">{{ $type->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image_path" class="form-label">Immagine del Ristorante</label>
                                <input class="form-control border-orange" type="file" id="image_path" name="image_path"
                                    value="{{ old('image_path', $restaurant->image_path) }}">
                            </div>

                        </div>

                        <div class="card-footer bg-orange text-end d-flex justify-content-between">
                            <button class="btn btn-outline-brown" type="submit">
                                Modifica
                            </button>
                            <a href="{{ route('admin.Restaurants.index') }}" class="btn btn-outline-brown"
                                as="button">Torna al Ristorante</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
