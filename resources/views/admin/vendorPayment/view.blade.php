@extends('admin.layouts.app')
@section('content')
@php
	$payment_status = Config::get('constant.payment_status');
@endphp
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3"></h1>

			<div class="row">
				<div class="col-12">
					<div class="card">
						
						<div class="table-responsive card-body">
							<table id="datatables-reponsive" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th width="2%">S.No</th>
										<th>Name</th>
										<th>Change Payment Status</th>
										<th>Amount</th>
										<th>Payment Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($allData as $key => $val)
										<tr>
											<td>{{ ++$key }} </td>
											<td>{{$val->user->name ?? ''}} </td>
											<td>
												<select class="form-control" name="payment_status" data-id="{{ $val->id }}">
												@foreach($payment_status as $kii => $value)
													<option value="{{$kii}}" @if($val->payment_status==$kii) selected="" @endif>{{$value}}</option>
												@endforeach
											</select>
											</td>
											<td>${{ $val->paid_to_vendor ?? '' }}</td>
											<td>
												<button class="btn btn-{{$val->payment_status?'success':'danger'}} ">{{$val->payment_status? 'Paid':'Unpaid'}}</button> 
											</td>
											<td>
												<a href="{{route('admin.order.details',$val->order_id)}}"><button class="btn btn-info" type="button">Order detail</button></a><br>
												<a href="{{route('admin.restaurant.edit',$val->restaurant_id)}}"><button class="btn btn-info" type="button">Restaurant detail</button></a>
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
	<script type="text/javascript" src="{{asset('js/admin/payto_vendor.js')}}"></script>
	
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
		
	</script>
@endpush