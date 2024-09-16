@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg bg-dark-light text-light rounded-4">
                    <div class="card-header bg-orange text-brown text-center">
                        <h1 class="mb-0">{{ __('Crea il tuo ristorante!') }}</h1>
                    </div>

                    @include('shared.errors')

                    <form action="{{ route('admin.Restaurants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="business_name" class="form-label">Nome Ristorante <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control border-orange" id="business_name"
                                    name="business_name" value="{{ old('business_name') }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Indirizzo Ristorante <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control border-orange" id="address" name="address"
                                    value="{{ old('address') }}" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Scegli le tipologie del tuo ristorante: <span
                                        class="text-danger">*</span></label>
                                <div>
                                    @foreach ($types as $type)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input border-orange" type="checkbox" name="types[]"
                                                id="type-{{ $type->id }}" value="{{ $type->id }}"
                                                {{ in_array($type->id, old('types', [])) ? 'checked' : '' }} required />
                                            <label class="form-check-label"
                                                for="type-{{ $type->id }}">{{ $type->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image_path" class="form-label">Immagine del Ristorante</label>
                                <input class="form-control border-orange" type="file" id="image_path" name="image_path"
                                    value="{{ old('image_path') }}">
                            </div>

                        </div>

                        <div class="card-footer bg-orange text-end">
                            <button class="btn btn-outline-brown" type="submit">
                                Crea
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
