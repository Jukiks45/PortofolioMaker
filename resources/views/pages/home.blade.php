@extends('layouts.app')

@section('content')
    <!--===== MOBILE HEADER STARTS =======-->
    @include('pages.sections.mobile-header')
    <!--===== MOBILE HEADER STARTS =======-->
    <!--===== HERO AREA STARTS =======-->
    @include('pages.sections.hero')
    <!--===== HERO AREA ENDS =======-->
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
        class="scrollspy-example bg-body-tertiary rounded-2" tabindex="0">
        <!--===== ABOUT AREA STARTS =======-->
        @include('pages.sections.about')
        {{-- problem section --}}
        <!--===== ABOUT AREA ENDS =======-->
        <!--===== SERVICE AREA STARTS =======-->
        @include('pages.sections.service')
        {{-- features --}}
        <!--===== SERVICE AREA ENDS =======-->
        <!--===== WORK AREA STARTS =======-->
        @include('pages.sections.work')
        {{-- template preview --}}
        <!--===== WORK AREA ENDS =======-->
        <!--===== WORK AREA STARTS =======-->
        @include('pages.sections.work-other')
        <!--===== WORK AREA ENDS =======-->
        <!--===== CASE AREA STARTS =======-->
        @include('pages.sections.case')
        {{-- how it works --}}
        <!--===== CASE AREA ENDS =======-->
        <!--===== TESTIMONIAL AREA STARTS =======-->
        @include('pages.sections.testimonial')
        <!--===== TESTIMONIAL AREA ENDS =======-->
        <!--===== CTA AREA STARTS =======-->
        @include('pages.sections.cta')
        <!--===== CTA AREA ENDS =======-->
    @endsection
