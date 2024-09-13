@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-success shadow-lg rounded">
                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($restaurants && $restaurants->count() > 0)
                            <div class="mb-3">
                                <button class="btn btn-light btn-lg" type="button">
                                    <a class="nav-link"
                                        href="{{ route('admin.Restaurants.index') }}">{{ __('Vai al tuo ristorante') }}</a>
                                </button>
                            </div>
                        @else
                            <div class="alert alert-warning text-center">
                                <h4 class="alert-heading">Non hai ancora creato il tuo ristorante!</h4>
                                <p>Clicca qui sotto per creare subito il tuo ristorante e iniziare a vendere.</p>
                                <a href="{{ route('admin.Restaurants.create') }}" class="btn btn-primary">Crea il tuo
                                    Ristorante</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
