@extends('layouts.auth')

@section('title', 'Register POS Resto')

@push('style')
    {{-- CSS Libraries --}}
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf

                {{-- Name Input --}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                        id="name"
                        name="name"
                        autofocus
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Email Input --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                        id="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Password Input --}}
                <div class="form-group">
                    <label for="password" class="d-block">Password</label>
                    <input type="password"
                        id="password"
                        data-indicator="pwindicator"
                        name="password"
                        class="form-control pwstrength @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection