@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="header-section mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h4 class="header-title mb-1">Admin Dashboard</h4>
                <p class="text-muted mb-0" style="font-size:.85rem;">
                    Selamat datang kembali, {{ auth()->user()->name ?? 'Admin' }}.
                </p>
            </div>
            <span class="badge rounded-pill px-3 py-2" style="background:#ecfdf5;color:#059669;font-size:.8rem;font-weight:700;">
                <i class="fas fa-circle me-1" style="font-size:.5rem;"></i> Sistem Normal
            </span>
        </div>
    </div>

    {{-- STATS GRID --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
            <div class="dashboard-card stat-card">
                <div class="stat-icon primary">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Total Users</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="dashboard-card stat-card">
                <div class="stat-icon success">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Total Portfolio</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="dashboard-card stat-card">
                <div class="stat-icon warning">
                    <i class="fas fa-palette"></i>
                </div>
                <div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Total Template</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="dashboard-card stat-card">
                <div class="stat-icon info">
                    <i class="fas fa-download"></i>
                </div>
                <div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Total Download</div>
                </div>
            </div>
        </div>
    </div>

    {{-- QUICK LINKS --}}
    <div class="row g-3">
        <div class="col-md-4">
            <a href="/admin/users" class="text-decoration-none">
                <div class="dashboard-card d-flex align-items-center gap-3 p-3"
                    style="border-left:4px solid #5B3DF5;transition:all .2s;">
                    <div class="stat-icon primary" style="width:40px;height:40px;border-radius:10px;flex-shrink:0;">
                        <i class="fas fa-users" style="font-size:.9rem;"></i>
                    </div>
                    <div>
                        <div style="font-weight:700;color:#0b0f3b;font-size:.9rem;">Kelola Users</div>
                        <div style="font-size:.78rem;color:#94a3b8;">Lihat & kelola semua pengguna</div>
                    </div>
                    <i class="fas fa-arrow-right ms-auto" style="color:#c4b5fd;font-size:.85rem;"></i>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/admin/templates" class="text-decoration-none">
                <div class="dashboard-card d-flex align-items-center gap-3 p-3"
                    style="border-left:4px solid #10b981;transition:all .2s;">
                    <div class="stat-icon success" style="width:40px;height:40px;border-radius:10px;flex-shrink:0;">
                        <i class="fas fa-layer-group" style="font-size:.9rem;"></i>
                    </div>
                    <div>
                        <div style="font-weight:700;color:#0b0f3b;font-size:.9rem;">Kelola Template</div>
                        <div style="font-size:.78rem;color:#94a3b8;">Tambah & edit template portfolio</div>
                    </div>
                    <i class="fas fa-arrow-right ms-auto" style="color:#6ee7b7;font-size:.85rem;"></i>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/admin/portfolios" class="text-decoration-none">
                <div class="dashboard-card d-flex align-items-center gap-3 p-3"
                    style="border-left:4px solid #f59e0b;transition:all .2s;">
                    <div class="stat-icon warning" style="width:40px;height:40px;border-radius:10px;flex-shrink:0;">
                        <i class="fas fa-folder-open" style="font-size:.9rem;"></i>
                    </div>
                    <div>
                        <div style="font-weight:700;color:#0b0f3b;font-size:.9rem;">Kelola Portfolio</div>
                        <div style="font-size:.78rem;color:#94a3b8;">Monitor portfolio pengguna</div>
                    </div>
                    <i class="fas fa-arrow-right ms-auto" style="color:#fcd34d;font-size:.85rem;"></i>
                </div>
            </a>
        </div>
    </div>

</div>

@endsection
