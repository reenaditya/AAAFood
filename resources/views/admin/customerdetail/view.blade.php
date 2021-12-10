@extends("admin.layouts.app")
@section('content')

	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3">View Details</h1>

			<div class="row">
				<div class="col-lg-6 col-xl-3 d-flex">
					<div class="card flex-fill text-center">
						<div class="card-header">
							<h5 class="card-title mb-0 mt-2">All Orders</h5>
						</div>
						<div class="card-body my-0 pt-0">
							<div class="row d-flex align-items-center mb-3">
								<div class="col-12">
									<h2 class="mb-0 fw-light">
										<strong>{{ $data['all_order'] ?? 0 }}</strong>
									</h2>
									<a href="{{route('admin.order.index')}}?user_id={{$user->id ?? ''}}" class="btn btn-success">View All Order</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-xl-3 d-flex">
					<div class="card flex-fill text-center">
						<div class="card-header">
							<h5 class="card-title mb-0 mt-2">Pending Orders</h5>
						</div>
						<div class="card-body my-0 pt-0">
							<div class="row d-flex align-items-center mb-3">
								<div class="col-12">
									<h2 class="mb-0 fw-light">
										<strong>{{ $data['pending_order'] ?? 0 }}</strong>
									</h2>
									<a href="{{route('admin.order.new')}}?user_id={{$user->id ?? ''}}" class="btn btn-success">View Pending Orders</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-xl-3 d-flex">
					<div class="card flex-fill text-center">
						<div class="card-header">
							<h5 class="card-title mb-0 mt-2">Completed Orders</h5>
						</div>
						<div class="card-body my-0 pt-0">
							<div class="row d-flex align-items-center mb-3">
								<div class="col-12">
									<h2 class="mb-0 fw-light">
										<strong>{{ $data['complt_order'] ?? 0 }}</strong>
									</h2>
									<a href="{{route('admin.order.completed')}}?user_id={{$user->id ?? ''}}" class="btn btn-success">View Complete Orders</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-xl-3 d-flex">
					<div class="card flex-fill text-center">
						<div class="card-header">
							<h5 class="card-title mb-0 mt-2">Pay On Account Orders</h5>
						</div>
						<div class="card-body my-0 pt-0">
							<div class="row d-flex align-items-center mb-3">
								<div class="col-12">
									<h2 class="mb-0 fw-light">
										<strong>{{ $data['payonacc_order'] ?? 0 }}</strong>
									</h2>
									<a href="{{route('admin.order.completed.payonacc')}}?paymode=poa&user_id={{$user->id ?? ''}}" class="btn btn-success">View Pay On Acc Orders</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				
				<div class="col-lg-6 col-xxl-4">
					<div class="card">
						
						<div class="card-body">
							<h5 class="card-title mb-3">User Details</h5>

							<dl class="row">
								<dt class="col-4 col-xxl-3 mb-0">Name</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									{{ $user->name ?? '' }}
								</dd>

								<dt class="col-4 col-xxl-3 mb-0">Email</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									{{ $user->email ?? '' }}
								</dd>

								<dt class="col-4 col-xxl-3 mb-0">Mobile</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									{{ $user->mobile ?? '---' }}
								</dd>
								@if($user->aaadiningPurchase)
								<dt class="col-4 col-xxl-3 mb-0">Member</dt>
								<dd class="col-8 col-xxl-9 mb-0">
									<strong>Membership Price:- </strong> {{ $user->aaadiningPurchase->price ?? '' }}<br>
									<strong>Membership End On:- </strong> <br>{{ date("D d-M-Y",strtotime($user->aaadiningPurchase->end_at)) ?? '' }}
								</dd>
								@endif

							</dl>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

@endsection

@push('style')

@endpush
@push('script')

@endpush