@extends('user.layouts.auth')

@section('title', 'Login')

@push('style')
@endpush

@section('main')

    <div class="row vh-100 ">
        <div class="col-lg-6 col-sm-12 px-5 text-start d-flex align-items-center justify-content-center">
            <div class="auth-left container-fluid px-0">
                <h3 class="mb-0">WELCOME TO <span class="color-text-red">MECO</span></h3>
                <p class="sec-text">Give Your Child the Gift of Play and Growth</p>

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
                        <div class="form-group text-start mb-3">
                            <label for="password">Password</label>
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
                        <p class="mb-0 text-end "><a class=" mb-0 text-reset" href="{{ route('password.request') }}">Forgot password</a></p>

                        <div class="d-grid gap-2 mt-5">
                            <button class="btn color-custom-red btn-block btn-lg shadow-lg  text-white">Log In</button>
                        </div>
                </form>

                <div class="text-center mt-4 fs-5">
                    <p class="text-gray-600 mb-0">Don't have an account? <a href="{{ route('register') }}" class="font-bold">Register for free!</a></p>
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
