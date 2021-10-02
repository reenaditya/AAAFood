@extends('admin.layouts.app')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Cuisine</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					
					<div class="table-responsive card-body">
						<a href="{{ route('admin.cuisine.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add Cuisine</a>
						<table id="datatables-column-search-text-inputs" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Name</th>
									<th>Image</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($cuisine as $key => $_cuisine)
									<tr>
										<td>{{ ++$key }} </td>
										<td>{{$_cuisine->name ?? ''}} </td>
										<td><img src="{{ asset("storage/$_cuisine->image") }}" width="80"> </td>
										<td><button class="btn btn-{{$_cuisine->status?'success':'danger'}} ">
											{{$_cuisine->status? 'Active':'Inactive'}}
										</button> </td>
										<td>
											<a href="{{ route('admin.cuisine.edit',$_cuisine->id) }}" class="btn btn-primary">Edit</a>
											<a href="javascript:;" onclick="destroy('{{$_cuisine->id}}')" class="btn btn-danger">Delete</a>
											<form method="post" action="{{ route('admin.cuisine.destroy',$_cuisine->id) }}" id="cuisine{{$_cuisine->id}}">
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

			  	document.getElementById(`cuisine${id}`).submit();
			  }
			})
		}
	</script>
@endpush