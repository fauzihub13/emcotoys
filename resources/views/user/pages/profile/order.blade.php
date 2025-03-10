@extends('user.layouts.app')

@section('title', 'History')

@push('style')
    <link rel="stylesheet" href="{{ asset ('template/assets/css/profile.css')}}">
@endpush

@section('main')

    <div class="container py-5">
        <h2 class="text-center">My Order</h2>
        <div class="cart-item pb-3 d-flex w-100 mt-4">
            <img src="{{asset ('template/assets/img/shop/1.png')}}" width="100px" height="auto" alt="">
            <div class="col">
                <p class="red fs-5 m-0 fw-information-bold">EMCO Super Dough</p>
                <div class="row">
                    <div class="col-auto desc">
                        <p class="m-0 lh-sm fs-6">Category: <span class="red">Green</span></p>
                        <p class="m-0 lh-sm fs-6">Amount: <span class="red">2 pcs</span></p>
                    </div>
                    <div class="col-auto ms-3">
                        <p class="m-0 lh-sm fs-6 text-center">Total Price</p>
                        <p class="m-0 lh-sm fs-6 text-center red">RP.150.000,-</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-item pb-3 d-flex w-100 mt-4">
            <img src="{{asset ('template/assets/img/shop/1.png')}}" width="100px" height="auto" alt="">
            <div class="col">
                <p class="red fs-5 m-0 fw-information-bold">EMCO Super Dough</p>
                <div class="row">
                    <div class="col-auto desc">
                        <p class="m-0 lh-sm fs-6">Category: <span class="red">Green</span></p>
                        <p class="m-0 lh-sm fs-6">Amount: <span class="red">2 pcs</span></p>
                    </div>
                    <div class="col-auto ms-3">
                        <p class="m-0 lh-sm fs-6 text-center">Total Price</p>
                        <p class="m-0 lh-sm fs-6 text-center red">RP.150.000,-</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="personal-information my-3">
            <p class="red fw-personal-bold fs-5">Personal Information</p>
            <form class="">
                <div class="col">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control rounded-3 bg-white border" placeholder="Full Name">
                </div>
                <div class="col mt-3">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control rounded-3 bg-white border" placeholder="123-456-789">
                </div>
                <div class="col mt-3">
                    <label for="">Change Password</label>
                    <input type="text" class="form-control rounded-3 bg-white border" placeholder="Current Password">
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="">Sub District</label>
                        <input type="text" class="form-control rounded-3 bg-white border" placeholder="Sub District">
                    </div>
                    <div class="col">
                        <label for="">Ward</label>
                        <input type="text" class="form-control rounded-3 bg-white border" placeholder="Ward">
                    </div>
                    <div class="col">
                        <label for="">Post Code</label>
                        <input type="text" class="form-control rounded-3 bg-white border" placeholder="12345">
                    </div>
                </div>
                <div class="col mt-3">
                    <label for="">Address Detail</label>
                    <textarea class="rounded" name="Address" id="" placeholder="Your Address Detail"></textarea>
                </div>
                <div class="d-flex justify-content-end gap-3 mt-3">
                    <button class="btn change align-self-center red fs-6 rounded-pill align-items px-5" type="">Cancel</button>
                    <button class="btn change align-self-center text-white bg-custom fs-6 rounded-pill align-items px-5" type="submit">Checkout</button>
                </div>
            </form>
        </div>
    </div>


@endsection

@push('script')
@endpush
