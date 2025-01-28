<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Emco Toys</title>

    {{-- General Icon --}}
    {{-- TODO: Add Apps Icon --}}

    @stack('style')

    {{-- Template CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/iconly.css') }}">

</head>

<body>
    <script src="{{ asset('assets/admin/static/js/initTheme.js') }}"></script>

    <div id="app">

        @include('admin.components.sidebar')

        <div id="main">

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

    @yield('script')

</body>

</html>
