<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from unifato.com/eitech/single-index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Mar 2026 17:00:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio Maker')</title>

    <!--=====FAB ICON=======-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/fav-logo1.png') }}" type="image/x-icon">

    <!--===== CSS LINK =======-->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owlcarousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    @stack('styles')

    <!--=====  JS SCRIPT LINK =======-->
    <script src="{{ asset('assets/js/plugins/jquery-3-7-1.min.js') }}"></script>
</head>

<body>

    <!--===== PRELOADER STARTS =======-->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="{{ asset('assets/img/logo/preloader.png') }}" alt=""></div>
        </div>
    </div>
    <!--===== PRELOADER ENDS =======-->

    <!--===== PROGRESS STARTS=======-->
    <div class="paginacontainer">
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </div>
    <!--===== PROGRESS ENDS=======-->

    <!--=====HEADER START=======-->
    <header class="homepage1-body">
        <div id="vl-header-sticky" class="vl-header-area vl-transparent-header">
            <div class="container headerfix">
                <div class="row align-items-center row-bg3">
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="vl-logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo/logo1.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <div class="vl-main-menu text-center">
                            <nav class="vl-mobile-menu-active navbar justify-content-center" id="navbar-example2">
                                <ul class="nav-pills">
                                    <li class="nav-item"><a href="#about" class="nav-link"><span>Tentang
                                                Aplikasi</span></a>
                                    </li>
                                    <li class="nav-item"><a href="#service" class="nav-link"><span>Fitur</span></a>
                                    </li>
                                    <li class="nav-item"><a href="#work" class="nav-link"><span>Cara Kerja</span></a>
                                    </li>
                                    <li class="nav-item"><a href="#case" class="nav-link"><span>Template</span></a>
                                    </li>
                                    <li class="nav-item"><a href="#testimonial"
                                            class="nav-link"><span>Testimoni</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="vl-hero-btn d-none d-lg-block text-end">
                            <span class="vl-btn-wrap text-end">
                                @auth
                                    <span class="text-white me-3">Halo, {{ auth()->user()->name }}</span>
                                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="vl-btn1">
                                            Logout
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="vl-btn1">
                                        Login Sekarang
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                @endauth
                            </span>
                        </div>
                        <div class="vl-header-action-item d-block d-lg-none">
                            <button type="button" class="vl-offcanvas-toggle">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=====HEADER END =======-->

    @yield('content')

    <!--===== FOOTER AREA STARTS =======-->
    <div class="vl-footer1-section-area sp8">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-logo1">
                        <img src="{{ asset('assets/img/logo/logo2.png') }}" alt="">
                        <div class="space16"></div>
                        <p>
                            Portfolio Maker membantu mahasiswa dan fresh graduate membuat
                            portfolio dan CV profesional dengan mudah tanpa perlu kemampuan
                            desain atau coding.
                        </p>
                        <div class="space24"></div>
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#" class="m-0"><i class="fa-brands fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="space30 d-md-none d-block"></div>
                    <div class="vl-footer-widget">
                        <h3>Navigasi</h3>
                        <ul>
                            <li><a href="#about">Tentang Aplikasi</a></li>
                            <li><a href="#service">Fitur</a></li>
                            <li><a href="#work">Template Portfolio</a></li>
                            <li><a href="#case">Cara Kerja</a></li>
                            <li><a href="#testimonial">Testimoni</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="vl-footer-widget">
                        <div class="space30 d-lg-none d-block"></div>
                        <h3>Fitur Aplikasi</h3>
                        <ul>
                            <li><a href="#">Portfolio Builder</a></li>
                            <li><a href="#">Template Profesional</a></li>
                            <li><a href="#">Preview Portfolio</a></li>
                            <li><a href="#">CV Generator Otomatis</a></li>
                            <li><a href="#">Download CV PDF</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="vl-footer-widget">
                        <div class="space30 d-lg-none d-block"></div>
                        <h3>Kontak</h3>
                        <ul>
                            <li>
                                <a href="tel:+6281234567890">
                                    <img src="{{ asset('assets/img/icons/phn1.svg') }}" alt="">
                                    +62 812 3456 7890
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('assets/img/icons/location1.svg') }}" alt="">
                                    Indonesia
                                </a>
                            </li>
                            <li>
                                <a href="mailto:portfoliomaker@email.com">
                                    <img src="{{ asset('assets/img/icons/email1.svg') }}" alt="">
                                    portfoliomaker@email.com
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('assets/img/icons/global1.svg') }}" alt="">
                                    portfoliomaker.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="space60"></div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="vl-copyright-area">
                        <p>© Copyright 2026 - Portfolio Maker. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== FOOTER AREA ENDS =======-->
    <!--===== JS SCRIPT LINK =======-->
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fontawesome.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/aos.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counter.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/Splitetext.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/mobilemenu.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/owlcarousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/circle-progress.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>

<!-- Mirrored from unifato.com/eitech/single-index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Mar 2026 17:01:47 GMT -->

</html>
