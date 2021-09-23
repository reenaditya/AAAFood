@extends('Website.layouts.app')
@section('content')


 <!-- Navigation -->
    <!-- restaurent top -->
    <div class="page-banner p-relative smoothscroll" id="menu">
        <img src="assets/img/salad-banner.jpg" class="img-fluid full-width" alt="banner">
    </div>
    <!-- restaurent top -->

    <!-- restaurent details -->
    <section class="restaurent-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="restaurent-area">
                        <div class="restaurent-logo">
                            <img src="assets/img/user/user.png" class="img-fluid" alt=""  style="display:block;margin: auto;">
                        </div>
                    </div>
                    <div class="row mmt">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <div class="heading padding-tb-10">
                                <h3 class="text-light-black title fw-700 no-margin">{{ Auth::user()->name ?? '' }}</h3>
                                <p class="text-light-black sub-title no-margin"></p>
                               
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <a href="#" class="btn33 mt-4"><i class="fa fa-users"></i> Start a group order</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent details -->
    
   
    <!-- restaurent meals -->
    <section class="section-padding restaurent-meals restaurent-order">
        <div class="container">
            <div class="row">
               <div class="col-xl-1 col-lg-1"></div>
                <div class="col-xl-10 col-lg-10">
                	@if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    @forelse($data as $key=>$value)
                    <div class="row">
                        <div class="col-lg-12 mt-4 restaurent-det">
                            <div class="section-header-left mb-2">
                                <h3 class="text-light-black header-title ">#{{$value->order_number ?? ''}} | &nbsp;&nbsp; {{ $value->restaurant->name ?? '' }} | &nbsp;&nbsp; Total: ${{$value->grand_total ?? ''}} |&nbsp;&nbsp; {{Date("D d-M-Y",strtotime($value->created_at))}}</h3>
                                <div><hr></hr></div>
                            </div>
                            <div class="row">
                                @foreach($value->orderItem as $kii=>$val)
                                 @php
                                    if (!$val->menuItem->menu_price->isEmpty()) {
                                        
                                        $qunty = $val->menuItem->menu_price[0];
                                        $discountType = $val->menuItem->discount_type;
                                        $discount = $val->menuItem->discount;
                                        $estimate = $val->menuItem->estimated_time;
                                    }
                                @endphp
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product-box mb-xl-20">
                                        <div class="product-img">
                                            <a href="#">
                                                <img src="{{ asset('storage/'.$val->menuItem->image) }}" class="img-fluid full-width" alt="product-img" style="height:200px;">
                                            </a>
                                            <div class="overlay">
                                                <div class="product-tags padding-10"> 
                                                    <div class="custom-tag"> 
                                                        <span class="text-custom-white rectangle-tag bg-gradient-red">{{$discount}}@if($discountType==1)$ @else% @endif</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title"><a href="javascript:void(0)" class="text-light-black dish-name">{{ $val->menuItem->name ?? '' }}</a></h6>
                                                <div class="tags"> 
                                                    <span class="text-custom-white rectangle-tag bg-green">4.1</span>
                                                </div>
                                            </div>
                                            <p class="text-light-white">Quantity: <span class="dish-qunt">{{ $qunty->name ?? '' }}</span></p>
                                            <div class="product-details">
                                                <div class="price-time"> 
                                                    <span class="text-light-black time">{{$estimate}}-{{$estimate+10}} min</span>
                                                    <span class="text-light-white price">${{ $qunty->pivot->price ?? '' }} </span>
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
                                            @if($value->order_status===7)
                                            <a href="{{route('webiste.menu.index',$value->restaurant->slug)}}" class="btn44 mt-4">Order Again</a>
                                            @else
                                            <button class="btn44 mt-4" type="button">{{ Config::get('constant.order_status')[$value->order_status] ?? '' }}</button>    
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

          
                   
                  

                        {{-- <div class="col-lg-12">
                            <div class="section-header-left">
                                <h3 class="text-light-black header-title title">Specials</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product-box mb-xl-20">
                                        <div class="product-img">
                                            <a href="#">
                                               <img src="assets/img/restaurants/255x150/shop-23.jpg" class="img-fluid full-width" alt="product-img">
                                            </a>
                                            <div class="overlay">
                                                <div class="product-tags padding-10"> 
                                                    <span class="circle-tag">
                                                        <img src="assets/img/svg/013-heart-1.svg" alt="tag">
                                                    </span> 
                                                    <div class="custom-tag"> 
                                                        <span class="text-custom-white rectangle-tag bg-gradient-red">10%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title"><a href="#" class="text-light-black "> Joe’s Favorite</a></h6>
                                                <div class="tags"> <span class="text-custom-white rectangle-tag bg-yellow">3.1</span>
                                                </div>
                                            </div>
                                            <p class="text-light-white">American, Fast Food</p>
                                            <div class="product-details">
                                                <div class="price-time"> 
                                                    <span class="text-light-black time">30-40 min</span>
                                                    <span class="text-light-white price">$10 min</span>
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
                                            <a href="#" class="btn44 mt-4">Order again</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    @empty
                    <div class="">
                        <h3 class="text-danger header-title title">No order found!</h3>
                        <a href="{{url('/')}}" class="btn44 mt-4" style="width: 10em;">Order Now</a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent meals -->
    
    
    
@endsection
@push('styles')
<style type="text/css">
    .restaurent-det{
        box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
        padding: 10px;
        border-radius: 7px;
    }
</style>
@endpush
@push('script')
<script type="text/javascript" src="{{asset('js/front/order_history.js')}}"></script>
@endpush