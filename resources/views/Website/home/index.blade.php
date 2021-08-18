@extends('Website.layouts.app')
@section('content')
 <!-- Navigation -->
    <div class="inner-wrapper bg-image">
        <div class="container-fluid">
            <div class="row no-gutters">
               
                    <div class="slide__pizza">
                        <img src="assets/img/slider-pizza.png" alt="pizza images">
                    </div>
               <div class="col-md-3"> <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" class="img-fluid" alt="Logo"></a></div>
                <div class="col-md-6 text-center">
                    <div class="section-2 main-page section-2-bg main-padding">
                         <img src="assets/img/1s.png" alt="" style="max-width: 340px;">
                         <h1 class="text-light-black fw-700">From our kitchen to your home</h1>
                         <a href="javascript::void(0)" class="coming_soon btn11">Dine-in</a>
                         <a href="javascript::void(0)" class="coming_soon btn22">Delivery</a>
                         <a href="javascript::void(0)" class="coming_soon btn23">Catering</a>
                         <a href="javascript::void(0)" class="coming_soon btn24">Pick-up</a>

                        <div class="section-header-center text-center mt-5">
                               <form>
                                <input type="text" class="search11 form-control" name="search" placeholder="Search Restaurant">
                                <input type="submit" class="submit11 form-control" value="Search">
                               </form>
                        </div>
                        <h2 class="text-light-black fw-700 mt-3 slg">We make it EZ</h2>
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
            <h3 class="text-light-black header-title h3">Choose a restaurant </h3>
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
           <h3 class="text-light-black header-title h3">Or just order any of these meals</h3>
        </div>
        <div class="container">
            <div class="row">
               
                <div class="col-12">
                    <div class="category-slider swiper-container" id="slideshow_services">
                        <div class="swiper-wrapper">
                            @for($i=0; $i<=5; $i++)
                            <div class="swiper-slide">
                               <div class="product-box mb-md-20">
                                    <div class="product-img">
                                        <a href="javascript::void(0)" class="coming_soon">
                                            <img src="assets/img/restaurants/new/meal{{$i+1}}.jpg" class="img-fluid full-width" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <h6 class="product-title"><a href="javascript::void(0)" class="text-light-black coming_soon"> Vegan Burger</a></h6>
                                        <p class="text-light-white">$10</p>
                                        <div class="product-btn">
                                            <a href="javascript::void(0)" class="btn-first white-btn full-width text-light-green fw-600 coming_soon">Order Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
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
                        <h3 class="text-light-black header-title title">Browse by cuisine <span class="fs-14"><a href="#">See all restaurant</a></span></h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="category-slider swiper-container">
                        <div class="swiper-wrapper">
                            @if(!$data['cuisine']->isEmpty())
                            @foreach($data['cuisine'] as $val)
                            <div class="swiper-slide">
                                <a href="{{route('webiste.restaurant.list',$val->id)}}" class="categories">
                                    <div class="icon icon-parent text-custom-white bg-light-green"> @if($val->image) <img src="{{ asset('storage/'.$val->image) }}" class="rounded-circle" alt="categories"> @else<i class="fas fa-map-marker-alt"></i>@endif
                                    </div> <span class="text-light-black cat-name">{{ $val->name ?? '' }}</span>
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
                        <h3 class="text-light-black header-title"> Order Your Favorite Recipes </h3>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="ex-collection-box mb-xl-20">
                        <img src="assets/img/restaurants/540x300/collection-1.jpg" class="img-fluid full-width" alt="image">
                        <div class="category-type overlay padding-15"> <a href="#" class="category-btn">Top rated</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ex-collection-box mb-xl-20">
                        <img src="assets/img/restaurants/540x300/collection-2.jpg" class="img-fluid full-width" alt="image">
                        <div class="category-type overlay padding-15"> <a href="#" class="category-btn">Top rated</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
               
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @if(!$data['restro']->isEmpty())
                        @foreach($data['restro'] as $val)
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
                                            <span class="circle-tag">
                                                <img src="assets/img/svg/013-heart-1.svg" alt="tag">
                                            </span>
                                            <span class="type-tag bg-gradient-green text-custom-white">Trending</span>
                                            <div class="custom-tag"> 
                                                <span class="text-custom-white rectangle-tag bg-gradient-red">10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title"><a href="{{route('webiste.menu.index',$val->slug)}}" class="text-light-black"> {{ $val->name ?? '' }}</a></h6>
                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-yellow">3.1</span>
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
                                            <span class="text-light-white price">${{$val->delivery_fee}} min</span>
                                        </div>
                                        <div class="rating"> 
                                            <span>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            </span>
                                            <span class="text-light-white text-right">4225 ratings</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-box mb-xl-20">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/restaurants/255x150/shop-2.jpg" class="img-fluid full-width" alt="product-img">
                                    </a>
                                    <div class="overlay">
                                        <div class="product-tags padding-10"> <span class="circle-tag">
                                        <img src="assets/img/svg/013-heart-1.svg" alt="tag"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title"><a href="#" class="text-light-black "> Flavor Town</a></h6>
                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">2.1</span>
                                        </div>
                                    </div>
                                    <p class="text-light-white">Breakfast, Lunch & Dinner</p>
                                    <div class="product-details">
                                        <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                            <span class="text-light-white price">$10 min</span>
                                        </div>
                                        <div class="rating"> <span>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                          </span>
                                            <span class="text-light-white text-right">4225 ratings</span>
                                        </div>
                                    </div>
                                    <div class="product-footer"> 
                                        <span class="text-custom-white square-tag"><img src="assets/img/svg/007-chili-1.svg" alt="tag"></span>
                                        <span class="text-custom-white square-tag"><img src="assets/img/svg/004-leaf.svg" alt="tag"></span>
                                        <span class="text-custom-white square-tag"><img src="assets/img/svg/009-lemon.svg" alt="tag"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-box mb-xl-20">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/restaurants/255x150/shop-3.jpg" class="img-fluid full-width" alt="product-img">
                                    </a>
                                    <div class="overlay">
                                        <div class="product-tags padding-10"> <span class="circle-tag"><img src="assets/img/svg/013-heart-1.svg" alt="tag"></span>
                                        <span class="type-tag bg-gradient-green text-custom-white">Trending</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Big Bites</a></h6>
                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">4.5</span>
                                        </div>
                                    </div>
                                    <p class="text-light-white">Pizzas, Fast Food</p>
                                    <div class="product-details">
                                        <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                            <span class="text-light-white price">$10 min</span>
                                        </div>
                                        <div class="rating"> <span>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                          </span>
                                            <span class="text-light-white text-right">4225 ratings</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-box mb-xl-20">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/restaurants/255x150/shop-4.jpg" class="img-fluid full-width" alt="product-img">
                                    </a>
                                    <div class="overlay">
                                        <div class="product-tags padding-10"> <span class="circle-tag"><img src="assets/img/svg/013-heart-1.svg" alt="tag"></span>
                                            <span class="type-tag bg-gradient-green text-custom-white">Trending</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Smile N’ Delight</a></h6>
                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">4.5</span>
                                        </div>
                                    </div>
                                    <p class="text-light-white">Desserts, Beverages</p>
                                    <div class="product-details">
                                        <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                            <span class="text-light-white price">$10 min</span>
                                        </div>
                                        <div class="rating"> <span>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                          </span>
                                            <span class="text-light-white text-right">4225 ratings</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-box mb-xl-20">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/restaurants/255x150/shop-5.jpg" class="img-fluid full-width" alt="product-img">
                                    </a>
                                    <div class="overlay">
                                        <div class="product-tags padding-10"> <span class="circle-tag"><img src="assets/img/svg/013-heart-1.svg" alt="tag"></span>
                                            <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Lil Johnny’s</a></h6>
                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">2.1</span>
                                        </div>
                                    </div>
                                    <p class="text-light-white">Continental & Mexican</p>
                                    <div class="product-details">
                                        <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                            <span class="text-light-white price">$10 min</span>
                                        </div>
                                        <div class="rating"> <span>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                          </span>
                                            <span class="text-light-white text-right">4225 ratings</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-box mb-xl-20">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/restaurants/255x150/shop-6.jpg" class="img-fluid full-width" alt="product-img">
                                    </a>
                                    <div class="overlay">
                                        <div class="product-tags padding-10"> <span class="circle-tag"><img src="assets/img/svg/013-heart-1.svg" alt="tag"></span>
                                            <span class="text-custom-white type-tag bg-gradient-orange">NEW</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Choice Foods</a></h6>
                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">4.5</span>
                                        </div>
                                    </div>
                                    <p class="text-light-white">Indian, Chinese, Tandoor</p>
                                    <div class="product-details">
                                        <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                            <span class="text-light-white price">$10 min</span>
                                        </div>
                                        <div class="rating"> <span>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                          </span>
                                            <span class="text-light-white text-right">4225 ratings</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> --}}
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
                  <h3>Are you a restaurant owner?</h3><br>
                  <a href="#" class="btn33">Add your restaurant Here</a>
               </div></div>
               <div class="col-md-4">
                <div class="box">
                  <h3>Do you want to use one of our kitchens to sell your famous dish</h3>
                  <a href="#" class="btn33">Click Here</a>
               </div></div>
               <div class="col-md-4">
                <div class="box">
                  <h3>Are you a local chef?</h3><br><br>
                  <a href="#" class="btn33">Join Here</a>
               </div></div>
      </div>
   </div>
 </section>

