@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <a href="{{ route('admin.Restaurants.index') }}" class="btn btn-outline-orange mb-3">
                    Torna al Ristorante
                </a>
                <h2 class="mb-4 text-white">I miei Ordini</h2>


                <div class="table-responsive">
                    <table class="table table-dark table-striped table-hover align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th><span >Data</span></th>
                                <th class="d-none d-md-table-cell"><span >Nome </span></th>
                                <th class="d-none d-md-table-cell"><span >Cognome </span></th>
                                <th class="d-none d-md-table-cell"><span >Indirizzo</span></th>
                                <th><span >Totale</span></th>
                                <th><span >Stato</span></th>
                                <th><span >Dettagli</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($orders) --}}
                            {{-- ordini --}}
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->created_at}}</td>
                                    <td class="d-none d-md-table-cell">{{$order->name}}</td>
                                    <td class="d-none d-md-table-cell">{{$order->surname}}</td>
                                    <td class="d-none d-md-table-cell">{{$order->delivery_address}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td><span class="badge bg-success">{{$order->order_status}}</span></td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', 1) }}"
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
