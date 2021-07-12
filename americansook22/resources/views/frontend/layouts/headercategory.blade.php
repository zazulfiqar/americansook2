<header>
    <div class="main_header">
      <div class="container">
        <div class="row flexRow">
          <div class="col-md-3 col-sm-3 col-xs-12 flexCol">
            <div class="main_logo">
              <a href="#"><img alt="img" src="images/logo.png"></a>
            </div>
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="login_div">
                @auth
                    @if(Auth::user()->role=='admin')
                        <a href="{{route('admin')}}" class="btn_red">Dashboard</a>
                    @endif
                    @if((Auth::user()->is_vendor == null || Auth::user()->is_vendor == 0)  && Auth::user()->role=='user')
                        <a href="{{route('user')}}"  class="btn_red">Dashboard</a>
                    @endif
                    @if((Auth::user()->is_vendor != null && Auth::user()->is_vendor != 0 && Auth::user()->is_vendor != 3 && Auth::user()->is_vendor == 1 ) && Auth::user()->role=='user')
                        <a style="cursor: auto"  class="btn_red">Request Sent</a>
                    @elseif((Auth::user()->is_vendor != null && Auth::user()->is_vendor != 0 && Auth::user()->is_vendor == 2 ) && Auth::user()->role=='vendor')
                        <a href="{{route('vendor-dashboard')}}"  class="btn_red">Dashboard</a>
                    @endif
                    <a href="{{route('user.logout')}}"  class="btn_red">Logout</a>
                @else
                    <a href="{{route('login.form')}}" class="btn_red">Login</a> <a
                        href="{{route('register.form')}}"  class="btn_red">Register</a>
                    {{--   sample code                  --}}

                    <form action="{{route('frontpage.lang')}}" method="get" style="float: right">

                        <div class="selCont">
                            {{--        <h2>Pick an Option</h2>--}}
                            <select id="my-dropdown" name="lang">
                                <option value="en" disabled selected>Select Lang</option>
                                <option value="ga">Irish</option>
                                <option value="af">Afrikaans</option>
                                <option value="ar">Arabic</option>
                                <option value="ko">Korean</option>
                                <option value="hi">Hindi</option>
                                <option value="fr">French</option>
                                <option value="es">Spanish</option>

                            </select>


                            <input type="submit" class="btn btn-primary" value="Translate">
                        </div>
                    </form>

                    {{--   sample code ends here --}}
                @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
