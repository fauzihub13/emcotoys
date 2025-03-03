@extends('admin.layouts.app')

@section('title', 'Edit Article')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('main')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Article</h3>
                    <p class="text-subtitle text-muted">A page where users can edit new article category</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                        src="{{ asset('storage/'.$article->thumbnail) }}">
                                </div>

                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text"
                                        name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Article title"
                                        value="{{ $article->title }}">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="choices form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                        <option value="" >Select option</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $article->category->id ? 'selected' : '' }} >{{ ucfirst($category->name) }}</option>
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
                                    <label for="body" class="form-label">Body</label>
                                    <textarea class="form-control @error('body') is-invalid @enderror"
                                        id="body" name="body"
                                        rows="6">{{ $article->body }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
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
