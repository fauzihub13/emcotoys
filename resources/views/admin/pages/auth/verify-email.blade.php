@extends('admin.layouts.auth')
@section('title', 'Forgot Password')

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="">Verify Email</h1>
                <p class="mb-4">Please check your email, we have sent a link for account verification.</p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success alert-dismissible show fade">
                        A new email verification link has been sent!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @endif

                <div class="mb-3"></div>

                <button
                    class="btn btn-primary btn-block btn-lg shadow-lg mt-4"
                    onclick="event.preventDefault(); document.getElementById('resend-email-verification').submit()">
                    Resend
                </button>

                <div class="mb-2"></div>

                <button
                    class="btn btn-white btn-block btn-lg shadow-lg mt-2"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    Use another account
                </button>

                <form id="resend-email-verification"
                    action="{{ route('verification.send') }}"
                    method="POST"
                    style="display: none"
                    >
                    @csrf
                </form>

                <form id="logout-form"
                    action="{{ route('logout') }}"
                    method="POST"
                    style="display: none"
                    >                >
                    @csrf
                </form>

                <div class="text-center mt-5 fs-5">
                    <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold">Log in</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

@endsection
