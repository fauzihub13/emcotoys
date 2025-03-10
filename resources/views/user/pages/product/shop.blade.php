@extends('user.layouts.app')

@section('title', 'Product')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/css/shop.css') }}">
@endpush

@section('main')

    <section class="vs-hero-wrapper atas">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('template/assets/img/product/product-hero.png') }}" class="py-4 px-4" alt="">
        </div>
        <div class="vs-wave-shape style3" style="background-color: #FFC6D3;">
            <svg viewBox="0 0 1920 295" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="wave-path atas" fill-rule="evenodd" clip-rule="evenodd"
                    d="M1920 295V202.758C1906.48 131.342 1843.63 77.168 1768.34 77.168C1739.37 77.168 1711.54 85.1814 1687.4 100.128C1650.68 38.4074 1584.56 0 1511.11 0C1412.1 0 1329.2 70.2842 1309.68 163.577C1294.03 136.928 1265.08 119 1232 119C1215.11 119 1198.88 123.673 1184.8 132.389C1163.39 96.397 1124.83 74 1082 74C1022.17 74 972.422 118.018 963.444 175.369C947.459 160.855 926.246 152 903 152C886.11 152 869.88 156.673 855.803 165.389C834.387 129.397 795.832 107 753 107C710.158 107 672.487 129.569 651.251 163.442C635.542 150.075 615.199 142 593 142C576.11 142 559.88 146.673 545.803 155.389C524.387 119.397 485.832 97 443 97C400.012 97 362.23 119.723 341.034 153.789C324.552 132.631 298.841 119 270 119C253.11 119 236.88 123.673 222.803 132.389C201.387 96.397 162.832 74 120 74C53.8333 74 0.000244141 127.833 0.000244141 194C0.000244141 194.41 0.000244141 194.835 0.0152435 195.245L0.000244141 195.248V295H1920Z" />
            </svg>
        </div>
    </section>

    <section class="  ">
        <div class="container">
            <div class="title-area text-center">
                <div class="sec-bubble">
                    <div class="bubble"></div>
                    <div class="bubble"></div>
                    <div class="bubble"></div>
                </div>
                <h1 class="sec-title" style="color: black;">Browse Our Toys</h1>
                <p class="sec-text" style="font-weight: 600; color:black">Our Collection</p>
            </div>
            <div class="category-container d-flex flex-wrap">
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector.svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/lego.svg') }}" alt="Bricks" class="icon brix" style="fill: #4482C8;">
                    <p>Bricks</p>
                </div>
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector (1).svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/vehicle.svg') }}" alt="Toy Vehicle" class="icon">
                    <p>Toy Vehicle</p>
                </div>
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector (2).svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/brick.png') }}" alt="Educational Toys" class="icon">
                    <p>Educational Toys</p>
                </div>
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector (3).svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/pot.png') }}" alt="Cooking Toys" class="icon">
                    <p>Cooking Toys</p>
                </div>
                <div class="category">
                    <img src="{{ asset('template/assets/img/shop/Vector (4).svg') }}" alt="Cloud" class="cloud">
                    <img src="{{ asset('template/assets/img/shop/doll.png') }}" alt="Dolls" class="icon">
                    <p>Dolls</p>
                </div>
            </div>
            <!-- <div class="row d-flex gx-0 vs-carousel partner" data-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2"
                data-xs-slide-show="2" data-dots="true">
                <div class="col-xl-4 brands">
                    <div class="category-style2">
                        <div class="category-img"><a href="class-details.html"><img
                                    src="{{ asset('template/assets/img/category/cat-1-1.jpg') }}" alt="category"></a></div>
                    </div>
                </div>
                <div class="col-xl-4 brands">
                    <div class="category-style2">
                        <div class="category-img"><a href="class-details.html"><img
                                    src="{{ asset('template/assets/img/category/cat-1-2.jpg') }}" alt="category"></a></div>
                    </div>
                </div>
                <div class="col-xl-4 brands">
                    <div class="category-style2">
                        <div class="category-img"><a href="class-details.html"><img
                                    src="{{ asset ('template/assets/img/category/cat-1-3.jpg') }}" alt="category"></a></div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    {{--  --}}
    <section class="vs-product-wrapper space-extra-bottom">
        <div class="container">
            <div class="title-area text-center" style="margin-top: 80px;">
                <h1 class="sec-title" style="color: black;">Our Products</h1>
                <div class="options">
                    <a href="" class="active">Best Seller</a>
                    <a href="">New Arrival</a>
                </div>
            </div>
            <div class="row justify-content-center ">

                @php
                    $colors = ['red', 'green', 'yellow', 'purple', 'blue', 'pink'];
                @endphp

                @for ($i=0; $i<8; $i++)
                    @php
                        $bgColor = $colors[$i % count($colors)];
                    @endphp
                    <div class="col-md-6 col-lg-3 ">
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
            <div class="row mt-4">
                <a href="{{ route('all-product') }}" class="text-center fs-5">See all product <span class="ms-2"><i class="fas fa-chevron-right"></i></span></a>
            </div>
        </div>
    </section>



@endsection

@push('script')
@endpush
