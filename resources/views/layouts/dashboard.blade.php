<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/portfolio/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio/template.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio/create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio/download.css') }}">
    @if (request()->is('admin/templates'))
        <link rel="stylesheet" href="{{ asset('css/admin/templates.css') }}">
    @endif
    @if (request()->is('admin/users'))
        <link rel="stylesheet" href="{{ asset('css/admin/users.css') }}">
    @endif
    @if (request()->is('admin/portfolios'))
        <link rel="stylesheet" href="{{ asset('css/admin/portfolios.css') }}">
    @endif
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">

        <div class="sidebar-header mb-3">
            <a href="/" class="sidebar-brand">
                <i class="fas fa-briefcase"></i>
                {{ config('app.name') }}
            </a>
        </div>

        <ul class="sidebar-nav">

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
                    Create Portfolio
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
                    Profile
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="{{ route('settings') }}"
                    class="sidebar-nav-link {{ request()->routeIs('settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="/admin"
                    class="sidebar-nav-link {{ request()->is('admin') ? 'active' : '' }}">
                    <i class="fas fa-shield-alt"></i>
                    Admin
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="/admin/templates"
                    class="sidebar-nav-link {{ request()->is('admin/templates') ? 'active' : '' }}">
                    <i class="fas fa-layer-group"></i>
                    Templates
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="/admin/users"
                    class="sidebar-nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </li>

            <li class="sidebar-nav-item">
                <a href="/admin/portfolios"
                    class="sidebar-nav-link {{ request()->is('admin/portfolios') ? 'active' : '' }}">
                    <i class="fas fa-folder"></i>
                    Portfolios
                </a>
            </li>

            <li class="sidebar-nav-item mt-auto">
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit"
                        class="sidebar-nav-link text-danger border-0 bg-transparent w-100 text-start">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </li>

        </ul>

    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <h1 class="page-title">@yield('title')</h1>
            <div class="user-info">
                <div class="user-avatar">
                    {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                </div>
                <div class="user-details">
                    <span class="user-name">{{ auth()->user()->name ?? 'User' }}</span>
                    <span class="user-role">Member</span>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <main class="container-fluid py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile sidebar toggle
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const isMobile = window.innerWidth <= 992;

            if (isMobile && sidebar.classList.contains('active')) {
                if (!sidebar.contains(e.target) && !e.target.closest('.sidebar-toggle')) {
                    sidebar.classList.remove('active');
                }
            }
        });

        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>

</html>
