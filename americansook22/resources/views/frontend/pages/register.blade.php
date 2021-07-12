<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>::: G P V :::</title>
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
                <h2>Sign up.</h2>

              </div>
              <div class="">
                <form class="form" method="post" action="{{route('register.submit')}}">
                    @csrf
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="text"  id="exampleInputEmail1" name="name" placeholder="what’s your handle? (username that is)" required="required" value="{{old('name')}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <input type="text" name="email"  id="exampleInputPassword1" placeholder="We just need an email address." required="required" value="{{old('email')}}">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                <input type="password" name="password" placeholder="oh, need a password" required="required" value="{{old('password')}}" placeholder="oh, need a password"  id="exampleInputEmail1">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                <input type="password" name="password_confirmation"  required="required" value="{{old('password_confirmation')}}"  id="exampleInputPassword1" placeholder="sure, just confirm your password,">
                                @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
{{--
                                <div class="form-group">

                                    <select name="is_vendor"  id="exampleInputPassword1">
                                        <option value="0" >User</option>
                                        <option value="1">Vendor</option>
                                    </select>
                                </div> --}}



                                <span>&</span>
                    <button type="submit" class="btn_red">Submit</button>

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
