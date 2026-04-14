@extends('layouts.dashboard')

@section('title', 'Templates')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Portfolio Templates</h2>
                <p class="text-muted mb-0">
                    Choose a template for your portfolio.
                </p>
            </div>
        </div>

        <div class="row g-4">

            <!-- TEMPLATE 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">

                    <img src="{{ asset('templates/template3.png') }}" class="card-img-top" alt="Template">

                    <div class="card-body">

                        <h5 class="card-title fw-semibold">
                            Modern Portfolio
                        </h5>

                        <p class="text-muted small">
                            Clean and minimal design.
                        </p>

                        <div class="template-actions">
                            <a href="{{ route('guest.portfolio.preview', ['id' => 1]) }}" class="btn-template btn-preview">
                                <i class="fas fa-eye"></i> Preview
                            </a>
                            <a href="{{ route('portfolio.create') }}" class="btn-template btn-primary">
                                <i class="fas fa-plus"></i> Use Template
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- TEMPLATE 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">

                    <img src="{{ asset('templates/template1.png') }}" class="card-img-top" alt="Template">

                    <div class="card-body">

                        <h5 class="card-title fw-semibold">
                            Professional CV
                        </h5>

                        <p class="text-muted small">
                            Perfect for professional resumes.
                        </p>

                        <div class="template-actions">
                            <a href="{{ route('guest.portfolio.preview', ['id' => 2]) }}" class="btn-template btn-preview">
                                <i class="fas fa-eye"></i> Preview
                            </a>
                            <a href="{{ route('portfolio.create') }}" class="btn-template btn-primary">
                                <i class="fas fa-plus"></i> Use Template
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- TEMPLATE 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">

                    <img src="{{ asset('templates/template2.png') }}" class="card-img-top" alt="Template">

                    <div class="card-body">

                        <h5 class="card-title fw-semibold">
                            Creative Resume
                        </h5>

                        <p class="text-muted small">
                            Great for designers and creatives.
                        </p>

                        <div class="template-actions">
                            <a href="{{ route('guest.portfolio.preview', ['id' => 3]) }}" class="btn-template btn-preview">
                                <i class="fas fa-eye"></i> Preview
                            </a>
                            <a href="{{ route('portfolio.create') }}" class="btn-template btn-primary">
                                <i class="fas fa-plus"></i> Use Template
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
