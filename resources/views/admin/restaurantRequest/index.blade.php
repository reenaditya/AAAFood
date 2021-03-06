@extends('admin.layouts.app')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Restaurant request</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					
					<div class="table-responsive card-body">
						<table id="datatables-reponsive" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Restaurant name</th>
									<th>Food type</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $value)
									<tr>
										<td>{{ ++$key }} </td>
										<td>{{ $value->fname ?? ''}} {{ $value->lname ?? '' }}</td>
										<td>{{ $value->email ?? '' }}</td>
										<td>{{ $value->phone_number ?? '' }}</td>
										<td>{{ $value->restaurant_name ?? '' }}</td>
										<td>{{ $value->food_type ?? '' }}</td>
										<td><button class="btn btn-{{$value->status?'success':'danger'}} ">
											{{$value->status? 'Approved':'Not Approved'}}
										</button> </td>
										<td>
											<a href="{{ route('admin.restaurant_request.edit',$value->id) }}" class="btn btn-primary">Edit</a>
											<a href="javascript:;" onclick="destroy('{{$value->id}}')" class="btn btn-danger">Delete</a>
											<form method="post" action="{{ route('admin.restaurant_request.destroy',$value->id) }}" id="restaurant_request{{$value->id}}">
												@csrf
												@method('DELETE')
											</form>
										</td>
									</tr>
								@endforeach
								
							</tbody>
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

			  	document.getElementById(`restaurant_request${id}`).submit();
			  }
			})
		}
	</script>
@endpush