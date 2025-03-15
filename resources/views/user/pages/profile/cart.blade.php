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
                <h2>My Cart</h2>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="container right-side ">

                    @if (isset($carts) && count($carts))
                        @foreach ($carts as $cart)
                            <div class="row py-3 border-bottom  ">
                                <div class=" col-10 col-md-9 d-flex flex-row ">
                                    <div class="cart-image me-3 ">
                                        <img class="" src="/storage/{{$cart->product->images[0]->path ?? ''}}" height="auto" alt="">
                                    </div>
                                    <div class="cart-detail ">
                                        <p class="red m-0 fw-information-bold cart-title">{{ $cart->product->name }}</p>
                                        <p class="m-0 lh-sm cart-price">Rp{{ number_format($cart->product->price, 0, ',', '.') }}</p>
                                        <div class="delete-btn-2 gap-1 mt-2">
                                            <i class="fal fa-trash-alt red"></i>
                                            <p class="m-0 red btn-text confirm-delete" data-id="{{ $cart->id }}">Delete from cart</p>
                                            <form id="delete-cart-form" action="" method="POST" style="display: none;">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <input type="hidden" name="_token"
                                                    value="{{ csrf_token() }}" />
                                            </form>
                                        </div>

                                    </div>
                                </div>

                                <div class="cart-quantity col-2 col-md-3 gap-1">
                                    <a class="btn change align-self-center red rounded-pill align-items-center d-flex minus-counter" data-id="{{ $cart->id }}"><i class="far fa-minus"></i></a>
                                    <p class="mb-0 mx-2" id="quantity-{{ $cart->id }}">{{ $cart->quantity }}</p>
                                    <a class="btn change align-self-center red rounded-pill align-items-center d-flex plus-counter" data-id="{{ $cart->id }}"><i class="far fa-plus"></i></a>

                                    <form id="increment-cart-form" action="" method="POST" style="display: none;">
                                        <input type="hidden" name="_token"
                                            value="{{ csrf_token() }}" />
                                    </form>

                                    <form id="decrement-cart-form" action="" method="POST" style="display: none;">
                                        <input type="hidden" name="_token"
                                            value="{{ csrf_token() }}" />
                                    </form>
                                </div>
                            </div>

                        @endforeach

                        <p class="text-end cart-price mt-2">Total: <span class="red" id="total_price">Rp{{ number_format($total_price, 0, ',', '.') }}</span></p>

                        <button class="btn btn-lg color-custom-red text-white w-100 mt-3" onclick="window.location.href='/cart/checkout';">Checkout</button>

                    @else
                        <div class=" text-custom-grey text-center ">No cart found.</div>
                        <button class="btn btn-lg color-custom-red text-white w-100 mt-5" onclick="window.location.href='/product/all';">Shop Now</button>
                    @endif


                </div>


            </div>
        </div>

    </div>


@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('template/assets/js/cart.js') }}"></script>

@endpush
