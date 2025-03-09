@extends('user.layouts.auth')

@section('title', 'Forgot Password')

@push('style')
@endpush

@section('main')

    <div class="row vh-100 ">
        <div class="col-lg-6 col-sm-12 px-5 text-start d-flex align-items-center justify-content-center">
            <div class="auth-left container-fluid px-0">
                <h3 class="mb-0">ENTER YOUR EMAIL ADDRESS</h3>
                <p class="sec-text">Input your email and we will send you reset password link</p>

                <div class="row mt-5"></div>

                <form method="POST" action="">
                        @csrf
                        <div class="form-group text-start mb-4">
                            <label for="email">Email</label>
                            <input type="text"
                                id='email'
                                class="form-control form-control-xl @error('email') is-invalid @enderror"
                                placeholder="example@gmail.com"
                                name="email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 mt-5">
                            <button class="btn color-custom-red btn-block btn-lg shadow-lg  text-white">Send reset password</button>
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
