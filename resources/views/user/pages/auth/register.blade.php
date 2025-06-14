@extends('user.layouts.auth')

@section('title', 'Register')

@push('style')
@endpush

@section('main')

    <div class="row vh-100 ">
        <div class="col-lg-6 col-sm-12 px-5 text-start d-flex align-items-center justify-content-center">
            <div class="auth-left container-fluid px-0 py-4">
                <h3 class="mb-0">WELCOME TO <span class="color-text-red">MECO</span></h3>
                <p class="sec-text">Give Your Child the Gift of Play and Growth</p>

                <div class="row mt-5"></div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group text-start mb-4">
                        <label for="name">Name</label>
                        <input type="text"
                            id='name'
                            class="form-control form-control-xl @error('name') is-invalid @enderror"
                            placeholder="John Dae"
                            name="name">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group text-start mb-4">
                        <label for="email">Email</label>
                        <input type="email"
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
                    <div class="form-group text-start mb-4">
                        <label for="phone_number">Phone Number</label>
                        <input type="number"
                            id='phone_number'
                            class="form-control form-control-xl @error('phone_number') is-invalid @enderror"
                            placeholder="62896541265214"
                            name="phone_number">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('phone_number')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group text-start mb-4">
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
                    <div class="form-group text-start mb-4">
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
                        <button class="btn color-custom-red btn-block btn-lg shadow-lg text-white">Register</button>
                    </div>
                </form>

                <div class="text-center mt-4 fs-5">
                    <p class="text-gray-600 mb-0">Already have an account? <a href="{{ route('login') }}" class="font-bold">Log in now!</a></p>
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
