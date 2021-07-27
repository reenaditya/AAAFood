@extends("admin.layouts.app")
@section('content')
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
										
										<div class="row">
											<div class="mb-4 col-md-6">
												<label class="form-label" >Name</label>
												<input type="text" name="name" class="form-control" placeholder="enter restaurant name"  value="{{ old('name',$restaurant->name) }}">
												@error('name')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label" >Email</label>
												<input type="text" name="email" class="form-control" placeholder="enter email"  value="{{ old('email',$restaurant->email) }}">
												@error('email')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											
											
										</div>
										<div class="row">
											
											
											<div class="mb-4 col-md-6">
												<label class="form-label">Address</label>
												
												<input type="text" name="address" class="form-control" placeholder="enter address"   value="{{ old('address',$restaurant->address) }}">
												@error('address')
													<span class="text-danger">{{$message}} </span>
												@enderror
												
											</div>
											<div class="mb-4 col-md-6">
												<label class="form-label">City</label>
												
												<input type="text" name="city" class="form-control" placeholder="enter city"   value="{{ old('city',$restaurant->city) }}">
												@error('city')
													<span class="text-danger">{{$message}} </span>
												@enderror
												
											</div>
											
										</div>
										<div class="row">
											
											
											<div class="mb-4 col-md-6">
												<label class="form-label">Zipcode</label>
												
												<input type="text" name="zipcode" class="form-control" placeholder="enter zipcode"   value="{{ old('zipcode',$restaurant->zipcode) }}">
												@error('zipcode')
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
											
										</div>
										<div class="row">
											<div class="mb-4 col-md-6">
												<label class="form-label" >Status</label>
												<select class="form-control" name="status" >
													<option value="1" {{$restaurant->status == 1 ? 'selected':'' }} >Active</option>
													<option value="0" {{$restaurant->status == 0 ? 'selected':'' }} >Inactive</option>
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
												
												<textarea name="description" class="form-control" cols="30" rows="10">{{old('description',$restaurant->description)}}</textarea>
												
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