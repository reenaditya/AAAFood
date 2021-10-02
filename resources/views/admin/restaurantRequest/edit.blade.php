@extends("admin.layouts.app")
@section('content')
@php
	$relationship_roll = Config::get('constant.relationship_roll');
@endphp
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Update Restaurant request</h1>

		<div class="row">
			
			<div class="col-md-12">
				<div class="card">
					
					<div class="card-body">
						<form action="{{ route('admin.restaurant_request.update',$data->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							
							<div class="row">
								<div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">First name<span class="text-danger">*</span></label>
			                        <input type="text" name="firstname" class="form-control form-control-submit" placeholder="Name" required value="{{old('firstname',$data->fname)}} " >
			                        @error('firstname')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                    </div>
			                    <div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">Last name<span class="text-danger">*</span></label>
			                        <input type="text" name="lastname" class="form-control form-control-submit" placeholder="Name" required value="{{old('lastname',$data->lname)}} " >
			                        @error('lastname')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                    </div>
			                    <div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">Your Work Email<span class="text-danger">*</span></label>
			                        <input type="email" name="email" value="{{old('email',$data->email)}} " class="form-control form-control-submit" placeholder="Email I'd" required>
			                        @error('email')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div>
			                    <div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">Your Phone Number<span class="text-danger">*</span></label>
			                        <input type="text" name="phone_number" value="{{old('phone_number',$data->phone_number)}} " class="form-control form-control-submit" required>
			                        @error('phone_number')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div>
			                  	<div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">Restaurant Name<span class="text-danger">*</span></label>
			                        <input type="text" name="restaurant_name" value="{{old('restaurant_name',$data->restaurant_name)}} " class="form-control form-control-submit" required>
			                        @error('restaurant_name')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div>
			                  	<div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">Types of Food<span class="text-danger">*</span></label>
			                        <input type="text" name="food_type" value="{{old('food_type',$data->food_type)}} " class="form-control form-control-submit" required>
			                        @error('food_type')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div>
			                  	<div class="col-md-6 mt-4">
			                  		<div class="form-group">
			                  			<label class="text-light-white fs-14">Relationship(your roll)</label>
			                  			<select class="form-control" name="relation">
			                  				@foreach($relationship_roll as $kii=> $val)
			                  				<option value="{{$kii}}" @if($data->relation==$kii) selected="" @endif>{{$val}}</option>
			                  				@endforeach
			                  			</select>
			                  		</div>
			                  	</div>

			                  	<div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">Address<span class="text-danger">*</span></label>
			                        <input type="text" name="address" value="{{old('address',$data->address)}} " class="form-control form-control-submit" required>
			                        @error('address')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div>

			                  	<div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">City<span class="text-danger">*</span></label>
			                        <input type="text" name="city" value="{{old('city',$data->city)}} " class="form-control form-control-submit" required>
			                        @error('city')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div>

			                  	<div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">State<span class="text-danger">*</span></label>
			                        <input type="text" name="state" value="{{old('state',$data->state)}} " class="form-control form-control-submit" required>
			                        @error('state')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div>

			                  	<div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">Zipcode<span class="text-danger">*</span></label>
			                        <input type="text" name="zipcode" value="{{old('zipcode',$data->zipcode)}} " class="form-control form-control-submit" required>
			                        @error('zipcode')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div>
			                  	<div class="col-md-6 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">Status<span class="text-danger">*</span></label>
			                        <select name="status" class="form-control form-control-submit">
			                        	<option value="1" @if($data->status==1) selected="" @endif>Approved</option>
			                        	<option value="0" @if($data->status==0) selected="" @endif>Not Approved</option>
			                        </select>
			                        @error('status')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div> 
			                  	<div class="col-md-12 mt-4">
			                      <div class="form-group">
			                        <label class="text-light-white fs-14">Comments or Notes</label>
			                        <textarea name="comments" rows="3" class="form-control form-control-submit">{{old('comments',$data->comments)}}</textarea>
			                        @error('comments')
			                        	<span class="text-danger">{{$message}} </span>
			                        @enderror
			                      </div>
			                  	</div>
							</div>
							<br>
							<button type="submit" class="btn btn-primary">Update</button>
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