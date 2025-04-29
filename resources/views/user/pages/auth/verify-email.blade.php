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
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success alert-dismissible show fade">
                        A new email verification link has been sent!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @endif

                <div class="row mt-5"></div>

                {{-- <form method="POST" action="">
                    @csrf
                    <div class="d-grid gap-2 mt-5">
                        <button class="btn color-custom-red btn-block btn-lg shadow-lg  text-white">Resend verification email</button>
                    </div>
                </form> --}}

                <div class="d-grid gap-2 mt-5">
                    <button class="btn color-custom-red btn-block btn-lg shadow-lg text-white"
                        onclick="event.preventDefault(); document.getElementById('resend-email-verification').submit()">
                        Resend verification email
                    </button>
                </div>
                <div class="d-grid gap-2 mt-2">
                    <button class="btn bg-transparent btn-block btn-lg shadow-lg "
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                        Use another account
                    </button>
                </div>

                <form id="resend-email-verification"
                    action="{{ route('verification.send') }}"
                    method="POST"
                    style="display: none"
                    >
                    @csrf
                </form>

                <form id="logout-form"
                    action="{{ route('useAnotherAccount') }}"
                    method="POST"
                    style="display: none"
                    >                >
                    @csrf
                </form>

                {{-- <div class="text-center mt-4 fs-5">
                    <p class="text-gray-600 mb-0">Remember your account? <a href="{{ route('login') }}" class="font-bold">Sign in now!</a></p>
                </div> --}}

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
