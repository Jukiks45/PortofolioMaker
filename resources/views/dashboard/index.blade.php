@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="row g-4">

    {{-- WELCOME CARD --}}
    <div class="col-12">
        <div class="dashboard-card welcome-card">
            <div>
                <h4 class="mb-1">
                    Halo, {{ auth()->user()->name ?? 'User' }} 👋
                </h4>
                <p class="text-muted mb-0" style="font-size:.9rem;">
                    Kelola portfolio Anda dan buat CV profesional dengan mudah.
                </p>
            </div>
            <a href="{{ route('portfolio.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Buat Portfolio
            </a>
        </div>
    </div>

    {{-- STATS --}}
    <div class="col-md-4 col-6">
        <x-stat-card
            icon="fas fa-briefcase"
            color="primary"
            :value="$totalPortfolio ?? 0"
            label="Total Portfolio"
        />
    </div>
    <div class="col-md-4 col-6">
        <x-stat-card
            icon="fas fa-download"
            color="success"
            :value="$totalDownload ?? 0"
            label="Total Download"
        />
    </div>
    <div class="col-md-4 col-12">
        <x-stat-card
            icon="fas fa-eye"
            color="warning"
            :value="$totalPreview ?? 0"
            label="Total Preview"
        />
    </div>

    {{-- PORTFOLIO LIST --}}
    <div class="col-12">
        <div class="dashboard-card">
            <div class="card-header-custom">
                <h5 class="mb-0">Portfolio Anda</h5>
                <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-plus me-1"></i> Buat Baru
                </a>
            </div>

            <div class="portfolio-list">
                @forelse($portfolios ?? [] as $portfolio)
                    @include('dashboard.portfolio.partials.item', ['portfolio' => $portfolio])
                @empty
                    <div class="text-center py-4" style="border:1.5px dashed #e2e8f0;border-radius:12px;">
                        <i class="fas fa-briefcase" style="font-size:2rem;color:#c4b5fd;margin-bottom:.75rem;display:block;"></i>
                        <p class="text-muted mb-3" style="font-size:.9rem;">Belum ada portfolio. Yuk buat sekarang!</p>
                        <a href="{{ route('portfolio.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-1"></i> Buat Portfolio
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>

@endsection
