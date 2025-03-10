@extends('user.layouts.app')

@section('title', 'cart')

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
                <div class="container form-text shadow-lg p-5 pb-4 rounded">
                    <p class="title text-danger fw-normal">Edit Your Profile</p>
                    <form class=" fs-1">
                        <div class="row">
                            <div class="col">
                                <label for="">Name</label>
                                <input type="text" class="form-control rounded-0" placeholder="Name">
                            </div>
                            <div class="col">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control rounded-0" placeholder="123-456-876">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Email</label>
                                <input type="text" class="form-control rounded-0" placeholder="jone@email.com">
                            </div>
                            <div class="col">
                                <label for="">Address</label>
                                <input type="text" class="form-control rounded-0" placeholder="City, Country">
                            </div>
                        </div>
                        <div class="col mt-3">
                            <label for="">Change Password</label>
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
