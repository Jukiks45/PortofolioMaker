<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio/wizard.css') }}">
    @if (request()->is('portfolio/create'))
        <link rel="stylesheet" href="{{ asset('css/portfolio/create.css') }}">
    @endif

    @if (request()->is('portfolio/edit'))
        <link rel="stylesheet" href="{{ asset('css/portfolio/create.css') }}">
    @endif

    @if (request()->is('portfolio/template'))
        <link rel="stylesheet" href="{{ asset('css/portfolio/template.css') }}">
    @endif

    @if (request()->routeIs('portfolio.preview'))
        <link rel="stylesheet" href="{{ asset('css/portfolio/preview.css') }}">
    @endif

    @if (request()->routeIs('portfolio.download'))
        <link rel="stylesheet" href="{{ asset('css/portfolio/download.css') }}">
    @endif
    @stack('styles')

    @if (request()->is('admin/*'))
        <link rel="stylesheet" href="{{ asset('css/admin/admin-base.css') }}">
    @endif
    @if (request()->is('admin/templates'))
        <link rel="stylesheet" href="{{ asset('css/admin/templates.css') }}">
    @endif
    @if (request()->is('admin/users'))
        <link rel="stylesheet" href="{{ asset('css/admin/users.css') }}">
    @endif
    @if (request()->is('admin/portfolios'))
        <link rel="stylesheet" href="{{ asset('css/admin/portfolios.css') }}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <!-- Mobile sidebar toggle -->
    <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle Sidebar">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">

        <div class="sidebar-header">
            <a href="/" class="sidebar-brand">
                <i class="fas fa-briefcase"></i>
                {{ config('app.name') }}
            </a>
        </div>

        <ul class="sidebar-nav">

            {{-- USER MENU --}}
            <li><span class="sidebar-label">Menu Utama</span></li>

            <li class="sidebar-nav-item">
                <a href="{{ route('dashboard') }}"
                    class="sidebar-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="{{ route('portfolio.index') }}"
                    class="sidebar-nav-link {{ request()->routeIs('portfolio.index') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i>
                    My Portfolio
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="{{ route('portfolio.create') }}"
                    class="sidebar-nav-link {{ request()->routeIs('portfolio.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle"></i>
                    Buat Portfolio
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="{{ route('portfolio.templates') }}"
                    class="sidebar-nav-link {{ request()->routeIs('portfolio.templates') ? 'active' : '' }}">
                    <i class="fas fa-palette"></i>
                    Templates
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="{{ route('profile') }}"
                    class="sidebar-nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                    <i class="fas fa-user"></i>
                    Profil
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="{{ route('settings') }}"
                    class="sidebar-nav-link {{ request()->routeIs('settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    Pengaturan
                </a>
            </li>

            {{-- DIVIDER --}}
            <li>
                <div class="sidebar-divider"></div>
            </li>

            {{-- ADMIN MENU --}}
            <li><span class="sidebar-label">Admin</span></li>

            <li class="sidebar-nav-item">
                <a href="/admin"
                    class="sidebar-nav-link {{ request()->is('admin') && !request()->is('admin/*') ? 'active' : '' }}">
                    <i class="fas fa-shield-alt"></i>
                    Admin Panel
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="/admin/templates"
                    class="sidebar-nav-link {{ request()->is('admin/templates') ? 'active' : '' }}">
                    <i class="fas fa-layer-group"></i>
                    Kelola Template
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="/admin/users" class="sidebar-nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    Kelola Users
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="/admin/portfolios"
                    class="sidebar-nav-link {{ request()->is('admin/portfolios') ? 'active' : '' }}">
                    <i class="fas fa-folder-open"></i>
                    Kelola Portfolio
                </a>
            </li>

            {{-- DIVIDER --}}
            <li>
                <div class="sidebar-divider"></div>
            </li>

            {{-- LOGOUT --}}
            <li class="sidebar-nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-nav-link text-danger">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </li>

        </ul>
    </aside>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Topbar -->
        <div class="topbar">
            <h1 class="page-title">@yield('title')</h1>
            <div class="user-info">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="user-details">
                    <span class="user-name">{{ auth()->user()->name ?? 'User' }}</span>
                    <span class="user-role">Member</span>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <main>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Toast Container -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index:9999;">
        <div id="appToast" class="toast border-0 shadow-sm" role="alert">
            <div class="d-flex">
                <div class="toast-body fw-medium" id="toastMessage"></div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showToast(message, type = 'success') {
            const toastEl = document.getElementById('appToast');
            const toastBody = document.getElementById('toastMessage');

            toastBody.textContent = message;

            // reset class
            toastEl.className = 'toast border-0 shadow-sm';

            // warna sesuai type
            if (type === 'success') {
                toastEl.classList.add('bg-success', 'text-white');
            } else if (type === 'error') {
                toastEl.classList.add('bg-danger', 'text-white');
            } else if (type === 'warning') {
                toastEl.classList.add('bg-warning');
            } else {
                toastEl.classList.add('bg-primary', 'text-white');
            }

            const toast = new bootstrap.Toast(toastEl, {
                delay: 2000
            });

            toast.show();
        }
    </script>
    <script>
        // Sidebar toggle for mobile
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('sidebarToggle');

        function openSidebar() {
            sidebar.classList.add('active');
            overlay.classList.add('active');
            toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
        }

        function closeSidebar() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
        }

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.contains('active') ? closeSidebar() : openSidebar();
        });

        overlay.addEventListener('click', closeSidebar);

        // Close on resize to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) closeSidebar();
        });

        // Bootstrap tooltips
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                new bootstrap.Tooltip(el);
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
