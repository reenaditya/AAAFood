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

		<h1 class="h3 mb-3">Order history List</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					
					<div class="table-responsive card-body">
						<br>
						
						<table id="datatables-reponsive" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th width="2%">S.No</th>
									<th>Order number</th>
									<th>Amount</th>
									<th>Order Status</th>
									<th>Date</th>
									<th width="10%">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $value)
									<tr>
										<td>{{ ++$key }} </td>
										
										<td>
											{{ $value->order->order_number ?? '' }}
										</td>
										<td>${{ $value->order->grand_total ?? '' }} </td>
										
										<td>
											<button class="btn btn-success">{{ $order_status[$value->order->order_status] }}</button>
										</td>
										<td>
											{{ date("D d-M-Y",strtotime($value->created_at)) }}
										</td>
										<td>
											<a href="{{url('admin/order-details/'.$value->order->id)}}" class="btn btn-info">Details</a>
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
	<script type="text/javascript" src="{{asset('js/admin/orders.js')}}"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>
@endpush