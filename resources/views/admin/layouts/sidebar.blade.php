<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('admin.dashboard.index') }}">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z"/>
            <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z"/>
            <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z"/>
          </svg>
    
          <span class="align-middle me-3">Food Delivery</span>
        </a>

				<ul class="sidebar-nav">
					
				
					<li class="sidebar-item {{Request::routeIs('admin.dashboard.*')?'active':''}}">
						<a data-bs-target="#dashboard" class="sidebar-link {{Request::routeIs('admin.dashboardd.*')?'':'collapsed'}}" href="{{ route('admin.dashboard.index') }}">
							<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Dashboard</span>
          	</a>
					</li>
					@if(Auth::check() && Auth::user()->role===2)
					<li class="sidebar-item {{Request::routeIs('admin.user.*')?'active':''}}">
						<a class="sidebar-link {{Request::routeIs('admin.user.*')?'':'collapsed'}}" href="{{ route('admin.user.index') }}">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
             </a>
					</li>
					@endif
					@if(Auth::check() && Auth::user()->role===2)
					<li class="sidebar-item {{Request::routeIs('admin.cuisine.*')?'active':''}}">
						<a data-bs-target="#cuisine" class="sidebar-link {{Request::routeIs('admin.cuisine.*')?'':'collapsed'}}" href="{{ route('admin.cuisine.index') }}">
              			<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Cuisine</span>
              	
            			</a>
					</li>
					@endif
					
					@if(Auth::check() && Auth::user()->role===2 || Auth::user()->role===1)
					<li class="sidebar-item {{Request::routeIs('admin.restaurant.*')?'active':''}}">
						<a data-bs-target="#restaurant" class="sidebar-link {{Request::routeIs('admin.restaurant.*')?'':'collapsed'}}" href="{{ route('admin.restaurant.index') }}">
              			<i class="align-middle" data-feather="archive"></i> <span class="align-middle">Restaurant</span>
              	
            			</a>
					</li>
					@endif

					@if(Auth::check() && Auth::user()->role===2)
					<li class="sidebar-item {{Request::routeIs('admin.restaurant_request.*')?'active':''}}">
						<a class="sidebar-link {{Request::routeIs('admin.restaurant_request.*')?'':'collapsed'}}" href="{{ route('admin.restaurant_request.index') }}">
              			<i class="align-middle" data-feather="bell"></i> <span class="align-middle">Restaurant Request</span>
              	
            			</a>
					</li>
					@endif

					@if(Auth::check() && Auth::user()->role===2)
					<li class="sidebar-item {{Request::routeIs('admin.setting.*')?'active':''}}">
						<a class="sidebar-link {{Request::routeIs('admin.setting.*')?'':'collapsed'}}" href="{{ route('admin.setting.index') }}">
              			<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Setting</span>
              	
            			</a>
					</li>
					@endif

					@if(Auth::check() && Auth::user()->role==1 || Auth::user()->role==3)
					
					<li class="sidebar-item {{Request::routeIs('admin.order.*')?'active':''}}">
						<a data-bs-target="#orders" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Manage Orders</span>
            </a>
						<ul id="orders" class="sidebar-dropdown list-unstyled collapse {{Request::routeIs('admin.order.*') ? 'show':''}}" data-bs-parent="#sidebar">
							
							<li class="sidebar-item {{Request::routeIs('admin.order.new')?'active':''}}"><a class="sidebar-link" href="{{route('admin.order.new')}}">Pending orders</a></li>
							
							@if(Auth::check() && Auth::user()->role==1)		
							<li class="sidebar-item {{Request::routeIs('admin.order.index')?'active':''}}"><a class="sidebar-link" href="{{route('admin.order.index')}}">All orders</a></li>
							@endif

							<li class="sidebar-item {{Request::routeIs('admin.order.completed')?'active':''}}"><a class="sidebar-link" href="{{route('admin.order.completed')}}">Completed orders</a></li>

							@if(Auth::check() && Auth::user()->role==3)		
							<li class="sidebar-item {{Request::routeIs('admin.order.db.history')?'active':''}}"><a class="sidebar-link" href="{{route('admin.order.db.history')}}">Orders history</a></li>
							@endif

						</ul>
					</li>

					@endif

					@if(Auth::check() && Auth::user()->role===1)

					<li class="sidebar-item {{Request::routeIs('admin.menu_group.*') || Request::routeIs('admin.menu_item.*') || Request::routeIs('admin.menu_quantity_group.*') || Request::routeIs('admin.menu_item_price_quantity.*') ?'active':''}}">
						<a data-bs-target="#menu" data-bs-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Menu</span>
            </a>
						<ul id="menu" class="sidebar-dropdown list-unstyled collapse {{Request::routeIs('admin.menu_group.*') || Request::routeIs('admin.menu_item.*') || Request::routeIs('admin.menu_quantity_group.*') || Request::routeIs('admin.menu_item_price_quantity.*') ? 'show':''}}" data-bs-parent="#sidebar">
							
							<li class="sidebar-item {{Request::routeIs('admin.menu_group.*')?'active':''}}"><a class="sidebar-link" href="{{route('admin.menu_group.index')}}">Menu group</a></li>
							
							<li class="sidebar-item {{Request::routeIs('admin.menu_quantity_group.*')?'active':''}}"><a class="sidebar-link" href="{{route('admin.menu_quantity_group.index')}}">Menu quantity group</a></li>
							
							<li class="sidebar-item {{Request::routeIs('admin.menu_item.*')?'active':''}}"><a class="sidebar-link" href="{{route('admin.menu_item.index')}}">Menu item</a></li>
							
							
							{{-- <li class="sidebar-item {{Request::routeIs('admin.menu_item_price_quantity.*')?'active':''}}"><a class="sidebar-link" href="{{route('admin.menu_item_price_quantity.index')}}">Menu item price on quantity group</a></li> --}}

						</ul>
					</li>
					@endif

				</ul>			
		</nav>