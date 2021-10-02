@extends('admin.layouts.app')
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Menu Item Price Quantity List</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								
								<div class="table-responsive card-body">
									<div class="row">
										<div class="col-md-10"></div>
										
										<div class="col-md-2">
											<a href="{{ route('admin.menu_item_price_quantity.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add Menu Item Price Quantity</a>
										</div>

									</div>			
									<br>
									
									<table id="datatables-column-search-text-inputs" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th width="2%">S.No</th>
												<th>Price</th>
												<th>Menu Quantity Group</th>
												<th>Menu Item</th>
												<th>Status</th>
												<th width="10%">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($data as $key => $val)
												<tr>
													<td>{{ ++$key }} </td>
													<td>{{$val->price ?? ''}} </td>
													<td>{{ $val->quantity_group->name ?? ''}} </td>
													<td>{{$val->menu_item->name ?? ''}} </td>
													<td><button class="btn btn-{{$val->status?'success':'danger'}} ">
														{{$val->status? 'Active':'Inactive'}}
													</button> </td>
													<td>
														<a href="{{ route('admin.menu_item_price_quantity.edit',$val->id) }}" class="btn btn-primary">Edit</a>
														<a href="javascript:;" onclick="destroy('{{$val->id}}')" class="btn btn-danger">Delete</a>
														<form method="post" action="{{ route('admin.menu_item_price_quantity.destroy',$val->id) }}" id="menu_item_price_quantity{{$val->id}}">
															@csrf
															@method('DELETE')
														</form>
													</td>
												</tr>
											@endforeach
											
										</tbody>
										<tfoot>
											<tr>
												<th></th>
												<th> Price </th>
												<th> Menu Quantity Group </th>
												<th> Menu Item </th>
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
			  	document.getElementById(`menu_item_price_quantity${id}`).submit();
			  }
			})
		}
	</script>
@endpush