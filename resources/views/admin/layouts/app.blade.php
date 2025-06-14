<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Meco Toys</title>

    {{-- General Icon --}}
    {{-- TODO: Add Apps Icon --}}

    @stack('style')

    {{-- Template CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/custom/css/custom.css') }}">
    <link rel="shortcut icon" href="{{ asset('template/assets/img/meco.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('template/assets/img/meco.png') }}" type="image/x-icon">

</head>

<body>
    <script src="{{ asset('assets/admin/static/js/initTheme.js') }}"></script>

    <div id="app">

        @include('admin.components.sidebar')

        <div id="main">

            {{-- Header --}}
            @include('admin.components.header')

            <!-- Content -->
            @yield('main')

            <!-- Footer -->
            @include('admin.components.footer')

        </div>

    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/admin/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/admin/compiled/js/app.js') }}"></script>


    @stack('script')

</body>

</html>
