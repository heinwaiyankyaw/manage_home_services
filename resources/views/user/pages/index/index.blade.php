@extends('user.layouts.master')
@section('content')
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
                <img src="{{ asset('user/assets/img/hero-carousel/hero-carousel-1.jpg') }}" alt="">
                <div class="carousel-container">
                    <h2>Welcome to HomeEase<br></h2>
                    <p>Struggling with household maintenance? We're here to help! HomeEase provides professional home
                        services for those who find it difficult to maintain their homes. From repairs to regular upkeep, we
                        make home care simple and stress-free.</p>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="{{ asset('user/assets/img/hero-carousel/hero-carousel-2.jpg') }}" alt="">
                <div class="carousel-container">
                    <h2>Your Home Maintenance Solution</h2>
                    <p>Whether you're busy, elderly, or simply need assistance, our skilled professionals handle all aspects
                        of home maintenance. We take pride in delivering quality service that keeps your home safe,
                        functional, and comfortable.</p>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="{{ asset('user/assets/img/hero-carousel/hero-carousel-3.jpg') }}" alt="">
                <div class="carousel-container">
                    <h2>Comprehensive Home Services</h2>
                    <p>From plumbing and electrical work to cleaning and seasonal maintenance, we offer a complete range of
                        services tailored to your needs. Let us handle the hard work while you enjoy a well-maintained home
                        without the hassle.</p>
                </div>
            </div><!-- End Carousel Item -->

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>Your Trusted Home Maintenance Partner<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p>
                        HomeEase was founded to help homeowners and renters who struggle with household maintenance.
                        We understand that keeping up with home repairs and upkeep can be challenging, especially for
                        seniors, busy professionals, and those without DIY skills.
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-circle"></i> <span>Professional, reliable home maintenance
                                services</span></li>
                        <li><i class="bi bi-check2-circle"></i> <span>Skilled technicians you can trust in your home</span>
                        </li>
                        <li><i class="bi bi-check2-circle"></i> <span>Flexible scheduling to meet your needs</span></li>
                    </ul>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <p>Our mission is to take the stress out of home ownership by providing affordable, high-quality
                        maintenance services.
                        Whether you need help with routine tasks, emergency repairs, or seasonal maintenance, our team of
                        experienced
                        professionals is ready to assist. We pride ourselves on transparent pricing, quality workmanship,
                        and exceptional
                        customer service that makes home maintenance hassle-free.</p>
                    <a href="about.html" class="read-more"><span>Learn More About Our Services</span><i
                            class="bi bi-arrow-right"></i></a>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('user/assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('user/assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('user/assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('user/assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('user/assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img src="{{ asset('user/assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
                </div><!-- End Client Item -->

            </div>

        </div>

    </section><!-- /Clients Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-tools icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Handyman Services</a></h4>
                            <p class="description">From furniture assembly to small repairs, our skilled handymen handle all
                                those odd jobs around your home that need attention.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-droplet icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Plumbing Solutions</a></h4>
                            <p class="description">Leaky faucets, clogged drains, or toilet repairs - our licensed plumbers
                                provide prompt and reliable solutions for all your plumbing needs.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-lightning-charge icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Electrical Repairs</a></h4>
                            <p class="description">Safe and professional electrical services including fixture
                                installation, outlet repairs, and lighting solutions for your home.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-house-door icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Home Deep Cleaning</a></h4>
                            <p class="description">Thorough cleaning services that refresh your living space, including
                                kitchens, bathrooms, and hard-to-reach areas.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-tree icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Yard Maintenance</a></h4>
                            <p class="description">Lawn care, hedge trimming, leaf removal, and general yard cleanup to
                                keep your outdoor spaces looking their best.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-snow2 icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Seasonal Services</a></h4>
                            <p class="description">Preparing your home for each season with gutter cleaning, AC
                                maintenance, winterization, and other timely services.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>
            <div class="mt-5 text-center">
                <a href="{{ route('user.services.index') }}" class="btn btn-outline-danger">Explore More</a>
            </div>
        </div>

    </section><!-- /Services Section -->
@endsection
