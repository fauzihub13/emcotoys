@extends('user.layouts.app')

@section('title', 'Success')

@push('style')
    <link rel="stylesheet" href="{{ asset ('template/assets/css/profile.css')}}">
@endpush

@section('main')

    <div class="container py-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-10 text-center">
                <h2>Payment Status</h2>
                <div class="container right-side border-top form-text mb-4 mt-4">
                    <img class="img-status mb-2" src="{{ asset('template/assets/img/status/success.png') }}" alt="">
                    <p class="title text-danger fs-5 fw-normal mb-2">Payment Successful</p>
                    <p class="text-secondary mb-4">Thank you for your payment! Your transaction has been successfully processed.</p>
                    <button type="button" class="btn btn-lg color-custom-red text-white w-100 mb-4" onclick="window.location.href='/history'">Back</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush
