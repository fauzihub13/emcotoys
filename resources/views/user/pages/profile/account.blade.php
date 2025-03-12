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
                <div class="container right-side form-text ">
                    <p class="title text-danger fs-5 fw-normal">Edit Your Profile</p>
                    <form class=" fs-1">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control rounded-0" placeholder="Name">
                            </div>
                            <div class="col-lg-6 col-sm-12 mt-3 mt-lg-0 mt-md-0">
                                <label for="phone_number">Phone Number</label>
                                <input id="phone_number" name="phone_number" type="text" class="form-control rounded-0" placeholder="6289654126325">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-sm-12">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control rounded-0" placeholder="jone@email.com">
                            </div>
                            <div class="col-lg-6 col-sm-12 mt-3 mt-lg-0 mt-md-0">
                                <label for="address">Address</label>
                                <input id="address" name="address" type="text" class="form-control rounded-0" placeholder="City, Country">
                            </div>
                        </div>
                        <div class="col mt-3">
                            <label>Change Password</label>
                            <input type="text" class="form-control rounded-0" placeholder="Current Password">
                            <input type="text" class="form-control rounded-0 mt-3" placeholder="New Password">
                            <input type="text" class="form-control rounded-0 mt-3" placeholder="Confirm New Password">
                        </div>
                    </form>
                    <div class="mt-3 d-flex justify-content-end gap-1">
                        <a href="" class="btn">Cancel</a>
                        <a href="" class="btn save rounded-pill px-4">Save</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@push('script')
@endpush
