@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-white">Dettagli Ordine #{{ $order->id }}</h2>

    <div class="card bg-dark-light text-white">
        <div class="card-body">
            <p><strong>Nome Cliente:</strong> {{ $order->name }}</p>
            <p><strong>Indirizzo Cliente:</strong> {{ $order->delivery_address }}</p>
            <p><strong>Piatti:</strong></p>
            <ul>
                @foreach ($order->plates as $plate)
                <li>
                    <span>{{ $plate->name }} - quantità: {{ $plate->pivot->quantity }}</span>
                </li>
                @endforeach
            </ul>
            <p><strong>Totale:</strong> €{{ $order->total_price }}</p>
            <p><strong>Stato:</strong> {{ $order->order_status }}</p>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-orange">Torna agli Ordini</a>
        </div>
    </div>
</div>
@endsection
