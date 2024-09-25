@extends('layouts.app')

@section('content')
@vite(['resources/js/validation/passwordValidation.js'])
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card orange-light-bg border-orange shadow-lg bg-dark-light text-light">
                    <div class="card-header bg-orange text-brown">
                        <h3>
                            {{ __('Registrati') }}
                        </h3>
                    </div>

                    <div class="card-body ">
                        <form method="POST" action="{{ route('register') }}" id="myForm">
                            @csrf

                            {{-- NOME --}}
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label ">{{ __('Nome') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control border-orange @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class='text-center text-danger mt-2 d-none' id="error-name">
                                        Campo Obbligatorio
                                    </div>
                                </div>
                            </div>

                            {{-- COGNOME --}}
                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label ">{{ __('Cognome') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control border-orange @error('surname') is-invalid @enderror"
                                        name="surname" value="{{ old('surname') }}" required autocomplete="surname"
                                        autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class='text-center text-danger mt-2 d-none' id="error-surname">
                                        Campo Obbligatorio
                                    </div>
                                </div>
                            </div>

                            {{-- INDIRIZZO EMAIL --}}
                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label ">{{ __('Indirizzo e-mail') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control border-orange @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class='text-center text-danger mt-2 d-none' id="error-email">
                                        Devi inserire un indirizzo e-mail Valido
                                    </div>
                                </div>
                            </div>

                            {{-- PARTITA IVA --}}
                            <div class="mb-4 row">
                                <label for="p_iva" class="col-md-4 col-form-label ">{{ __('Partita Iva') }}
                                    <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text"
                                        class="form-control border-orange @error('p_iva') is-invalid @enderror"
                                        name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus
                                        maxlength="11">

                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class='text-center text-danger mt-2 d-none' id="error-message-p-iva">
                                        Il codice della partita Iva deve essere di 11 cifre
                                    </div>
                                </div>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}
                                    <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control border-orange @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class='text-center text-danger mt-2 d-none' id="error-message-password">
                                        Il campo non può essere vuoto o minore di 8 caratteri
                                    </div>
                                    
                                </div>
                            </div>

                            {{-- CONFERMA PASSWORD --}}
                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label  ">{{ __('Conferma Password') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control border-orange"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <div class='text-center text-danger mt-2 d-none' id="error_message">
                                        La Password inserita non corrisponde!
                                    </div>
                                </div>

                            </div>

                    </div>
                    <div class="card-footer bg-orange">
                        {{-- BOTTONE --}}
                        <button id='sub_verify' type="submit" class="btn btn-outline-brown">
                            {{ __('Registrati') }}
                        </button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
