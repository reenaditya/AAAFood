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
                                <a class="nav-link" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('webiste.aboutus')) active @endif">
                                <a class="nav-link" href="{{route('webiste.aboutus')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Buy the AAAdining Club Card</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('webiste.bussiness.account')) active @endif">
                                <a class="nav-link" href="{{route('webiste.bussiness.account')}}">Create a business account</a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('webiste.delivery.account')) active @endif">
                                <a class="nav-link" href="{{route('webiste.delivery.account')}}">Create a Delivery account</a>
                            </li>
                            @if(Auth::check() && Auth::user()->role ===4)
                            <li class="nav-item @if(request()->routeIs('webiste.order.history')) active @endif">
                                <a class="nav-link" href="{{route('webiste.order.history')}}">Your Orders</a>
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
                            <a href="javascript:;"  onclick="document.getElementById('logout').submit()" class="btn my-2 my-sm-0">Sign Out</a>
                            <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
                        </div>
                        @endauth
                    </div>
                </nav> 
            </div>
        </div>
    </div>
</header>