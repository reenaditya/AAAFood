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
					<div class="card-body">
						{{-- <div class="row">
							<div class="col-md-10"></div>
							<div class="col-md-2">
								<button class="btn btn-success" type="button">
									Active Now
								</button>
							</div>
						</div> --}}
						<br>
						<table id="datatables-column-search-text-inputs" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th width="2%">S.No</th>
									<th>Order item</th>
									@if(Auth::check() && Auth::user()->role===3)
									<th>Restaurant name</th>
									<th>Delivery address</th>
									@endif
									<th>Amount</th>
									@if(Auth::check() && Auth::user()->role===1)
									<th>Payment Status</th>
									@endif
									<th>Order Status</th>
									@if(Auth::check() && Auth::user()->role===3)
									<th width="10%">Action</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $key => $value)
									<tr>
										<td>{{ ++$key }} </td>
										
										<td>
											@if(!$value->orderItem->isEmpty())
											@foreach($value->orderItem as $kii=>$val)
												{{++$kii}}. {{ $val->menuItem->name ?? '' }}
												<br><strong>Unit: {{$val->unit ?? ''}}&nbsp;&nbsp;
												Quantity: {{$val->quantity ?? ''}}</strong><br>
											@endforeach
											@endif
										</td>
										@if(Auth::check() && Auth::user()->role===3)
										<td>{{ $value->restaurant->name ?? '' }}</td>
										<td>
											{{ $value->address ?? '' }}<br>
											<b>Phone:</b> {{ $value->mobile ?? '' }}
										</td>
										@endif
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
										@if(Auth::check() && Auth::user()->role===3)
										<td>
											@if($value->delivery_user_id==null)
											<button class="btn btn-success order-accept-status" data-userid="{{Auth::id()}}" data-orderid="{{$value->id}}" type="button">
												Accept
											</button>
											@else
											<button class="btn btn-success" type="button">
												Accepted
											</button>
											@endif
										</td>
										@endif
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