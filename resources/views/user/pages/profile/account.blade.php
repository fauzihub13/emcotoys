@extends('user.layouts.app')

@section('title', 'Cart')

@push('style')
    <link rel="stylesheet" href="{{ asset ('template/assets/css/profile.css')}}">
@endpush

@section('main')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 ">
                @include('user.components.sidebar')
            </div>
            <div class="col-lg-9">
                <h2>Profile</h2>
                @if (session('status') == 'profile-information-updated')
                        <div class="alert alert-success alert-dismissible show fade">
                            Profile updated successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                @elseif (session('status') == 'password-updated')
                    <div class="alert alert-success alert-dismissible show fade">
                        Password updated successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        Failed to update profile. Please try again.
                        {{ session('error') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="container right-side form-text mb-4">
                    <p class="title text-danger fs-5 fw-normal">Edit Your Profile</p>
                    <form class="" method="POST" action="{{ route('user-profile-information.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <label for="name">Name <span class="red">*</span></label>
                                <input id="name"
                                    name="name"
                                    type="text"
                                    class="form-control rounded-0 @error('name', 'updateProfileInformation') is-invalid @enderror"
                                    placeholder="Name"
                                    value="{{ auth()->user()->name }}">
                                @error('name', 'updateProfileInformation')
                                    <div class="invalid-feedback mt-0">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-12 mt-3 mt-lg-0 mt-md-0">
                                <label for="phone_number">Phone Number <span class="red">*</span></label>
                                <input id="phone_number"
                                    name="phone_number"
                                    type="text"
                                    class="form-control rounded-0 @error('phone_number', 'updateProfileInformation') is-invalid @enderror"
                                    placeholder="6289654126325"
                                    value="{{ auth()->user()->phone_number }}">
                                @error('phone_number', 'updateProfileInformation')
                                    <div class="invalid-feedback mt-0">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-sm-12">
                                <label for="email">Email <span class="red">*</span></label>
                                <input id="email"
                                    name="email"
                                    type="text"
                                    class="form-control rounded-0 @error('email', 'updateProfileInformation') is-invalid @enderror"
                                    placeholder="jone@email.com"
                                    value="{{ auth()->user()->email }}">
                                @error('email', 'updateProfileInformation')
                                    <div class="invalid-feedback mt-0">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-sm-12 mt-3 mt-lg-0 mt-md-0">
                                <label for="detail_address">Address <span class="text-secondary">(optional)</span></label>
                                <input id="detail_address"
                                    name="detail_address"
                                    type="text"
                                    class="form-control rounded-0 @error('detail_address', 'updateProfileInformation') is-invalid @enderror"
                                    placeholder="City, Country"
                                    value="{{ auth()->user()->detail_address }}">
                                @error('detail_address', 'updateProfileInformation')
                                    <div class="invalid-feedback mt-0">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-end gap-1">
                            <a href="" class="btn">Cancel</a>
                            <button class="btn save rounded-pill px-4 text-white">Save</button>
                        </div>
                    </form>
                </div>
                <div class="container right-side form-text ">
                    <p class="title text-danger fs-5 fw-normal">Change Password</p>
                    <form class="" method="POST" action="{{ route('user-password.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                            <div class="col-12">
                                <input
                                    name="current_password"
                                    type="password"
                                    class="form-control rounded-0 @error('current_password', 'updatePassword') is-invalid @enderror"
                                    placeholder="Current Password"
                                    value="">
                                @error('current_password', 'updatePassword')
                                    <div class="invalid-feedback mt-0">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <input
                                    name="password"
                                    type="password"
                                    class="form-control rounded-0 @error('password', 'updatePassword') is-invalid @enderror"
                                    placeholder="New Password"
                                    value="">
                                @error('password', 'updatePassword')
                                    <div class="invalid-feedback mt-0">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <input
                                    name="password_confirmation"
                                    type="password"
                                    class="form-control rounded-0 @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                                    placeholder="Confirm New Password"
                                    value="">
                                @error('password_confirmation', 'updatePassword')
                                    <div class="invalid-feedback mt-0">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-end gap-1">
                            <a href="" class="btn">Cancel</a>
                            <button class="btn save rounded-pill px-4 text-white">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection

@push('script')
@endpush
