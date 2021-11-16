@extends('admin.layouts.app')
@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Menu Quantity Group List</h1>
		<div class="row">
			<div class="col-12">
				<div class="card">
				
					<div class="table-responsive card-body">
						<div class="row">
							<div class="col-md-10"></div>
							
							<div class="col-md-2">
								<a href="{{ route('admin.menu_quantity_group.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add Menu Quantity Group</a>
							</div>

						</div>			
						<br>
						
						<table id="datatables-reponsive" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th width="2%">S.No</th>
									<th>Name</th>
									<th>Menu Group</th>
									{{-- <th>Restaurant</th>
									<th>User</th> --}}
									<th>Status</th>
									<th width="20%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $val)
									<tr>
										<td>{{ ++$key }} </td>
										<td>{{$val->name ?? ''}} </td>
										<td>{{ $val->menu_group->name ?? ''}} </td>
										{{-- <td>{{ $val->restaurant->name ?? ''}} </td>
										<td>{{$val->user->name ?? ''}} </td> --}}
										<td><button class="btn btn-{{$val->status?'success':'danger'}} ">
											{{$val->status? 'Active':'Inactive'}}
										</button> </td>
										<td>
											<a href="{{ route('admin.menu_quantity_group.edit',$val->id) }}" class="btn btn-primary">Edit</a>
											<a href="javascript:;" onclick="destroy('{{$val->id}}')" class="btn btn-danger">Delete</a>
											<form method="post" action="{{ route('admin.menu_quantity_group.destroy',$val->id) }}" id="menu_quantity_group{{$val->id}}">
												@csrf
												@method('DELETE')
											</form>
										</td>
									</tr>
								@endforeach
								
							</tbody>
							<tfoot>
								{{-- <tr>
									<th></th>
									<th>Name</th>
									<th>Restaurant Name</th>
									<th>User Name</th>
								</tr> --}}
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
			  	document.getElementById(`menu_quantity_group${id}`).submit();
			  }
			})
		}
	</script>
@endpush