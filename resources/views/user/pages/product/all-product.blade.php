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
                        <p class="fs-5 mb-3">Filter By Age</p>

                        <div class="slider">
                            <div class="progress">

                            </div>
                        </div>
                        <div class="range-input d-flex mb-1">
                            <input type="range" class="range-min" min="0" max="30" value="1">
                            <input type="range" class="range-max" min="0" max="30" value="4">
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="start-age">0</span>
                            <span class="finish-age">30</span>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="" class="age-input btn color-custom-red text-white align-items-end">Apply</a>
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

                <div class="vs-pagination d-flex justify-content-center mt-4">
                    <a href="#" class="pagi-btn">Prev</a>
                    <ul>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">12</a></li>
                    </ul>
                    <a href="#" class="pagi-btn">next</a>
                </div>
            </div>
            {{-- RIGHT SIDE --}}

        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('template/assets/js/range-slider.js') }}"></script>

@endpush
