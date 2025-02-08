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
                                    <label for="imageInput" class="form-label">Thumbnail</label>
                                    <input class="form-control @error('thumbnail') is-invalid @enderror"
                                        type="file"
                                        accept=".jpeg, .png, .jpg"
                                        id="imageInput"
                                        name='thumbnail'>
                                    @error('thumbnail')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <img id="thumbnail" class="article-thumbnail"
                                        src="{{ asset('assets/admin/static/images/placeholder/empty-image.png') }}">
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text"
                                        name="name" id="name"
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
                                    <select class="choices form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
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

                                <div class="form-group">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number"
                                        name="price" id="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Product price"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="roundText">Weight</label>
                                            <input type="text" name="weigth" id="roundText" class="form-control round"
                                                placeholder="Rounded Input">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="squareText">Height</label>
                                            <input type="text" name="weigth" id="squareText" class="form-control square"
                                                placeholder="Square Input">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="squareText">Width</label>
                                            <input type="text" id="squareText" name="width"  class="form-control square"
                                                placeholder="Square Input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="roundText">Stock</label>
                                            <input type="text" id="roundText" class="form-control round"
                                                placeholder="Rounded Input">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="squareText">Age</label>
                                            <input type="text" id="squareText" class="form-control square"
                                                placeholder="Square Input">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="squareText">SKU </label>
                                            <input type="text" id="squareText" class="form-control square"
                                                placeholder="Square Input">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="squareText">Is Available</label>
                                     <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Show product in catalog</label>
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
