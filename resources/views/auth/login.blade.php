@extends('layouts.auth')

@section('content')
    <style>
        .login-form {
            display: block !important;
            max-width: 420px;
            position: static !important;
        }

        .login-form input {
            width: 100%;
            display: block;
            padding: 14px 16px;
            margin-bottom: 16px;
            border-radius: 8px;
            border: none;
        }

        .login-form button {
            width: 100%;
            position: static !important;
        }

        /* FIX posisi gambar */

        .cta-images {
            position: relative !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cta-images .img1 {
            position: relative !important;
            bottom: auto !important;
        }

        .cta-images img {
            max-height: 420px;
        }

        .login-form .vl-btn1 {
            position: relative;
            overflow: hidden;
        }

        .login-form .vl-btn1::before,
        .login-form .vl-btn1::after {
            display: none !important;
        }

        .login-form .vl-btn1:hover {
            background-color: #0d6efd;
            color: white;
        }
    </style>
    <div class="cta1-section-area sp1" style="min-height:100vh; display:flex; align-items:center;">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5">
                    <div class="cta-header heading1">

                        <h2>Login</h2>

                        <div class="space24"></div>

                        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf

                            <input type="email" name="email" placeholder="Masukkan Email Anda">

                            <input type="password" name="password" placeholder="Masukkan Password">

                            <button type="submit" class="vl-btn1">
                                Login
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>

                        </form>

                        <div class="space24"></div>

                        <p>
                            Belum punya akun?
                            <a href="{{ route('register') }}" style="color:#0a0a0a; font-weight:600;">
                                Daftar Sekarang
                            </a>
                        </p>

                    </div>
                </div>

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
