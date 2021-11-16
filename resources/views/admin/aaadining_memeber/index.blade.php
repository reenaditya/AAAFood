@extends('admin.layouts.app')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">AAAdining Members List</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								
								<div class="table-responsive card-body">
									
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th width="2%">S.No</th>
												<th>Name</th>
												<th>Email</th>
												<th>Restaurant</th>
												<th>Price </th>
												<th>Purchase At </th>
												<th>End At </th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($users as $key => $val)
												<tr>
													<td>{{ ++$key }} </td>
													<td>{{$val->user->name ?? ''}} </td>
													<td>{{$val->user->email ?? ''}} </td>
													<td>{{$val->MemberFirstPurchase->restro->name ?? ''}}</td>
													<td><strong>${{$val->price ?? ''}} </strong></td>
													<td>{{date("d M-Y h:i A",strtotime($val->purchase_at)) ?? ''}} </td>
													<td>{{date("d M-Y h:i A",strtotime($val->end_at)) ?? ''}} </td>
													
													<td><button class="btn btn-{{$val->status?'success':'danger'}} ">
														{{$val->status? 'Active':'Inactive'}}
													</button> </td>
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