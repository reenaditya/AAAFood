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
					
					<div class="card-body">
						<br>
						
						<table id="datatables-column-search-text-inputs" class="table table-striped" style="width:100%">
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
		// DataTables with Column Search by Text Inputs
		document.addEventListener("DOMContentLoaded", function() {
			// Setup - add a text input to each footer cell
			$('#datatables-column-search-text-inputs tfoot th').each(function() {
				var title = $(this).text();
				if (title) {
					$(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');	
				}
				
			});
			// DataTables
			var table = $('#datatables-column-search-text-inputs').DataTable();
			// Apply the search
			table.columns().every(function() {
				var that = this;
				$('input', this.footer()).on('keyup change clear', function() {
					if (that.search() !== this.value) {
						that
							.search(this.value)
							.draw();
					}
				});
			});
		});
		// DataTables with Column Search by Select Inputs
		document.addEventListener("DOMContentLoaded", function() {
			$('#datatables-column-search-select-inputs').DataTable({
				initComplete: function() {
					this.api().columns().every(function() {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function() {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);
								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});
						column.data().unique().sort().each(function(d, j) {
							select.append('<option value="' + d + '">' + d + '</option>')
						});
					});
				}
			});
		});
	</script>
@endpush