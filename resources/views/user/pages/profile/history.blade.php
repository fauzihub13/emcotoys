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

                                <div class="detail-btn gap-1 mt-2 mobile-detail-order" onclick="window.location.href='/history/detail';">
                                    <i class="far fa-eye red red"></i>
                                    <p class="m-0 red btn-text">Order detail</p>
                                </div>

                            </div>
                        </div>

                        <div class="cart-quantity detail-order col-4 col-md-3 gap-1" onclick="window.location.href='/history/detail';">
                            <div class="detail-btn gap-1 mt-2">
                                <i class="far fa-eye red"></i>
                                <p class="m-0 red btn-text">Order detail</p>
                            </div>
                        </div>

                    </div>
                @endfor
                {{-- CART ITEM --}}

            </div>
        </div>

    </div>


@endsection

@push('script')
@endpush
