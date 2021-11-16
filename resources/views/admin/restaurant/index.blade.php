@extends('admin.layouts.app')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Restaurants List</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								
								<div class="table-responsive card-body">
									<div class="row">
										<div class="col-md-10"></div>
										
										<div class="col-md-2">
											
											<a href="{{ route('admin.restaurant.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add Restaurant</a>
											
										</div>

									</div>			
									<br>
									
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th width="2%">S.No</th>
												<th>Name</th>
												<th>Address</th>
												<th>Vendor name</th>
												<th>Status</th>
												<th width="10%">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($restaurants as $key => $restaurant)
												<tr>
													<td>{{ ++$key }} </td>
													<td>{{$restaurant->name ?? ''}} </td>
													
													<td>{{ $restaurant->city ?? ''}}, {{ $restaurant->country ?? ''}}, {{$restaurant->zipcode ?? ''}}</td>
													<td>{{ $restaurant->user->name ?? '' }} </td>
													<td><button class="btn btn-{{$restaurant->status?'success':'danger'}} ">
														{{$restaurant->status? 'Active':'Inactive'}}
													</button> </td>
													<td>
														<a href="{{ route('admin.restaurant.edit',$restaurant->id) }}" class="btn btn-primary">Edit</a>
														<a href="javascript:;" onclick="destroy('{{$restaurant->id}}')" class="btn btn-danger">Delete</a>
														<form method="post" action="{{ route('admin.restaurant.destroy',$restaurant->id) }}" id="restaurant{{$restaurant->id}}">
															@csrf
															@method('DELETE')
														</form>
														@if($restaurant->user_id && $restaurant->user_id != Auth::id())
														<a href="{{ route('admin.user.login',$restaurant->user_id) }}" class="btn btn-warning">Login</a>
														@endif
													</td>
												</tr>
											@endforeach
											
										</tbody>
										<tfoot>
											<tr>
												
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
@endsection
@push('script')
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
		
		function destroy(id){

			Swal.fire({
			  	title: 'Are you sure?',
			  	text: "You won't be able to revert this!",
			  	icon: 'warning',
			  	showCancelButton: true,
			  	confirmButtonColor: '#3085d6',
			  	cancelButtonColor: '#d33',
			  	confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.isConfirmed) {

			  	document.getElementById(`restaurant${id}`).submit();
			  }
			})
		}
	</script>
@endpush