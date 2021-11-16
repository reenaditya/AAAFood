@extends('admin.layouts.app')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Pay to Vendors List</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								
								<div class="table-responsive card-body">
									
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th width="2%">S.No</th>
												<th>Customer</th>
												<th>Vendor</th>
												<th>Restaurent</th>
												<th>Amount</th>
												<th>Status</th>
												<th width="10%">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($data as $key => $val)
												<tr>
													<td>{{ ++$key }} </td>
													<td>{{$val->user->name ?? ''}} </td>
													
													<td>{{ $val->vendor->name ?? ''}}</td>
													<td><a href="{{route('admin.restaurant.edit',$val->restaurant_id)}}">{{ $val->restro->name ?? '' }} </a></td>
													<td><strong>${{$val->paid_to_vendor ?? 0.00}}</strong></td>
													<td>
														<button class="btn btn-{{$val->payment_status?'success':'danger'}} ">{{$val->payment_status? 'Paid':'Unpaid'}}</button> 
													</td>
													<td>
														<a href="javascript:;" onclick="destroy('{{$val->id}}')" class="btn btn-danger">Delete</a>
														<form method="post" action="{{ route('admin.vendor_payment.destroy',$val->id) }}" id="restaurant{{$val->id}}">
															@csrf
															@method('DELETE')
														</form>
														<a href="{{route('admin.vendor_payment.show',$val->id)}}" class="btn btn-info">View</a>
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