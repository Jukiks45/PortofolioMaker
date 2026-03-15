@extends('layouts.dashboard')

@section('title', 'Preview Portfolio')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12">

            @include('portfolio.partials.preview')

        </div>
    </div>

@endsection
