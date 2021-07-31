@extends("admin.layouts.app")
@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Edit Menu Quantity Group</h1>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('admin.menu_quantity_group.update',$menu_quantity_group->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								
								<div class="mb-4 col-md-4">
									<label class="form-label" >Name</label>
									<input type="text" name="name" class="form-control" placeholder="enter menu item name"  value="{{ old('name',$menu_quantity_group->name) }}">
									@error('name')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label" >Restaurant name</label>
									<select class="form-control" name="restaurant_id" >
										<option value="">Select</option>
										@foreach($restaurant as $val)
										<option value="{{$val->id}}" @if($menu_quantity_group->restaurant_id==$val->id) selected="" @endif >{{$val->name}}</option>
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
										<option value="{{$val->id}}"  @if($menu_quantity_group->user_id==$val->id) selected="" @endif>{{$val->name}}</option>
										@endforeach
									</select>
									@error('user_id')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>


								<div class="mb-4 col-md-4">
									<label class="form-label">Menu group name</label>
									<select class="form-control" name="menu_group_id" >
										<option value="">Select</option>
										@foreach($group as $val)
										<option value="{{$val->id}}"  @if($menu_quantity_group->menu_group_id==$val->id) selected="" @endif>{{$val->name}}</option>
										@endforeach
									</select>
									@error('menu_group_id')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>

								<div class="mb-4 col-md-4">
									<label class="form-label" >Status</label>
									<select class="form-control" name="status" >
										<option value="1" @if($menu_quantity_group->status==1) selected="" @endif>Active</option>
										<option value="0" @if($menu_quantity_group->status==0) selected="" @endif>Inactive</option>
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