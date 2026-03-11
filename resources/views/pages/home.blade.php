@extends('layouts.app')

@section('content')

<!--===== MOBILE HEADER STARTS =======-->
<div class="homepage1-body">
    <div class="vl-offcanvas">
        <div class="vl-offcanvas-wrapper">
            <div class="vl-offcanvas-header d-flex justify-content-between align-items-center mb-90">
                <div class="vl-offcanvas-logo">
                    <a href="index.html">
                        <img src="{{asset('assets/img/logo/logo1.png')}}" alt="">
                    </a>
                </div>
                <div class="vl-offcanvas-close">
                    <button class="vl-offcanvas-close-toggle">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="vl-offcanvas-menu d-lg-none mb-40">
                <nav></nav>
            </div>
            <div class="space20"></div>
            <div class="vl-offcanvas-info">
                <h3 class="vl-offcanvas-sm-title">Contact Us</h3>
                <div class="space20"></div>
                <span>
                    <a href="#">
                        <i class="fa-regular fa-envelope"></i>
                        +57 9954 6476
                    </a>
                </span>
                <span>
                    <a href="#">
                        <i class="fa-solid fa-phone"></i>
                        hello@exdos.com
                    </a>
                </span>
                <span>
                    <a href="#">
                        <i class="fa-solid fa-location-dot"></i>
                        Bhemeara,Kushtia
                    </a>
                </span>
            </div>
            <div class="space20"></div>
            <div class="vl-offcanvas-social">
                <h3 class="vl-offcanvas-sm-title">Follow Us</h3>
                <div class="space20"></div>
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="vl-offcanvas-overlay"></div>
</div>
<!--===== MOBILE HEADER STARTS =======-->
<!--===== HERO AREA STARTS =======-->
<div class="hero1-section-area" style="background-image: url(assets/img/all-images/bg/hero-bg1.png);">
    <img src="{{asset('assets/img/elements/elements6.png')}}" alt="" class="elements6">
    <img src="{{asset('assets/img/elements/elements5.png')}}" alt="" class="elements5">
    <img src="{{asset('assets/img/elements/elements4.png')}}" alt="" class="elements4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero1-header heading1">
                    <h5 data-aos="fade-left" data-aos-duration="800">
                        <span>
                            <img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt="">
                        </span>
                        Create your Dream Project With Us
                    </h5>
                    <div class="space16"></div>
                    <h1 class="text-anime-style-3">Advanced IT Solutions For Modern Businesses</h1>
                    <div class="space16"></div>
                    <p data-aos="fade-left" data-aos-duration="900">We specialize in providing innovative scalable IT solutions tailored to meet the unique needs of your business, from comprehensive</p>
                    <div class="space32"></div>
                    <div class="btn-area1" data-aos="fade-left" data-aos-duration="1000">
                        <a href="contact.html" class="vl-btn1">
                            Explore Our Solutions
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="htvls://www.youtube.com/watch?v=Y8XpQpW5OVY" class="popup-youtube">
                            <span>
                                <i class="fa-solid fa-play"></i>
                            </span>
                            Play Video
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <div class="hero-images-area">
                    <div class="img1">
                        <img src="{{asset('assets/img/all-images/hero/hero-img1.png')}}" alt="">
                    </div>
                    <div class="image-bg1">
                        <img src="{{asset('assets/img/all-images/bg/img-bg1.png')}}" alt="">
                    </div>
                    <div class="elements">
                        <img src="{{asset('assets/img/elements/elements3.png')}}" alt="" class="elements3 aniamtion-key-1">
                        <img src="{{asset('assets/img/elements/elements2.png')}}" alt="" class="elements2 aniamtion-key-2">
                        <img src="{{asset('assets/img/elements/elements1.png')}}" alt="" class="elements1 keyframe5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->
<div
    data-bs-spy="scroll"
    data-bs-target="#navbar-example2"
    data-bs-root-margin="0px 0px -40%"
    data-bs-smooth-scroll="true"
    class="scrollspy-example bg-body-tertiary rounded-2"
    tabindex="0"
