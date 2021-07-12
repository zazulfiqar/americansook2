
<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>:::  :::</title>
    <!-- All CSS inclueded in one  -->
    <link href="{{asset('css/allmix.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/slicknav.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
  </head>
  <body class="body_bg1">
    <!-- Header Start -->
    <header>
      <div class="main_header">
        <div class="container">
          <div class="row flexRow">
            <div class="col-md-3 col-sm-3 col-xs-12 flexCol">
              <div class="main_logo">
                <a href="index.html"><img alt="img" src="{{asset('images/logo.png')}}"></a>
              </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <!-- <div class="login_div">
                <a href="javascript:void(0)" class="btn_red"><i class="fa fa-user" aria-hidden="true"></i> log in</a>
                <a href="javascript:void(0)">sign up</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header End -->


    <!--login-section -->
    <div class="login_section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12 center">
            <div class="login-Box wow zoomIn" data-wow-delay="0.2s" data-wow-duration="2s">
              <div class="login_head">
                <h2>Sign in.</h2>

              </div>
              <div class="">
                <form class="form" method="post" action="{{route('login.submit')}}">
                    @csrf

                  <div class="col-md-12 col-sm-12 col-xs-12">

                    <input type="text" type="email"  name="email"  value="{{old('email')}}" placeholder="Email or username">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <input type="password" name="password"  required="required" value="{{old('password')}}" placeholder="password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <button type="submit" class="btn_red">log in</button>
                    <!--@if (Route::has('password.request'))-->
                    <!--                <a class="lost-pass" href="{{ route('password.reset') }}">-->
                    <!--                    Forgot Password-->
                    <!--                </a>-->
                    <!--            @endif-->
                                <br>
                                <a href="{{route('register.form')}}" class="btn">Register</a>
                    {{-- <p>Copyright © 1995-2020 GPV NetWorld Inc. All Rights Reserved. <br> Accessibility, User Agreement, Privacy, Cookies, Do not sell <br>my personal information and Ad Choice</p> --}}
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- jeep-section1 -->

    <!-- Js Files Start -->
    <script src="{{asset('js/allmix.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
  </body>
</html>
