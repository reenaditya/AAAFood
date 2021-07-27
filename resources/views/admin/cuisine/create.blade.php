@extends("admin.layouts.app")
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Add Cuisine</h1>

					<div class="row">
						
						<div class="col-md-12">
							<div class="card">
								
								<div class="card-body">
									<form action="{{ route('admin.cuisine.store') }}" method="post" enctype="multipart/form-data">
										@csrf
										
										<div class="row">
											<div class="mb-4 col-md-4">
												<label class="form-label" >Name</label>
												<input type="text" name="name" class="form-control" placeholder="enter cuisine name"  value="{{ old('name') }}">
												@error('name')
													<span class="text-danger">{{$message}} </span>
												@enderror
											</div>
											<div class="mb-4 col-md-4">
												<label class="form-label" >Image</label>
												<input type="file" name="image" class="form-control" >
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