@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if ($plates && $plates->count() > 0)
                            @foreach ($plates as $plate)
                                <div class="row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Special title treatment</h5>
                                                <p class="card-text">{{ $plate }}</p>
                                                <a href="{{ route('admin.plates.create') }}"
                                                    class="btn btn-outline-primary">aggiungi
                                                    un piatto</a>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger" role="alert">
                                <h3>
                                    Non hai ancora alcun piatto nel menu
                                </h3>
                                <a href="{{ route('admin.plates.create') }}" class="btn btn-outline-primary">aggiungi
                                    un piatto</a>
                            </div>
                        @endif


                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
