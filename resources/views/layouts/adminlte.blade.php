<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Aplikasi') }} — Admin</title>

    <!-- AdminLTE 4 + Bootstrap 5 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        .main-header .navbar-brand { font-weight: 600; }
    </style>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
    <!-- Navbar -->
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-lte-toggle="sidebar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand ms-2">{{ config('app.name', 'Aplikasi') }}</a>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endguest
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="light">
        <div class="sidebar-brand p-3 fw-semibold">Menu</div>
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}"><i class="fa-solid fa-gauge-high me-2"></i> Dashboard</a></li>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.soal.index') }}"><i class="fa-solid fa-list-check me-2"></i> Soal</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.peserta.index') }}"><i class="fa-solid fa-users me-2"></i> Peserta</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.hasil.index') }}"><i class="fa-solid fa-file-lines me-2"></i> Hasil</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <main class="app-main">
        <div class="app-content p-3">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Admin</div>
        <strong>&copy; {{ date('Y') }} {{ config('app.name', 'Aplikasi') }}.</strong> All rights reserved.
    </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"></script>
</body>
</html>
