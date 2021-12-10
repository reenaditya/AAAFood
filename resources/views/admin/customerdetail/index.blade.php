@extends("admin.layouts.app")
@section('content')


<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Customer Details</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Seach User</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<form action="{{route('admin.customer_detail.fetch')}}" method="post">
									@csrf
									<div class="input-group input-group-navbar">
										<input type="hidden" name="usercode" value="">
										<input type="text" class="form-control" name="search" placeholder="Search users…" aria-label="Search" required autocomplete="off">
										<ul class="list-group suggest d-none">
		                                  
		                                </ul>
		                                <button class="btn" type="submit">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search align-middle"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
										</button>
									</div>
									@if(Session::has('errors'))
									<div class="input-group input-group-navbar" style="z-index: 9;">
									 	<label class="text-danger">{{Session::get('errors')->first()}}</label>
									</div>
									@endif
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>	
</main>
@endsection

@push('style')
<style type="text/css">
	ul.suggest{position: absolute;width: inherit;top: 38px;z-index: 9999;}
	ul.suggest li{padding: 6px;}
	ul.suggest li:hover{background-color: #dfdada;color: #000;border-radius: 5px;border: 1px solid #877070;}
</style>
@endpush
@push('script')
{{-- <script type="text/javascript" src="{{asset('js/admin/customer_details.js')}}"></script> --}}
@endpush