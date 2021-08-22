@extends('Website.layouts.app')
@section('content')
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
                    <div class="category-type overlay padding-15"> 
                        @if(request()->has('category') && request()->category=='top-rated')
                        <a href="{{route('webiste.restaurant.list.categ')}}?category=trending" class="category-btn">Trending</a>
                        @else
                        <a href="{{route('webiste.restaurant.list.categ')}}?category=top-rated" class="category-btn">Top rated</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ex-collection-box mb-xl-20">
                    <img src="assets/img/restaurants/540x300/collection-2.jpg" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15"> 
                        @if(request()->has('category') && request()->category=='new')
                        <a href="{{route('webiste.restaurant.list.categ')}}?category=trending" class="category-btn">Trending</a>
                        @else
                        <a href="{{route('webiste.restaurant.list.categ')}}?category=new" class="category-btn">New</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
           
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    @if(!$data->isEmpty())
                    @foreach($data as $val)
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
                                            <img src="assets/img/svg/013-heart-1.svg" alt="tag">
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
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-green">4.1</span>
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
                </div>
            </div>
        </div>
</section>
@endsection