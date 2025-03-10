@extends('user.layouts.app')

@section('title', 'All Product')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/css/shop.css') }}">
@endpush

@section('main')

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 ">
                <div class="product-filter">
                    <div class="filter-wrapper mb-4">
                        <p class="fs-5 mb-1">Product Categories</p>
                        <ul class="ps-0 mb-0">
                            <li class="">
                                <a href="?category=jak" class='category-link active'>
                                    <i class="fas fa-plus"></i>
                                    <span>Category 1</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="?category=a" class='category-link'>
                                    <i class="fas fa-plus"></i>
                                    <span>Category 2</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="?category=jakaa" class='category-link'>
                                    <i class="fas fa-plus"></i>
                                    <span>Category 3</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="" class='category-link'>
                                    <i class="fas fa-plus"></i>
                                    <span>Category 4</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-wrapper filter-age mb-4">
                        <p class="fs-5 mb-1">Filter By Age</p>
                        <input

                            id="age-slider"
                            class="age-slider"
                            type="range"
                            min="0"
                            max="10000"
                            value="2500"
                            step="1">
                        <div class="d-flex justify-content-between">
                            <span>5</span>
                            <span>15</span>
                        </div>

                        <div class="slider">
                            <div class="progress">
                                
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-2">
                            <a href="" class="btn color-custom-red text-white align-items-end">Apply</a>
                        </div>




                    </div>
                </div>
            </div>

            {{-- RIGHT SIDE --}}
            <div class="col-lg-9">
                <p class="fs-3 fw-bolder">All Products</p>
                <div class="row justify-content-center ">

                    @php
                        $colors = ['red', 'green', 'yellow', 'purple', 'blue', 'pink'];
                    @endphp

                    @for ($i=0; $i<8; $i++)
                        @php
                            $bgColor = $colors[$i % count($colors)];
                        @endphp
                        <div class="col-md-6 col-lg-4 ">
                            <div class="products product-background-{{ $bgColor }}">
                                <img src="{{ asset('template/assets/img/shop/1.png') }}" alt="" class="">
                                <a href="{{ route('detail-product') }}" class='details'>
                                    <span>Detail</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                            <p class="judul">Mainan EMCO Hot Shot Marvel Viper Mainan</p>
                        </div>
                    @endfor
                </div>
            </div>
            {{-- RIGHT SIDE --}}

        </div>
    </div>

@endsection

@push('script')
    {{-- <script src="{{ asset('template/assets/js/range-slider.js') }}"></script> --}}

@endpush
