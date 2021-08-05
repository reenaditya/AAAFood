@extends("admin.layouts.app")
@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Add Menu Quantity Group</h1>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('admin.menu_quantity_group.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							
							<div class="row">
								
								<div class="mb-4 col-md-4">
									<label class="form-label" >Name</label>
									<input type="text" name="name" class="form-control" placeholder="enter menu quantity group name"  value="{{ old('name') }}">
									@error('name')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								
								<div class="mb-4 col-md-4">
									<label class="form-label">Menu group name</label>
									<select class="form-control" name="menu_group_id" >
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