@extends("admin.layouts.app")
@section('content')
@php
	$role = Config::get('constant.role');
@endphp
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Add User</h1>
		<div class="row">
			
			<div class="col-md-12">
				<div class="card">
					
					<div class="card-body">
						<form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6">
									<div class="row">
										<div class="mb-4 col-md-12">
											<label class="form-label">User role</label>
											<select name="role" class="form-control">
												<option value="">Select</option>
												@foreach($role as $kii=>$val)
												<option value="{{$kii}}" @if(old('role')==$kii) selected="" @endif>{{$val}}</option>
												@endforeach
											</select>
											@error('role')
												<span class="text-danger">{{$message}} </span>
											@enderror
										</div>
										<div class="mb-4 col-md-12">
											<label class="form-label" >Name</label>
											<input type="text" name="name" class="form-control" placeholder="enter name"  value="{{ old('name') }}">
											@error('name')
												<span class="text-danger">{{$message}} </span>
											@enderror
										</div>
										<div class="mb-4 col-md-12">
											<label class="form-label" >Email</label>
											<input type="text" name="email" class="form-control" placeholder="enter email"  value="{{ old('email') }}">
											@error('email')
												<span class="text-danger">{{$message}} </span>
											@enderror
										</div>
										{{-- <div class="mb-4 col-md-12">
											<label class="form-label">Password</label>
											<input type="password" name="password" class="form-control"  value="{{ old('password') }}">
											@error('password')
												<span class="text-danger">{{$message}} </span>
											@enderror
										</div>
										<div class="mb-4 col-md-12">
											<label class="form-label">Confirm password</label>
											<input type="password" name="password_confirmation" class="form-control"  value="{{ old('password_confirmation') }}">
											@error('password')
												<span class="text-danger">{{$message}} </span>
											@enderror
										</div> --}}
										<div class="mb-4 col-md-12">
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