@extends('Website.layouts.app')
@section('content')

<!-- restaurent top -->
<div class="page-banner p-relative smoothscroll" id="menu">
    <img src="assets/img/banner.jpg" class="img-fluid full-width" alt="banner">
</div>
<!-- restaurent top -->

<!-- about us -->
<section class="aboutus section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-header-center">
                    <h1 class="text-light-black header-title">About Us</h1>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="history-title mb-md-40">
                    <h2 class="text-light-black">A History Has Written For Food Explore <span class="text-light-green">more Our Story</span></h2>
                    <p class="text-light-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                    <p class="text-light-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.</p> <a class="btn-second btn-submit" href="#">
          Our History
        </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="histry-img mb-xs-20">
                            <img src="assets/img/about/blog/255x200/about-section-3.jpg" class="img-fluid full-width" alt="Histry">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="histry-img mb-xl-20">
                            <img src="assets/img/about/blog/255x200/about-section-1.jpg" class="img-fluid full-width" alt="Histry">
                        </div>
                        <div class="histry-img">
                            <img src="assets/img/about/blog/255x200/about-section-2.jpg" class="img-fluid full-width" alt="Histry">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about us -->

<!-- How It Woks -->
    <section class="section-padding how-it-works bg-light-theme">
        <div class="container">
            <div class="section-header-style-2">
                <h6 class="text-light-green sub-title">Our Process</h6>
                <h3 class="text-light-black header-title">How Does It Work</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="how-it-works-box arrow-1">
                        <div class="how-it-works-box-inner"> <span class="icon-box">
                <img src="assets/img/001-search.png" alt="icon">
                <span class="number-box">01</span>
                            </span>
                            <h6>Search</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="how-it-works-box arrow-2">
                        <div class="how-it-works-box-inner"> <span class="icon-box">
                <img src="assets/img/004-shopping-bag.png" alt="icon">
                <span class="number-box">02</span>
                            </span>
                            <h6>Select</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="how-it-works-box arrow-1">
                        <div class="how-it-works-box-inner"> <span class="icon-box">
                <img src="assets/img/002-stopwatch.png" alt="icon">
                <span class="number-box">03</span>
                            </span>
                            <h6>Order</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="how-it-works-box">
                        <div class="how-it-works-box-inner"> <span class="icon-box">
                <img src="assets/img/003-placeholder.png" alt="icon">
                <span class="number-box">04</span>
                            </span>
                            <h6>Enjoy</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How It Woks -->
    
@endsection