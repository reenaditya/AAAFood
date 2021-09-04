@extends('admin.layouts.app')
@section('content')
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3">Setting</h1>

			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="tab">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab"><i class="fa fa-home"></i> Home page</a></li>
							{{-- <li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab">test2</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab">test1</a></li> --}}
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab-1" role="tabpanel">
								<h4 class="tab-title">Website home page setting</h4>

								<form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
									@csrf
									
									<div class="row">
										<div class="mb-4 col-md-12">
											<div class="row">
												<div class="col-md-4"></div>
												<div class="col-md-4">
													<label class="form-label" >Website Logo</label>
													<div class="text-center">
														<img src="{{asset('storage/'.Settings::get('general_setting_website_logo'))}}" style="max-width:130px;">
													</div>
													<input type="file" name="general_setting_website_logo" class="form-control">
												</div>
											</div>
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label" >Header Title</label>
											<input type="text" name="general_setting_header_title" class="form-control" value="{{old('general_setting_header_title',Settings::get('general_setting_header_title'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label" >Header Title 2</label>
											<input type="text" name="general_setting_header_title2" class="form-control" value="{{old('general_setting_header_title2',Settings::get('general_setting_header_title2'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Restaurant icons heading</label>
											<input type="text" name="general_setting_restaurant_icon_heading" class="form-control" value="{{old('general_setting_restaurant_icon_heading',Settings::get('general_setting_restaurant_icon_heading'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Meal listing heading</label>
											<input type="text" name="general_setting_meal_list_heading" class="form-control" value="{{old('general_setting_meal_list_heading',Settings::get('general_setting_meal_list_heading'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Meal listing button heading</label>
											<input type="text" name="general_setting_meal_list_btn_heading" class="form-control" value="{{old('general_setting_meal_list_btn_heading',Settings::get('general_setting_meal_list_btn_heading'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Cuisine heading</label>
											<input type="text" name="general_setting_cuisine_heading" class="form-control" value="{{old('general_setting_cuisine_heading',Settings::get('general_setting_cuisine_heading'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Restaurant listing heading</label>
											<input type="text" name="general_setting_restaurant_list_head" class="form-control" value="{{old('general_setting_restaurant_list_head',Settings::get('general_setting_restaurant_list_head'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Add your restaurant text</label>
											<input type="text" name="general_setting_add_your_restaurant_text" class="form-control" value="{{old('general_setting_add_your_restaurant_text',Settings::get('general_setting_add_your_restaurant_text'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Add your restaurant button text</label>
											<input type="text" name="general_setting_add_your_restaurant_btn_text" class="form-control" value="{{old('general_setting_add_your_restaurant_btn_text',Settings::get('general_setting_add_your_restaurant_btn_text'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Use kitchens text</label>
											<input type="text" name="general_setting_use_kitchens_text" class="form-control" value="{{old('general_setting_use_kitchens_text',Settings::get('general_setting_use_kitchens_text'))}}">
										</div>

										<div class="mb-4 col-md-4">
											<label class="form-label">Use kitchens button text</label>
											<input type="text" name="general_setting_use_kitchens_button_text" class="form-control" value="{{old('general_setting_use_kitchens_button_text',Settings::get('general_setting_use_kitchens_button_text'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Local chef text</label>
											<input type="text" name="general_setting_local_chef_text" class="form-control" value="{{old('general_setting_local_chef_text',Settings::get('general_setting_local_chef_text'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Local chef button text</label>
											<input type="text" name="general_setting_local_chef_button_text" class="form-control" value="{{old('general_setting_local_chef_button_text',Settings::get('general_setting_local_chef_button_text'))}}">
										</div>

										<div class="mb-4 col-md-4">
											<label class="form-label">Popular country text</label>
											<input type="text" name="general_setting_popular_country_text" class="form-control" value="{{old('general_setting_popular_country_text',Settings::get('general_setting_popular_country_text'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Popular food text</label>
											<input type="text" name="general_setting_popular_food_text" class="form-control" value="{{old('general_setting_popular_food_text',Settings::get('general_setting_popular_food_text'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Join online classes</label>
											<input type="text" name="general_setting_join_online_class" class="form-control" value="{{old('general_setting_join_online_class',Settings::get('general_setting_join_online_class'))}}">
										</div>

									</div>
									
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>

							</div>
							{{-- <div class="tab-pane" id="tab-2" role="tabpanel">
								
							</div>
							<div class="tab-pane" id="tab-3" role="tabpanel">
								
							</div> --}}
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