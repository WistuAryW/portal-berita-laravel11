@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row m-5">

        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{url('register')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    id="name" placeholder="name@example.com">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input type="email"class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" id="email"
                                    placeholder="name@example.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password"
                                        class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">

                                    <label for="password-confirm"
                                        class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <p class="text-center">Dengan Mendaftar di Sistem Pakar, Anda Setuju Dengan <span class="text-primary">Syarat & Ketentuan</span> dan <span class="text-primary">Kebijakan Privasi</span> Sistem Pakar.</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <button type="submit" class=" form-control genric-btn danger-border radius">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            
                        </form>
                        <div class="row">
                            <div class="col">
                                <a class="form-control genric-btn primary-border radius" href="{{ url('login') }}">{{ __('Sudah Punya Akun? Langsung Masuk Saja ^_^') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
