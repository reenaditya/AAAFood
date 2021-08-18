@extends('Website.layouts.app')
@section('content')
	    <!-- restaurent top -->
    <div class="page-banner p-relative smoothscroll" id="menu">
        <img src="assets/img/pizza-banner.jpg" class="img-fluid full-width" alt="banner">
        
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
                 <div class="col-md-4"><a href="#" class="btn33 mt-4"><i class="fa fa-users"></i> Start a group order</a></div> 
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
		                                    <a href="#">
		                                        <img src="{{ asset('storage/'.$vlu->image) }}" class="img-fluid full-width" alt="product-img" style="height:200px;">
		                                    </a>
		                                    <div class="overlay">
		                                        <div class="product-tags padding-10"> <span class="circle-tag">
							                      <img src="assets/img/svg/013-heart-1.svg" alt="tag">
							                      </span> <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">{{$discount}} @if($discountType==1) % @else $ @endif</span>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="product-caption">
		                                    <div class="title-box">
		                                        <h6 class="product-title"><a href="#" class="text-light-black ">{{ $vlu->name ?? '' }}</a></h6>
		                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-yellow">3.1</span>
		                                        </div>
		                                    </div>
		                                   
		                                    <p class="text-light-white">Quantity: {{ $qunty->name ?? '' }}</p>
		                                    
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
		                                    <a href="#" class="dsp-inline btn44 mt-4">Add to Cart</a>
		                                    <div class="dsp-inline qty mt-4">
		                                        <span class="minus bg-dark">-</span>
		                                        <input type="number" class="count" name="qty1" value="1">
		                                        <span class="plus bg-dark">+</span>
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
	                                        <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
	                                    </a>
	                                    <div class="overlay">
	                                        <div class="product-tags padding-10"> <span class="circle-tag">
	                        					<img src="assets/img/svg/013-heart-1.svg" alt="tag"></span>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="product-caption">
	                                    <div class="title-box">
	                                        <h6 class="product-title"><a href="#" class="text-light-black "> Cheese</a></h6>
	                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">2.1</span>
	                                        </div>
	                                    </div>
	                                    <p class="text-light-white">Breakfast, Lunch &amp; Dinner</p>
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
	                                    <a href="#" class="dsp-inline btn44 mt-4">Add to Cart</a>
	                                    <div class="dsp-inline qty mt-4">
	                                        <span class="minus bg-dark">-</span>
	                                        <input type="number" class="count" name="qty1" value="1">
	                                        <span class="plus bg-dark">+</span>
	                                    </div>
	                                </div>
	                            </div>
		                        </div>
		                        <div class="col-lg-4 col-md-6 col-sm-6">
	                            <div class="product-box mb-xl-20">
	                                <div class="product-img">
	                                    <a href="#">
	                                        <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
	                                    </a>
	                                    <div class="overlay">
	                                        <div class="product-tags padding-10"> <span class="circle-tag">
					                        <img src="assets/img/svg/013-heart-1.svg" alt="tag">
					                      </span><span class="type-tag bg-gradient-green text-custom-white">
					                        Trending</span>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="product-caption">
	                                    <div class="title-box">
	                                        <h6 class="product-title"><a href="#" class="text-light-black "> Combo</a></h6>
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
	                                    <a href="#" class="dsp-inline btn44 mt-4">Add to Cart</a>
	                                    <div class="dsp-inline qty mt-4">
	                                        <span class="minus bg-dark">-</span>
	                                        <input type="number" class="count" name="qty1" value="1">
	                                        <span class="plus bg-dark">+</span>
	                                    </div>
	                                </div>
	                            </div>
		                        </div>
		                        <div class="col-lg-4 col-md-6 col-sm-6">
	                            <div class="product-box mb-xl-20">
	                                <div class="product-img">
	                                    <a href="#">
	                                        <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
	                                    </a>
	                                    <div class="overlay">
	                                        <div class="product-tags padding-10"> <span class="circle-tag">
					                        <img src="assets/img/svg/013-heart-1.svg" alt="tag">
					                      </span> <span class="type-tag bg-gradient-green text-custom-white">
					                        Trending</span>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="product-caption">
	                                    <div class="title-box">
	                                        <h6 class="product-title"><a href="#" class="text-light-black "> Vegetarian</a></h6>
	                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-green"> 4.5  </span>
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
	                                   <a href="#" class="dsp-inline btn44 mt-4">Add to Cart</a>
	                                    <div class="dsp-inline qty mt-4">
	                                        <span class="minus bg-dark">-</span>
	                                        <input type="number" class="count" name="qty1" value="1">
	                                        <span class="plus bg-dark">+</span>
	                                    </div>
	                                </div>
	                            </div>
		                        </div>
		                        <div class="col-lg-4 col-md-6 col-sm-6">
	                            <div class="product-box mb-xl-20">
	                                <div class="product-img">
	                                    <a href="#">
	                                        <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
	                                    </a>
	                                    <div class="overlay">
	                                        <div class="product-tags padding-10"> <span class="circle-tag">
					                        <img src="assets/img/svg/013-heart-1.svg" alt="tag">
					                      </span><div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">20%</span>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="product-caption">
	                                    <div class="title-box">
	                                        <h6 class="product-title"><a href="#" class="text-light-black "> Greek Style</a></h6>
	                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">2.1</span>
	                                        </div>
	                                    </div>
	                                    <p class="text-light-white">Continental &amp; Mexican</p>
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
	                            <div class="product-footer"> <span class="text-custom-white square-tag">
	                                  <img src="assets/img/svg/008-protein.svg" alt="tag">
	                             </span>
	                                    </div>
	                                    <a href="#" class="dsp-inline btn44 mt-4">Add to Cart</a>
	                                    <div class="dsp-inline qty mt-4">
	                                        <span class="minus bg-dark">-</span>
	                                        <input type="number" class="count" name="qty1" value="1">
	                                        <span class="plus bg-dark">+</span>
	                                    </div>
	                                </div>
	                            </div>
		                        </div>
		                        <div class="col-lg-4 col-md-6 col-sm-6">
	                            <div class="product-box mb-xl-20">
	                                <div class="product-img">
	                                    <a href="#">
	                                        <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
	                                    </a>
	                                    <div class="overlay">
	                                   <div class="product-tags padding-10"> <span class="circle-tag">
					                        <img src="assets/img/svg/013-heart-1.svg" alt="tag">
					                      </span><span class="text-custom-white type-tag bg-gradient-orange">
					                        NEW</span>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="product-caption">
	                                    <div class="title-box">
	                                        <h6 class="product-title"><a href="#" class="text-light-black "> Hawaiian</a></h6>
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
	                                   <a href="#" class="dsp-inline btn44 mt-4">Add to Cart</a>
	                                    <div class="dsp-inline qty mt-4">
	                                        <span class="minus bg-dark">-</span>
	                                        <input type="number" class="count" name="qty1" value="1">
	                                        <span class="plus bg-dark">+</span>
	                                    </div>
		                            </div>
		                        </div>                      
		                    	</div>
		                    	 --}}
					   		</div>
						</div>
						@endforeach
						@else
		                    <div class="text-danger">No menu found!</div>	
						@endif
               		
               		{{-- <div class="col-lg-12"><hr></hr></div>
                   	<div class="col-lg-12">
                        <div class="section-header-left">
                           	<h3 class="text-light-black header-title title">Most Ordered Pizzas</h3>
                        </div>
	                    <table class="table-responsive">
	                      	<thead>
		                        <tr>
		                          <th scope="col"><img src="assets/img/restaurants2/rest5.png" class="img-fluid" alt=""></th>
		                          <th scope="col">10” SOLO<br>PERSONAL</th>
		                          <th scope="col">16”<br> SPECIAL</th>
		                          <th scope="col"></th>
		                        </tr>
	                      	</thead>
	                      	<tbody>
		                        <tr>
		                          <td><h6>Cheese</h6></td>
		                          <td>8.00</td>
		                          <td>10.00</td>
		                          <td><p></p></td>
		                        </tr>
		                         <tr>
		                          <td><h6>Vegitarians</h6></td>
		                          <td>9.00</td>
		                          <td>10.00</td>
		                          <td><p>pepperoni, Italian sausage, red onions, green
		                        	peppers, Sliced tomatoes, mushrooms, black olives</p>
		                          </td>
		                        </tr>
		                         <tr>
		                          <td><h6>Pepperoni</h6></td>
		                          <td>10.00</td>
		                          <td>12.00</td>
		                          <td><p>pepperoni, Italian sausage, red onions, green peppers, Sliced tomatoes, mushrooms, black olives</p></td>
		                        </tr>
		                         <tr>
		                          <td><h6>Sausage</h6></td>
		                          <td>10.00</td>
		                          <td>12.00</td>
		                          <td><p>pepperoni, Italian sausage, red onions, green
		                          	peppers, Sliced tomatoes, mushrooms, black olives< p></td>
		                        </tr>
		                         <tr>
		                          <td><h6>Chicken</h6></td>
		                          <td>10.00</td>
		                          <td>12.00</td>
		                          <td><p>pepperoni, Italian sausage, red onions, green
		                          peppers, Sliced tomatoes, mushrooms, black olives, and mozzarella cheese.</p></td>
		                        </tr>
		                         <tr>
		                          <td><h6>Greek Style</h6></td>
		                          <td>10.00</td>
		                          <td>12.00</td>
		                          <td><p>pepperoni, Italian sausage, red onions, green
		                          peppers, Sliced tomatoes, mushrooms, black olives, and mozzarella cheese.</p></td>
		                        </tr>
		                         <tr>
		                          <td><h6>Hawaiian</h6></td>
		                          <td>8.00</td>
		                          <td>10.00</td>
		                          <td><p>pepperoni, Italian sausage, red onions, green
		                          peppers, Sliced tomatoes, mushrooms, black olives, and mozzarella cheese.</p></td>
		                        </tr>
		                         <tr>
		                          <td><h6>Combo</h6></td>
		                          <td>8.00</td>
		                          <td>10.00</td>
		                          <td><p>pepperoni, Italian sausage, red onions, green
		                          peppers, Sliced tomatoes, mushrooms, black olives, and mozzarella cheese.</p></td>
		                        </tr>
	                      	</tbody>
	                    </table>
               		</div> --}}


			<div class="col-lg-12"><hr></hr></div>
			
			{{-- <div class="col-lg-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Your favorite pizza</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="#">
                                    <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                       <img src="assets/img/svg/013-heart-1.svg" alt="tag">
                  							</span> <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">10%</span>
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
                                <a href="#" class="btn44 mt-4">Order again</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="#">
                                    <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> 
                                    	<span class="circle-tag">
				                        	<img src="assets/img/svg/013-heart-1.svg" alt="tag">
				                      	</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="#" class="text-light-black "> Mike’s pizza</a></h6>
                                    <div class="tags"> 
                                    	<span class="text-custom-white rectangle-tag bg-red">
					                        2.1
					                     </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Breakfast, Lunch &amp; Dinner</p>
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
                               <a href="#" class="btn44 mt-4">Order again</a> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="#">
                                    <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> 
                                    	<span class="circle-tag">
				                        	<img src="assets/img/svg/013-heart-1.svg" alt="tag">
				                      	</span>
				                      	<span class="type-tag bg-gradient-green text-custom-white">
			                        		Trending
			                        	</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="#" class="text-light-black "> Alen’s Favorite</a></h6>
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
                                <a href="#" class="btn44 mt-4">Order again</a>
                            </div>
                        </div>
                    </div>
            	</div>
        	</div> --}}

            {{-- <div class="col-lg-12"><hr></hr></div>
			<div class="col-lg-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Cartering Packages</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="#">
                                    <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
				                        <img src="assets/img/svg/013-heart-1.svg" alt="tag">
				                      </span> <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">10%</span>
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
                                <a href="#" class="btn44 mt-4">Order again</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="#">
                                    <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
				                        <img src="assets/img/svg/013-heart-1.svg" alt="tag">
				                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="#" class="text-light-black "> Mike’s pizza</a></h6>
                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">
			                        2.1
			                      </span>
                                    </div>
                                </div>
                                <p class="text-light-white">Breakfast, Lunch &amp; Dinner</p>
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
                               <a href="#" class="btn44 mt-4">Order again</a> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product-box mb-xl-20">
                            <div class="product-img">
                                <a href="#">
                                    <img src="assets/img/restaurants/pizza.jpg" class="img-fluid full-width" alt="product-img">
                                </a>
                                <div class="overlay">
                                    <div class="product-tags padding-10"> <span class="circle-tag">
			                        <img src="assets/img/svg/013-heart-1.svg" alt="tag">
			                      </span><span class="type-tag bg-gradient-green text-custom-white">
			                        Trending</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-caption">
                                <div class="title-box">
                                    <h6 class="product-title"><a href="#" class="text-light-black "> Alen’s Favorite</a></h6>
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
                                <a href="#" class="btn44 mt-4">Order again</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="sidebar">
                      <div class="">

                        <div class="users-area">
                           <!-- user account -->
                            <div class="users-details p-relative">
                                <a href="javascript:void(0);" class="text-light-white fw-500">
                                    <img src="assets/img/user-1.png" class="rounded-circle" alt="userimg"> <span>Hi, Kate</span>
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                 <div class="users-dropdown" style="display: none;">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-user"></i>
                                                </div> <span class="details">Account</span>
                                            </a>
                                        </li>
                                       <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-refer"></i>
                                                </div> <span class="details">Refer a friend</span>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-board-games-with-roles"></i>
                                                </div> <span class="details">Help</span>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="cart-btn notification-btn">
                                <a href="#" class="text-light-green fw-700"> <i class="fas fa-bell"></i>
                                    <span class="user-alert-notification"></span>
                                </a>
                               <!-- <span class="user-alert-cart">0</span> -->
                            </div>
                           <!-- user cart -->
                            <div class="cart-btn cart-dropdown">
                                <a href="#" class="text-light-green fw-700"> <i class="fas fa-shopping-bag"></i>
                                    <span class="user-alert-cart">3</span>
                                </a>
                                <div class="cart-detail-box">
                                    <div class="card">
                                      <div class="card-body">
                                       <ul>
                                        <li><h3><a href="#"><i class="fa fa-check"></i> Item added</a></h3></li>
                                        <li><a href="#" style="color: #406fb6;"><i class="fa fa-user-plus"></i> Invite friends</a> and order together</li>
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
                                <a href="#" class="pull-right wdt11"><i class="fa fa-users"></i>Create Group Order</a> 
                               
                               <div class="delivery-info">
                                 <div class="info-group">
                                   <span class="pull-left tlt">The Kebab Shop</span>
                                   <span class="pull-right">(what's this?)</span>
                                 </div>

                                 <div class="info-group">
                                   <span class="pull-left wdt12">Delivery Date:</span>
                                   <span class="pull-right">06/30/2021</span>
                                 </div>
                                 
                                 <div class="info-group">
                                   <span class="pull-left">Delivery Time:</span>
                                   <span class="pull-right">11:30am-12:00pm</span>
                                 </div>

                                 <div class="info-group">
                                   <span class="pull-left wdt12">Delivery Zip Code:</span>
                                   <span class="pull-right">12345</span>
                                 </div>
                                
                                 <div class="info-group rdt">
                                   <span class="pull-left wdt12">Minimum Order:</span>
                                   <span class="pull-none">$</span>
                                   <span class="pull-right">50.00</span>
                                 </div>

                               </div>


                               </div>
                                <div class="card-body no-padding" id="scrollstyle-4">
                                    <div class="cat-product-box">
                                        <div class="cat-product">
                                           <div class="delete-btn mt-1">
                                                <a href="#" class="text-dark-white"> <i class="fa fa-times-circle"></i></a>
                                            </div>
                                            <div class="cat-name ml-2 wdt13">
                                                <a href="#"><p class="text-light-green fw-700 tlt">
                                                 The Lunchbox </p></a>
                                            </div>
                                            <div class="pull-none">5$</div>
                                            <div class="price">60.00</div>
                                        </div>
                                    </div>
                                </div>
                                
                              <div class="padding-15 fw-700">
                                <div class="delivery-info">
                                 <div class="info-group">
                                   <span class="pull-left wdt12">Subtotal:</span>
                                   <span class="pull-none">$</span>
                                   <span class="pull-right">60.00</span>
                                 </div>
                                 <div class="info-group">
                                   <span class="pull-left wdt12">Delivery:</span>
                                   <span class="pull-none">$</span>
                                   <span class="pull-right">7.95</span>
                                 </div>
                                 <div class="info-group">
                                   <span class="pull-left wdt12">Fees and Taxes:</span>
                                   <span class="pull-none">$</span>
                                   <span class="pull-right">7.85</span>
                                 </div>
                                <div class="info-group">
                                   <span class="pull-left wdt12">Gratuity:</span>
                                   <span class="pull-none"></span>
                                   <span class="pull-right">TBD</span>
                                 </div>
                                 <div class="info-group">
                                   <span class="pull-left tlt wdt12">Total:</span>
                                   <span class="pull-none">$</span>
                                   <span class="pull-right">75.80</span>
                                 </div>
                                 

                               </div></div>

                               <div class="card-footer padding-15"> 
                                  <a href="#" class="ds11 wdt14 fw-500 lnk">View Full Cart</a>
                                  <a href="#" class="ds11 wdt14 fw-500 lnk text-right">Empty Cart</a>
                                  <a href="#" class="ds11 wdt14 fw-500 lnk">Enter Coupon</a>
                                  <a href="#" class="mt-4 btn-first green-btn text-custom-white full-width fw-500">Proceed to Checkout</a>
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