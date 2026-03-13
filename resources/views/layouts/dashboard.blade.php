<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/portfolio/dashboard.css') }}">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="/" class="sidebar-brand">
                <i class="fas fa-briefcase"></i>
                {{ config('app.name') }}
            </a>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="/dashboard" class="sidebar-nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="/create-portfolio" class="sidebar-nav-link {{ request()->is('create-portfolio') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle"></i>
                    Buat Portfolio
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="/portfolio-template" class="sidebar-nav-link {{ request()->is('portfolio-template') ? 'active' : '' }}">
                    <i class="fas fa-palette"></i>
                    Template
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="/portfolio-preview" class="sidebar-nav-link {{ request()->is('portfolio-preview') ? 'active' : '' }}">
                    <i class="fas fa-eye"></i>
                    Preview
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="/portfolio-download" class="sidebar-nav-link {{ request()->is('portfolio-download') ? 'active' : '' }}">
                    <i class="fas fa-download"></i>
                    Download
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="/profile" class="sidebar-nav-link {{ request()->is('profile') ? 'active' : '' }}">
                    <i class="fas fa-user"></i>
                    Profile
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="/settings" class="sidebar-nav-link {{ request()->is('settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
            </li>
            <li class="sidebar-nav-item mt-auto">
                <a href="/logout" class="sidebar-nav-link text-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
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
        <main>
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
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>
</html>
