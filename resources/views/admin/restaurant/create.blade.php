@extends("admin.layouts.app")
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Add Restaurant</h1>

					<div class="row">
						
						<div class="col-md-12">
							<div class="card">
								
								<div class="card-body">
									<form action="{{ route('admin.restaurant.store') }}" method="post" enctype="multipart/form-data">
										@csrf
										
										<div class="row">
											<div class="mb-4 col-md-6">
												<label class="form-label">Restaurant Name</label>
												<input type="text" name="name" class="form-control" placeholder="enter restaurant name"  value="{{ old('name') }}">
												@error('name')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Restaurant Location</label>
												<input type="text" name="location" class="form-control" placeholder="enter restaurant location"  value="{{ old('location') }}">
												@error('location')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Address</label>
												<input type="text" name="address" class="form-control" placeholder="enter address"  value="{{ old('address') }}">
												@error('address')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Street Address line 2</label>
												<input type="text" name="address2" class="form-control" placeholder="enter address2"  value="{{ old('address2') }}">
												@error('address')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">City</label>
												<input type="text" name="city" class="form-control" placeholder="enter city"  value="{{ old('city') }}">
												@error('city')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">State / Province</label>
												<input type="text" name="state" class="form-control" placeholder="enter state"  value="{{ old('state') }}">
												@error('state')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Country</label>
												<input type="text" name="country" class="form-control" placeholder="enter country"  value="{{ old('country') }}">
												@error('country')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Website</label>
												<input type="text" name="website" class="form-control" placeholder="enter website"  value="{{ old('website') }}">
												@error('website')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Sale Tax</label>
												<input type="text" name="sale_tax" class="form-control" placeholder="enter sale tax"  value="{{ old('sale_tax') }}">
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
                  <input name="radio-3" type="radio" class="form-check-input" checked="">
                  <span class="form-check-label">Yes</span>
                </label>
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input">
                  <span class="form-check-label">No</span>
                </label>
													
												</div>
											</div>
										</fieldset>
											</div>

											<div class="mb-4 col-md-6">
												<label class="form-label">Seating Capacity indoor</label>
												<input type="text" name="seating_capacity_indoor" class="form-control" placeholder="enter seating capacity indoor"  value="{{ old('seating_capacity_indoor') }}">
												@error('seating_capacity_indoor')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Seating Capacity outdoor</label>
												<input type="text" name="seating_capacity_outdoor" class="form-control" placeholder="enter seating capacity outdoor"  value="{{ old('seating_capacity_outdoor') }}">
												@error('seating_capacity_outdoor')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<fieldset class="mb-3">
											<div class="row">
												<label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Reservations</label>
												<div class="col-sm-10">
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input" checked="">
                  <span class="form-check-label">Yes</span>
                </label>
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input">
                  <span class="form-check-label">No</span>
                </label>
													
												</div>
											</div>
										</fieldset>
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Who do you use for reservation system?</label>
												<input type="text" name="reservation_system" class="form-control" placeholder="enter reservation system"  value="{{ old('reservation_system') }}">
												@error('reservation_system')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>

											<div class="mb-4 col-md-6">
												<fieldset class="mb-3">
											<div class="row">
												<label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Takeout</label>
												<div class="col-sm-10">
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input" checked="">
                  <span class="form-check-label">Yes</span>
                </label>
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input">
                  <span class="form-check-label">No</span>
                </label>
													
												</div>
											</div>
										</fieldset>
											</div>
											<div class="mb-4 col-md-6">
												<fieldset class="mb-3">
											<div class="row">
												<label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Do you do your own Delivery?</label>
												<div class="col-sm-10">
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input" checked="">
                  <span class="form-check-label">Yes</span>
                </label>
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input">
                  <span class="form-check-label">No</span>
                </label>
													
												</div>
											</div>
										</fieldset>
											</div>

											<div class="mb-4 col-md-6">
												<label class="form-label">Delivery Fee</label>
												<input type="text" name="delivery_fee" class="form-control" placeholder="enter delivery fee system"  value="{{ old('reservation_system') }}">
												@error('reservation_system')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Minimum Delivery Amount</label>
												<input type="text" name="delivery_fee" class="form-control" placeholder="enter delivery fee system"  value="{{ old('reservation_system') }}">
												@error('reservation_system')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Free Delivery Amount</label>
												<input type="text" name="delivery_fee" class="form-control" placeholder="enter delivery fee system"  value="{{ old('reservation_system') }}">
												@error('reservation_system')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Delivery Radius</label>
												<input type="text" name="delivery_fee" class="form-control" placeholder="enter delivery fee system"  value="{{ old('reservation_system') }}">
												@error('reservation_system')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Delivery Zip Codes</label>
												<input type="text" name="delivery_fee" class="form-control" placeholder="enter delivery fee system"  value="{{ old('reservation_system') }}">
												@error('reservation_system')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Order Lead Time</label>
												<input type="text" name="delivery_fee" class="form-control" placeholder="enter delivery fee system"  value="{{ old('reservation_system') }}">
												@error('reservation_system')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Delivery Extra Time</label>
												<input type="text" name="delivery_fee" class="form-control" placeholder="enter delivery fee system"  value="{{ old('reservation_system') }}">
												@error('reservation_system')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Do you use outside Delivery Services?</label>
												<input type="text" name="delivery_fee" class="form-control" placeholder="enter delivery fee system"  value="{{ old('reservation_system') }}">
												@error('reservation_system')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<fieldset class="mb-3">
											<div class="row">
												<label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Do you want to participate in our AAAdining club ? *</label>
												<div class="col-sm-10">
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input" checked="">
                  <span class="form-check-label">Yes</span>
                </label>
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input">
                  <span class="form-check-label">No</span>
                </label>
													
												</div>
											</div>
										</fieldset>
											</div>
											<div class="mb-4 col-md-6">
												<fieldset class="mb-3">
											<div class="row">
											<label class="col-form-label col-sm-2 text-sm-right pt-sm-0">
												Do you want to participate in our AAAdining Birthday club?
											</label>
												<div class="col-sm-10">
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input" checked="">
                  <span class="form-check-label">Yes</span>
                </label>
													<label class="form-check">
                  <input name="radio-3" type="radio" class="form-check-input">
                  <span class="form-check-label">No</span>
                </label>
													
												</div>
											</div>
										</fieldset>
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label" >Participate Meal</label>
												<input type="file" name="image" class="form-control" >
												@error('image')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											
											
											
											
										</div>
										<div class="row">
											
											
											<div class="mb-4 col-md-6">
												<label class="form-label">Address</label>
												
												<input type="text" name="address" class="form-control" placeholder="enter address"   value="{{ old('address') }}">
												@error('address')
													<span class="text-danger">{{$message}} </span>
												@enderror
												
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">City</label>
												
												<input type="text" name="city" class="form-control" placeholder="enter city"   value="{{ old('city') }}">
												@error('city')
													<span class="text-danger">{{$message}} </span>
												@enderror
												
											</div>
											
										</div>
										<div class="row">
											
											
											<div class="mb-4 col-md-6">
												<label class="form-label">Zipcode</label>
												
												<input type="text" name="zipcode" class="form-control" placeholder="enter zipcode"   value="{{ old('zipcode') }}">
												@error('zipcode')
													<span class="text-danger">{{$message}} </span>
												@enderror
												
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">Phone Number</label>
												
												<input type="text" name="phone_number" class="form-control" placeholder="enter phone number"   value="{{ old('phone_number') }}">
												@error('phone_number')
													<span class="text-danger">{{$message}} </span>
												@enderror
												
											</div>
											
										</div>
										<div class="row">
											<div class="mb-4 col-md-6">
												<label class="form-label" >Status</label>
												<select class="form-control" name="status" >
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												</select>
												
												@error('status')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label" >Image</label>
												<input type="file" name="image" class="form-control" >
												@error('image')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
										</div>
										<div class="row">
											<div class="mb-4 col-md-12">
												<label class="form-label">Description</label>
												
												<textarea name="description" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
												
												@error('description')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
										</div>
										
										<button type="submit" class="btn btn-primary">Submit</button>
									</form>
								</div>
							</div>
						</div>

						
					</div>

				</div>
			</main>
@endsection
@push('script')
	<script type="text/javascript">
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