@extends('Website.layouts.app')
@section('content')
@php
    $banner_img = '<img src="assets/img/banner.jpg" class="img-fluid full-width" alt="banner">';
    $imag= asset('storage/'.Settings::get('setting_about_us_page_banner_image'));
    
    if($imag){
        $banner_img = '<img src="'.$imag.'" class="img-fluid full-width" alt="banner">';
    }

@endphp
<!-- restaurent top -->
<div class="page-banner p-relative smoothscroll" id="menu">
    {!! $banner_img !!}
</div>
<!-- restaurent top -->

<!-- about us -->
<section class="aboutus section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-header-center">
                    <h1 class="text-light-black header-title">{{ Settings::get('setting_about_us_page_main_title') }}</h1>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="history-title mb-md-40">
                    <h2 class="text-light-black">{!! Settings::get('setting_about_us_page_sub_title') !!}</h2>
                    <p class="text-light-white">{!! Settings::get('setting_about_us_page_description') !!}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="histry-img mb-xs-20">
                            <img src="{{asset('storage/'.Settings::get('setting_about_us_page_image1'))}}" class="img-fluid full-width" alt="Histry">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="histry-img mb-xl-20">
                            <img src="{{asset('storage/'.Settings::get('setting_about_us_page_image2'))}}" class="img-fluid full-width" alt="Histry">
                        </div>
                        <div class="histry-img">
                            <img src="{{asset('storage/'.Settings::get('setting_about_us_page_image3'))}}" class="img-fluid full-width" alt="Histry">
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
                            <img src="{{asset('storage/'.Settings::get('setting_about_us_page_process_fi'))}}" alt="icon">
                            <span class="number-box">01</span>
                            </span>
                            <h6>{{Settings::get('setting_about_us_page_process_ftitle')}}</h6>
                            <p>{!! Settings::get('setting_about_us_page_process_fdesc') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="how-it-works-box arrow-2">
                        <div class="how-it-works-box-inner"> <span class="icon-box">
                            <img src="{{asset('storage/'.Settings::get('setting_about_us_page_process_si'))}}" alt="icon">
                            <span class="number-box">02</span>
                            </span>
                            <h6>{{Settings::get('setting_about_us_page_process_stitle')}}</h6>
                            <p>{!! Settings::get('setting_about_us_page_process_sdesc') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="how-it-works-box arrow-1">
                        <div class="how-it-works-box-inner"> <span class="icon-box">
                            <img src="{{asset('storage/'.Settings::get('setting_about_us_page_process_ti'))}}" alt="icon">
                            <span class="number-box">03</span>
                            </span>
                            <h6>{{Settings::get('setting_about_us_page_process_ttitle')}}</h6>
                            <p>{!! Settings::get('setting_about_us_page_process_tdesc') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="how-it-works-box">
                        <div class="how-it-works-box-inner"> <span class="icon-box">
                            <img src="{{asset('storage/'.Settings::get('setting_about_us_page_process_foi'))}}" alt="icon">
                            <span class="number-box">04</span>
                            </span>
                            <h6>{{Settings::get('setting_about_us_page_process_fotitle')}}</h6>
                            <p>{!! Settings::get('setting_about_us_page_process_fodesc') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How It Woks -->
    
@endsection