@extends('Website.layouts.app')
@section('content')
@php
    $now = date("Y-m-d H:i:s");
	$authCheck = Auth::check();
    $orderTime = $restaurant->order_lead_time+$restaurant->delivery_extra_time;
    $orderExtraTime = $orderTime+5;
    $aaadininngMember = isset(Auth::user()->aaadiningPurchase) && Auth::user()->aaadiningPurchase->end_at < $now ? true:false;
@endphp
<input type="hidden" class="restro_id" value="{{$restaurant->id}}">
<input type="hidden" class="user_id" @if(Auth::check()) value="{{Auth::id()}}" @endif>
<!-- restaurent top -->
<div class="page-banner p-relative smoothscroll" id="menu">
    @if($restaurant->banner_img)
    <img src="{{asset('storage/'.$restaurant->banner_img)}}" class="img-fluid full-width" alt="banner">  
    @else
    <img src="assets/img/pizza-banner.jpg" class="img-fluid full-width" alt="banner">  
    @endif
</div>
<!-- restaurent top -->
<!-- restaurent details -->
<section class="restaurent-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="restaurent-area">
                <div class="restaurent-logo">
                	@if($restaurant->icon)
                    <img src="{{asset('storage/'.$restaurant->icon)}}" class="img-fluid" alt="">
                    @else
                    <img src="assets/img/image_not_f.jpeg" class="img-fluid" alt="">
                    @endif
                 </div>
                     <div class="head-rating text-center">
                      <div class="rating"> 
                        <span class="fs-16 text-yellow">
                          <i class="fas fa-star"></i>
                        </span>
                        <span class="fs-16 text-yellow">
                          <i class="fas fa-star"></i>
                        </span>
                       <span class="fs-16 text-yellow">
                          <i class="fas fa-star"></i>
                        </span>
                        <span class="fs-16 text-yellow">
                          <i class="fas fa-star"></i>
                        </span>
                        <span class="fs-16 text-yellow">
                          <i class="fas fa-star"></i>
                        </span>
                           
                        </div>
                        
                    </div>
               
              </div>
            <div class="row mmt">
              <div class="col-md-2"></div>
              <div class="col-md-6">
                <div class="heading padding-tb-10">
                    <h3 class="text-light-black title fw-700 no-margin">{{ $restaurant->name ?? '' }}</h3>
                    <p class="text-light-black sub-title no-margin">{{ $restaurant->address ?? '' }} {{ $restaurant->address2 ?? '' }}, {{ $restaurant->city ?? '' }}, {{ $restaurant->state ?? '' }}, {{ $restaurant->country ?? '' }}, {{ $restaurant->zipcode ?? '' }}</p>
                   
                </div>
             </div> 
             <div class="col-md-4">{{-- <a href="javascript:void(0)" class="btn33 mt-4"><i class="fa fa-users"></i> Start a group order</a> --}}</div> 
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
           
            <div class="col-xl-8 col-lg-8">
                <div class="row">
                    <div class="col-lg-12"><hr></hr></div>
               		@if(!$data->isEmpty())
               		@foreach($data as $key=>$val)
               		<div class="col-lg-12">
                        <div class="section-header-left">
                            <h3 class="text-light-black header-title title">{{ $val->name ?? '' }}</h3>
                        </div>
                        <div class="row">
                        	@if(!$val->menuItems->isEmpty())
                        	@foreach($val->menuItems as $ki=>$vlu)
                        	 @php
                        		if (!$vlu->menu_price->isEmpty()) {
	                        	 	$qunty = $vlu->menu_price[0];
                                	$discountType = $vlu->discount_type;
                                	$discount = $vlu->discount;
	                        	}
                            @endphp
	                        <div class="col-lg-4 col-md-6 col-sm-6">
	                            <div class="product-box mb-xl-20">
	                                <div class="product-img">
	                                    <a href="javascript:void(0)">
	                                        <img src="{{ asset('storage/'.$vlu->image) }}" class="img-fluid full-width" alt="product-img" style="height:200px;">
	                                    </a>
	                                    <div class="overlay">
	                                        <div class="product-tags padding-10"> <span class="circle-tag">
						                      <img src="assets/img/svg/013-heart-1.svg" alt="tag">
						                      </span> <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">{{$discount}}@if($discountType==1)$ @else% @endif</span>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="product-caption">
	                                	<input type="hidden" class="item-id item-id{{$vlu->id}}" value="{{$vlu->id}}">
	                                	<input type="hidden" class="dish-price" value="{{ $qunty->pivot->price ?? '' }}">
	                                    <div class="title-box">
	                                        <h6 class="product-title"><a href="javascript:void(0)" class="text-light-black dish-name">{{ $vlu->name ?? '' }}</a></h6>
	                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-yellow">3.1</span>
	                                        </div>
	                                    </div>
	                                   
	                                    <p class="text-light-white">Quantity: <span class="dish-qunt">{{ $qunty->name ?? '' }}</span></p>
	                                    
	                                    <div class="product-details">
	                                        <div class="price-time"> <span class="text-light-black time">30-40 min</span>
	                                            <span class="text-light-white price">${{ $qunty->pivot->price ?? '' }} </span>
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
                                        {{-- Auth::check() && Auth::user()->aaadiningPurchase!=null && Auth::user()->aaadiningPurchase->end_at >= $now &&  --}}
                                        @if($vlu->special==1)
                                            @if(Auth::check() && Auth::user()->aaadiningPurchase!=null && Auth::user()->aaadiningPurchase->end_at >= $now)
                                            <a href="javascript:void(0)" class="dsp-inline btn44 mt-4 add-cart-btn">Add to Cart</a>
                                            @else
                                            <a @if(Auth::check()) href="{{route('stripe.buycard.post')}}" @else href="{{route('login')}}" @endif class="dsp-inline btn44 mt-4">Only for VIP</a>
                                            @endif
                                        @else
	                                    <a href="javascript:void(0)" class="dsp-inline btn44 mt-4 add-cart-btn">Add to Cart</a>
                                        @endif
	                                    <div class="dsp-inline qty mt-4 cart-add-remove-btn d-none">
	                                        <span class="minus bg-dark">-</span>
	                                        <input type="number" min="1" class="count" name="qty1" value="1">
	                                        <span class="plus bg-dark">+</span>
	                                    </div>

	                                </div>
	                            </div>
	                        </div>
	                        @endforeach
	                        @endif
				   		</div>
					</div>
					@endforeach
					@else
	                    <div class="text-danger">No menu found!</div>	
					@endif
           		</div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar">
                  <div class="">

                    <div class="users-area">
                       <!-- user account -->
                        <div class="users-details p-relative">
                            @if(Auth::check())
                            <a href="javascript:void(0);" class="text-light-white fw-500">
                                <img src="assets/img/user/ic_profile_color.png" class="rounded-circle" alt="userimg"> <span>Hi, {{Auth::user()->name ?? ''}}</span>
                                <i class="fa fa-chevron-down"></i>
                            </a>
                            @endif
                             <div class="users-dropdown" style="display: none;">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <div class="icon"><i class="flaticon-user"></i>
                                            </div> <span class="details">Account</span>
                                        </a>
                                    </li>
                                   <li>
                                        <a href="javascript:void(0)">
                                            <div class="icon"><i class="flaticon-refer"></i>
                                            </div> <span class="details">Refer a friend</span>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="javascript:void(0)">
                                            <div class="icon"><i class="flaticon-board-games-with-roles"></i>
                                            </div> <span class="details">Help</span>
                                        </a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="cart-btn notification-btn">
                            <a href="javascript:void(0)" class="text-light-green fw-700"> <i class="fas fa-bell"></i>
                                <span class="user-alert-notification"></span>
                            </a>
                           <!-- <span class="user-alert-cart">0</span> -->
                        </div>
                       <!-- user cart -->
                        <div class="cart-btn cart-dropdown">
                            <a href="javascript:void(0)" class="text-light-green fw-700"> <i class="fas fa-shopping-bag"></i>
                                <span class="user-alert-cart">0</span>
                            </a>
                            <div class="cart-detail-box">
                                <div class="card">
                                  <div class="card-body">
                                   <ul>
                                    <li><h3><a href="javascript:void(0)"><i class="fa fa-check"></i> Item added</a></h3></li>
                                    <li><a href="javascript:void(0)" style="color: #406fb6;"><i class="fa fa-user-plus"></i> Invite friends</a> and order together</li>
                                  </ul>
                                 </div>
                                </div>
                            </div>
                        </div>
                        <!-- user cart -->
                     </div>

                    <div class="cart-detail-box">
                        <div class="card">
                            <div class="card-header padding-15 fw-700">
                            <h3 class="pull-left mb-0">Order Cart</h3>
                            {{-- <a href="javascript:void(0)" class="pull-right wdt11"><i class="fa fa-users"></i>Create Group Order</a>  --}}
                           
                           <div class="delivery-info">
                             <div class="info-group">
                               <span class="pull-left tlt">{{ $restaurant->name ?? '' }}</span>
                               {{-- <span class="pull-right">(what's this?)</span> --}}
                             </div>

                             <div class="info-group">
                               <span class="pull-left wdt12">Delivery Date:</span>
                               <span class="pull-right">{{date('d-M-Y')}}</span>
                             </div>
                             
                             <div class="info-group">
                               <span class="pull-left">Delivery Time:</span>
                               <span class="pull-right">{{date('H:i A',strtotime('+'.$orderTime.' minutes'))}} - {{date('H:i A',strtotime('+'.$orderExtraTime.' minutes'))}}</span>
                             </div>
                            
                             <div class="info-group rdt">
                               <span class="pull-left wdt12">Minimum Order:</span>
                               <span class="pull-none">$</span>
                               <span class="pull-right minimum-delivery-am">{{ number_format($restaurant->minimum_delivery_amount) ?? '' }}</span>
                             </div>

                             <div class="info-group rdt">
                               <span class="pull-left wdt12">Free Delivery above:</span>
                               <span class="pull-none">$</span>
                               <span class="pull-right">{{ number_format($restaurant->free_delivery_amount) ?? '' }}</span>
                             </div>
                           </div>


                           </div>
                            <div class="card-body no-padding" id="scrollstyle-4">
                                <div class="cat-product-box">
                                    
                                </div>
                            </div>
                            
                          <div class="padding-15 fw-700">
                            <div class="delivery-info">
                             <div class="info-group">
                               <span class="pull-left wdt12">Subtotal:</span>
                               <span class="pull-none">$</span>
                               <span class="pull-right sub-total">0.00</span>
                             </div>
                             <div class="info-group">
                               <span class="pull-left wdt12">Delivery:</span>
                               <span class="pull-none">$</span>
                               <span class="pull-right delivery-fees">0.00</span>
                             </div>
                             <div class="info-group">
                               <span class="pull-left wdt12">Fees and Taxes:<span class="sale-tax"></span></span>
                               <span class="pull-none">$</span>
                               <span class="pull-right tax-amount">0.00</span>
                             </div>
                             @if(Auth::check() && Auth::user()->aaadiningPurchase!=null && Auth::user()->aaadiningPurchase->end_at >= $now && $restaurant->aaadining_club)
                                <div class="info-group">
                                   <span class="pull-left wdt12">AAADining Membership:</span>
                                   <span class="pull-none">$</span>
                                   <span class="pull-right ac_max_discount text-primary"></span>
                                 </div>
                             @endif
                             <div class="info-group">
                                <input type="hidden" class="total-amt" value="0">
                               <span class="pull-left tlt wdt12">Total:</span>
                               <span class="pull-none">$</span>
                               <span class="pull-right total-amount">0.00</span>
                             </div>
                             

                           </div></div>

                           <div class="card-footer padding-15"> 
                                <div class="show-erroe text-danger"></div>
                                <a href="javascript:void(0)" class="ds11 wdt14 fw-500 lnk empty-cart">Empty Cart</a>
                                <div>
                                <label class="text-light-white fs-14">Delivery Type? </label>
                                    <div class="form-group d-flex">
                                        <label class="custom-checkbox mb-0 mr-3">
                                          <input type="radio" name="delivery_type" value="1" checked=""> 
                                          <span class="checkmark"></span> Home Delivery
                                        </label>
                                        <label class="custom-checkbox mb-0">
                                          <input type="radio" name="delivery_type" value="2" @if(!Auth::check()) disabled="" @elseif(Auth::check() && Auth::user()->vip==0 &&  Auth::user()->aaadiningPurchase==null || isset(Auth::user()->aaadiningPurchase) && Auth::user()->aaadiningPurchase->end_at < $now) disabled="" @endif> 
                                          <span class="checkmark"></span> I Will Pick Up
                                        </label>
                                    </div>  
                                    <label class="custom-checkbox mb-0">
                                      <input type="radio" name="delivery_type" value="3" @if(!Auth::check()) disabled="" @elseif(Auth::check() && Auth::user()->vip==0 &&  Auth::user()->aaadiningPurchase==null || isset(Auth::user()->aaadiningPurchase) && Auth::user()->aaadiningPurchase->end_at < $now) disabled="" @endif> 
                                      <span class="checkmark"></span> Dine In
                                    </label>
                                </div>
                                {{-- <a href="javascript:void(0)" class="ds11 wdt14 fw-500 lnk">View Full Cart</a> --}}
                                
                                @if(!Auth::check())
                                <span class="fw-500 lnk"><strong>NOTE* </strong> If you are VIP member. Please <strong><a href="{{route('login')}}">LOGIN</a></strong> to access VIP Facility.</span>
                                @endif
                                @if(Auth::check() && Auth::user()->aaadiningPurchase!=null && Auth::user()->aaadiningPurchase->end_at >= $now && $restaurant->aaadining_club)
                                <span class="fw-500"><strong class="lnk">Membership Offer* </strong>&nbsp;&nbsp;&nbsp; Max discount will be <strong>${{ $restaurant->ac_max_discount ?? '' }}</strong></span>
                                <input type="hidden" name="ac_max_discount" value="{{$restaurant->ac_max_discount}}">
                                @endif

                                <a href="javascript:void(0)" class="mt-4 btn-first green-btn text-custom-white full-width fw-500 checkout-btn">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- restaurent meals -->
    
@endsection
@push('script')
<script type="text/javascript">
        var aaadininngMember = '{{$aaadininngMember}}';
        var vipcoupen ='';
        var isvip = 'NO';
        var usercopon = ''; 
		var authCheck = '{{$authCheck ?? ''}}';
        var free_delivery_amount = '{{ $restaurant->free_delivery_amount ?? 0 }}';
        var delivery_fee = '{{ Settings::get('general_setting_delivery_charges_dollar') ?? 0 }}';
        var delivery_fee_percent = '{{ Settings::get('general_setting_delivery_charges_percent') ?? 0 }}';
        var minimum_delivery_amount = '{{$restaurant->minimum_delivery_amount ?? 0}}';
        var sale_tax = '{{$restaurant->sale_tax ?? 0}}';
        var restro_slug = '{{ $restaurant->slug ?? '' }}'
        if (authCheck) {
             vipcoupen = '{{Settings::get('general_setting_vip_coupon_code')}}';
             usercopon = '{{Auth::user()->coupen ?? ''}}';
             isvip = '{{Auth::user()->vip ?? ''}}';
        }
</script>
<script type="text/javascript" src="{{asset('js/front/menu_items.js')}}"></script>
@endpush