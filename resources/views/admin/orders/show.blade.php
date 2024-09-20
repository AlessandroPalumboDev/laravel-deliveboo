@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-orange mb-4">Torna agli Ordini</a>

    <h2 class="text-white">Ordine di  {{ $order->name }} {{$order->surname}}</h2>

    <div class="card bg-dark-light text-white">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-dark-light text-light"><strong class="text-orange">Nome Cliente: </strong> {{ $order->name }} {{$order->surname}}</li>
                <li class="list-group-item bg-dark-light text-light"><strong class="text-orange">Indirizzo Cliente: </strong> {{ $order->delivery_address }}</li>
                <li class="list-group-item bg-dark-light text-light"><strong class="text-orange">Stato: </strong> {{ $order->order_status }}</li>
                <li class="list-group-item bg-dark-light text-light"><strong class="text-orange">Totale: </strong> €{{ $order->total_price }}</li>
                <li class="list-group-item bg-dark-light text-light"><strong class="text-orange">Piatti: </strong>
                <ul class="lista-piatti  mb-3">
                    @foreach ($order->plates as $plate)
                    <li class="bg-dark-light text-light">
                        <span>{{ $plate->name }} </span> - <span class="bg-orange px-2 pb-1 rounded-circle"> {{ $plate->pivot->quantity }}</span>
                    </li>
                    @endforeach
                </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
@endsection
