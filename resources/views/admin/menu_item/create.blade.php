@extends("admin.layouts.app")
@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Add Menu Item</h1>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('admin.menu_item.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							
							<div class="row">
								
								<div class="mb-4 col-md-4">
									<label class="form-label" >Name</label>
									<input type="text" name="name" class="form-control" placeholder="enter menu item name"  value="{{ old('name') }}">
									@error('name')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label" >Restaurants name</label>
									<select class="form-control" name="restaurant_id" >
										<option value="">Select</option>
										@foreach($restaurant as $val)
										<option value="{{$val->id}}">{{$val->name}}</option>
										@endforeach
									</select>
									@error('restaurant_id')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>

								<div class="mb-4 col-md-4">
									<label class="form-label">User name</label>
									<select class="form-control" name="user_id" >
										<option value="">Select</option>
										@foreach($user as $val)
										<option value="{{$val->id}}">{{$val->name}}</option>
										@endforeach
									</select>
									@error('user_id')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>


								<div class="mb-4 col-md-4">
									<label class="form-label">Menu group name</label>
									<select class="form-control menu_group_id" name="menu_group_id">
										<option value="">Select</option>
										@foreach($group as $val)
										<option value="{{$val->id}}">{{$val->name}}</option>
										@endforeach
									</select>
									@error('menu_group_id')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								
								<div class="mb-4 col-md-4">
									<label class="form-label" >Estimated time</label>
									<input type="number" min="0" name="estimated_time" class="form-control" placeholder="enter estimated time(in minutes)"  value="{{ old('estimated_time') }}">
									@error('estimated_time')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>

								<div class="mb-4 col-md-4">
									<label class="form-label" >Discount</label>
									<input type="number" min="0" name="discount" class="form-control" placeholder="enter discount"  value="{{ old('discount') }}">
									@error('discount')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label" >Discount type</label>
									<select class="form-control" name="discount_type" >
										<option value="1">Price</option>
										<option value="2">Percent(%)</option>
									</select>
									
									@error('status')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								
								<div class="mb-4 col-md-4">
									<label class="form-label" >Image</label>
									<input type="file" class="form-control" name="image" old="{{ old('image')  }}">
									@error('image')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>

								<div class="mb-4 col-md-4">
									<label class="form-label" >Status</label>
									<select class="form-control" name="status" >
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
									
									@error('status')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
									
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			
		</div>

	</div>
</main>
@endsection
@push('script')
	<script type="text/javascript" src="{{asset('js/admin/menu_item.js')}}"></script>
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