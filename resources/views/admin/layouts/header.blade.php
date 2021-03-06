<div class="main">
	<nav class="navbar navbar-expand navbar-light navbar-bg">
		<a class="sidebar-toggle">
			<i class="hamburger align-self-center"></i>
		</a>

		<div class="navbar-collapse collapse">
			<ul class="navbar-nav navbar-align">
				@if(Auth::user()->role==1)
					<li class="nav-item dropdown" style="margin-right: 20px;">
						<button type="button" class="btn btn-info">{{Auth::user()->restaurant->name ?? ''}}</button>
					</li>
				@endif
				@if(Auth::check() && Auth::user()->role==3 && Auth::user()->email_verified_at==null)
				<li class="nav-item dropdown" style="margin-right: 20px;">
					<button class="btn btn-danger delivery-verify-email" data-userid="{{Auth::id()}}" type="button">
						Verify Email
					</button>
				</li>
				@endif
				@if(Auth::check() && Auth::user()->role==3 && Auth::user()->deliveryBoyLocation && Auth::user()->deliveryBoyLocation->status==1)
				<li class="nav-item dropdown" style="margin-right: 20px;">
					<button class="btn btn-success change-delivery-boy-status" data-userid="{{Auth::id()}}" type="button">
						Active
					</button>
				</li>
				@elseif(Auth::check() && Auth::user()->role==3 && Auth::user()->deliveryBoyLocation && Auth::user()->deliveryBoyLocation->status==0)
					<li class="nav-item dropdown" style="margin-right: 20px;">
						<button class="btn btn-danger change-delivery-boy-status" data-userid="{{Auth::id()}}" type="button">
							Not Active
						</button>
					</li>
				@endif
				@if(session()->has('previous_user_id'))
					<li class="nav-item dropdown" style="margin-right: 20px;">
						<a href="{{ route('admin.user.login',session()->get('previous_user_id')) }}" class="btn btn-warning">Back to Admin Panel</a>
					</li>
				@endif
				<li class="nav-item dropdown">
					<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
						<i class="align-middle" data-feather="settings"></i>
					</a>

					<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
						<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded-circle me-1" alt="Chris Wood" /> <span class="text-dark">{{Auth::user()->name ?? ''}}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						{{-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
						<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="pages-settings.html">Settings & Privacy</a> --}}
						<a class="dropdown-item" href="{{url('/')}}">Home</a>
						<a class="dropdown-item" href="javascript:;" onclick="document.getElementById('logout').submit()">Sign out</a>
						<form action="{{ route('logout') }}" method="post" id="logout">@csrf
						</form>
					</div>
				</li>
			</ul>
		</div>
	</nav>