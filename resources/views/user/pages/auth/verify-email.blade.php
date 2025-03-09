@extends('user.layouts.auth')

@section('title', 'Verify Email')

@push('style')
@endpush

@section('main')

    <div class="row vh-100 ">
        <div class="col-lg-6 col-sm-12 px-5 text-start d-flex align-items-center justify-content-center">
            <div class="auth-left container-fluid px-0">
                <h3 class="mb-0">VERIFICATION HAS BEEN SENT</h3>
                <p class="sec-text">Please check your email, we have sent a link for account verification</p>

                <div class="row mt-5"></div>

                <form method="POST" action="">
                    @csrf
                    <div class="d-grid gap-2 mt-5">
                        <button class="btn color-custom-red btn-block btn-lg shadow-lg  text-white">Resend verification email</button>
                    </div>
                </form>

                <div class="text-center mt-4 fs-5">
                    <p class="text-gray-600 mb-0">Remember your account? <a href="{{ route('login') }}" class="font-bold">Sign in now!</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 px-0">
            <div class="d-none d-lg-block" id='auth-right'>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush
