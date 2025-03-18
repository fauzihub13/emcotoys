@extends('user.layouts.app')

@section('title', 'Contact Us')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/css/maps.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
         #map {
            height: 500px; /* Atur tinggi peta */
        }
        .style4 {
            background-color: #f0f6fa !important;
        }
    </style>
@endpush

@section('main')

<section class="vs-hero-wrapper atas">
    <div class="text-center py-3">
        <h1 class="mb-0">Our Location</h1>
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
            <h2 class="sec-title" style="color: #C8272C;">OUR BRAND PARTNER</h2>
            <p class="sec-text">We collaborate with trusted toy manufacturers to ensure quality</p>
        </div>
        <div class="row d-flex justify-content-between gy-4">
            <div class="col-sm-4 brands">
                <img src="{{ asset('template/assets/img/category/Logo_Indomaret 1.png') }}" alt="category">
            </div>
            <div class="col-sm-4 brands">
                <img src="{{ asset('template/assets/img/category/alfamidi.png') }}" alt="category">
            </div>
            <div class="col-sm-4 brands">
                <img src="{{ asset('template/assets/img/category/alfamart.png') }}" alt="category">
            </div>
        </div>
    </div>
</section>
<div class="maps">
    <div id="map"></div>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16328186.410165899!2d107.18505469742318!3d-2.381042138954834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sen!2sid!4v1741500085213!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
</div>
<section class=" space-extra bg-smoke">
    <div class="container">
        <div class="title-area">
            <h2 class="text-center mt-n2">Key supporters</h2>
        </div>
        <div class="row vs-carousel gx-10" data-slide-show="5" data-ml-slide-show="4" data-lg-slide-show="3"
            data-md-slide-show="2" data-sm-slide-show="2">
            <div class="col-auto">
                <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-1.png.png") }}" alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-2.png.png") }}" alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-3.png.png") }}" alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-4.png.png") }}" alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-5.png.png") }}" alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="{{ asset("template/assets/img/brand/b-1-6.png.png") }}" alt="brand"></div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([-6.2000, 106.8167], 5); // Koordinat awal (Indonesia)

    // Tambahkan layer peta OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Data toko dari Laravel
    var stores = @json($stores);

    // Tambahkan marker berdasarkan data database
    stores.forEach(store => {
        L.marker([store.latitude, store.longitude])
            .addTo(map)
            .bindPopup(`<b>${store.name}</b><br>${store.url}`);
    });
</script>
@endpush