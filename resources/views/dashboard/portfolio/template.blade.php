@extends('layouts.dashboard')

@section('title', 'Pilih Template')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            @include('portfolio.partials.template')
        </div>
    </div>
@endsection
