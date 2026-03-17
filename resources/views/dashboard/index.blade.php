@php
$portfolios = $portfolios ?? [
    [
        'title' => 'Modern Resume',
        'template' => 'Modern',
        'updated_at' => '12 Mar 2026'
    ],
    [
        'title' => 'Creative Resume',
        'template' => 'Creative',
        'updated_at' => '10 Mar 2026'
    ]
];
@endphp

@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

    <div class="row g-4">

        <!-- Welcome -->

        <div class="col-12">
            <div class="dashboard-card welcome-card">

                <div>
                    <h4 class="mb-1">
                        Halo, {{ auth()->user()->name ?? 'User' }} 👋
                    </h4>

                    <p class="text-muted mb-0">
                        Kelola portfolio Anda dan buat CV profesional dengan mudah.
                    </p>
                </div>

                <a href="{{ route('portfolio.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Buat Portfolio
                </a>

            </div>
        </div>


        <!-- Stats -->

        <div class="col-md-4">
            <x-stat-card
                icon="fas fa-briefcase"
                color="primary"
                :value="$totalPortfolio ?? 0"
                label="Total Portfolio"
            />
        </div>

        <div class="col-md-4">
            <x-stat-card
                icon="fas fa-download"
                color="success"
                :value="$totalDownload ?? 0"
                label="Total Download"
            />
        </div>

        <div class="col-md-4">
            <x-stat-card
                icon="fas fa-eye"
                color="warning"
                :value="$totalPreview ?? 0"
                label="Total Preview"
            />
        </div>


        <!-- Portfolio -->

        <div class="col-12">

            <div class="dashboard-card">

                <div class="card-header-custom">

                    <h5 class="mb-0">
                        Portfolio Anda
                    </h5>

                    <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-outline-primary">
                        + Buat Baru
                    </a>

                </div>


                <div class="portfolio-list">

                    @forelse($portfolios ?? [] as $portfolio)

                        @include('dashboard.portfolio.partials.item', ['portfolio' => $portfolio])

                    @empty

                    <p class="text-muted">Belum ada portfolio</p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

@endsection
