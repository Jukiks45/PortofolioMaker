@extends('layouts.auth')

@section('content')
<div class="auth-wrapper">

    {{-- ======================== LEFT PANEL ======================== --}}
    <div class="auth-left">
        <div class="auth-grid-overlay"></div>

        {{-- Brand --}}
        <a href="{{ url('/') }}" class="auth-brand">
            <div class="auth-brand-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <span class="auth-brand-name">Portfolio Maker</span>
        </a>

        {{-- Main content --}}
        <div class="auth-left-body">
            <h1 class="auth-left-headline">
                Wujudkan Karier<br>
                <span>Impianmu</span> Sekarang
            </h1>
            <p class="auth-left-desc">
                Buat portfolio dan CV profesional dalam hitungan menit.
                Tampil menonjol di mata rekruter tanpa perlu skill desain.
            </p>

            <div class="auth-features">
                <div class="auth-feature-pill">
                    <div class="auth-feature-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <span>Portfolio Builder Otomatis</span>
                </div>
                <div class="auth-feature-pill">
                    <div class="auth-feature-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <span>Template Profesional Siap Pakai</span>
                </div>
                <div class="auth-feature-pill">
                    <div class="auth-feature-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <span>Unduh CV PDF Langsung</span>
                </div>
                <div class="auth-feature-pill">
                    <div class="auth-feature-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <span>Ramah ATS & Recruiter</span>
                </div>
            </div>
        </div>

        {{-- Stats --}}
        <div class="auth-stats">
            <div class="auth-stat-item">
                <span class="auth-stat-value">500+</span>
                <span class="auth-stat-label">Portfolio Dibuat</span>
            </div>
            <div class="auth-stat-item">
                <span class="auth-stat-value">10+</span>
                <span class="auth-stat-label">Template Tersedia</span>
            </div>
            <div class="auth-stat-item">
                <span class="auth-stat-value">98%</span>
                <span class="auth-stat-label">User Puas</span>
            </div>
        </div>
    </div>

    {{-- ======================== RIGHT PANEL ======================== --}}
    <div class="auth-right">
        <div class="auth-form-card">

            <h2 class="auth-form-title">Selamat datang 👋</h2>
            <p class="auth-form-subtitle">
                Belum punya akun?
                <a href="{{ route('register') }}">Daftar Sekarang</a>
            </p>

            {{-- Errors --}}
            @if ($errors->any())
                <div class="auth-alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="auth-form-group">
                    <label class="auth-label" for="email">Email</label>
                    <div class="auth-input-wrapper">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="auth-input @error('email') is-invalid @enderror"
                            placeholder="nama@email.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                        >
                        <i class="fas fa-envelope auth-input-icon"></i>
                    </div>
                    @error('email')
                        <div class="auth-field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="auth-form-group">
                    <label class="auth-label" for="password">Password</label>
                    <div class="auth-input-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="auth-input @error('password') is-invalid @enderror"
                            placeholder="Masukkan password Anda"
                            autocomplete="current-password"
                            required
                        >
                        <i class="fas fa-lock auth-input-icon"></i>
                    </div>
                    @error('password')
                        <div class="auth-field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="auth-btn">
                    Masuk
                    <i class="fas fa-arrow-right"></i>
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
