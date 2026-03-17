<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio Maker')</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- main.css from template — still loaded but scoped issues handled by auth.css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    {{-- Auth-specific CSS — loads AFTER main.css so it wins specificity battles --}}
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    {{-- Fav icon --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/fav-logo1.png') }}" type="image/x-icon">
</head>
<body class="auth-page">

    @yield('content')

    {{-- Minimal JS — no jQuery plugins that interfere --}}
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
</body>
</html>
