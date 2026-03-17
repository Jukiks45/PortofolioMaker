@push('styles')
    @vite('resources/css/auth.css')
@endpush

@extends('layouts.auth')

@section('content')
    <div class="cta1-section-area sp1" style="min-height:100vh; display:flex; align-items:center;">
        <div class="container">
            <div class="row align-items-center">

                <!-- FORM -->
                <div class="col-lg-5">
                    <div class="cta-header heading1">

                        <h2>Register</h2>

                        <div class="space24"></div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" class="login-form">
                            @csrf

                            <input
                                type="text"
                                name="name"
                                placeholder="Nama Lengkap"
                                value="{{ old('name') }}"
                                class="@error('name') is-invalid @enderror"
                            >
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <input
                                type="email"
                                name="email"
                                placeholder="Masukkan Email Anda"
                                value="{{ old('email') }}"
                                class="@error('email') is-invalid @enderror"
                            >
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <input
                                type="password"
                                name="password"
                                placeholder="Password"
                                class="@error('password') is-invalid @enderror"
                            >
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <input
                                type="password"
                                name="password_confirmation"
                                placeholder="Konfirmasi Password"
                                class="@error('password_confirmation') is-invalid @enderror"
                            >
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <button type="submit" class="vl-btn1">
                                Daftar Sekarang
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>

                        </form>

                        <div class="space24"></div>

                        <p>
                            Sudah punya akun?
                            <a href="{{ route('login') }}" style="color:#0a0a0a; font-weight:600;">
                                Login Disini
                            </a>
                        </p>

                    </div>
                </div>

                <!-- IMAGE -->
                <div class="col-lg-3"></div>

                <div class="col-lg-4 d-flex align-items-center justify-content-center">
                    <div class="cta-images">

                        <img src="{{ asset('assets/img/elements/elements7.png') }}" class="elements7 keyframe5">

                        <div class="img1">
                            <img src="{{ asset('assets/img/all-images/cta/cta-img1.png') }}">
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
