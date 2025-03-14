@extends('user.layouts.auth')

@section('title', 'Reset Password')

@push('style')
@endpush

@section('main')

    <div class="row vh-100 ">
        <div class="col-lg-6 col-sm-12 px-5 text-start d-flex align-items-center justify-content-center">
            <div class="auth-left container-fluid px-0">
                <h3 class="mb-0">RESET PASSWORD</h3>
                <p class="sec-text">Please enter your new password</p>

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

                <div class="row mt-5"></div>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group text-start mb-3">
                        <label for="email">Email</label>
                        <input type="email"
                            id='email'
                            class="form-control form-control-xl @error('email') is-invalid @enderror"
                            placeholder="john@gmail.com"
                            value="{{ $request->email ?? old('email') }}"
                            name="email" readonly>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group text-start mb-3">
                        <label for="password">New Password</label>
                        <input type="password"
                            id='password'
                            class="form-control form-control-xl @error('password') is-invalid @enderror"
                            placeholder="*********"
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
                    <div class="form-group text-start mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password"
                            id='password_confirmation'
                            class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror"
                            placeholder="*********"
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


                    <div class="d-grid gap-2 mt-5">
                        <button class="btn color-custom-red btn-block btn-lg shadow-lg  text-white">Reset Password</button>
                    </div>
                </form>

                {{-- <form method="POST" action="{{ route('password.update') }}">
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
                </form> --}}

                <div class="text-center mt-4 fs-5">
                    <p class="text-gray-600 mb-0">Don't have an account? <a href="{{ route('register') }}" class="font-bold">Sign up for free!</a></p>
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
