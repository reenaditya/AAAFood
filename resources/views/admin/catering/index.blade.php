@extends('admin.layouts.app')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Catering List</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								
								<div class="table-responsive card-body">
									<div class="row">
										<div class="col-md-10"></div>
										
										<div class="col-md-2">
											<a href="{{ route('admin.catering.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add Catering</a>
										</div>

									</div>			
									<br>
									
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th width="2%">S.No</th>
												<th>Name</th>
												<th>Description</th>
												<th>Status</th>
												<th width="20%">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($data as $key => $val)
												<tr>
													<td>{{ ++$key }} </td>
													<td>{{$val->name ?? ''}} </td>
													<td>{!! Str::limit($val->desc, 120,'...')!!} </td>
													<td><button class="btn btn-{{$val->status?'success':'danger'}} ">
														{{$val->status? 'Active':'Inactive'}}
													</button> </td>
													<td>
														<a href="{{ route('admin.catering.edit',$val->id) }}" class="btn btn-primary">Edit</a>
														<a href="javascript:;" onclick="destroy('{{$val->id}}')" class="btn btn-danger">Delete</a>
														<form method="post" action="{{ route('admin.catering.destroy',$val->id) }}" id="catering{{$val->id}}">
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
			  	document.getElementById(`catering${id}`).submit();
			  }
			})
		}
	</script>
@endpush