@extends('layouts.main')
@section('content')
    <div class="container ">
        <div class="row m-5">

        </div>
 
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="********"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col ">
                                    <button type="submit" class="genric-btn danger-border radius form-control">
                                        {{ __('Masuk') }}
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-6 mb-3">
                                    <a class="form-control genric-btn primary-border radius"
                                        href="{{ url('passwordreset') }}">
                                        {{ __('Lupa Kata Sandi?') }}
                                    </a>
                                </div>
                                <div class="col-md-6 col-6">
                                    <a class="form-control genric-btn primary-border radius"href="{{ url('register') }}">{{ __('Belum Punyak Akun?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
