@extends('admin.layouts.app')

@section('title', 'Create Product')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('main')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Product</h3>
                    <p class="text-subtitle text-muted">A page where users can create product</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label">Product Images (up to 10 image)</label>

                                    <div class="row g-3" id="uploadContainer">
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <label class="upload-box">
                                                <i class="bi-plus-lg"></i>
                                                <input type="file" accept=".jpg, .jpeg, .png" id="imageUpload" multiple>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <!-- Hidden input container for submitting selected files -->
                                <div id="hiddenInputs" style="display: none"></div>

                                @error('images')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Product name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class=" form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                        <option value="" >Select option</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" >{{ ucfirst($category->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description"
                                        rows="6">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number"
                                                name="price"
                                                id="price"
                                                class="form-control round @error('price') is-invalid @enderror"
                                                value="{{ old('price') }}"
                                                placeholder="Product price">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="height">Length</label>
                                            <input type="number"
                                                name="length"
                                                id="length"
                                                class="form-control square  @error('length') is-invalid @enderror"
                                                value="{{ old('length') }}"
                                                placeholder="Product length">
                                            @error('length')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="weight">Weight</label>
                                            <input type="number"
                                                name="weight"
                                                id="weight"
                                                class="form-control round @error('weight') is-invalid @enderror"
                                                value="{{ old('weight') }}"
                                                placeholder="Product weight">
                                            @error('weight')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="height">Height</label>
                                            <input type="number"
                                                name="height"
                                                id="height"
                                                class="form-control square  @error('height') is-invalid @enderror"
                                                value="{{ old('height') }}"
                                                placeholder="Product height">
                                            @error('height')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="width">Width</label>
                                            <input type="number"
                                                id="width"
                                                name="width"
                                                class="form-control square @error('width') is-invalid @enderror"
                                                value="{{ old('width') }}"
                                                placeholder="Product width">
                                            @error('width')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number"
                                                id="stock"
                                                name="stock"
                                                class="form-control round @error('stock') is-invalid @enderror"
                                                value="{{ old('stock') }}"
                                                placeholder="Product stock">
                                            @error('stock')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="number"
                                                id="age"
                                                name="age"
                                                class="form-control square @error('age') is-invalid @enderror"
                                                value="{{ old('age') }}"
                                                placeholder="Children age">
                                            @error('age')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="sku">SKU</label>
                                            <input type="text"
                                                id="sku"
                                                name="sku"
                                                class="form-control square @error('sku') is-invalid @enderror"
                                                value="{{ old('sku') }}"
                                                placeholder="Product SKU">
                                            @error('sku')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Is Available</label>
                                     <div class="form-check form-switch">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            name="status"
                                            type="checkbox"
                                            id="status" checked>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label class="form-check-label">Show product in catalog</label>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

@push('script')
    <script src="{{ asset ('assets/admin/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset ('assets/admin/static/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset ('assets/admin/custom/js/image-picker.js') }}"></script>
@endpush
