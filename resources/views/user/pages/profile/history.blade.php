@extends('user.layouts.app')

@section('title', 'History')

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
                <h2>History</h2>
                <div class="w-100 d-flex justify-content-center">
                    <a href="" class="btn actived option w-50">On process</a>
                    <a href="" class="btn option w-50">Finished</a>
                </div>

                {{-- CART ITEM --}}
                @for ($i=0; $i<5; $i++)
                    <div class="row py-3 border-bottom  ">
                        <div class="col-12 col-md-9 d-flex flex-row ">
                            <div class="cart-image me-3 ">
                                <img class="" src="https://cdn.firstcry.com/education/2022/11/06094158/Toy-Names-For-Kids.jpg" height="auto" alt="">
                            </div>
                            <div class="cart-detail ">

                                <p class="red m-0 fw-information-bold cart-title">TRX-12345678</p>
                                <p class="m-0 lh-sm cart-price">Amount: <span class="red">12 pcs</span></p>
                                <p class="m-0 lh-sm cart-price">Total: <span class="red">Rp150.000</span></p>
                                <div class="detail-btn gap-1 mt-2 mobile-detail-order">
                                    <i class="far fa-eye red red"></i>
                                    <p class="m-0 red btn-text">Order detail</p>
                                </div>

                            </div>
                        </div>

                        <div class="cart-quantity detail-order col-4 col-md-3 gap-1">
                           <div class="detail-btn gap-1 mt-2">
                                <i class="far fa-eye red"></i>
                                <p class="m-0 red btn-text">Order detail</p>
                            </div>
                        </div>
                    </div>
                @endfor
                {{-- CART ITEM --}}

                {{-- <div class="cart-item pb-3 border-bottom d-flex w-100 mt-4">
                    <img src="{{asset ('template/assets/img/shop/1.png')}}" width="100px" height="auto" alt="">
                    <div class="col">
                        <p class="m-0 d-inline-block px-3 rounded-pill text-white bg-custom">On Progress</p>
                        <p class="product-title m-0">EMCO Super Dough</p>
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
                    <div class="manipulate d-flex justify-content-center align-item-center gap-1">
                        <a href="" class="btn change align-self-center red rounded-pill align-items-center d-flex">See Order Detail</a>
                    </div>
                </div> --}}

            </div>
        </div>

    </div>


@endsection

@push('script')
@endpush
