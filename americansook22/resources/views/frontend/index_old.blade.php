







<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>::: G P V :::</title>
    <!-- All CSS inclueded in one  -->
    <link href="{{('css/allmix.css')}}" rel="stylesheet" type="text/css">
    <link href="{{('css/slicknav.css')}}" rel="stylesheet" type="text/css">
    <link href="{{('css/style.css')}}" rel="stylesheet" type="text/css">
  </head>
  <body class="body_bg1">
    <!-- Header Start -->
    @include('frontend.layouts.headercategory')
    <!-- Header End -->


    <!--jeep-section1 -->
    <div class="jeep_section">
      <div class="container">
        <div class="row">
          <div class="jeep_head wow bounceInDown" data-wow-delay="0.2s" data-wow-duration="2s">
            <h2>WELCOME GERNAL  PURPOSE <br> MARKET PLACE</h2>
          </div>
        </div>
        <div class="row parts_slider2">
            @foreach($categories as $cat)

          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="overflow_jeep wow bounceIn" data-wow-delay="0.8s" data-wow-duration="2s">
              <div class="jeep-Box">

                <img src="{{url('/Carjeep/public/../storage/app/'.$cat->photo)}}" class="img-fluid"  alt="User Avatar">

                <div class="jeep-BoxText">
                  <a href="product-cat/{{$cat->title}}"> {{$cat->title}}</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
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
