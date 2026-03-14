@extends('layouts.dashboard')

@section('title', 'My Portfolio')

@section('content')

    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">My Portfolio</h2>
                <p class="text-muted mb-0">
                    Manage your created portfolios.
                </p>
            </div>

            <a href="{{ route('portfolio.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create Portfolio
            </a>
        </div>


        <!-- Portfolio Grid -->
        <div class="row g-4">

            <!-- Portfolio Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">

                    <img src="https://placehold.co/600x400" class="card-img-top" alt="Portfolio Preview">

                    <div class="card-body">

                        <h5 class="fw-semibold mb-1">
                            John Doe CV
                        </h5>

                        <p class="text-muted small mb-2">
                            Template: Modern CV
                        </p>

                        <p class="text-muted small">
                            Last updated: 2 days ago
                        </p>

                        <div class="d-flex gap-2 flex-wrap">

                            <a href="{{ route('guest.portfolio.preview') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i> Preview
                            </a>

                            <a href="{{ route('portfolio.edit') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <button class="btn btn-outline-success btn-sm">
                                <i class="fas fa-download"></i> Download
                            </button>

                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>

                        </div>

                    </div>

                </div>
            </div>


            <!-- Portfolio Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">

                    <img src="https://placehold.co/600x400" class="card-img-top" alt="Portfolio Preview">

                    <div class="card-body">

                        <h5 class="fw-semibold mb-1">
                            UI Designer Portfolio
                        </h5>

                        <p class="text-muted small mb-2">
                            Template: Creative Resume
                        </p>

                        <p class="text-muted small">
                            Last updated: 5 days ago
                        </p>

                        <div class="d-flex gap-2 flex-wrap">

                            <a href="{{ route('guest.portfolio.preview') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i> Preview
                            </a>

                            <a href="{{ route('portfolio.edit') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <button class="btn btn-outline-success btn-sm">
                                <i class="fas fa-download"></i> Download
                            </button>

                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>

                        </div>

                    </div>

                </div>
            </div>


            <!-- Portfolio Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">

                    <img src="https://placehold.co/600x400" class="card-img-top" alt="Portfolio Preview">

                    <div class="card-body">

                        <h5 class="fw-semibold mb-1">
                            Developer Resume
                        </h5>

                        <p class="text-muted small mb-2">
                            Template: Minimal CV
                        </p>

                        <p class="text-muted small">
                            Last updated: 1 week ago
                        </p>

                        <div class="d-flex gap-2 flex-wrap">

                            <a href="{{ route('guest.portfolio.preview') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i> Preview
                            </a>

                            <a href="{{ route('portfolio.edit') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <button class="btn btn-outline-success btn-sm">
                                <i class="fas fa-download"></i> Download
                            </button>

                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
