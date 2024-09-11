@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">
                        Crea il tuo ristorante!
                    </h1>
                </div>
                <form action="{{ route("admin.Restaurants.store") }}" method="POST">
                    @csrf
                    
                    <div class="card-body">
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Nome Ristorante</label>
                            <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old("business_name") }}" required/>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="title" class="form-label">Tipo Ristorante</label>
                            <select name="type_id" class="form-select" aria-label="Default select example">
                                <option disabled selected>Scegli le tipologie del tuo ristorante</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}" @if (old('type_id') == $type->id) selected @endif >{{$type->name}}</option>
                                @endforeach
                              </select>
                        </div> --}}

                        <div class="mb-3">
                            <label for="title" class="form-label">Scegli le tipologie del tuo ristorante:</label>

                            <div>
                                @foreach ($types as $type)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="types[]" id="ty-{{$type->id}}" value="{{$type->id}}" {{in_array($type->id, old('types', [] )) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="tec-{{$type->id}}">{{$type->name}}</label>
                                </div>
                                @endforeach
                                
                            </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{route('admin.dashboard')}}">
                            <button class="btn btn-outline-primary">
                                Crea
                            </button>
                        </a>
                    </div>
        
    
    
                </form>

    

            </div>


        </div>
    </div>
</div>


@endsection