>
    <!--===== ABOUT AREA STARTS =======-->
    <div class="about1-section-area sp1" id="about">
        <img src="{{asset('assets/img/elements/elements9.png')}}" alt="" class="elements9">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-images-area">
                        <img src="{{asset('assets/img/elements/elements10.png')}}" alt="" class="elements10">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="img1 image-anime reveal">
                                    <img src="{{asset('assets/img/all-images/about/about-img1.png')}}" alt="">
                                </div>
                                <div class="space30 d-lg-none d-block"></div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="img1 image-anime reveal">
                                    <img src="{{asset('assets/img/all-images/about/about-img2.png')}}" alt="">
                                </div>
                                <div class="space30"></div>
                                <div class="img1 image-anime reveal">
                                    <img src="{{asset('assets/img/all-images/about/about-img3.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="check-icons aniamtion-key-1">
                            <img src="{{asset('assets/img/icons/check1.svg')}}" alt="">
                            <p>
                                With 15+ years of experience
              IT solution help community.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <div class="about-header-area heading2">
                        <h5>
                            <span>
                                <img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt="">
                            </span>
                            About Eitech IT Solution
                        </h5>
                        <div class="space24"></div>
                        <h2 class="text-anime-style-3">Unlock Business Potential with Tailored IT Services</h2>
                        <div class="space16"></div>
                        <p data-aos="fade-left" data-aos-duration="800">At Eitech, we understand that every business unique, which is why we offer customized IT solutions designed to meet.</p>
                        <div class="space28"></div>
                        <div class="row" data-aos="fade-left" data-aos-duration="900">
                            <div class="col-lg-6 col-md-6">
                                <div class="progresbar">
                                    <div class="progressbar">
                                        <div class="circle" data-percent="96">
                                            <canvas width="80" height="80"></canvas>
                                            <div class="count">96%</div>
                                        </div>
                                    </div>
                                    <div class="content-area">
                                        <h4>IT Solution</h4>
                                        <div class="space8"></div>
                                        <p>Level Is High</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="space28 d-md-none d-block"></div>
                                <div class="progresbar">
                                    <div class="progressbar">
                                        <div class="circle" data-percent="97">
                                            <canvas width="80" height="80"></canvas>
                                            <div class="count">97%</div>
                                        </div>
                                    </div>
                                    <div class="content-area">
                                        <h4>Cyber Solution</h4>
                                        <div class="space8"></div>
                                        <p>#1 Best Of Solution</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space28"></div>
                        <div class="pera-box" data-aos="fade-left" data-aos-duration="1000">
                            <p>“The right IT solutions done just support your on business-they transform it, at Eitech, we believe.”</p>
                        </div>
                        <div class="space28"></div>
                        <div class="btn-area1" data-aos="fade-left" data-aos-duration="1200">
                            <a href="contact.html" class="vl-btn2">
                                See How We Can Help
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== ABOUT AREA ENDS =======-->
    <!--===== SERVICE AREA STARTS =======-->
    <div class="service1-section-area sp2" id="service" style="background-image: url(assets/img/all-images/bg/service-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="service-header text-center heading2 space-margin60">
                        <h5>
                            <span>
                                <img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt="">
                            </span>
                            Our Services
                        </h5>
                        <div class="space24"></div>
                        <h2 class="text-anime-style-3">
                            Expert IT Services Designed
                            <br class="d-lg-block d-none">
                            To Elevate Your Business
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="800">
                    <div class="service1-boxarea">
                        <div class="icons">
                            <img src="{{asset('assets/img/icons/service-icon1.svg')}}" alt="">
                        </div>
                        <div class="arrow">
                            <a href="service-single.html">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="space24"></div>
                        <a href="service-single.html">Cyber Security Solution</a>
                        <div class="space16"></div>
                        <p>Our advanced cybersecurity solution designed to protect against ever- an evolving threats, approach ensures.</p>
                        <div class="space24"></div>
                        <h5>01</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="900">
                    <div class="service1-boxarea">
                        <div class="icons">
                            <img src="{{asset('assets/img/icons/service-icon2.svg')}}" alt="">
                        </div>
                        <div class="arrow">
                            <a href="service-single.html">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="space24"></div>
                        <a href="service-single.html">Scalable Cloud Solutions</a>
                        <div class="space16"></div>
                        <p>Our advanced cybersecurity solution designed to protect against ever- an evolving threats, approach ensures.</p>
                        <div class="space24"></div>
                        <h5>02</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="service1-boxarea">
                        <div class="icons">
                            <img src="{{asset('assets/img/icons/service-icon3.svg')}}" alt="">
                        </div>
                        <div class="arrow">
                            <a href="service-single.html">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="space24"></div>
                        <a href="service-single.html">Data Protection Services</a>
                        <div class="space16"></div>
                        <p>Our advanced cybersecurity solution designed to protect against ever- an evolving threats, approach ensures.</p>
                        <div class="space24"></div>
                        <h5>03</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1100">
                    <div class="service1-boxarea">
                        <div class="icons">
                            <img src="{{asset('assets/img/icons/service-icon4.svg')}}" alt="">
                        </div>
                        <div class="arrow">
                            <a href="service-single.html">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="space24"></div>
                        <a href="service-single.html">Optimization Management</a>
                        <div class="space16"></div>
                        <p>Our advanced cybersecurity solution designed to protect against ever- an evolving threats, approach ensures.</p>
                        <div class="space24"></div>
                        <h5>04</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="service1-boxarea">
                        <div class="icons">
                            <img src="{{asset('assets/img/icons/service-icon5.svg')}}" alt="">
                        </div>
                        <div class="arrow">
                            <a href="service-single.html">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="space24"></div>
                        <a href="service-single.html">HelpDesk 360 Solutions</a>
                        <div class="space16"></div>
                        <p>Our advanced cybersecurity solution designed to protect against ever- an evolving threats, approach ensures.</p>
                        <div class="space24"></div>
                        <h5>05</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1300">
                    <div class="service1-boxarea">
                        <div class="icons">
                            <img src="{{asset('assets/img/icons/service-icon6.svg')}}" alt="">
                        </div>
                        <div class="arrow">
                            <a href="service-single.html">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="space24"></div>
                        <a href="service-single.html">Software Development</a>
                        <div class="space16"></div>
                        <p>Our advanced cybersecurity solution designed to protect against ever- an evolving threats, approach ensures.</p>
                        <div class="space24"></div>
                        <h5>06</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== SERVICE AREA ENDS =======-->
    <!--===== WORK AREA STARTS =======-->
    <div class="work1-section-area sp1">
        <img src="{{asset('assets/img/elements/elements11.png')}}" alt="" class="elements9">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="solution-header heading2">
                        <h5>
                            <span>
                                <img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt="">
                            </span>
                            best it solution
                        </h5>
                        <div class="space24"></div>
                        <h2 class="text-anime-style-3">End-to-End IT Solutions for Growing Businesses</h2>
                        <div class="space16"></div>
                        <p data-aos="fade-left" data-aos-duration="800">We provide comprehensive, end-to-end IT solutions of designed to support businesses at stage of growing.</p>
                        <div class="space24"></div>
                        <div class="bg-progress" data-aos="fade-left" data-aos-duration="900">
                            <div class="progress-bar">
                                <label>
                                    It Solution
                                    <span>98%</span>
                                </label>
                                <div class="progress">
                                    <div class="progress-inner" style="width: 98%;"></div>
                                </div>
                            </div>
                            <div class="progress-bar">
                                <label>
                                    Cyber Security
                                    <span>99%</span>
                                </label>
                                <div class="progress">
                                    <div class="progress-inner" style="width: 99%;"></div>
                                </div>
                            </div>
                            <div class="progress-bar">
                                <label>
                                    Cloud Solution
                                    <span>99%</span>
                                </label>
                                <div class="progress">
                                    <div class="progress-inner" style="width: 99%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="space32"></div>
                        <div class="btn-area1" data-aos="fade-left" data-aos-duration="1000">
                            <a href="contact.html" class="vl-btn2">
                                Discover Our Solutions
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <div class="soultions-images">
                        <img src="{{asset('assets/img/elements/elements10.png')}}" alt="" class="elements10">
                        <div class="img1 reveal image-anime">
                            <img src="{{asset('assets/img/all-images/work/work-img1.png')}}" alt="">
                        </div>
                        <div class="img2 reveal image-anime">
                            <img src="{{asset('assets/img/all-images/work/work-img2.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== WORK AREA ENDS =======-->
    <!--===== WORK AREA STARTS =======-->
    <div class="work-others-section" id="work" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <img src="{{asset('assets/img/elements/elements16.png')}}" alt="" class="elements16">
        <img src="{{asset('assets/img/elements/elements1.png')}}" alt="" class="elements1 keyframe5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="work-header heading1 text-center space-margin60">
                        <h5>
                            <span>
                                <img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt="">
                            </span>
                            How It's Work
                        </h5>
                        <div class="space24"></div>
                        <h2 class="text-anime-style-3">Expert IT Services Designed To Elevate Your Business</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== WORK AREA ENDS =======-->
    <!--===== CASE AREA STARTS =======-->
    <div class="case1-section-area sp1" id="case">
        <div class="case-works-section-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="others-widget-area">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="card-boxarea box1" data-aos="zoom-in" data-aos-duration="800">
                                        <div class="div text-end">
                                            <h3>01</h3>
                                        </div>
                                        <div class="content-area">
                                            <a href="service-single.html">Discovery Consultation</a>
                                            <div class="space14"></div>
                                            <p>With our intuitive interface and robust features, you buy, sell.</p>
                                        </div>
                                    </div>
                                    <div class="space30"></div>
                                    <div class="card-boxarea box2" data-aos="zoom-in" data-aos-duration="900">
                                        <div class="content-area">
                                            <a href="service-single.html">Customized IT Strategy</a>
                                            <div class="space14"></div>
                                            <p>Plus, our commitment to the security means that PayCoin.</p>
                                        </div>
                                        <div class="div text-end">
                                            <h3>02</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="images" data-aos="zoom-in" data-aos-duration="1000">
                                        <img src="{{asset('assets/img/elements/elements12.png')}}" alt="" class="elements12">
                                        <img src="{{asset('assets/img/elements/elements13.png')}}" alt="" class="elements13">
                                        <img src="{{asset('assets/img/elements/elements14.png')}}" alt="" class="elements14">
                                        <img src="{{asset('assets/img/elements/elements15.png')}}" alt="" class="elements15">
                                        <div class="img1">
                                            <img src="{{asset('assets/img/all-images/case/case-img4.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-boxarea box3" data-aos="zoom-in" data-aos-duration="800">
                                        <div class="div">
                                            <h3>03</h3>
                                        </div>
                                        <div class="content-area2">
                                            <a href="service-single.html">Quality Assurance</a>
                                            <div class="space14"></div>
                                            <p>Trusted partner in the world of crypto trading Join us today.</p>
                                        </div>
                                    </div>
                                    <div class="space30"></div>
                                    <div class="card-boxarea box4" data-aos="zoom-in" data-aos-duration="1000">
                                        <div class="content-area2">
                                            <a href="service-single.html">24/7 Support</a>
                                            <div class="space14"></div>
                                            <p>
                                                Resources designed to help
                      navigate best the dynamic
                                            </p>
                                        </div>
                                        <div class="div">
                                            <h3>04</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="case-header heading2 space-margin60">
                        <h5>
                            <span>
                                <img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt="">
                            </span>
                            Case Studies
                        </h5>
                        <div class="space24"></div>
                        <h2 class="text-anime-style-3">Our Latest Case Studies</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="case-slider-widget owl-carousel">
                    <div class="case-slider-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{asset('assets/img/all-images/case/case-img1.png')}}" alt="">
                        </div>
                        <div class="content-area">
                            <p>#CloudFlex Solution</p>
                            <div class="space16"></div>
                            <a href="service-single.html">Upgrading IT for Financial Secure</a>
                            <div class="arrow">
                                <a href="service-single.html">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="case-slider-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{asset('assets/img/all-images/case/case-img2.png')}}" alt="">
                        </div>
                        <div class="content-area">
                            <p>#CloudFlex Solution</p>
                            <div class="space16"></div>
                            <a href="service-single.html">Scaling IT for EcoSolutions</a>
                            <div class="arrow">
                                <a href="service-single.html">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="case-slider-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{asset('assets/img/all-images/case/case-img3.png')}}" alt="">
                        </div>
                        <div class="content-area">
                            <p>#CloudFlex Solution</p>
                            <div class="space16"></div>
                            <a href="service-single.html">Optimizing IT For Solutions</a>
                            <div class="arrow">
                                <a href="service-single.html">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== CASE AREA ENDS =======-->
    <!--===== TESTIMONIAL AREA STARTS =======-->
    <div class="testimonial1-section-area sp1" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto">
                    <div class="testimonial-header text-center heading2 space-margin60">
                        <h5>
                            <span>
                                <img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt="">
                            </span>
                            Testimonials
                        </h5>
                        <div class="space20"></div>
                        <h2 class="text-anime-style-3">Experience the Difference Through Our Clients' Eyes</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="img1 image-anime reveal">
                        <img src="{{asset('assets/img/all-images/testimonial/testimonial-img1.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="slider-galeria">
                        <div class="testimonial-slider-content-area">
                            <div class="testimonial-author-area">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="space16"></div>
                                <img src="{{asset('assets/img/icons/quito1.svg')}}" alt="" class="quito1">
                                <img src="{{asset('assets/img/elements/elements18.png')}}" alt="" class="elements18">
                                <p>Partnering with ETech has transformed our IT Solution Their tailored solutions help streamline our operations, improve cybersecurity, and drive efficiency across the board. We've experienced fewer disruptions, faster an.”</p>
                            </div>
                            <div class="space60"></div>
                            <div class="testimonial-man-info-area">
                                <div class="man-images-text">
                                    <div class="mans-img">
                                        <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                                    </div>
                                    <div class="man-text">
                                        <a href="team.html">Ben Stokes</a>
                                        <div class="space12"></div>
                                        <p>Owner Taxfirm</p>
                                    </div>
                                </div>
                                <img src="{{asset('assets/img/elements/elements17.png')}}" alt="">
                            </div>
                        </div>
                        <div class="testimonial-slider-content-area">
                            <div class="testimonial-author-area">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="space16"></div>
                                <img src="{{asset('assets/img/icons/quito1.svg')}}" alt="" class="quito1">
                                <img src="{{asset('assets/img/elements/elements18.png')}}" alt="" class="elements18">
                                <p>Partnering with ETech has transformed our IT Solution Their tailored solutions help streamline our operations, improve cybersecurity, and drive efficiency across the board. We've experienced fewer disruptions, faster an.”</p>
                            </div>
                            <div class="space60"></div>
                            <div class="testimonial-man-info-area">
                                <div class="man-images-text">
                                    <div class="mans-img">
                                        <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                                    </div>
                                    <div class="man-text">
                                        <a href="team.html">Ben Stokes</a>
                                        <div class="space12"></div>
                                        <p>Owner Taxfirm</p>
                                    </div>
                                </div>
                                <img src="{{asset('assets/img/elements/elements17.png')}}" alt="">
                            </div>
                        </div>
                        <div class="testimonial-slider-content-area">
                            <div class="testimonial-author-area">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="space16"></div>
                                <img src="{{asset('assets/img/icons/quito1.svg')}}" alt="" class="quito1">
                                <img src="{{asset('assets/img/elements/elements18.png')}}" alt="" class="elements18">
                                <p>Partnering with ETech has transformed our IT Solution Their tailored solutions help streamline our operations, improve cybersecurity, and drive efficiency across the board. We've experienced fewer disruptions, faster an.”</p>
                            </div>
                            <div class="space60"></div>
                            <div class="testimonial-man-info-area">
                                <div class="man-images-text">
                                    <div class="mans-img">
                                        <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                                    </div>
                                    <div class="man-text">
                                        <a href="team.html">Ben Stokes</a>
                                        <div class="space12"></div>
                                        <p>Owner Taxfirm</p>
                                    </div>
                                </div>
                                <img src="{{asset('assets/img/elements/elements17.png')}}" alt="">
                            </div>
                        </div>
                        <div class="testimonial-slider-content-area">
                            <div class="testimonial-author-area">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="space16"></div>
                                <img src="{{asset('assets/img/icons/quito1.svg')}}" alt="" class="quito1">
                                <img src="{{asset('assets/img/elements/elements18.png')}}" alt="" class="elements18">
                                <p>Partnering with ETech has transformed our IT Solution Their tailored solutions help streamline our operations, improve cybersecurity, and drive efficiency across the board. We've experienced fewer disruptions, faster an.”</p>
                            </div>
                            <div class="space60"></div>
                            <div class="testimonial-man-info-area">
                                <div class="man-images-text">
                                    <div class="mans-img">
                                        <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                                    </div>
                                    <div class="man-text">
                                        <a href="team.html">Ben Stokes</a>
                                        <div class="space12"></div>
                                        <p>Owner Taxfirm</p>
                                    </div>
                                </div>
                                <img src="{{asset('assets/img/elements/elements17.png')}}" alt="">
                            </div>
                        </div>
                        <div class="testimonial-slider-content-area">
                            <div class="testimonial-author-area">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="space16"></div>
                                <img src="{{asset('assets/img/icons/quito1.svg')}}" alt="" class="quito1">
                                <img src="{{asset('assets/img/elements/elements18.png')}}" alt="" class="elements18">
                                <p>Partnering with ETech has transformed our IT Solution Their tailored solutions help streamline our operations, improve cybersecurity, and drive efficiency across the board. We've experienced fewer disruptions, faster an.”</p>
                            </div>
                            <div class="space60"></div>
                            <div class="testimonial-man-info-area">
                                <div class="man-images-text">
                                    <div class="mans-img">
                                        <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                                    </div>
                                    <div class="man-text">
                                        <a href="team.html">Ben Stokes</a>
                                        <div class="space12"></div>
                                        <p>Owner Taxfirm</p>
                                    </div>
                                </div>
                                <img src="{{asset('assets/img/elements/elements17.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="slider-galeria-thumbs text-center d-lg-block d-none">
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img3.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img4.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img5.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img3.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img4.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img5.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img3.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img4.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img5.png')}}" alt="">
                        </div>
                        <div class="testimonial3-sliders-img">
                            <img src="{{asset('assets/img/all-images/testimonial/testimonial-img2.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== TESTIMONIAL AREA ENDS =======-->
    <!--===== TEAM AREA STARTS =======-->
    <div class="team1-section-area sp2">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto">
                    <div class="team-header space-margin60 heading2 text-center">
                        <h5>
                            <span>
                                <img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt="">
                            </span>
                            our best team
                        </h5>
                        <div class="space20"></div>
                        <h2 class="text-anime-style-3">Meet Our Expert Team</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="800">
                    <div class="team-author-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{asset('assets/img/all-images/team/team-img1.png')}}" alt="">
                        </div>
                        <div class="content-area">
                            <div class="text">
                                <a href="team.html">SR. Alex Robertson</a>
                                <div class="space8"></div>
                                <p>Head Of Cybersecurity</p>
                            </div>
                            <div class="icons">
                                <a href="#">
                                    <img src="{{asset('assets/img/icons/share1.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="team-author-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{asset('assets/img/all-images/team/team-img2.png')}}" alt="">
                        </div>
                        <div class="content-area">
                            <div class="text">
                                <a href="team.html">Shelia Abernathy</a>
                                <div class="space8"></div>
                                <p>Software Development</p>
                            </div>
                            <div class="icons">
                                <a href="#">
                                    <img src="{{asset('assets/img/icons/share1.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="team-author-boxarea">
                        <div class="img1 image-anime">
                            <img src="{{asset('assets/img/all-images/team/team-img3.png')}}" alt="">
                        </div>
                        <div class="content-area">
                            <div class="text">
                                <a href="team.html">Devin Romaguera</a>
                                <div class="space8"></div>
                                <p>Data Analytics Specialist</p>
                            </div>
                            <div class="icons">
                                <a href="#">
                                    <img src="{{asset('assets/img/icons/share1.svg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== TEAM AREA ENDS =======-->
    <!--===== BLOG AREA STARTS =======-->
    <div class="vl-blog-1-area sp1" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 m-auto">
                    <div class="vl-blog-1-section-box heading2 text-center space-margin60">
                        <h5 class="vl-section-subtitle">
                            <span>
                                <img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt="">
                            </span>
                            our blog
                        </h5>
                        <div class="space20"></div>
                        <h2 class="vl-section-title text-anime-style-3">Stay Updated with the Latest in IT Solutions</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6" data-aos="fade-left" data-aos-duration="900">
                    <div class="vl-blog-1-item">
                        <div class="vl-blog-1-thumb">
                            <img src="{{asset('assets/img/all-images/blog/blog-img1.png')}}" alt="">
                        </div>
                        <div class="vl-blog-1-content">
                            <div class="vl-blog-meta">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('assets/img/icons/calender1.svg')}}" alt="">
                                            26 August 2024
                                            <span> |</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('assets/img/icons/user1.svg')}}" alt="">
                                            Alex Roy
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="space20"></div>
                            <h4 class="vl-blog-1-title">
                                <a href="blog-single.html">Revolutionize Your Business Operations with Advanced IT Solution Technology</a>
                            </h4>
                            <div class="space16"></div>
                            <p>Fuel your business success with our custom IT services. We design solutions that are tailored to your an specific needs.</p>
                            <div class="vl-blog-1-icon">
                                <a href="blog-single.html">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="vl-blog-1-item">
                        <div class="vl-blog-1-thumb">
                            <img src="{{asset('assets/img/all-images/blog/blog-img2.png')}}" alt="">
                        </div>
                        <div class="vl-blog-1-content">
                            <div class="vl-blog-meta">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('assets/img/icons/calender1.svg')}}" alt="">
                                            26 August 2024
                                            <span> |</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('assets/img/icons/user1.svg')}}" alt="">
                                            Alex Roy
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="space20"></div>
                            <h4 class="vl-blog-1-title">
                                <a href="blog-single.html">Transform Your Business Operations with Tailored IT Solutions Designed</a>
                            </h4>
                            <div class="space16"></div>
                            <p>Fuel your business success with our custom IT services. We design solutions that are tailored to your an specific needs.</p>
                            <div class="vl-blog-1-icon">
                                <a href="blog-single.html">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="space18"></div>
                    <div class="btn-area1 text-center">
                        <a href="blog1.html" class="vl-btn2">
                            Read More Blog And News
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== BLOG AREA ENDS =======-->
    <!--===== CTA AREA STARTS =======-->
    <div class="cta1-section-area sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="cta-header heading1">
                        <h2 data-aos="fade-left" data-aos-duration="700">Transform Your IT Today-Speak with Our Experts!</h2>
                        <div class="space16"></div>
                        <p data-aos="fade-left" data-aos-duration="800">Ready to take your business to the next level with cutting-edge IT solutions? Our team is here to help you transform.</p>
                        <div class="space24"></div>
                        <form data-aos="fade-left" data-aos-duration="900">
                            <input type="text" placeholder="Email Address">
                            <button type="submit" class="vl-btn1">
                                Subscribe
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-4">
                    <div class="cta-images">
                        <img src="{{asset('assets/img/elements/elements7.png')}}" alt="" class="elements7 keyframe5">
                        <div class="img1">
                            <img src="{{asset('assets/img/all-images/cta/cta-img1.png')}}" alt="">
                        </div>
                        <ul class="aniamtion-key-1">
                            <li>
                                <a href="#">
                                    <img src="{{asset('assets/img/icons/check5.svg')}}" alt="">
                                    IT Solution Services
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset('assets/img/icons/check5.svg')}}" alt="">
                                    Cyber Security Services
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{asset('assets/img/icons/check5.svg')}}" alt="">
                                    Software Development
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== CTA AREA ENDS =======-->


@endsection
