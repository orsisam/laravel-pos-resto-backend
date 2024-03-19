@extends('layouts.app')

@section('title', 'Create Product')

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
                <h1>Products</h1>
            </div>
            
            {{-- Section Body --}}
            <div class="section-body">
                <h2 class="section-title">Users</h2>

                <div class="card">
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>Add Product</h4>
                        </div>

                        {{-- Card Body --}}
                        <div class="card-body">
                            {{-- Input Name --}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Input Price --}}
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="text"
                                        name="price"
                                        id="price"
                                        class="form-control currency @error('price') is-ivalid @enderror"
                                    >
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Input Stock --}}
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <div class="input-group">
                                    <input type="number" 
                                        name="stock"
                                        id="stock"
                                        class="form-control @error('stock') is-invalid @enderror"
                                    >
                                    @error('stock')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Input Description --}}
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description"
                                    id="description"
                                    data-height="150"
                                    class="form-control @error('description') is-invalid @enderror">
                                </textarea>
                            </div>

                            {{-- Confirm Status/available --}}
                            <div class="form-group">
                                <label class="custom-switch mt-2 col-sm-6">
                                    <input type="checkbox"
                                        name="status"
                                        class="custom-switch-input"
                                        checked
                                    >
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Available</span>
                                </label>
                                <label class="custom-switch mt-2 col-sm-6">
                                    <input type="checkbox"
                                        name="favorite"
                                        class="custom-switch-input"
                                    >
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Favorite</span>
                                </label>
                            </div>

                        </div>

                        {{-- Card Footer --}}
                        <div class="card-footer text-right">
                            <a href="{{ route('products.index') }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> Back</a>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- JS Libraries --}}
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>

    {{-- Page Specific js File --}}
    <script src="{{ asset('js/custom.js') }}"></script>
@endpush