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
                        @if (isset($products_categories) && !empty($products_categories) && count($products_categories)>0)
                            <ul class="ps-0 mb-0">
                                @foreach ($products_categories as $products_category)
                                     <li class="">
                                        <a href="?category={{ $products_category->slug }}" class='category-link  {{ request('category') == $products_category->slug ? 'active' : '' }}'>
                                            <i class="fas fa-plus"></i>
                                            <span>{{ $products_category->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class=" text-custom-grey text-center ">No category found.</div>
                        @endif
                    </div>
                    <div class="filter-wrapper filter-age mb-4">
                        <p class="fs-5 mb-3">Filter By Age</p>

                        <div class="slider">
                            <div class="progress">

                            </div>
                        </div>
                        <div class="range-input d-flex mb-1">
                            <input type="range" class="range-min" min="0" max="30" value="3">
                            <input type="range" class="range-max" min="0" max="30" value="8">
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
                <div class="row justify-content-start ">

                    @php
                        $colors = ['red', 'green', 'yellow', 'purple', 'blue', 'pink'];
                        $colorIndex = 0;
                    @endphp

                    @if (isset($products) && !empty($products) && count($products) >0)
                        @foreach ($products as $product)
                            @php
                                // Memisahkan gambar jika ada lebih dari satu
                                $images = explode(',', $product->image);
                                $firstImage = $product->images->first() ? $product->images->first()->path : 'default.jpg';
                                $bgColor = $colors[$colorIndex % count($colors)];
                                $colorIndex++;
                            @endphp
                            <div class="col-md-6 col-lg-4 ">
                                <div class="products product-background-{{ $bgColor }}">
                                    <div class="product-image">
                                        <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}" class="">
                                        {{-- <img class="" src="https://cdn.firstcry.com/education/2022/11/06094158/Toy-Names-For-Kids.jpg" height="auto" alt=""> --}}
                                    </div>
                                    <a href="{{ route('detail-product', $product) }}" class='details'>
                                        <span>Detail</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                                <p class="judul">{{ $product->name }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class=" text-custom-grey text-center ">No product found.</div>
                    @endif


                </div>

                {{-- PAGINATION --}}
                <div class="vs-pagination  d-flex justify-content-center ">
                    @if ($products->hasPages())
                        <a href="{{ !$products->onFirstPage() ? $products->previousPageUrl() : '#' }}" class="pagi-btn  {{ !$products->onFirstPage() ? 'color-custom-red' : '' }} ">Prev</a>
                        <ul>
                            @for ($page = 1; $page <= $products->lastPage(); $page++)
                                <li><a href="{{ $products->url($page) }}">{{ $page }}</a></li>
                            @endfor
                        </ul>
                        <a href="{{ $products->hasMorePages() ? $products->nextPageUrl() : '#' }}" class="pagi-btn {{ $products->hasMorePages() ? 'color-custom-red' : '' }} ">Next</a>
                    @endif
                </div>

            </div>
            {{-- RIGHT SIDE --}}

        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('template/assets/js/range-slider.js') }}"></script>
    <script src="{{ asset('template/assets/js/filter-product.js') }}"></script>

@endpush
