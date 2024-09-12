@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="header-page  pb-2 mb-4">
            <div class=" d-flex justify-content-between align-items-center">
                <h1>Aggiorna post</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.Restaurants.index') }}" class="btn btn-primary" as="button">Torna alla
                        lista</a>
                </div>
            </div>

        </div>

        @include('shared.errors')



        <form action="{{ route('admin.Restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="card-body">

                <div class="mb-3">
                    <label for="title" class="form-label">Nome Ristorante</label>
                    <input type="text" class="form-control" id="business_name" name="business_name"
                        value="{{ old('business_name') }}" required />
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">indirizzo ristorante</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"
                        required />
                </div>


                {{-- <div class="mb-3">
                    <label for="title" class="form-label">Immagine Ristorante</label>
                    <input type="text" class="form-control" id="image_path" name="image_path"
                        value="{{ old('image_path') }}" />
                </div> --}}

                {{-- <div class="mb-3">
                <label for="title" class="form-label">Tipo Ristorante</label>
                <select name="type_id" class="form-select" aria-label="Default select example">
                    <option disabled selected>Scegli le tipologie del tuo ristorante</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" @if (old('type_id') == $type->id) selected @endif >{{$type->name}}</option>
                    @endforeach
                  </select>
            </div> --}}

                <div class="mb-3">
                    <label for="title" class="form-label">Scegli le tipologie del tuo ristorante:</label>

                    <div>
                        @foreach ($types as $type)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="types[]" id="ty-{{ $type->id }}"
                                    value="{{ $type->id }}"
                                    {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tec-{{ $type->id }}">{{ $type->name }}</label>
                            </div>
                        @endforeach

                    </div>
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="cover_image" name="cover_image"
                            value="{{ old('cover_image') }}">

                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.Restaurants.store') }}">
                        <button class="btn btn-outline-primary">
                            Crea
                        </button>
                    </a>
                </div>





        </form>


    </div>
@endsection
