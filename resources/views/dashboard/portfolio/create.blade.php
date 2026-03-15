@extends('layouts.dashboard')

@section('title', 'Create Portfolio')

@section('content')

    {{-- <div class="container-fluid">

        <div class="mb-4">
            <h2 class="fw-bold">Create Portfolio</h2>
            <p class="text-muted">Fill in your information to build your portfolio.</p>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">

                @include('portfolio.partials.builder')

            </div>
        </div>

    </div> --}}
    <div class="row justify-content-center">
        <div class="col-lg-12">

            @include('portfolio.partials.builder')

        </div>
    </div>

@endsection
