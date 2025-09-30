<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Test Psikolog') }}</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite assets: Bootstrap (CSS/JS) via dedicated public entries -->
    @vite(['resources/css/public.css', 'resources/js/public.js'])

    <!-- Landing page overrides (static public asset) -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

    <style>
        :root { --bs-body-font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif; }
        body { font-family: var(--bs-body-font-family); }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ url('/') }}">{{ config('app.name', 'Test Psikolog') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPublic" aria-controls="navbarPublic" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarPublic">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endguest
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}">Dashboard</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-fill">
        @yield('content')
    </main>

    <footer class="mt-auto py-3 bg-white border-top">
        <div class="container text-center small text-muted">
            &copy; {{ date('Y') }} {{ config('app.name', 'Test Psikolog') }}. All rights reserved.
        </div>
    </footer>
</body>
</html>
