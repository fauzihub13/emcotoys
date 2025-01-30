@extends('admin.layouts.app')

@section('title', 'Dashboard')

@push('style')

@endpush

@section('main')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Account Profile</h3>
                    <p class="text-subtitle text-muted">A page where users can change profile information</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div class="avatar avatar-2xl">
                                    <img src="{{ asset('assets/admin/compiled/jpg/2.jpg') }}" alt="Avatar">
                                </div>

                                <h3 class="mt-3">{{ auth()->user()->name }}</h3>
                                <p class="text-small">{{ auth()->user()->email  }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    @if (session('status') == 'profile-information-updated')
                        <div class="alert alert-success alert-dismissible show fade">
                            Profile updated successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            Failed to update profile. Please try again.
                            {{ session('error') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user-profile-information.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text"
                                        name="name" id="name"
                                        class="form-control @error('name', 'updateProfileInformation') is-invalid @enderror"
                                        placeholder="Your Name"
                                        autocomplete="name"
                                        value="{{ auth()->user()->name }}">
                                    @error('name', 'updateProfileInformation')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text"
                                        name="email"
                                        id="email"
                                        class="form-control @error('email', 'updateProfileInformation') is-invalid @enderror"
                                        placeholder="Your Email"
                                        autocomplete="email"
                                        value="{{ auth()->user()->email }}">
                                    @error('email', 'updateProfileInformation')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text"
                                        name="phone_number"
                                        id="phone_number"
                                        class="form-control @error('phone_number', 'updateProfileInformation') is-invalid @enderror"
                                        placeholder="Your Phone"
                                        value="{{ auth()->user()->phone_number }}">
                                    @error('phone_number', 'updateProfileInformation')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="page-title mt-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Account Security</h3>
                    <p class="text-subtitle text-muted">You can change account security settings</p>
                </div>

            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    @if (session('status') == 'password-updated')
                            <div class="alert alert-success alert-dismissible show fade">
                                Password updated successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        @elseif (session('error'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                Failed to change password. Please try again.
                                {{ session('error') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Change Password</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user-password.update') }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group my-2">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password"
                                        name="current_password"
                                        id="current_password"
                                        class="form-control @error('current_password', 'updatePassword') is-invalid  @enderror"
                                        placeholder="Enter your current password"
                                        value="">
                                    @error('current_password', 'updatePassword')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group my-2">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password"
                                        name="password"
                                        id="password"
                                        class="form-control @error('password', 'updatePassword') is-invalid  @enderror"
                                        placeholder="Enter new password"
                                        value="">
                                    @error('password', 'updatePassword')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group my-2">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        class="form-control  @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                                        placeholder="Enter confirm password"
                                        value="">
                                    @error('password_confirmation', 'updatePassword')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mt-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection

@push('script')

@endpush
