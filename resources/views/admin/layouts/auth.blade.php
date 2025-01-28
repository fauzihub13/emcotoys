<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Emco Toys</title>

    {{-- General Icon --}}
    {{-- TODO: Add Apps Icon --}}

    @stack('style')

    {{-- General CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset ('assets/admin/compiled/css/auth.css') }}">

</head>

<body>
    <script src="{{ asset ('assets/admin/static/js/initTheme.js') }}"></script>
    <div id="auth">
        @yield('content')
    </div>

    @yield('script')

</body>

</html>
