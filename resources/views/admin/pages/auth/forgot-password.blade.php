@extends('admin.layouts.auth')
@section('title', 'Forgot Password')

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="">Forgot Password</h1>
                <p class="mb-4">Input your email and we will send you reset password link.</p>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @endif

                <div class="mb-5"></div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text"
                            class="form-control form-control-xl @error('email') is-invalid @enderror"
                            name='email'
                            autocomplete="email"
                            placeholder="Email">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Send</button>
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
