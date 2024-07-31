@extends('layouts.main')
@section('content')
    <div class="row mt-5"></div>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">{{ __('Verifikasi Email Anda') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>{{ __('Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.') }}</p>

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div class="form-group row mb-0">
                                <div class="col">
                                    <button type="submit" class="genric-btn danger-border radius form-control">
                                        {{ __('Kirim Ulang Email Verifikasi') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
