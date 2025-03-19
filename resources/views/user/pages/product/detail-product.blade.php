@extends('user.layouts.app')

@section('title', 'Detail Product')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/css/shop.css') }}">

    <style>
        .style4 {
            background-color: var(--smoke-color) !important;
        }
    </style>
@endpush

@section('main')
    <!--==============================
    Product Details
    ==============================-->
    <section class="vs-product-wrapper product-details mt-5 space-extra-bottom">
        <div class="container">
            <div class="row gx-40">
                <div class="col-lg-6">
                    <div class="product-big-img vs-carousel" data-slide-show="1" data-fade="true"
                        data-asnavfor=".product-thumb-slide">
                        @foreach ($product->images as $image)
                            <div class="main-product-image">
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Product Image">
                            </div>
                        @endforeach
                    </div>
                    <div class="product-thumb-slide row vs-carousel" data-slide-show="3" data-md-slide-show="3"
                        data-sm-slide-show="3" data-xs-slide-show="3" data-asnavfor=".product-big-img">
                        @foreach ($product->images as $image)
                            <div class="col-3">
                                <div class="thumb product-image-slider">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="Product Thumbnail">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 align-self-start">
                    <div class="product-about">
                        <h2 class="product-title">{{ $product->name }}</h2>
                        <p class="product-text text-justify">{{ $product->description }}</p>

                        {{-- <div class="product-getway">
                            <div class="platform d-flex gap-3 align-item-center">
                                <span class="getway-title m-0">Available on:</span>
                                <a href=""><img src="{{ asset ('template/assets/img/widget/shopee.svg')}}" alt="cards"></a>
                                <a href=""><img src="{{ asset ('template/assets/img/widget/blibli.svg')}}" alt="cards"></a>
                                <a href=""><img src="{{ asset ('template/assets/img/widget/tokopedia.svg')}}" alt="cards"></a>
                                <a href=""><img src="{{ asset ('template/assets/img/widget/zalora.svg')}}" alt="cards"></a>
                                <a href=""><img src="{{ asset ('template/assets/img/widget/lazada.svg')}}" alt="cards"></a>
                            </div>
                        </div> --}}

                        <div class="product_meta mb-3">
                            <span class="getway-title m-0 text-dark">SKU: <span class="sku fw-light">#{{ $product->sku }}</span></span>
                            <span class="getway-title m-0 text-dark">Category: <a href="#" rel="tag">{{ $product->category->name }}</a></span>
                            <span class="getway-title m-0 text-dark">Stock: <span class="sku fw-light">{{ $product->stock }} pcs</span></span>
                        </div>
                        <div class="actions">
                            <div class="quantity d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <label for="quantity" class="screen-reader-text">Price</label>
                                    <p class="product-price text-sm">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="quantity" class="screen-reader-text text-center">Quantity</label>
                                    <div class="d-flex">
                                        <button class="quantity-minus qty-btn" id="minus-counter"><i class="fal fa-minus"></i></button>
                                        <form action="{{ route('add-to-cart', $product) }}" method="POST" id="productForm">
                                            @csrf
                                            <input type="number" id="quantity" class="qty-input" step="1" min="1" max="100"
                                                name="quantity" value="1" title="Qty">
                                        </form>
                                        <button class="quantity-plus qty-btn" id="plus-counter"><i class="fal fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            {{-- <a href="#" class="vs-btn check-out">Checkout</a> --}}
                            <button type="submit" class="vs-btn addcart" form="productForm">Add to Cart</button>

                        </div>

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
                    </div>
                </div>
            </div>

    <!--==============================
    Product Area
    ==============================-->

    </section>
         <!-- Wave Shape -->
         <div class="vs-wave-shape style3">
        <svg viewBox="0 0 1920 295" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="wave-path" fill-rule="evenodd" clip-rule="evenodd"
                d="M1920 295V202.758C1906.48 131.342 1843.63 77.168 1768.34 77.168C1739.37 77.168 1711.54 85.1814 1687.4 100.128C1650.68 38.4074 1584.56 0 1511.11 0C1412.1 0 1329.2 70.2842 1309.68 163.577C1294.03 136.928 1265.08 119 1232 119C1215.11 119 1198.88 123.673 1184.8 132.389C1163.39 96.397 1124.83 74 1082 74C1022.17 74 972.422 118.018 963.444 175.369C947.459 160.855 926.246 152 903 152C886.11 152 869.88 156.673 855.803 165.389C834.387 129.397 795.832 107 753 107C710.158 107 672.487 129.569 651.251 163.442C635.542 150.075 615.199 142 593 142C576.11 142 559.88 146.673 545.803 155.389C524.387 119.397 485.832 97 443 97C400.012 97 362.23 119.723 341.034 153.789C324.552 132.631 298.841 119 270 119C253.11 119 236.88 123.673 222.803 132.389C201.387 96.397 162.832 74 120 74C53.8333 74 0.000244141 127.833 0.000244141 194C0.000244141 194.41 0.000244141 194.835 0.0152435 195.245L0.000244141 195.248V295H1920Z" />
        </svg>
    </div>
    <section class="bg-smoke vs-product-wrapper space-extra-bottom">
        <div class="container">
            <div class="title-area text-center">
                <h1 class="sec-title" style="color: black;">Related Products</h1>
            </div>
            <div class="row justify-content-center shopping">

                @foreach ($relatedProducts as $index => $product)
                    @php
                        $colors = ['red', 'green', 'yellow', 'purple', 'blue', 'pink'];
                        $firstImage = $product->images->first() ? $product->images->first()->path : 'default.jpg';
                        $bgColor = $colors[$index % count($colors)];
                    @endphp
                    <div class="col-md-6 col-lg-3">
                        <div class="products product-background-{{ $bgColor }}">
                            <div class="product-image">
                                <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}">
                            </div>
                            <a href="{{ route('detail-product', $product->slug) }}" class='details'>
                                <span>Detail</span>
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <p class="judul">{{ $product->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @endsection

@push('script')
    <script src="{{ asset('template/assets/js/product.js') }}"></script>
@endpush
