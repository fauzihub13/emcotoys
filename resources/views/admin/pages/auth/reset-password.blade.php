@extends('admin.layouts.auth')
@section('title', 'Forgot Password')

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="">Reset Password</h1>
                <p class="mb-4">Input your new password.</p>

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

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text"
                            class="form-control form-control-xl"
                            name='email'
                            value="{{ $request->email ?? old('email') }}"
                            placeholder="Email"
                            readonly>
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password"
                            class="form-control form-control-xl  @error('password') is-invalid @enderror"
                            placeholder="Password"
                            name="password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password"
                            class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirm Password"
                            name="password_confirmation">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Reset</button>
                </form>
                {{-- <div class="text-center mt-5 fs-5">
                    <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold">Log in</a></p>
                </div> --}}
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

@endsection
