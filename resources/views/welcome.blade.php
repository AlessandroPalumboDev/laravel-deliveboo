@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">


            @auth
            <div class="text-center">
                <button class="btn btn-outline-primary btn-lg" type="button"><a class="nav-link" href="{{ route('admin.Restaurants.index') }}">{{ __('Vai al tuo risotrante') }}</a></button>
            </div>
            @endauth
            
            @guest
            <h1 class="display-5 fw-bold">
                Benvenuto 
            </h1>

            <p class="col-md-8 fs-4">
                Accedi o registrati per iniziare a gestire il tuo ristorarente
            </p>
            <button class="btn btn-primary btn-lg" type="button"><a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a></button>
            <button class="btn btn-primary btn-lg" type="button"><a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a></button>
            @endguest
        </div>
    </div>

    
@endsection