<section class="footer-bottom-search pt-5 pb-5 bg-white">
<div class="container">
<div class="row">
<div class="col-xl-12">
<p class="text-black">POPULAR COUNTRIES</p>
<div class="search-links">
<a href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> | <a href="#">Chile</a> | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a href="#">Philippines</a> | <a href="#">Sri Lanka</a> | <a href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> | <a href="#">Chile</a> | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a href="#">Philippines</a> | <a href="#">Sri Lanka</a><a href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> | <a href="#">Chile</a> | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a href="#">Philippines</a> | <a href="#">Sri Lanka</a> | <a href="#">Australia</a> | <a href="#">Brasil</a> | <a href="#">Canada</a> | <a href="#">Chile</a> | <a href="#">Czech Republic</a> | <a href="#">India</a> | <a href="#">Indonesia</a> | <a href="#">Ireland</a> | <a href="#">New Zealand</a> | <a href="#">United Kingdom</a> | <a href="#">Turkey</a> | <a href="#">Philippines</a> | <a href="#">Sri Lanka</a>
</div>
<p class="mt-4 text-black">POPULAR FOOD</p>
<div class="search-links">
 <a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a href="#">Street Food</a> | <a href="#">Continental</a> | <a href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> | <a href="#">Punjabi Food</a> | <a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a href="#">Street Food</a> | <a href="#">Continental</a> | <a href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> | <a href="#">Punjabi Food</a><a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a href="#">Street Food</a> | <a href="#">Continental</a> | <a href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> | <a href="#">Punjabi Food</a> | <a href="#">Fast Food</a> | <a href="#">Chinese</a> | <a href="#">Street Food</a> | <a href="#">Continental</a> | <a href="#">Mithai</a> | <a href="#">Cafe</a> | <a href="#">South Indian</a> | <a href="#">Punjabi Food</a>
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

<section class="pt-5 pb-5 bg-white">
<div class="container">
    <div class="section-header-center text-center">
                        <h3 class="text-light-black header-title">Join our online classes</h3>
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
</section>
@endsection