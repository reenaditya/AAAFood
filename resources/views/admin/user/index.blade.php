@extends('admin.layouts.app')
@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Users List</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
					
					<div class="table-responsive card-body">
						<div class="row">
							<div class="col-md-10"></div>
							
							<div class="col-md-2">
								{{-- <a href="{{ route('admin.user.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add user</a> --}}
							</div>

						</div>			
						<br>
						
						<table id="datatables-reponsive" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th width="2%">S.No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>VIP</th>
									<th>Status</th>
									<th width="10%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $value)
									<tr>
										<td>{{ ++$key }} </td>
										<td>{{$value->name ?? ''}} </td>
										<td>{{$value->email ?? ''}} </td>
										<td>
											<span class="badge badge-soft-success">
												{{ Config::get('constant.role')[$value->role] ?? ''}}
											</span>
										</td>
										<td>
											@if($value->vip==1)
											<span class="badge badge-soft-info">VIP</span>
											@else
											<span class="badge badge-soft-danger">NA</span>
											@endif
										</td>
										<td><button class="btn btn-{{$value->status?'success':'danger'}} ">
											{{$value->status? 'Active':'Inactive'}}
										</button> </td>
										<td>
											<a href="{{ route('admin.user.edit',$value->id) }}" class="btn btn-primary">Edit</a>
											<a href="javascript:;" onclick="destroy('{{$value->id}}')" class="btn btn-danger">Delete</a>
											<form method="post" action="{{ route('admin.user.destroy',$value->id) }}" id="user{{$value->id}}">
												@csrf
												@method('DELETE')
											</form>
										</td>
									</tr>
								@endforeach
								
							</tbody>
							<tfoot>
								<tr>
									{{-- <th></th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th> --}}
									
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

			  	document.getElementById(`user${id}`).submit();
			  }
			})
		}
	</script>
@endpush