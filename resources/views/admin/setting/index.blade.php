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
							<li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab"><i class="fa fa-cogs"></i> General setting</a></li>
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
										{{-- <div class="mb-4 col-md-4">
											<label class="form-label" >Header</label>
											<input type="text" name="general_setting_header" class="form-control" value="{{old('general_setting_header',Settings::get('general_setting_header'))}}">
										</div> --}}
										<hr>
										<div class="mb-4 col-md-12"><strong><h4>Header</h4></strong></div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Home</label>
											<input type="text" name="general_setting_top_header_home" class="form-control" value="{{old('general_setting_top_header_home',Settings::get('general_setting_top_header_home'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">About</label>
											<input type="text" name="general_setting_top_header_about" class="form-control" value="{{old('general_setting_top_header_about',Settings::get('general_setting_top_header_about'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">AAAdining Club</label>
											<input type="text" name="general_setting_top_header_aaadining_club" class="form-control" value="{{old('general_setting_top_header_aaadining_club',Settings::get('general_setting_top_header_aaadining_club'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Restaurant Account</label>
											<input type="text" name="general_setting_top_header_restaurant_account" class="form-control" value="{{old('general_setting_top_header_restaurant_account',Settings::get('general_setting_top_header_restaurant_account'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Catering Account</label>
											<input type="text" name="general_setting_top_header_catering_acc" class="form-control" value="{{old('general_setting_top_header_catering_acc',Settings::get('general_setting_top_header_catering_acc'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Order History</label>
											<input type="text" name="general_setting_top_header_order_history" class="form-control" value="{{old('general_setting_top_header_order_history',Settings::get('general_setting_top_header_order_history'))}}">
										</div>
										<hr>
										<div class="col-md-6 mb-4">
											<label class="form-label" >Website Header Image</label>
											<div class="text-center">
												<img src="{{asset('storage/'.Settings::get('general_setting_website_head_image'))}}" style="max-width:130px;">
											</div>
											<input type="file" name="general_setting_website_head_image" class="form-control">
										</div>
										<div class="col-md-6 mb-4">
											<label class="form-label" >Website Spining Plate Image</label>
											<div class="text-center">
												<img src="{{asset('storage/'.Settings::get('general_setting_website_spining_plate'))}}" style="max-width:130px;">
											</div>
											<input type="file" name="general_setting_website_spining_plate" class="form-control">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Dine In</label>
											<input type="text" name="general_setting_top_header_dine_in" class="form-control" value="{{old('general_setting_top_header_dine_in',Settings::get('general_setting_top_header_dine_in'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Delivery</label>
											<input type="text" name="general_setting_top_header_delivery" class="form-control" value="{{old('general_setting_top_header_delivery',Settings::get('general_setting_top_header_delivery'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Catering</label>
											<input type="text" name="general_setting_top_header_catering" class="form-control" value="{{old('general_setting_top_header_catering',Settings::get('general_setting_top_header_catering'))}}">
										</div>
										<div class="mb-4 col-md-4">
											<label class="form-label">Pick Up</label>
											<input type="text" name="general_setting_top_header_pickup" class="form-control" value="{{old('general_setting_top_header_pickup',Settings::get('general_setting_top_header_pickup'))}}">
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
							<div class="tab-pane" id="tab-2" role="tabpanel">
							
								<h4 class="tab-title">Website general setting</h4>

								<form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
									@csrf
									
									<div class="row">
										
										<div class="mb-4 col-md-4">
											<label class="form-label">VIP coupon code</label>
											<input type="text" name="general_setting_vip_coupon_code" class="form-control" value="{{old('general_setting_vip_coupon_code',Settings::get('general_setting_vip_coupon_code'))}}">
										</div>

									</div>

									<h4 class="tab-title">Custumize website email message</h4>
									<div class="row">
										
										<div class="mb-4 col-md-6">
											<label class="form-label">Business Account Activation</label>
											<input type="text" name="email_message_business_acc_activation" class="form-control" value="{{old('email_message_business_acc_activation',Settings::get('email_message_business_acc_activation'))}}">
										</div>

										<div class="mb-4 col-md-6">
											<label class="form-label">Verify Email</label>
											<input type="text" name="email_message_verify_delivery_boy_email" class="form-control" value="{{old('email_message_verify_delivery_boy_email',Settings::get('email_message_verify_delivery_boy_email'))}}">
										</div>

										<div class="mb-4 col-md-6">
											<label class="form-label">Delivery boy assigend</label>
											<input type="text" name="email_message_delivery_boy_assign" class="form-control" value="{{old('email_message_delivery_boy_assign',Settings::get('email_message_delivery_boy_assign'))}}">
										</div>

										<div class="mb-4 col-md-6">
											<label class="form-label">Order accepted by restaurant</label>
											<input type="text" name="email_message_order_accepted" class="form-control" value="{{old('email_message_order_accepted',Settings::get('email_message_order_accepted'))}}">
										</div>

										<div class="mb-4 col-md-6">
											<label class="form-label">Food left kitchen</label>
											<input type="text" name="email_message_food_left_kitchen" class="form-control" value="{{old('email_message_food_left_kitchen',Settings::get('email_message_food_left_kitchen'))}}">
										</div>

										<div class="mb-4 col-md-6">
											<label class="form-label">Order arrived to Customer</label>
											<input type="text" name="email_message_order_arrived" class="form-control" value="{{old('email_message_order_arrived',Settings::get('email_message_order_arrived'))}}">
										</div>

										<div class="mb-4 col-md-6">
											<label class="form-label">Order arrived to Vendor</label>
											<input type="text" name="email_message_order_arrived_vendor" class="form-control" value="{{old('email_message_order_arrived_vendor',Settings::get('email_message_order_arrived_vendor'))}}">
										</div>

										<div class="mb-4 col-md-6">
											<label class="form-label">Order completed to Customer</label>
											<input type="text" name="email_message_order_completed_cust" class="form-control" value="{{old('email_message_order_completed_cust',Settings::get('email_message_order_completed_cust'))}}">
										</div>

										<div class="mb-4 col-md-6">
											<label class="form-label">Order completed to Vendor</label>
											<input type="text" name="email_message_order_completed_vendor" class="form-control" value="{{old('email_message_order_completed_vendor',Settings::get('email_message_order_completed_vendor'))}}">
										</div>
 
										<div class="mb-4 col-md-6">
											<label class="form-label">Email footer text</label>
											<input type="text" name="email_message_footer_text" class="form-control" value="{{old('email_message_footer_text',Settings::get('email_message_footer_text'))}}">
										</div>

									</div>
									
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
	
							</div>
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