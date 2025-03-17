@extends('user.layouts.app')

@section('title', 'Detail History')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/profile.css') }}">
@endpush

@section('main')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="fs-1 fw-bolder text-center">Transaction History</h2>
                @foreach ($order->orderItems as $orderItem)
                    <div class="row py-3 border-bottom  ">
                        <div class=" col-12 d-flex flex-row ">
                            <div class="cart-image me-3 ">
                                <img class="" src="/storage/{{$orderItem->path}}" height="auto" alt="Product Image">
                            </div>
                            <div class="cart-detail ">
                                <p class="red m-0 fw-information-bold cart-title">{{ $orderItem->name }}</p>
                                <p class="m-0 lh-sm cart-price">Amount: <span class="red">{{ $orderItem->quantity }} pcs</span></p>
                                <p class="m-0 lh-sm cart-price">Total: <span class="red">Rp{{ number_format($orderItem->price , 0, ',', '.') }}</span></p>
                            </div>
                        </div>
                    </div>

                @endforeach

                <div class="checkout-form mt-4">
                    <h2 class="fs-4 fw-bolder red text-start">Recipient Details</h2>
                    <div class="">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group text-start mb-4">
                                    <label>Nama Lengkap <span class="red">*</span></label>
                                    <span class="form-control d-flex align-items-center">{{ $order->name }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group text-start mb-4">
                                    <label>Phone Number <span class="red">*</span></label>
                                    <span class="form-control d-flex align-items-center">{{ $order->phone_number }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>Province <span class="red">*</span></label>
                                    <span class="form-control d-flex align-items-center">{{ $order->province }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>City <span class="red">*</span></label>
                                    <span class="form-control d-flex align-items-center">{{ $order->city }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>District <span class="red">*</span></label>
                                    <span class="form-control d-flex align-items-center">{{ $order->district }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>Village <span class="red">*</span></label>
                                    <span class="form-control d-flex align-items-center">{{ $order->village }}</span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group text-start mb-4">
                                    <label>Detail Address </label>
                                    <textarea readonly>{{ $order->detail_address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            {{-- RIGHT SIDE --}}

        </div>
    </div>

@endsection

@push('script')
@endpush
