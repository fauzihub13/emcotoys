@extends('user.layouts.app')

@section('title', 'Checkout')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/profile.css') }}">
@endpush

@section('main')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="fs-1 fw-bolder text-center">Checkout</h2>

                @if (isset($carts) && count($carts))
                        @foreach ($carts as $cart)
                            <div class="row py-3 border-bottom  ">
                                <div class=" col-12 d-flex flex-row ">
                                    <div class="cart-image me-3 ">
                                        <img class="" src="/storage/{{$cart->product->images[0]->path ?? ''}}" height="auto" alt="">
                                    </div>
                                    <div class="cart-detail ">
                                        <p class="red m-0 fw-information-bold cart-title">{{ $cart->product->name }}</p>
                                        <p class="m-0 lh-sm cart-price">Amount: <span class="red">{{ $cart->quantity }} pcs</span></p>
                                        <p class="m-0 lh-sm cart-price">Total: <span class="red">Rp{{ number_format($cart->product->price, 0, ',', '.') }}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <div class=" text-custom-grey text-center ">No product found.</div>
                    @endif

                {{-- @for ($i=0; $i<5; $i++)
                    <div class="row py-3 border-bottom  ">
                        <div class=" col-12 d-flex flex-row ">
                            <div class="cart-image me-3 ">
                                <img class="" src="https://cdn.firstcry.com/education/2022/11/06094158/Toy-Names-For-Kids.jpg" height="auto" alt="">
                            </div>
                            <div class="cart-detail ">
                                <p class="red m-0 fw-information-bold cart-title">EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough EMCO Super Dough</p>
                                <p class="m-0 lh-sm cart-price">Amount: <span class="red">12 pcs</span></p>
                                <p class="m-0 lh-sm cart-price">Total: <span class="red">Rp150.000</span></p>
                            </div>
                        </div>
                    </div>
                @endfor --}}

                <div class="checkout-form mt-4">
                    <h2 class="fs-4 fw-bolder red text-start">Recipient Details</h2>
                    <form method="POST" action="">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group text-start mb-4">
                                    <label>Nama Lengkap <span class="red">*</span></label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control form-control-xl @error('name') is-invalid @enderror"
                                        placeholder="John Dae"
                                        value="{{ auth()->user()->name ?? '' }}"
                                        >
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
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group text-start mb-4">
                                    <label>Phone Number <span class="red">*</span></label>
                                    <input
                                        type="number"
                                        step="1"
                                        name="phone_number"
                                        class="form-control form-control-xl @error('phone_number') is-invalid @enderror"
                                        placeholder="628965235125"
                                        value="{{ auth()->user()->phone_number ?? '' }}"
                                        >
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>Province <span class="red">*</span></label>
                                    <select class="choices form-select @error('province') is-invalid @enderror" name="province">
                                        <option value="">Select one</option>
                                        <option value="">Select two</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('province')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>City <span class="red">*</span></label>
                                    <select class="choices form-select @error('') is-invalid @enderror" name="city">
                                        <option value="">Select one</option>
                                        <option value="">Select two</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('city')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>District <span class="red">*</span></label>
                                    <select class="choices form-select @error('district') is-invalid @enderror" name="district">
                                        <option value="">Select one</option>
                                        <option value="">Select two</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('district')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group text-start mb-4">
                                    <label>Village <span class="red">*</span></label>
                                    <select class="choices form-select @error('village') is-invalid @enderror" name="village">
                                        <option value="">Select one</option>
                                        <option value="">Select two</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('village')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group text-start mb-3">
                                    <label>Detail Address <span class="text-secondary">(optional)</span></label>
                                    <textarea name="detail_address">{{ auth()->user()->detail_address ?? '' }}</textarea>

                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-0">
                            <div class="col-6 col-md-10">
                                 <p class="text-end cart-price mb-0">Subtotal:</p>
                                <p class="text-end cart-price mb-0">Ship Rate:</p>
                                <p class="text-end cart-price mb-0">Total Price:</p>

                            </div>
                            <div class="col-6 col-md-2 ">
                                <p class="text-end cart-price mb-0"><span class="red" id="total_price">Rp{{ number_format($total_price, 0, ',', '.') }}</span></p>
                                <p class="text-end cart-price mb-0"><span class="red" id="total_price">Rp{{ number_format($total_price, 0, ',', '.') }}</span></p>
                                <p class="text-end cart-price mb-0"><span class="red" id="total_price">Rp{{ number_format($total_price, 0, ',', '.') }}</span></p>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-6 ">
                                <button class="btn btn-lg btn-outline-red red w-100">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-lg color-custom-red text-white w-100">Checkout</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            {{-- RIGHT SIDE --}}

        </div>
    </div>

@endsection

@push('script')
@endpush
