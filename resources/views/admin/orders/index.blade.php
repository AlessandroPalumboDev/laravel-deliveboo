@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.Restaurants.index') }}" class="btn btn-outline-orange mb-3">
                    Torna al Ristorante
                </a>
                <a href="{{ route('admin.orders.statistics') }}" class="btn btn-outline-orange mb-3">
                    Statistiche Ordini
                </a>
            </div>
            <h2 class="mb-4 text-white">I miei Ordini</h2>

            <div class="table-responsive" style="max-height: 800px; overflow-y: auto;">
                <table class="table table-dark table-striped table-hover align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th><span>Data</span></th>
                            <th class="d-none d-md-table-cell"><span>Nome</span></th>
                            <th class="d-none d-md-table-cell"><span>Cognome</span></th>
                            <th class="d-none d-md-table-cell"><span>Indirizzo</span></th>
                            <th><span>Totale</span></th>
                            <th><span>Stato</span></th>
                            <th><span>Dettagli</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->created_at }}</td>
                                <td class="d-none d-md-table-cell">{{ $order->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $order->surname }}</td>
                                <td class="d-none d-md-table-cell">{{ $order->delivery_address }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td><span class="badge ">{{ $order->order_status }}</span></td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="btn btn-outline-orange btn-sm">Dettagli Ordine</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
