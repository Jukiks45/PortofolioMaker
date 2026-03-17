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
                Mulai Perjalanan<br>
                <span>Karier Profesional</span><br>
                Kamu
            </h1>
            <p class="auth-left-desc">
                Bergabung bersama ratusan mahasiswa dan fresh graduate
                yang telah membuat portfolio profesional dengan mudah.
            </p>

            <div class="auth-features">
                <div class="auth-feature-pill">
                    <div class="auth-feature-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <span>Gratis & Mudah Digunakan</span>
                </div>
                <div class="auth-feature-pill">
                    <div class="auth-feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <span>Selesai dalam 5 Menit</span>
                </div>
                <div class="auth-feature-pill">
                    <div class="auth-feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span>Data Aman & Terlindungi</span>
                </div>
                <div class="auth-feature-pill">
                    <div class="auth-feature-icon">
                        <i class="fas fa-download"></i>
                    </div>
                    <span>Export PDF Kapan Saja</span>
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

            <h2 class="auth-form-title">Buat Akun Baru ✨</h2>
            <p class="auth-form-subtitle">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login di sini</a>
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

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="auth-form-group">
                    <label class="auth-label" for="name">Nama Lengkap</label>
                    <div class="auth-input-wrapper">
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="auth-input @error('name') is-invalid @enderror"
                            placeholder="John Doe"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            required
                        >
                        <i class="fas fa-user auth-input-icon"></i>
                    </div>
                    @error('name')
                        <div class="auth-field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password"
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

                {{-- Confirm Password --}}
                <div class="auth-form-group">
                    <label class="auth-label" for="password_confirmation">Konfirmasi Password</label>
                    <div class="auth-input-wrapper">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="auth-input @error('password_confirmation') is-invalid @enderror"
                            placeholder="Ulangi password Anda"
                            autocomplete="new-password"
                            required
                        >
                        <i class="fas fa-lock auth-input-icon"></i>
                    </div>
                    @error('password_confirmation')
                        <div class="auth-field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="auth-btn">
                    Daftar Sekarang
                    <i class="fas fa-arrow-right"></i>
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
