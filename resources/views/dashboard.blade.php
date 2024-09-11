@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        @if ($restaurants && $restaurants->count() > 0)
                            {{-- {{dd($users)}} --}}

                            @foreach ($restaurants as $restaurant)
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ $restaurant->business_name }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-img">IMG:{{ $restaurant->image_path }}</h5>
                                        <p>In: {{ $restaurant->address }}</p>
                                        @foreach ($users as $user)
                                            <p>Attività di: {{ $user->name }} {{ $user->surname }} </p>
                                            <p>Partita IVA: {{ $user->p_iva }} </p>
                                        @endforeach


                                        <div class="d-flex justify-content-around py-2">
                                            <a href={{ route('admin.plates.index') }} class="btn btn-outline-primary">My
                                                Foods</a>
                                            <a href="#" class="btn btn-outline-primary">My Orders</a>
                                        </div>
                                    </div>
                                </div>

                                {{-- {{dd($restaurant)}} --}}
                            @endforeach
                        @else
                            <div class="alert alert-danger" role="alert">
                                <h3>
                                    Non hai ancora creato il tuo ristorante
                                </h3>
                                <a href="{{ route('admin.Restaurants.create') }}" class="btn btn-outline-primary">Crea
                                    Ristorante</a>
                            </div>
                        @endif








                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
