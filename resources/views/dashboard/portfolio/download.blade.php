@extends('layouts.dashboard')

@section('title', 'Download Portfolio')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12">

            @include('portfolio.partials.download')

        </div>
    </div>

@endsection
