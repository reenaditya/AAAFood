<input type="hidden" value="{{Auth::id() ?? ''}}" class="check-auth-id">
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item @if(request()->is('/')) active @endif">
                                <a class="nav-link" href="{{url('/')}}">{{ Settings::get('general_setting_top_header_home') }}</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('webiste.aboutus')) active @endif">
                                <a class="nav-link" href="{{route('webiste.aboutus')}}">{{ Settings::get('general_setting_top_header_about') }}</a>
                            </li>
                            @auth
                            @if(Auth::user()->aaadiningPurchase==null)
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('stripe.buycard.post')) active @endif" href="{{route('stripe.buycard.post')}}">{{ Settings::get('general_setting_top_header_aaadining_club') }}</a>
                            </li>
                            @endif
                            @endauth
                            @if(!Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">{{ Settings::get('general_setting_top_header_aaadining_club') }}</a>
                            </li>
                            @endif
                            <li class="nav-item @if(request()->routeIs('webiste.bussiness.account')) active @endif">
                                <a class="nav-link" href="{{route('webiste.bussiness.account')}}">{{ Settings::get('general_setting_top_header_restaurant_account') }}</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('webiste.delivery.account')) active @endif">
                                <a class="nav-link" href="{{route('webiste.delivery.account')}}">{{ Settings::get('general_setting_top_header_catering_acc') }}</a>
                            </li>
                            @if(Auth::check() && Auth::user()->role ===4)
                            <li class="nav-item @if(request()->routeIs('webiste.order.history')) active @endif">
                                <a class="nav-link" href="{{route('webiste.order.history')}}">{{ Settings::get('general_setting_top_header_order_history') }}</a>
                            </li>
                            @endif
                        </ul>
                        @guest
                        <div class="my-2 my-lg-0">
                            <a href="{{ route('login') }}" class="btn my-2 my-sm-0">Sign In</a>
                            <a href="{{ route('register') }} " class="btn my-2 my-sm-0">Sign Up</a>
                        </div>
                        @endguest
                        @auth
                        <div class="my-2 my-lg-0">

                            <div class="dropdown show">
                              <a class="btn my-2 my-sm-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name ?? 'User' }}
                              </a>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @if(Auth::user()->role==4)
                                    <a class="dropdown-item" href="{{route('webiste.order.history')}}">Orders</a>
                                @else
                                    <a class="dropdown-item" href="{{route('admin.dashboard.index')}}">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="javascript:;"  onclick="document.getElementById('logout').submit()">Sign Out</a>
                                <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
                              </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                </nav> 
            </div>
        </div>
    </div>
</header>