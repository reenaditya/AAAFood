@extends('admin.layouts.app')
@section('content')
@php
	if(Auth::check() && Auth::user()->role===3){
		$order_status = Config::get('constant.del_order_status');
		$disabled = true;
	}else{
		$order_status = Config::get('constant.order_status');
		$disabled = false;
	}
	$payment_status = Config::get('constant.transaction_status');

@endphp
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Order List</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="table-responsive card-body">
						
						<table id="datatables-reponsive" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th width="2%">S.No</th>
									<th>Order number</th>
									<th>Restaurant name</th>
									<th>Amount</th>
									@if(Auth::check() && Auth::user()->role===1)
									<th>Payment Status</th>
									@endif
									<th>Order Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $value)
									<tr>
										<td>{{ ++$key }} </td>
										
										<td>
											{{ $value->order_number ?? '' }}
										</td>
										<td>{{ $value->restaurant->name ?? '' }}</td>
										<td>${{ $value->grand_total ?? '' }} </td>
										@if(Auth::check() && Auth::user()->role===1)
										<td>
											<select class="form-control" name="payment_status" data-id="{{ $value->id }}" @if($disabled) disabled="" @endif>
												@foreach($payment_status as $kii => $val)
													<option value="{{$kii}}" @if($value->payment_status==$kii) selected="" @endif>{{$val}}</option>
												@endforeach
											</select>
										</td>
										@endif
										<td>
											<select class="form-control" name="order_status"  data-id="{{ $value->id }}">
												<option value="">Select</option>
												@foreach($order_status as $kii => $val)
													<option value="{{$kii}}" @if($value->order_status==$kii) selected="" @endif>{{$val}}</option>
												@endforeach
											</select>
										</td>
										
										<td>
											@if(Auth::check() && Auth::user()->role===3)
											
												@if($value->delivery_user_id==null)
												<button class="btn btn-success order-accept-status" data-userid="{{Auth::id()}}" data-orderid="{{$value->id}}" type="button">
													Accept
												</button>
												@else
												<button class="btn btn-success" type="button">
													Accepted
												</button>
												@endif
											
											@endif
											<a href="{{url('admin/order-details/'.$value->id)}}" class="btn btn-info">Details</a>
											
										</td>
									</tr>
								@endforeach
								
							</tbody>
							<tfoot>
								<tr>
									{{-- <th></th> --}}
									{{-- <th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>City</th>
									<th>Zipcode</th> --}}
									
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
	<script type="text/javascript" src="{{asset('js/admin/orders.js')}}"></script>
	<script>
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

		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>
@endpush