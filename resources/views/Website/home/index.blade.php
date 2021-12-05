@extends('Website.layouts.app')
@section('content')
@php
    $now = date("Y-m-d H:i:s");
@endphp
 <!-- Navigation -->
    <input type="hidden" class="user-id" value="{{Auth::id() ?? ''}}">
    <div class="inner-wrapper bg-image">
        <div class="container-fluid">
            <div class="row no-gutters">
               
                <div class="slide__pizza spining-ball">
                    <img src="{{asset('storage/'.Settings::get('general_setting_website_spining_plate'))}}" alt="pizza images">
                </div>
               <div class="col-md-3"> <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('storage/'.Settings::get('general_setting_website_logo')) ??'assets/img/logo.png'}}" class="img-fluid" alt="Logo"></a></div>
                <div class="col-md-6 text-center">
                    <div class="section-2 main-page section-2-bg main-padding">
                         <img src="{{asset('storage/'.Settings::get('general_setting_website_head_image'))}}" alt="" style="max-width: 280px;">
                         <h1 class="text-light-black fw-700">{{ Settings::get('general_setting_header_title') }}</h1>
                         <a href="{{route('webiste.restaurant.list.categ')}}?category=dine-in" class="btn11">{{ Settings::get('general_setting_top_header_dine_in') }}</a>
                         <a href="{{route('webiste.restaurant.list.categ')}}?category=delivery" class="btn22">{{ Settings::get('general_setting_top_header_delivery') }}</a>
                         <a href="{{route('webiste.restaurant.list.categ')}}?category=catering" class="btn23">{{ Settings::get('general_setting_top_header_catering') }}</a>
                         <a href="{{route('webiste.restaurant.list.categ')}}?category=pickup" class="btn24">{{ Settings::get('general_setting_top_header_pickup') }}</a>

                        <div class="section-header-center text-center mt-5">
                            <form method="POST" action="{{url('home/search')}}">
                                @csrf
                                <input type="text" class="search11 form-control" name="search" placeholder="Search Restaurant" autocomplete="off">
                                
                                <input type="hidden" name="type">
                                
                                <input type="hidden" name="slug">

                                <input type="submit" class="submit11 form-control" value="Search">
                                
                                <ul class="list-group text-left suggest d-none">
                                  <li class="list-group-item">Cras justo odio</li>
                                  <li class="list-group-item">Dapibus ac facilisis in</li>
                                  <li class="list-group-item">Morbi leo risus</li>
                                  <li class="list-group-item">Porta ac consectetur ac</li>
                                  <li class="list-group-item">Vestibulum at eros</li>
                                </ul>

                            </form>
                        </div>
                        <h2 class="text-light-black fw-700 mt-3 slg">{{ Settings::get('general_setting_header_title2') }}</h2>
                        <!-- <div class="input-group row">
                            <div class="input-group2 col-xl-8">
                                <input type="search" class="form-control form-control-submit" placeholder="Enter street address or zip code" value="1246 57th St, Brooklyn, NY, 11219">
                                <div class="input-group-prepend">
                                    <button class="input-group-text text-light-green"><i class="fab fa-telegram-plane"></i></button>
                                </div>
                            </div>
                            <div class="input-group-append col-xl-4">
                                <button class="btn-second btn-submit full-width" type="button">Find Restaurants</button>
                            </div>
                        </div> -->
                    
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

    <section class="browse-cat section-padding" style="padding: 0px 0 40px 0;">
          <div class="section-header-center text-center">
            <h3 class="text-light-black header-title h3">{{ Settings::get('general_setting_restaurant_icon_heading') }}</h3>
          </div>
        <div class="container">
            <div class="row">
                
                <div class="col-12">
                    <div class="category-slider swiper-container" id="slideshow_services11">
                        <div class="swiper-wrapper">
                            @if(!$data['restro']->isEmpty())
                            @foreach($data['restro'] as $key=>$value)
                            <div class="swiper-slide">
                                <a href="{{route('webiste.menu.index',$value->slug)}}" class="categories">
                                    <div class="icon2 text-custom-white bg-light-green ">
                                        @if($value->icon)
                                        <img src="{{asset('storage/'.$value->icon)}}" class="rounded-circle" alt="">
                                        @else
                                        <img src="assets/img/image_not_f.jpeg" class="rounded-circle" alt="">
                                        @endif
                                    </div> 
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   

    <section class="browse-cat u-line section-padding" style="padding: 0px 0 40px 0;">
        <div class="section-header-center text-center">
           <h3 class="text-light-black header-title h3">{{ Settings::get('general_setting_meal_list_heading') }}</h3>
        </div>
        <div class="container">
            <div class="row">
               
                <div class="col-12">
                    <div class="category-slider swiper-container" id="slideshow_services">
                        <div class="swiper-wrapper">
                            @if(!$data['menu_item']->isEmpty())
                            @foreach($data['menu_item'] as $key=>$value)
                            <div class="swiper-slide">
                               <div class="product-box mb-md-20">
                                    <div class="product-img">
                                        <a href="{{route('webiste.menu.index',$value->restaurant->slug)}}">
                                            <img src="{{asset('storage/'.$value->image)}}" class="img-fluid full-width" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <h6 class="product-title"><a href="{{route('webiste.menu.index',$value->restaurant->slug)}}" class="text-light-black">{{$value->name ?? ''}}</a></h6>
                                        <p class="text-light-white">${{$value->menu_price[0]->pivot->price ?? ''}}</p>
                                        <div class="product-btn">
                                            <a href="{{route('webiste.menu.index',$value->restaurant->slug)}}" class="btn-first white-btn full-width text-light-green fw-600">{{ Settings::get('general_setting_meal_list_btn_heading') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  

    <!-- Browse by category -->
    <section class="browse-cat u-line section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">{{ Settings::get('general_setting_cuisine_heading') }} <span class="fs-14"><a href="{{route('webiste.restaurant.list.categ')}}">See all restaurant</a></span></h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="category-slider swiper-container">
                        <div class="swiper-wrapper">
                            @if(!$data['1by2meal']->isEmpty())
                            @foreach($data['1by2meal'] as $val)
                            <div class="swiper-slide">
                                <a @if(Auth::check() && Auth::user()->aaadiningPurchase!=null && Auth::user()->aaadiningPurchase->end_at >= $now) href="{{route('webiste.menu.index',$val->restaurant->slug)}}" @elseif(!Auth::check()) href="{{route('login')}}" @else href="{{route('stripe.buycard.post')}}" @endif class="categories">
                                    <div class="icon icon-parent text-custom-white parent bg-light-green"> @if($val->image) <img src="{{ asset('storage/'.$val->image) }}" class="rounded-circle child" alt="categories"> @else<i class="fas fa-map-marker-alt"></i>@endif
                                        <span>2for1 {{$val->name}}</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Browse by category -->
 
    <!-- Explore collection -->
    <section class="ex-collection section-padding" style="padding-bottom: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-header-center">
                        <h3 class="text-light-black header-title">{{ Settings::get('general_setting_restaurant_list_head') }} </h3>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="ex-collection-box mb-xl-20">
                        <img src="assets/img/restaurants/540x300/collection-1.jpg" class="img-fluid full-width" alt="image">
                        <div class="category-type overlay padding-15"> <a href="{{route('webiste.restaurant.list.categ')}}?category=top-rated" class="category-btn">Top rated</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ex-collection-box mb-xl-20">
                        <img src="assets/img/restaurants/540x300/collection-2.jpg" class="img-fluid full-width" alt="image">
                        <div class="category-type overlay padding-15"> <a href="{{route('webiste.restaurant.list.categ')}}?category=new" class="category-btn">New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
               
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @if(!$data['restro']->isEmpty())
                        @foreach($data['restro'] as $val)
                        @php
                        $numrat = count($val->rating);
                        $totalrat = 0;
                        foreach ($val->rating as $kiii => $vall) {
                            $totalrat = $totalrat+$vall->rating;
                        }
                        if ($numrat >=1) {
                            $totalrat = $totalrat/$numrat;
                        }
                        @endphp
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-box mb-xl-20">
                                <div class="product-img">
                                    <a href="{{route('webiste.menu.index',$val->slug)}}">
                                        @if($val->image)
                                        <img src="{{asset('storage/'.$val->image)}}" class="img-fluid full-width" alt="product-img" style="height:200px;">
                                        @else
                                        <img src="assets/img/logo.png" class="img-fluid full-width" alt="product-img" style="height:200px;">
                                        @endif
                                    </a>
                                    <div class="overlay">
                                        <div class="product-tags padding-10"> 
                                            <span class="circle-tag add-wish-list">
                                                @if($val->wishlist->isEmpty())
                                                <img src="assets/img/svg/013-heart-1.svg" alt="tag">
                                                @else
                                                @foreach($val->wishlist as $va)
                                                    @if($va->product_id==$val->id)
                                                    <img src="assets/img/svg/010-heart.svg" alt="tag">
                                                    @endif
                                                @endforeach
                                                @endif
                                                <input type="hidden" class="restaurant-id" value="{{ $val->id ?? ''}}">
                                            </span>
                                            @if($val->trending)
                                            <span class="type-tag bg-gradient-green text-custom-white">Trending</span>
                                            @elseif($val->new)
                                            <span class="text-custom-white type-tag bg-gradient-orange">NEW</span>
                                            @endif
                                            <div class="custom-tag"> 
                                                <span class="text-custom-white rectangle-tag bg-gradient-red">10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title"><a href="{{route('webiste.menu.index',$val->slug)}}" class="text-light-black"> {{ $val->name ?? '' }}</a></h6>
                                        <div class="tags"> 
                                            @if($totalrat >=1)
                                            <span class="text-custom-white rectangle-tag @if($totalrat ==5 || $totalrat ==4) bg-green @elseif($totalrat ==3) bg-yellow @else bg-red @endif">{{$totalrat ?? "NA"}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="text-light-white">
                                        @if(isset($val->cuisin) && !$val->cuisin->isEmpty())
                                            @foreach($val->cuisin as $k=>$cu)
                                                @if($k<=2)
                                                    {{ $cu->name ?? ''}},
                                                @endif
                                            @endforeach
                                        @endif
                                    </p>
                                    <div class="product-details">
                                        <div class="price-time"> <span class="text-light-black time">{{ $val->order_lead_time ?? '' }}-{{ $val->delivery_extra_time+$val->order_lead_time }} min</span>
                                            @if($val->meal_starting)
                                            <span class="text-light-white price">${{$val->meal_starting}} min price</span>
                                            @endif
                                        </div>
                                        @if($numrat)
                                        <div class="rating"> 
                                            <span>
                                                @for($i=0; $i<$totalrat; $i++)
                                                    <i class="fas fa-star text-yellow"></i>
                                                @endfor
                                                @for($i=0; $i<5-$totalrat; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            </span>
                                            <span class="text-light-white text-right">{{$numrat ?? 0}} ratings</span>
                                        </div>
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
    </section>
    <!-- Explore collection -->

    <section class="section-padding" style="border-top: 1px solid rgba(67, 41, 163, .2);">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                  <div class="box">
                  <h3>{{ Settings::get('general_setting_add_your_restaurant_text') }}</h3><br>
                  <a href="{{route('webiste.bussiness.account')}}" class="btn33">{{ Settings::get('general_setting_add_your_restaurant_btn_text') }}</a>
               </div></div>
               <div class="col-md-4">
                <div class="box">
                  <h3>{{ Settings::get('general_setting_use_kitchens_text') }}</h3>
                  <a href="#" class="btn33">{{ Settings::get('general_setting_use_kitchens_button_text') }}</a>
               </div></div>
               <div class="col-md-4">
                <div class="box">
                  <h3>{{ Settings::get('general_setting_local_chef_text') }}</h3><br><br>
                  <a href="#" class="btn33">{{ Settings::get('general_setting_local_chef_button_text') }}</a>
               </div></div>
            </div>
        </div>
    </section>

<section class="footer-bottom-search pt-5 pb-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <p class="mt-4 text-black">{{ Settings::get('general_setting_popular_food_text') }}</p>
                <div class="search-links">
                    @if(!$data['cuisine']->isEmpty())
                    @foreach($data['cuisine'] as $val)
                        <a href="{{route('webiste.restaurant.list',$val->id)}}">{{$val->name ?? ''}}</a> | 
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- footer -->
    <div class="footer-top section-padding" style="display: none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-credit-card-1"></i></span>
                        <span class="text-light-black">100% Payment<br>Secured</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-wallet-1"></i></span>
                        <span class="text-light-black">Support lots<br> of Payments</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-help"></i></span>
                        <span class="text-light-black">24 hours / 7 days<br>Support</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-truck"></i></span>
                        <span class="text-light-black">Free Delivery<br>with $50</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-guarantee"></i></span>
                        <span class="text-light-black">Best Price<br>Guaranteed</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-app-file-symbol"></i></span>
                        <span class="text-light-black">Mobile Apps<br>Ready</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- <section class="pt-5 pb-5 bg-white">
<div class="container">
    <div class="section-header-center text-center">
                        <h3 class="text-light-black header-title">{{ Settings::get('general_setting_join_online_class') }}</h3>
                    </div>
 <div class="instagram-slider swiper-container" id="slideshow_services2">
            <ul class="hm-list hm-instagram swiper-wrapper">
                <li class="swiper-slide">
                    <a href="#"><img src="assets/img/restaurants/250x200/insta-3.jpg" alt="instagram"></a>
                    <span><p>Monday June 12th, 8:00am PT/11:00 am ET</p>
                    <a href="#" class="btn-first white-btn text-light-green fw-600">Join class</a></span>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="assets/img/restaurants/250x200/insta-1.jpg" alt="instagram"></a>
                   <span><p>Monday June 12th, 8:00am PT/11:00 am ET</p>
                    <a href="#" class="btn-first white-btn text-light-green fw-600">Join class</a></span>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="assets/img/restaurants/250x200/insta-2.jpg" alt="instagram"></a>
                   <span><p>Monday June 12th, 8:00am PT/11:00 am ET</p>
                    <a href="#" class="btn-first white-btn text-light-green fw-600">Join class</a></span>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="assets/img/restaurants/250x200/insta-4.jpg" alt="instagram"></a>
                   <span><p>Monday June 12th, 8:00am PT/11:00 am ET</p>
                    <a href="#" class="btn-first white-btn text-light-green fw-600">Join class</a></span>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="assets/img/restaurants/250x200/insta-5.jpg" alt="instagram"></a>
                    <span><p>Monday June 12th, 8:00am PT/11:00 am ET</p>
                    <a href="#" class="btn-first white-btn text-light-green fw-600">Join class</a></span>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="assets/img/restaurants/250x200/insta-6.jpg" alt="instagram"></a>
                    <span><p>Monday June 12th, 8:00am PT/11:00 am ET</p>
                    <a href="#" class="btn-first white-btn text-light-green fw-600">Join class</a></span>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="assets/img/restaurants/250x200/insta-7.jpg" alt="instagram"></a>
                   <span><p>Monday June 12th, 8:00am PT/11:00 am ET</p>
                    <a href="#" class="btn-first white-btn text-light-green fw-600">Join class</a></span>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="assets/img/restaurants/250x200/insta-8.jpg" alt="instagram"></a>
                    <span><p>Monday June 12th, 8:00am PT/11:00 am ET</p>
                    <a href="#" class="btn-first white-btn text-light-green fw-600">Join class</a></span>
                </li>
            </ul>
        </div>
</div>
</section> --}}
@endsection
@push('style')
    <style type="text/css">
        .suggest{position: absolute;width: 62%;left: 56px;margin-top: -21px;border-radius: 0px 6px;z-index: 99999999999;opacity: 1;height: `;height: 141px;max-height: 150px;overflow-x: auto;}
        .suggest li{padding: 6px !important;cursor: pointer !important;}
        .suggest li:hover{background-color: #ec2229 !important;color: #fff;}

        ul.suggest::-webkit-scrollbar-track
        {
          border-radius: 0px;
          background-color: #cecece;
        }
        ul.suggest::-webkit-scrollbar
        {
          width: 6px;
        }
        ul.suggest::-webkit-scrollbar-thumb
        {
          border-radius: 0px;
          background-color: #ec2229;
        }
        @media all and (max-width: 768px) {
          .spining-ball{display: none;}
          .search11{width: 100% !important;}
          .suggest{bottom: 28px;width: 79%;left: 36px;}
        }

        .parent {
              margin: 20px;
            overflow: hidden;
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .child {
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            -o-transition: all .5s;
            transition: all .5s;
        }

        .parent span {
            display: none;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff !important;
            text-align: center;
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            height: 50px;
            cursor: pointer;
            /*text-decoration: none;*/
        }

        .parent:hover .child, .parent:focus .child {
            -ms-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }

        .parent:hover .child:before, .parent:focus .child:before {
            display: block;
        }

        .parent:hover span, .parent:focus span {
            display: block;
        }

    </style>
@endpush
@push('script')
    <script type="text/javascript" src="{{asset('js/front/home_page.js')}}"></script>
@endpush