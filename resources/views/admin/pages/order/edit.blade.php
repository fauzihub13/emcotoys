@extends('admin.layouts.app')

@section('title', 'Edit Transaction')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@section('main')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Order</h3>
                    <p class="text-subtitle text-muted">A page where users can edit order</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Order</a></li>
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


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <p class="form-control">John Dae</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Order Number</label>
                                            <p class="form-control">John Dae</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Order Status</label>
                                            <p class="form-control">Pending</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Transaction Status</label>
                                            <p class="form-control">Captured</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Transaction Time</label>
                                            <p class="form-control">12 January 2025</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="fw-semibold">Products</p>

                                <div class="d-flex flex-column justify-content-between mb-2 pb-2 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <div class="mini-product-image">
                                            <img src="{{ asset ('assets/admin/compiled/jpg/1.jpg')}}" alt="Face 1">
                                        </div>
                                        <div class="d-flex flex-column ms-2">
                                            <p class="m-0">Mainan Bayi 20 tahun</p>
                                            <p class="m-0 d-flex align-items-center">2 x &nbsp; <span class="rupiah"> 20.000</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-between mb-2 pb-2 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <div class="mini-product-image">
                                            <img src="{{ asset ('assets/admin/compiled/jpg/1.jpg')}}" alt="Face 1">
                                        </div>
                                        <div class="d-flex flex-column ms-2">
                                            <p class="m-0">Mainan Bayi 20 tahun</p>
                                            <p class="m-0 d-flex align-items-center">2 x &nbsp; <span class="rupiah"> 20.000</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-between mb-2 pb-2 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <div class="mini-product-image">
                                            <img src="{{ asset ('assets/admin/compiled/jpg/1.jpg')}}" alt="Face 1">
                                        </div>
                                        <div class="d-flex flex-column ms-2">
                                            <p class="m-0">Mainan Bayi 20 tahun</p>
                                            <p class="m-0 d-flex align-items-center">2 x &nbsp; <span class="rupiah"> 20.000</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Products Amount</label>
                                            <p class="form-control">Rp 220.000</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Shipping Rate</label>
                                            <p class="form-control">Rp 30.000</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Gross Amount</label>
                                            <p class="form-control">Rp 250.000</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Payment Method</label>
                                            <p class="form-control">Gopay</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Shipping Courier</label>
                                            <p class="form-control">JNE</p>
                                        </div>
                                    </div>
                                </div>

                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row ">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="">Tracking Number</label>
                                                <p class="form-control">J023432423</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 d-flex">
                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                            <div class="ms-2 form-group mt-4">
                                                <button type="submit" class="btn btn-primary">Track</button>
                                            </div>
                                        </div>
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
    <script src="{{ asset ('assets/admin/custom/js/edit-product.js') }}"></script>
@endpush
