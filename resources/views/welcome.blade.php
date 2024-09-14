@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 m-4 bg-dark-light rounded-3">
            @auth
            <div class="mb-3 text-center">
                <button class="btn btn-outline-orange btn-lg" type="button">
                    <a class="nav-link"
                        href="{{ route('admin.Restaurants.index') }}">{{ __('Vai al tuo ristorante') }}</a>
                </button>
            </div>
            @endauth

            @guest
                <h1 class="display-5 fw-bold orange">
                    Benvenuto
                </h1>

                <p class="col-md-8 fs-4 text-orange">
                    Accedi o registrati per iniziare a gestire il tuo ristorante
                </p>

                <button class="btn btn-orange btn-lg" type="button">
                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                </button>

                <button class="btn btn-orange btn-lg ms-3" type="button">
                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                </button>
            @endguest
    </div>
@endsection
