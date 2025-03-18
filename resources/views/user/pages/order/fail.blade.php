@extends('user.layouts.app')

@section('title', 'Fail')

@push('style')
    <link rel="stylesheet" href="{{ asset ('template/assets/css/profile.css')}}">
@endpush

@section('main')

    <div class="container py-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-10 text-center">
                <h2>Payment Status</h2>
                <div class="container right-side border-top form-text mb-4 mt-4">
                    <img class="img-status mb-2" src="{{ asset('template/assets/img/status/fail.png') }}" alt="">
                    <p class="title text-danger fs-5 fw-normal mb-2">Payment Failed</p>
                    <p class="text-secondary mb-4">Payment failed, and your order could not be placed. Please contact the admin for assistance.</p>
                    <button type="button" class="btn btn-lg color-custom-red text-white w-100 mb-4" onclick="window.location.href='/history'">Back</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush
