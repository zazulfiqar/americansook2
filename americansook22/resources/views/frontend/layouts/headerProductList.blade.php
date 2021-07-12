<header>
    <div class="main_header header2">
      <div class="container">
        <div class="row flexRow">
          <div class="col-md-3 col-sm-3 col-xs-12 flexCol">
            <div class="main_logo">
              <a href="#"><img alt="img" src="{{('../images/logo.png')}}"></a>
            </div>
          </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="login_div">
                        <a href="javascript:void(0)">
                            {{ Session::get('user') }}
                            <span><i class="fa fa-user" aria-hidden="true"></i></span></a>
                            <a href="{{url('cart')}}"> {{Helper::cartCount()}}<span>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
                            @auth
                                @if(Auth::user()->role=='admin')
                                    <a href="{{route('admin')}}">Dashboard</a>
                                @endif
                                @if((Auth::user()->is_vendor == null || Auth::user()->is_vendor == 0)  && Auth::user()->role=='user')
                                    <a href="{{route('user')}}">Dashboard</a>
                                @endif
                                @if((Auth::user()->is_vendor != null && Auth::user()->is_vendor != 0 && Auth::user()->is_vendor != 3 && Auth::user()->is_vendor == 1 ) && Auth::user()->role=='user')
                                    <a style="cursor: auto">Request Sent</a>
                                @elseif((Auth::user()->is_vendor != null && Auth::user()->is_vendor != 0 && Auth::user()->is_vendor == 2 ) && Auth::user()->role=='vendor')
                                    <a href="{{route('vendor-dashboard')}}">Dashboard</a>
                                @endif
                                <a href="{{route('user.logout')}}">Logout</a>
                                @else
                                    <a href="{{route('login.form')}}">Login </a> <a
                                        href="{{route('register.form')}}">Register</a>
                            @endauth



                    </div>
        </div>
      </div>
    </div>
  </header>
