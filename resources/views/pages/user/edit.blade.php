@extends('layouts.app')

@section('title', 'Create User')

@push('style')
    {{-- CSS Libraries --}}
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            {{-- Section Header --}}
            <div class="section-header">
                <h1>Users</h1>
            </div>
            
            {{-- Section Body --}}
            <div class="section-body">
                <h2 class="section-title">Users</h2>

                <div class="card">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit User</h4>
                        </div>

                        {{-- Card Body --}}
                        <div class="card-body">
                            {{-- Input Name --}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"
                                    name="name"
                                    id="name"
                                    value="{{ $user->name }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Input Email --}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"
                                    name="email"
                                    id="email"
                                    value="{{ $user->email }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                >
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Input Password --}}
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" 
                                        name="password"
                                        id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                    >
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="form-group">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password"
                                        name="confirm_password"
                                        id="confirm-password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                    >
                                    @error('confirm-password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                            </div>

                            {{-- Switch Role --}}
                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio"
                                            name="role"
                                            value="admin"
                                            class="selectgroup-input"
                                            {{ ($user->role == 'admin') ? 'checked' : '' }}
                                        >
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio"
                                            name="role"
                                            value="staff"
                                            class="selectgroup-input"
                                            {{ ($user->role == 'staff') ? 'checked' : '' }}
                                        >
                                        <span class="selectgroup-button">Staff</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio"
                                            name="role"
                                            value="user"
                                            class="selectgroup-input"
                                            {{ ($user->role == 'user') ? 'checked' : '' }}
                                        >
                                        <span class="selectgroup-button">User</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Card Footer --}}
                        <div class="card-footer text-right">
                            <a href="{{ route('users.index') }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> Back</a>
                            <button class="btn btn-primary">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    
@endpush