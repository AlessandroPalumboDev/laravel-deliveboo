@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">
                            crea il tuo piatto
                        </h1>
                    </div>
                    @include('shared.errors')
                    <form action="{{ route('admin.plates.store') }}" method="POST">
                        @csrf

                        <div class="card-body">


                            <div class="mb-3">
                                <label for="name" class="form-label">Nome del piatto</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">descrizione</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="{{ old('description') }}" />
                            </div>

                            <div class="mb-3">
                                <label for="ingredients" class="form-label">ingredienti</label>
                                <input type="text" class="form-control" id="ingredients" name="ingredients"
                                    value="{{ old('ingredients') }}" />
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Prezzo del piatto</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ old('price') }}" required />

                            </div>

                            <div class="mb-3">
                                <input class="form-check-input" type="checkbox" name="is_vegetarian" id="is_vegetarian"
                                    value="1" {{ old('is_vegetarian') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_vegetarian">È vegetariano?</label>
                            </div>
                            <div class="mb-3">
                                <label for="is_vegan " class="form-label"></label>
                                <input class="form-check-input" type="checkbox" name="is_vegan "
                                    @if ('checked') value={{ 'is_vegan' }} @endif id="is_vegan ">
                                <label class="form-check-label" for="is_vegan ">è vegano? </label>
                            </div>

                            <div class="mb-3">
                                <label for="is_gluten_free" class="form-label"></label>
                                <input class="form-check-input" type="checkbox" name="is_gluten_free"
                                    @if ('checked') value={{ 'is_gluten_free' }} @endif
                                    id="is_gluten_free">
                                <label class="form-check-label" for="is_gluten_free">è senza glutine? </label>
                            </div>

                            <div class="mb-3">
                                <label for="is_lactose_free" class="form-label"></label>
                                <input class="form-check-input" type="checkbox" name="is_lactose_free"
                                    @if ('checked') value={{ 'is_lactose_free' }} @endif
                                    id="is_lactose_free">
                                <label class="form-check-label" for="is_lactose_free">è senza lattosio? </label>
                            </div>

                            <div class="mb-3">
                                <label for="is_spicy" class="form-label"></label>
                                <input class="form-check-input" type="checkbox" name="is_spicy" id="is_spicy"
                                    @if ('checked') value={{ 'is_spicy' }} @endif>
                                <label class="form-check-label" for="is_spicy">è piccante? </label>
                            </div>
                        </div>

                </div>
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="cover_image" name="cover_image"
                        value="{{ old('image_path') }}">

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


        </div>
    </div>
    </div>
@endsection
