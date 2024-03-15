@extends('layouts.auth')

@section('title', 'Register POS Resto')

@push('style')
    {{-- CSS Libraries --}}
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Daftar</h4>
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
                    <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                </div>

                {{-- Password confirm --}}
                <div class="form-group">
                    <label for="password-confirmation">Password Confirmation</label>
                    <input type="password"
                        id="password-confirmation"
                        name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Button --}}
                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block">
                    Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- JS Libraries --}}
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    {{-- Page Specific JS File --}}
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush