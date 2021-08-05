@extends("admin.layouts.app")
@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3">Update Menu Item</h1>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('admin.menu_item.update',$menu_item->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								
								<div class="mb-4 col-md-4">
									<label class="form-label" >Name</label>
									<input type="text" name="name" class="form-control" placeholder="enter menu item name"  value="{{ old('name',$menu_item->name) }}">
									@error('name')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>

								<div class="mb-4 col-md-4">
									<label class="form-label" >Estimated time</label>
									<input type="number" min="0" name="estimated_time" class="form-control" placeholder="enter estimated time(in minutes)"  value="{{ old('estimated_time',$menu_item->estimated_time) }}">
									@error('estimated_time')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>

								<div class="mb-4 col-md-4">
									<label class="form-label" >Discount</label>
									<input type="number" min="0" name="discount" class="form-control" placeholder="enter discount"  value="{{ old('discount',$menu_item->discount) }}">
									@error('discount')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="mb-4 col-md-4">
									<label class="form-label" >Discount type</label>
									<select class="form-control" name="discount_type" >
										<option value="1" @if($menu_item->discount_type==1) selected="" @endif>Price</option>
										<option value="2" @if($menu_item->discount_type==2) selected="" @endif>Percent(%)</option>
									</select>
									
									@error('status')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								
								<div class="mb-4 col-md-4">
									<label class="form-label" >Status</label>
									<select class="form-control" name="status" >
										<option value="1" @if($menu_item->status==1) selected="" @endif>Active</option>
										<option value="0" @if($menu_item->status==0) selected="" @endif>Inactive</option>
									</select>
									
									@error('status')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>

								<div class="mb-4 col-md-4">
									<label class="form-label">Menu group name</label>
									<select class="form-control" name="menu_group_id" >
										<option value="">Select</option>
										@foreach($group as $val)
										<option value="{{$val->id}}"  @if($menu_item->menu_group_id==$val->id) selected="" @endif>{{$val->name}}</option>
										@endforeach
									</select>
									@error('menu_group_id')
										<span class="text-danger">{{$message}} </span>
									@enderror
								</div>
								<div class="row append-menu-group-quantity">
									@if(!$menu_item->menu_price->isEmpty())
									@foreach($menu_item->menu_price as $val)
										<div class="mb-4 col-md-4">
											<input type="hidden" name="mqg_id[]" value="{{$val->pivot->menu_quantity_group_id}}">
											<label class="form-label">{{ $val->name ?? ''}}</label>
											<input type="number" name="price[]" class="form-control" value="{{ $val->pivot->price ?? ''}}">
										</div>
									@endforeach
									@endif
								</div>
								
								<div class="mb-4 col-md-4">
									<label class="form-label" >Image</label>
									<input type="file" class="form-control" name="image" old="{{ old('image')  }}">
									@error('image')
										<span class="text-danger">{{$message}} </span>
									@enderror
									<div>
										<img class="img-fluid" src="{{asset('storage/'.$menu_item->image)}}" alt="menu item image" style="width: auto;height: 100px;">
									</div>
								</div>

							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			
		</div>

	</div>
</main>
@endsection
@push('script')
	<script type="text/javascript" src="{{asset('js/admin/menu_item.js')}}"></script>
	<script type="text/javascript">
		@if (Session::has('success'))
			
			Swal.fire({
	  			icon: 'success',
	  			title: '{{ Session::get('success')}} '
			})

		@endif
		@if (Session::has('error'))
			
			Swal.fire({
	  			icon: 'error',
	  			title: '{{ Session::get('error')}} ',
			})	

		@endif
		
	</script>
@endpush