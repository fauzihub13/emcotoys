<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Emco Toys</title>

    <meta name="author" content="Vecuro">
    <meta name="description" content="Emcotoys - Toys Kids">
    <meta name="keywords" content="Emcotoys - Toys Kids">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{ asset ('template/assets/img/emco.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('template/assets/img/emco.png') }}" type="image/x-icon">

    {{-- FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Jost:wght@400;500&display=swap"
        rel="stylesheet">


    {{-- CSS --}}
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/fontawesome.min.css') }} ">
    <!-- Layerslider -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/layerslider.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/slick.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/custom.css') }}">


    <!-- General CSS -->
    @stack('style')

</head>
<body>


    {{-- HEADER --}}
    @include('user.components.header')
    {{-- HEADER --}}


    {{-- CONTENT --}}
    @yield('main')
    {{-- CONTENT --}}


    {{-- FOOTER --}}
    @include('user.components.footer')
    {{-- FOOTER --}}


    {{-- JS --}}
    <!-- Jquery -->
    <script src="{{ asset('template/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('template/assets/js/slick.min.js') }}"></script>
    <!-- <script src="{{ asset('template/assets/js/app.min.js') }}"></script> -->
    <!-- Layerslider -->
    <script src="{{ asset('template/assets/js/layerslider.utils.js') }}"></script>
    <script src="{{ asset('template/assets/js/layerslider.transitions.js') }}"></script>
    <script src="{{ asset('template/assets/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <!-- jquery ui -->
    <script src="{{ asset('template/assets/js/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('template/assets/js/bootstrap.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('template/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('template/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('template/assets/js/datecounter.js') }}"></script>
    <script src="{{ asset('template/assets/js/main.js') }}"></script>

    <!-- General JS Scripts -->
    @stack('script')

</body>
</html>
