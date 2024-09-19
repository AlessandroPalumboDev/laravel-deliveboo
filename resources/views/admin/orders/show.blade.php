@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-white">Dettagli Ordine #{{ $order->id }}</h2>

        <div class="card bg-dark-light text-white">
            <div class="card-body">
                <p><strong>Nome Cliente:</strong> {{ $order->customer_name }}</p>
                <p><strong>Indirizzo Cliente:</strong> {{ $order->customer_address }}</p>
                <p><strong>Totale:</strong> €{{ $order->total }}</p>
                <p><strong>Stato:</strong> {{ $order->status }}</p>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-orange">Torna agli Ordini</a>
            </div>
        </div>
    </div>
@endsection
