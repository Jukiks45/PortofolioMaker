@extends('layouts.dashboard')

@section('title', 'Edit Portfolio')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold">Edit Portfolio</h2>
        <p class="text-muted">Update your portfolio information.</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            {{-- Reuse portfolio builder --}}
            @include('portfolio.create')

        </div>
    </div>

</div>

@endsection
