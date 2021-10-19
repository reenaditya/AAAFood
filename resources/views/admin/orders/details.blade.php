@extends('admin.layouts.app')
@section('content')

	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3">Order Details</h1>

			<div class="row">
				<div class="col-lg-6 col-xl-3 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0 mt-2">Grand Total</h5>
						</div>
						<div class="card-body my-0 pt-0">
							<div class="row d-flex align-items-center mb-3">
								<div class="col-8">
									<h3 class="d-flex align-items-center mb-0 fw-light">
										${{ $data->grand_total ?? '0.00' }}
									</h3>
								</div>
								<div class="col-4 text-end">
									@if($data->payment_status==2)
										<div class="badge bg-success my-2">PAID</div>
									@else
										<div class="badge bg-warning my-2">Pending</div>
									@endif
								</div>
							</div>

							<div class="progress progress-sm shadow-sm mb-1">
								<div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-xl-3 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0 mt-2">Orders Number</h5>
						</div>
						<div class="card-body my-0 pt-0">
							<div class="row d-flex align-items-center mb-3">
								<div class="col-12">
									<h2 class="d-flex align-items-center mb-0 fw-light">
										{{ $data->order_number ?? '' }}
									</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-xl-3 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0 mt-2">Charges</h5>
						</div>
						<div class="card-body my-0 pt-0">
							<div class="row d-flex align-items-center mb-3">
								<div class="col-12">
									<h4 class="align-items-center mb-0 fw-light">
										<strong>Tax </strong>${{ $data->tax ?? '0.00' }}<br>
										<strong>Shipping </strong>${{ $data->shiping ?? '0.00' }}
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-xl-3 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0 mt-2">Total Discount</h5>
						</div>
						<div class="card-body my-0 pt-0">
							<div class="row d-flex align-items-center mb-3">
								<div class="col-12">
									<h4 class="align-items-center mb-0 fw-light">
										<strong>Item Discount </strong>${{ $data->item_discount ?? '0.00' }}<br>
										<strong>Discount </strong>${{ $data->discount ?? '0.00' }}
										{{-- <strong>Promo </strong>${{ $data->promo ?? '0.00' }}<br> --}}
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-xxl-8">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">Order Details</h5>
							@if($data->order_status <=5)
								<div class="badge bg-info my-2">Order- {{ Config::get('constant.order_status')[$data->order_status]}}</div>
							@elseif($data->order_status == 7)
								<div class="badge bg-success my-2">Order- {{ Config::get('constant.order_status')[$data->order_status]}}</div>
							@elseif($data->order_status == 6)
								<div class="badge bg-danger my-2">Order- {{ Config::get('constant.order_status')[$data->order_status]}}</div>
							@else
								<div class="badge bg-warning my-2">Order- {{ Config::get('constant.order_status')[$data->order_status]}}</div>
							@endif
						</div>
						<div class="card-body pt-0">
							<h5>Customer Email</h5>

							<p class="text-muted">
								{{ $data->email ?? '' }}
							</p>

							<h5>Customer Address</h5>

							<p class="text-muted">
								{{ $data->address ?? '' }}
							</p>

							<h5>Customer Mobile Number</h5>

							<p class="text-muted">
								<a href="tel:{{ $data->mobile ?? '' }}">{{ $data->mobile ?? '' }}</a>
							</p>


							<h5>Customer Note</h5>

							<p class="text-muted">
								{{ $data->note ?? '' }}
							</p>

						</div>
					</div>
				</div>

				<div class="col-lg-6 col-xxl-4">
					<div class="card">
						
						<div class="card-body">
							<h5 class="card-title mb-3">Vendor Details</h5>

							<dl class="row">
								<dt class="col-4 col-xxl-3 mb-0">Name</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									{{ $data->vendor->name ?? '' }}
								</dd>

								<dt class="col-4 col-xxl-3 mb-0">Email</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									{{ $data->vendor->email ?? '' }}
								</dd>

								<dt class="col-4 col-xxl-3 mb-0">Restaurant Name</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									{{ $data->restaurant->name ?? '' }}
								</dd>


								<dt class="col-4 col-xxl-3 mb-0">Restaurant Address</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									{{ $data->restaurant->address ?? '' }}
									{{ $data->restaurant->address2 ?? '' }}
									{{ $data->restaurant->city ?? '' }}, 
									{{ $data->restaurant->state ?? '' }}, 
									{{ $data->restaurant->country ?? '' }}
								</dd>
								
								@if($data->restaurant->website)
								<dt class="col-4 col-xxl-3 mb-0">Restaurant Website</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									{{ $data->restaurant->website ?? '' }}
								</dd>
								@endif

							</dl>

							<hr />
							<h5 class="card-title mb-3">Delivery Boy Details</h5>
							@if($data->delivery_type==1)
							<dl class="row">
								<dt class="col-4 col-xxl-3 mb-0">Name</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									<p class="mb-0">{{ $data->deliveryUser->name ?? '' }}</p>
								</dd>


								<dt class="col-4 col-xxl-3 mb-0">Email</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									{{ $data->deliveryUser->email ?? '' }}
								</dd>

								<dt class="col-4 col-xxl-3">City</dt>
								<dd class="col-8 col-xxl-9">
									<p class="mb-1">{{ $data->deliveryUser->deliveryBoyLocation->city ?? '' }}</p>
								</dd>

								<dt class="col-4 col-xxl-3">Phone Number</dt>
								<dd class="col-8 col-xxl-9">
									<p class="mb-1"> <a href="tel:{{ $data->deliveryUser->mobile ?? '' }}">{{ $data->deliveryUser->mobile ?? '' }}</a> </p>
								</dd>
							</dl>
							@else
							<div class="badge bg-info">Order Pick by Customer</div>
							@endif
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-xxl-12"><h4>Order Items List</h4></div>
				<div class="col-lg-12 col-xxl-12">
					<div class="row">
						@foreach($data->orderItem as $kii=>$val)
                         
						<div class="col-12 col-md-6 col-lg-3">
							<div class="card">

								<img class="card-img-top" src="{{ asset('storage/'.$val->menuItem->image) }}" alt="Unsplash" style="width: 100%;height: 150px;">

								<div class="card-header px-4 pt-4">
									<h5 class="card-title mb-0">{{ $val->menuItem->name ?? '' }}</h5>
								</div>
								<div class="card-body px-4 pt-2">
									<p class="text-light-white"><strong>Quantity:</strong> <span class="dish-qunt">{{ $val->quantity ?? '' }}</span>.</p>
									<p class="text-light-white"><strong>Order Unit:</strong> <span class="dish-qunt">{{ $val->unit ?? '' }}</span>.</p>
									<p class="text-light-white"><strong>Order Price:</strong> <span class="dish-qunt">{{ $val->price ?? '' }}</span>.</p>
								</div>
							</div>
						</div>

						@endforeach
					</div>	
				</div>

				@if(Auth::user()->role==3 && $data->deliveryUser)
				<div class="col-lg-12 col-xxl-12">
					<h1 class="h3 mb-3">Messages to customer</h1>

					<div class="card">
						<div class="row g-0">
							<div class="col-12 col-lg-12 col-xl-12">
								<div class="py-2 px-4 border-bottom d-none d-lg-block">
									<div class="d-flex align-items-start align-items-center py-1">
										<div class="position-relative">
											<img src="img/avatars/avatar-3.jpg" class="rounded-circle me-1" alt="Bertha Martin" width="40" height="40">
										</div>
										<div class="flex-grow-1 ps-3">
											<strong>{{ $data->user->name ?? ''}}</strong>
										</div>
										
									</div>
								</div>

								<div class="position-relative">
									<div class="chat-messages p-4">
										@if($data->chats!=null && !$data->chats->isEmpty())
										@foreach($data->chats as $key=>$val)
											@if($val->sender_id==Auth::id())
											<div class="chat-message-right pb-4">
												<div>
													<img src="img/avatars/avatar.jpg" class="rounded-circle me-1" alt="Chris Wood" width="40" height="40">
												</div> 	
												<div class="flex-shrink-1 border rounded py-2 px-3 me-3">
													<div class="fw-bold mb-1">You</div>
													{{ $val->message ?? '' }}
												</div>
											</div>
											@else
												<div class="chat-message-left pb-4">
													<div>
														<img src="img/avatars/avatar-3.jpg" class="rounded-circle me-1" alt="Bertha Martin" width="40" height="40">
													</div>
													<div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
														<div class="fw-bold mb-1">{{ $data->user->name ?? '' }}</div>{!! $val->message ?? '' !!}
													</div>
												</div>
											@endif
										@endforeach
										@endif


									</div>
								</div>

								<div class="flex-grow-0 py-3 px-4 border-top">
									<form action="{{route('chat.message')}}" method="post">
									@csrf
									<div class="input-group">
										<input type="text" name="message" class="form-control" placeholder="Type your message" required="">
										<input type="hidden" name="sender_id" value="{{Auth::id() ?? ''}}">
										<input type="hidden" name="reciver_id" value="{{$data->user_id ?? ''}}">
										<input type="hidden" name="order_id" value="{{$data->id ?? ''}}">
										<button class="btn btn-primary">Send</button>
									</div>
									</form>
								</div>

							</div>
						</div>
					</div>

				</div>
				@endif
				<div class="col-lg-12 col-xxl-12"><h4>Admin Comment</h4></div>
				@if(Auth::check() && Auth::user()->role==2)
				<div class="col-lg-12 col-xxl-12">
					<form action="{{url('admin/order/post-comment')}}" method="post">
						@csrf
						@if(Session::has('error'))
						<div class="alert alert-warning alert-dismissible fade show p-2" role="alert">
						  <strong>Error! </strong> {{ Session::get('error') }}
						</div>
						@endif
						@if(Session::has('success'))
						<div class="alert alert-success alert-dismissible fade show p-2" role="alert">
						  <strong>Success! </strong>{{Session::get('success')}}
						</div>
						@endif

						<input type="hidden" name="order_id" value="{{$data->id ?? ''}}">
						<div class="form-group">
							<textarea name="admin_comment" class="form-control" id="admin_comment" placeholder="add comment here...">{!! $data->admin_comment ?? '' !!}</textarea>
						</div>
						<div class="form-group mt-2">
							<button type="submit" class="btn btn-info">Post comment</button>
						</div>
					</form>
				</div>
				@else
				<div class="col-lg-12 col-xxl-12">
					{!! $data->admin_comment ?? '' !!}
				</div>
				@endif
			</div>

		</div>
	</main>

@endsection
@push('script')
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script>
        CKEDITOR.replace( 'admin_comment' );
	</script>
@endpush