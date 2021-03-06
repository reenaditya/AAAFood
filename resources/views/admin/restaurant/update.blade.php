@extends("admin.layouts.app")
@section('content')
@php
	$reservation_system = Config::get('constant.reservation_system');
	$cuisines = !empty($restaurant->cuisines) ? explode(",", $restaurant->cuisines) : [];
	$us_states = Config::get('constant.us_states');
	$birthday_club = Config::get('constant.birthday_club');
	$aaadining_club = Config::get('constant.aaadining_club');
	$days = Config::get('constant.days');
	$time = Config::get('constant.time');

	if (!$restaurant->restaurantOffer->isEmpty()) {
		foreach ($restaurant->restaurantOffer as $kii => $val) {
			if($val->offer_type=='AADINING_CLUB'){
				$ac_offer_type = 1;
				$ac_image = $val->file;
				$ac_days = json_decode($val->offer_valid_day);
				$ac_time_from = $val->offer_valid_from;
				$ac_time_to = $val->offer_valid_to;
				$ac_terms_condition = json_decode($val->terms_condition);
			}
			if($val->offer_type=='BIRTHDAY_CLUB'){
				$bc_offer_type = 1;
				$bc_terms_condition = json_decode($val->terms_condition);				
			}
		}
	}
@endphp
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Update Restaurant</h1>
		<div class="row">
			
			<div class="col-md-12">
				<div class="card">
					
					<div class="card-body">
						<form action="{{ route('admin.restaurant.update',$restaurant->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							@if (!$restaurant->restaurantOffer->isEmpty())
							@foreach ($restaurant->restaurantOffer as $kii => $val) 
							<input type="hidden" name="rest_offer_id[]" value="{{$val->id}}">
							@endforeach
							@endif
							<div class="row">
								<div class="mb-4 col-md-6">
									<label class="form-label">User</label>
									<select class="form-control select2" name="user_id">
										<option value="">Select</option>
										@foreach($user as $val)
											<option value="{{$val->id}}" @if($restaurant->user_id==$val->id) selected="" @endif>{{$val->name}}</option>
										@endforeach
									</select>
									@error('user_id')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Restaurant Name</label>
									<input type="text" name="name" class="form-control" placeholder="enter restaurant name" value="{{ old('name',$restaurant->name) }}">
									@error('name')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Restaurant Location</label>
									<input type="text" name="location" class="form-control" placeholder="enter restaurant location" value="{{ old('location',$restaurant->location) }}">
									@error('location')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Cuisines</label>
									<select class="form-control select2" name="cuisines[]" multiple="">
										<option value="">Select</option>
										@foreach($cuisine as $val)
											<option value="{{$val->id}}" @if(in_array($val->id, $cuisines)) selected="" @endif>{{$val->name}}</option>
										@endforeach
									</select>
									@error('cuisines')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Address</label>
									<input type="text" name="address" class="form-control" placeholder="enter address"  value="{{ old('address',$restaurant->address) }}">
									@error('address')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Street Address line 2</label>
									<input type="text" name="address2" class="form-control" placeholder="enter address2" value="{{ old('address2',$restaurant->address2) }}">
									@error('address')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">City</label>
									<input type="text" name="city" class="form-control" placeholder="enter city" value="{{ old('city',$restaurant->city) }}">
									@error('city')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">State / Province</label>
									<select name="state" class="form-control">
										@foreach($us_states as $kii=>$val)
										<option value="{{$kii}}" @if($restaurant->state==$kii || old('state')==$kii) selected="" @endif>{{$val}}</option>
										@endforeach
									</select>
									@error('state')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Country</label>
									<input type="text" name="country" class="form-control" placeholder="enter country" value="{{ old('country',$restaurant->country) }}">
									@error('country')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Postal/Zip Code</label>
									<input type="text" name="zipcode" class="form-control" placeholder="enter zipcode" value="{{ old('zipcode',$restaurant->zipcode) }}">
									@error('zipcode')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Website</label>
									<input type="text" name="website" class="form-control" placeholder="enter website" value="{{ old('website',$restaurant->website) }}">
									@error('website')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Sale Tax(%)</label>
									<input type="number" name="sale_tax" step=".01" class="form-control" placeholder="The sales tax to charge for each order eg: 5" value="{{ old('sale_tax',$restaurant->sale_tax) }}">
									@error('sale_tax')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<fieldset class="mb-3">
										<div class="row">
											<label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Dine In</label>
											<div class="col-sm-10">
												<label class="form-check">
													<input name="dine_in" type="radio" class="form-check-input" @if($restaurant->dine_in==1) checked="" @endif value="1">
													<span class="form-check-label">Yes</span>
												</label>
												<label class="form-check">
													<input name="dine_in" type="radio" class="form-check-input" @if($restaurant->dine_in==0) checked="" @endif value="0">
													<span class="form-check-label">No</span>
												</label>
											</div>
										</div>
									</fieldset>
								</div>

								<div class="mb-4 col-md-6">
									<label class="form-label">Seating Capacity indoor</label>
									<input type="text" name="seating_capacity_indoor" class="form-control" placeholder="enter seating capacity indoor"  value="{{ old('seating_capacity_indoor',$restaurant->seating_capacity_indoor) }}">
									@error('seating_capacity_indoor')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Seating Capacity outdoor</label>
									<input type="text" name="seating_capacity_outdoor" class="form-control" placeholder="enter seating capacity outdoor"  value="{{ old('seating_capacity_outdoor',$restaurant->seating_capacity_outdoor) }}">
									@error('seating_capacity_outdoor')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<fieldset class="mb-3">
										<div class="row">
											<label class="col-form-label col-sm-4 text-sm-right pt-sm-0">Reservations</label>
											<div class="col-sm-4">
												<label class="form-check">
													<input name="reservations" type="radio" class="form-check-input" @if($restaurant->reservations==1) checked="" @endif value="1">
													<span class="form-check-label">Yes</span>
												</label>
												<label class="form-check">
													<input name="reservations" type="radio" class="form-check-input" @if($restaurant->reservations==0) checked="" @endif value="0">
													<span class="form-check-label">No</span>
												</label>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Who do you use for reservation system?</label>
									<select class="form-control" name="reservation_system">
										@foreach($reservation_system as $k=>$val)
											<option value="{{$k}}" @if($restaurant->reservation_system==$k) selected="" @endif>{{$val}}</option>
										@endforeach
									</select>
									@error('reservation_system')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>

								<div class="mb-4 col-md-6">
									<fieldset class="mb-3">
										<div class="row">
											<label class="col-form-label col-sm-4 text-sm-right pt-sm-0">Takeout</label>
											<div class="col-sm-4">
												<label class="form-check">
													<input name="takeout" type="radio" class="form-check-input" @if($restaurant->takeout==1) checked="" @endif value="1">
													<span class="form-check-label">Yes</span>
												</label>
												<label class="form-check">
													<input name="takeout" type="radio" class="form-check-input" @if($restaurant->takeout==0) checked="" @endif value="0">
													<span class="form-check-label">No</span>
												</label>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="mb-4 col-md-6">
									<fieldset class="mb-3">
										<div class="row">
											<label class="col-form-label col-sm-8 text-sm-right pt-sm-0">Do you do your own Delivery?</label>
											<div class="col-sm-4">
												<label class="form-check">
													<input name="own_delivery" type="radio" class="form-check-input" @if($restaurant->own_delivery==1) checked="" @endif value="1">
													<span class="form-check-label">Yes</span>
												</label>
												<label class="form-check">
													<input name="own_delivery" type="radio" class="form-check-input" @if($restaurant->own_delivery==0) checked="" @endif value="0">
													<span class="form-check-label">No</span>
												</label>
											</div>
										</div>
									</fieldset>
								</div>

								<div class="mb-4 col-md-6">
									<label class="form-label">Delivery Fee</label>
									<input type="number" min="0" name="delivery_fee" class="form-control" placeholder=""  value="{{ old('delivery_fee',$restaurant->delivery_fee) }}">
									<small class="text-muted">How much do you charge for delivery? leave blank if no delivery fee.</small>
									@error('delivery_fee')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Minimum Delivery Amount</label>
									<input type="number" min="0" name="minimum_delivery_amount" class="form-control" placeholder=""  value="{{ old('minimum_delivery_amount',$restaurant->minimum_delivery_amount) }}">
									<small class="text-muted">Orders must be above this amount to use delivery. Leave blank if no minimum</small>
									@error('minimum_delivery_amount')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Free Delivery Amount</label>
									<input type="number" min="0" name="free_delivery_amount" class="form-control" placeholder=""  value="{{ old('free_delivery_amount',$restaurant->free_delivery_amount) }}">
									<small class="text-muted">Is delivery free for orders above a certain size? Orders above this amount will receive free delivery</small>
									@error('free_delivery_amount')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Delivery Radius</label>
									<input type="number" min="0" name="delivery_radius" class="form-control" placeholder=""  value="{{ old('delivery_radius',$restaurant->delivery_radius) }}">
									<small class="text-muted">The radius, in miles that you deliver to.</small>
									@error('delivery_radius')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Delivery Zip Codes</label>
									<input type="text" name="delivery_zip_codes" class="form-control" placeholder=""  value="{{ old('delivery_zip_codes',$restaurant->delivery_zip_codes) }}">
									<small class="text-muted">If you restrict delivery to certain zip codes, enter them here, separated by commas.</small>
									@error('delivery_zip_codes')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Order Lead Time</label>
									<input type="number" min="0" name="order_lead_time" class="form-control" placeholder=""  value="{{ old('order_lead_time',$restaurant->order_lead_time) }}">
									<small class="text-muted">How long should we tell the customer that it will take to prepare their order? (in minutes)</small>
									@error('order_lead_time')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Delivery Extra Time</label>
									<input type="number" min="0" name="delivery_extra_time" class="form-control" placeholder=""  value="{{ old('delivery_extra_time',$restaurant->delivery_extra_time) }}">
									<small class="text-muted">For delivery orders, how much extra time should we add to the takeout lead time(in minutes)?</small>
									@error('delivery_extra_time')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">AAAdining club max discount in ($)</label>
									<input type="number" min="0" name="ac_max_discount" class="form-control" placeholder=""  value="{{ old('ac_max_discount',$restaurant->ac_max_discount) }}">
									@error('ac_max_discount')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								
								<div class="mb-4 col-md-6">
									<fieldset class="mb-3">
										<div class="row">
											<label class="col-form-label col-sm-8 text-sm-right pt-sm-0">Do you want to participate in our AAAdining club ? *</label>
											<div class="col-sm-4">
												<label class="form-check">
													<input name="aaadining_club" type="radio" class="form-check-input" @if($restaurant->aaadining_club==1) checked="" @endif value="1">
													<span class="form-check-label">Yes</span>
												</label>
												<label class="form-check">
													<input name="aaadining_club" @if($restaurant->aaadining_club==0) checked="" @endif type="radio" class="form-check-input" value="0">
													<span class="form-check-label">No</span>
												</label>
											</div>
										</div>
									</fieldset>
									<div class="border-1 mb-3 @if($restaurant->aaadining_club!=1) d-none @endif aaading_club_offer">
										<input type="hidden" name="ac_offer_type" value="{{$ac_offer_type ?? ''}}">
										{{-- <div class="row">
											<div class="col-md-9">
												<div class="mb-3">
													<label class="form-label w-100">Image</label>
													<input type="file" name="ac_image" class="form-control">
												</div>
											</div>
											<div class="col-md-3">
												<img class="img-fluid" src="{{asset('storage')}}/{{$ac_image ?? ''}}">
											</div>
										</div> --}}

										<div class="mb-3">
											<label class="form-label w-100">Select Days</label>
											<select class="form-control select2" name="ac_days[]" multiple="">
											@foreach($days as $kii=>$val)
												<option value="{{$kii}}" @if(isset($ac_days) && !empty($ac_days) && in_array($kii, $ac_days) ) selected="" @endif>{{$val}}</option>
											@endforeach
											</select>
										</div>
										<div class="row">
											<div class="col-md-6 mb-3">
												<label class="form-label w-100">Offer valid time from </label>
												<input type="time" name="offer_valid_from" class="form-control" value="{{ $ac_time_from ?? '' }}">
											</div>
											<div class="col-md-6 mb-3">
												<label class="form-label w-100">Offer valid time to </label>
												<input type="time" name="offer_valid_to" class="form-control" value="{{ $ac_time_to ?? '' }}">
											</div>
										</div>
										<label class="form-label w-100">Include terms and condition</label>
										@foreach($aaadining_club as $kii=>$val)
										<label class="form-check m-0">
								            <input type="checkbox" value="{{$kii}}" class="form-check-input" @if(isset($ac_terms_condition) && !empty($ac_terms_condition) && in_array($kii, $ac_terms_condition) ) checked="" @endif name="ac_terms_condition[]">
								            <span class="form-check-label @if($kii==1) append-max-discount-price @endif">{!! $val !!}</span>
							            </label>
							            @endforeach
									</div>
								</div>
								{{-- <div class="mb-4 col-md-6">
									<fieldset class="mb-3">
										<div class="row">
											<label class="col-form-label col-sm-8 text-sm-right pt-sm-0">
												Do you want to participate in our AAAdining Birthday club?
											</label>
											<div class="col-sm-4">
												<label class="form-check">
													<input name="birthday_club" type="radio" class="form-check-input" @if($restaurant->birthday_club==1) checked="" @endif value="1">
													<span class="form-check-label">Yes</span>
												</label>
												<label class="form-check">
													<input name="birthday_club" @if($restaurant->birthday_club==0) checked="" @endif type="radio" class="form-check-input" value="0">
													<span class="form-check-label">No</span>
												</label>
											</div>
										</div>
									</fieldset>
									<div class="border-1 mb-3 @if($restaurant->birthday_club!=1) d-none @endif birthday_club_offer">
										<input type="hidden" name="bc_offer_type" value="{{$bc_offer_type ?? ''}}">
										<label class="form-label w-100">Include terms and condition</label>
										@foreach($birthday_club as $kii=>$val)
										<label class="form-check m-0">
								            <input type="checkbox" value="{{$kii}}" class="form-check-input" @if(isset($bc_terms_condition) && !empty($bc_terms_condition) && in_array($kii, $bc_terms_condition) ) checked="" @endif name="bc_terms_condition[]">
								            <span class="form-check-label">{{$val}}</span>
							            </label>
							            @endforeach
									</div>
								</div> --}}
								<div class="mb-4 col-md-6">
									<fieldset class="mb-3">
										<div class="row">
											<label class="col-form-label col-sm-8 text-sm-right pt-sm-0">Do you use outside Delivery Services?</label>
											<div class="col-sm-4">
												<label class="form-check">
													<input name="delivery_service" type="radio" class="form-check-input"  @if($restaurant->delivery_service==1) checked="" @endif value="1">
													<span class="form-check-label">Yes</span>
												</label>
												<label class="form-check">
													<input name="delivery_service" type="radio" class="form-check-input" @if($restaurant->delivery_service==0) checked="" @endif value="0">
													<span class="form-check-label">No</span>
												</label>
											</div>
										</div>
									</fieldset>
									@error('delivery_service')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								{{-- <div class="mb-4 col-md-6">
									<label class="form-label" >Participate Meal</label>
									<input type="file" name="participate_file" class="form-control" >
									@error('participate_file')
										<span class="text-danger">{{$message}} </span>
									@enderror
									@if($restaurant->participate_file)
									<div>
										<img style="width:auto;height: 100px" src="{{asset("storage/$restaurant->participate_file")}}">
									</div>
									@endif
								</div> --}}
							</div>

							<label class="form-label h3">Hours</label>
							<div class="row">
								<div class="mb-4 col-md-6">
									<label class="form-label">Monday- Friday from</label>
									<input type="time" name="mf_from" class="form-control" value="{{ old('mf_from',$restaurant->mf_from) }}">
									@error('mf_from')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Monday- Friday to</label>
									<input type="time" name="mf_to" class="form-control" value="{{ old('mf_to',$restaurant->mf_to) }}">
									@error('mf_to')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Saturday from</label>
									<input type="time" name="sat_from" class="form-control" value="{{ old('sat_from',$restaurant->sat_from) }}">
									@error('sat_from')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Saturday to</label>
									<input type="time" name="sat_to" class="form-control" value="{{ old('sat_to',$restaurant->sat_to) }}">
									@error('sat_to')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Sunday from</label>
									<input type="time" name="sun_from" class="form-control" value="{{ old('sun_from',$restaurant->sun_from) }}">
									@error('sun_from')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Sunday to</label>
									<input type="time" name="sun_to" class="form-control" value="{{ old('sun_to',$restaurant->sun_to) }}">
									@error('sun_to')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
							</div>
							
							{{--<div class="row">
								<div class="mb-4 col-md-6">
									<label class="form-label" >Email</label>
									<input type="text" name="email" class="form-control" placeholder="enter email"  value="{{ old('email',$restaurant->email) }}">
									@error('email')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-6">
									<label class="form-label">Phone Number</label>	
									<input type="text" name="phone_number" class="form-control" placeholder="enter phone number"   value="{{ old('phone_number',$restaurant->phone_number) }}">
									@error('phone_number')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
							</div> --}}

							<div class="row">
								<div class="mb-4 col-md-4">
									<label class="form-label" >Image</label>
									<input type="file" name="image" class="form-control" >
									@error('image')
										<span class="text-danger">{{$message}} </span>
									@enderror
									<div>
										<img style="width:auto;height: 100px" src="{{asset("storage/$restaurant->image")}}">
									</div>
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label">Restaurant icon</label>
									<input type="file" name="icon" class="form-control">
									@error('icon')
										<span class="text-danger">{{$message}} </span>
									@enderror
									<div>
										<img style="width:auto;height: 100px" src="{{asset("storage/$restaurant->icon")}}">
									</div>
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label">Banner image</label>
									<input type="file" name="banner_img" class="form-control">
									@error('banner_img')
										<span class="text-danger">{{$message}} </span>
									@enderror
									<div>
										<img style="width:auto;height: 100px" src="{{asset("storage/$restaurant->banner_img")}}">
									</div>
								</div>
								@if(Auth::check() && Auth::user()->role==2)
								<div class="mb-4 col-md-4">
									<label class="form-label" >Status</label>
									<select class="form-control" name="status" >
										<option value="1" {{$restaurant->status == 1 ? 'selected':'' }} >Active</option>
										<option value="0" {{$restaurant->status == 0 ? 'selected':'' }} >Inactive</option>
									</select>
									
									@error('status')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								@endif
								<div class="mb-4 col-md-4">
									<label class="form-label">Starting meal(price)</label>
									<input type="number" name="meal_starting" class="form-control" value="{{$restaurant->meal_starting ?? ''}}">
									@error('meal_starting')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label">Trending</label>
									<select class="form-control" name="trending">
										<option value="0" {{$restaurant->trending == 0 ? 'selected':'' }}>No</option>
										<option value="1" {{$restaurant->trending == 1 ? 'selected':'' }}>Yes</option>
									</select>
									@error('trending')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label">New</label>
									<select class="form-control" name="new">
										<option value="0" {{$restaurant->new == 0 ? 'selected':'' }}>No</option>
										<option value="1" {{$restaurant->new == 1 ? 'selected':'' }}>Yes</option>
									</select>
									@error('new')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label">Top rated</label>
									<select class="form-control" name="top_rated">
										<option value="0" {{$restaurant->top_rated == 0 ? 'selected':'' }}>No</option>
										<option value="1" {{$restaurant->top_rated == 1 ? 'selected':'' }}>Yes</option>
									</select>
									@error('top_rated')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
							</div>
							<div class="row">
								<div class="mb-4 col-md-12">
									<label class="form-label">Description</label>
									<textarea name="description" class="form-control" cols="30" rows="10">{{old('description',$restaurant->description)}}</textarea>
									@error('description')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
							</div>
							
							<button type="submit" class="btn btn-primary">Update</button>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</main>
@endsection
@push('style')	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin_custom.css')}}">
	<style type="text/css">
		.select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice{margin: 4px !important;}
	</style>
@endpush
@push('script')
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script type="text/javascript" src="{{asset('js/admin/restaurant.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('.select2').select2();
		    $(".append-max-discount-price").append('$'+'{{$restaurant->ac_max_discount}}');
		});
		@if (Session::has('success'))
			
			Swal.fire({
	  			icon: 'success',
	  			title: '{{ Session::get('success')}} '
			})

		@endif
		@if (Session::has('error'))
			
			Swal.fire({
	  			icon: 'error',
	  			title: '{{ Session::get('error')}} ',
			})	

		@endif
		
	</script>
@endpush