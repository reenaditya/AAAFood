@extends('admin.layouts.app')
@section('content')
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3">Setting</h1>

			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="tab">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item"><a class="nav-link active" href="#tab-1" data-bs-toggle="tab" role="tab"><i class="fa fa-home"></i>&nbsp; Home page</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab-2" data-bs-toggle="tab" role="tab"><i class="fa fa-cogs"></i>&nbsp; General setting</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab-3" data-bs-toggle="tab" role="tab"><i class="fa fa-info"></i>&nbsp; About us</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab-4" data-bs-toggle="tab" role="tab"><i class="fa fa-envelope"></i>&nbsp; Email text</a></li>
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
										
										<div class="mb-4 col-md-3">
											<label class="form-label">VIP coupon code</label>
											<input type="text" name="general_setting_vip_coupon_code" class="form-control" value="{{old('general_setting_vip_coupon_code',Settings::get('general_setting_vip_coupon_code'))}}">
										</div>

										<div class="mb-4 col-md-3">
											<label class="form-label">AAADining Club Card Charges($)</label>
											<input type="text" name="general_setting_aaadining_club_charges" class="form-control" value="{{old('general_setting_aaadining_club_charges',Settings::get('general_setting_aaadining_club_charges'))}}">
										</div>

										<div class="mb-4 col-md-3">
											<label class="form-label">Delivery charges(%)</label>
											<input type="text" name="general_setting_delivery_charges_percent" class="form-control" value="{{old('general_setting_delivery_charges_percent',Settings::get('general_setting_delivery_charges_percent'))}}">
										</div>
										<div class="mb-4 col-md-3">
											<label class="form-label">Delivery charges($)</label>
											<input type="text" name="general_setting_delivery_charges_dollar" class="form-control" value="{{old('general_setting_delivery_charges_dollar',Settings::get('general_setting_delivery_charges_dollar'))}}">
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

							<div class="tab-pane" id="tab-3" role="tabpanel">
							
								<h4 class="tab-title">About us page</h4>

								<form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
									@csrf
									
									<div class="row">
										<div class="mb-4 col-md-12">
											<div class="row">
												<div class="mb-4 col-md-4"></div>
												<div class="mb-4 col-md-4">
													<label class="form-label">Banner Image</label>
													<div class="text-center">
														<img src="{{asset('storage/'.Settings::get('setting_about_us_page_banner_image'))}}" style="max-width:130px;">
													</div>
													<input type="file" name="setting_about_us_page_banner_image" class="form-control">
												</div>
											</div>
										</div>
										<div class="mb-4 col-md-3">
											<label class="form-label">About us title</label>
											<input type="text" name="setting_about_us_page_main_title" class="form-control" value="{{old('setting_about_us_page_main_title',Settings::get('setting_about_us_page_main_title'))}}">
										</div>

										<div class="mb-4 col-md-3">
											<label class="form-label">Sub title</label>
											<input type="text" name="setting_about_us_page_sub_title" class="form-control" value="{{old('setting_about_us_page_sub_title',Settings::get('setting_about_us_page_sub_title'))}}">
										</div>
										<div class="mb-4 col-md-12">
											<label class="form-label">Description</label>
											<textarea name="setting_about_us_page_description" class="form-control">{{old('setting_about_us_page_description',Settings::get('setting_about_us_page_description'))}}</textarea>
										</div>

										<div class="row">
											<div class="mb-4 col-md-4">
												<div class="row">
													<div class="col-md-4">
														<label class="form-label" >1st image Size*(255x200)</label>
														<div class="text-center">
															<img src="{{asset('storage/'.Settings::get('setting_about_us_page_image1'))}}" style="max-width:130px;">
														</div>
														<input type="file" name="setting_about_us_page_image1" class="form-control">
													</div>
												</div>
											</div>
											<div class="mb-4 col-md-4">
												<div class="row">
													<div class="col-md-4">
														<label class="form-label" >2nd image Size*(255x200)</label>
														<div class="text-center">
															<img src="{{asset('storage/'.Settings::get('setting_about_us_page_image2'))}}" style="max-width:130px;">
														</div>
														<input type="file" name="setting_about_us_page_image2" class="form-control">
													</div>
												</div>
											</div>
											<div class="mb-4 col-md-4">
												<div class="row">
													<div class="col-md-4">
														<label class="form-label" >3rd image Size*(255x200)</label>
														<div class="text-center">
															<img src="{{asset('storage/'.Settings::get('setting_about_us_page_image3'))}}" style="max-width:130px;">
														</div>
														<input type="file" name="setting_about_us_page_image3" class="form-control">
													</div>
												</div>
											</div>
										</div>
									</div>
									<br><br>
									<h4 class="tab-title">About us "Our Process"(How Does It Work)</h4>
									<div class="row">
										
										<div class="mb-4 col-md-6">
											<div class="row">
												<div class="form-group">
													<label class="form-label" >First icon</label>
													<div class="text-center">
														<img src="{{asset('storage/'.Settings::get('setting_about_us_page_process_fi'))}}" style="max-width:130px;">
													</div>
													<input type="file" name="setting_about_us_page_process_fi" class="form-control">
												</div>
												<div class="form-group">
													<label class="form-label">Title</label>
													<input type="text" name="setting_about_us_page_process_ftitle" class="form-control" value="{{old('setting_about_us_page_process_ftitle',Settings::get('setting_about_us_page_process_ftitle'))}}">
												</div>
												<div class="form-group">
													<label class="form-label">Description</label>
													<textarea rows="4" name="setting_about_us_page_process_fdesc" class="form-control">{{old('setting_about_us_page_process_fdesc',Settings::get('setting_about_us_page_process_fdesc'))}}</textarea>
												</div>
											</div>
										</div>

										<div class="mb-4 col-md-6">
											<div class="row">
												<div class="form-group">
													<label class="form-label" >Second icon</label>
													<div class="text-center">
														<img src="{{asset('storage/'.Settings::get('setting_about_us_page_process_si'))}}" style="max-width:130px;">
													</div>
													<input type="file" name="setting_about_us_page_process_si" class="form-control">
												</div>
												<div class="form-group">
													<label class="form-label">Title</label>
													<input type="text" name="setting_about_us_page_process_stitle" class="form-control" value="{{old('setting_about_us_page_process_stitle',Settings::get('setting_about_us_page_process_stitle'))}}">
												</div>
												<div class="form-group">
													<label class="form-label">Description</label>
													<textarea rows="4" name="setting_about_us_page_process_sdesc" class="form-control">{{old('setting_about_us_page_process_sdesc',Settings::get('setting_about_us_page_process_sdesc'))}}</textarea>
												</div>
											</div>
										</div>

										<div class="mb-4 col-md-6">
											<div class="row">
												<div class="form-group">
													<label class="form-label" >Third icon</label>
													<div class="text-center">
														<img src="{{asset('storage/'.Settings::get('setting_about_us_page_process_ti'))}}" style="max-width:130px;">
													</div>
													<input type="file" name="setting_about_us_page_process_ti" class="form-control">
												</div>
												<div class="form-group">
													<label class="form-label">Title</label>
													<input type="text" name="setting_about_us_page_process_ttitle" class="form-control" value="{{old('setting_about_us_page_process_ttitle',Settings::get('setting_about_us_page_process_ttitle'))}}">
												</div>
												<div class="form-group">
													<label class="form-label">Description</label>
													<textarea rows="4" name="setting_about_us_page_process_tdesc" class="form-control">{{old('setting_about_us_page_process_tdesc',Settings::get('setting_about_us_page_process_tdesc'))}}</textarea>
												</div>
											</div>
										</div>
										<div class="mb-4 col-md-6">
											<div class="row">
												<div class="form-group">
													<label class="form-label" >Fourth icon</label>
													<div class="text-center">
														<img src="{{asset('storage/'.Settings::get('setting_about_us_page_process_foi'))}}" style="max-width:130px;">
													</div>
													<input type="file" name="setting_about_us_page_process_foi" class="form-control">
												</div>
												<div class="form-group">
													<label class="form-label">Title</label>
													<input type="text" name="setting_about_us_page_process_fotitle" class="form-control" value="{{old('setting_about_us_page_process_fotitle',Settings::get('setting_about_us_page_process_fotitle'))}}">
												</div>
												<div class="form-group">
													<label class="form-label">Description</label>
													<textarea rows="4" name="setting_about_us_page_process_fodesc" class="form-control">{{old('setting_about_us_page_process_fodesc',Settings::get('setting_about_us_page_process_fodesc'))}}</textarea>
												</div>
											</div>
										</div>


									</div>
									
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
	
							</div>

							<div class="tab-pane" id="tab-4" role="tabpanel">
								<h4 class="tab-title">Email template text</h4>

								<form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
									@csrf
									
									<div class="row">
										<div class="mb-4 col-md-12">
											<label class="form-label">Aaadining members before one month expiry notification</label>
											<textarea name="setting_email_notification_aaadining_member" class="form-control">{{old('setting_email_notification_aaadining_member',Settings::get('setting_email_notification_aaadining_member'))}}</textarea>
										</div>

										<div class="mb-4 col-md-12">
											<label class="form-label">Aaadining members after expiry notification</label>
											<textarea name="setting_email_notification_aaadining_member_on_expire" class="form-control">{{old('setting_email_notification_aaadining_member_on_expire',Settings::get('setting_email_notification_aaadining_member_on_expire'))}}</textarea>
										</div>

										<div class="mb-4 col-md-12">
											<label class="form-label">Aaadining member welcome email</label>
											<textarea name="setting_email_notification_aaadining_member_wlcm_email" class="form-control">{{old('setting_email_notification_aaadining_member_wlcm_email',Settings::get('setting_email_notification_aaadining_member_wlcm_email'))}}</textarea>
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