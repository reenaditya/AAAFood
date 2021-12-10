@extends("admin.layouts.app")
@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Add Catering</h1>
		<div class="row">
			<div class="col-md-12">
				@error('price')
					<div class="alert alert-danger" role="alert">
  						{{$message}}
					</div>
				@enderror
				<div class="card">
					<div class="card-body">
						<form action="{{ route('admin.catering.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">

								<div class="col-md-2"></div>

								<div class="col-md-8">
										
									<div class="row">
								
										<div class="mb-4 col-md-6">
											<label class="form-label" >Name</label>
											<input type="text" name="name" class="form-control" placeholder="enter catering name"  value="{{ old('name') }}">
											@error('name')
												<span class="text-danger">{{$message}} </span>
											@enderror
										</div>

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
											<label class="form-label" >Logo</label>
											<input type="file" class="form-control" name="logo"  old="{{ old('logo')  }}">
											@error('logo')
												<span class="text-danger">{{$message}} </span>
											@enderror
										</div>

										<div class="mb-4 col-md-6">
											<label class="form-label" >Banner Image</label>
											<input type="file" class="form-control" name="banner" old="{{ old('banner')  }}">
											@error('banner')
												<span class="text-danger">{{$message}} </span>
											@enderror
										</div>
										
										
									</div>
									<div class="row">
										
										<div class="mb-4 col-md-12">
											<label class="form-label" >Description</label>
											<textarea name="description" id="description" class="form-control" placeholder="Enter Description"></textarea>
											@error('description')
												<span class="text-danger">{{$message}} </span>
											@enderror
										</div>

									</div>

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
	<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'description' );
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