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

                <a href="{{ route('guest.portfolio.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Buat Portfolio
                </a>

            </div>
        </div>


        <!-- Stats -->

        <div class="col-md-4">
            <div class="dashboard-card stat-card">

                <div class="stat-icon primary">
                    <i class="fas fa-briefcase"></i>
                </div>

                <div>
                    <div class="stat-value">3</div>
                    <div class="stat-label">Total Portfolio</div>
                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="dashboard-card stat-card">

                <div class="stat-icon success">
                    <i class="fas fa-download"></i>
                </div>

                <div>
                    <div class="stat-value">12</div>
                    <div class="stat-label">Total Download</div>
                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="dashboard-card stat-card">

                <div class="stat-icon warning">
                    <i class="fas fa-eye"></i>
                </div>

                <div>
                    <div class="stat-value">25</div>
                    <div class="stat-label">Total Preview</div>
                </div>

            </div>
        </div>


        <!-- Portfolio -->

        <div class="col-12">

            <div class="dashboard-card">

                <div class="card-header-custom">

                    <h5 class="mb-0">
                        Portfolio Anda
                    </h5>

                    <a href="{{ route('guest.portfolio.create') }}" class="btn btn-sm btn-outline-primary">
                        + Buat Baru
                    </a>

                </div>


                <div class="portfolio-list">

                    <div class="portfolio-item">

                        <div>

                            <h6 class="mb-1">Modern Resume</h6>

                            <small class="text-muted">
                                Template: Modern • Update: 12 Mar 2026
                            </small>

                        </div>

                        <div class="portfolio-actions">

                            <a href="{{ route('guest.portfolio.preview') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('guest.portfolio.template') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="{{ route('guest.portfolio.download') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-download"></i>
                            </a>

                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>

                        </div>

                    </div>


                    <div class="portfolio-item">

                        <div>

                            <h6 class="mb-1">Creative Resume</h6>

                            <small class="text-muted">
                                Template: Creative • Update: 10 Mar 2026
                            </small>

                        </div>

                        <div class="portfolio-actions">

                            <a href="{{ route('guest.portfolio.preview') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('guest.portfolio.template') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="{{ route('guest.portfolio.download') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-download"></i>
                            </a>

                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
