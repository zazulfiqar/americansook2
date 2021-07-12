

        <!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>::: G P V :::</title>
    <!-- All CSS inclueded in one  -->
    <link href="{{('../css/allmix.css')}}" rel="stylesheet" type="text/css">
    <link href="{{('../css/slicknav.css')}}" rel="stylesheet" type="text/css">
    <link href="{{('../css/style.css')}}" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Header Start -->
    @include('frontend.layouts.headerProductList')
    <!-- Header End -->


    <!--jeep-section1 -->
    <div class="parts_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="parts_menu wow bounceInDown" data-wow-delay="0.4s" data-wow-duration="2s">
              <ul>
                <li><a href="javascript:void(0)">Brand</a></li>
                <li><a href="javascript:void(0)">Parts</a></li>
                <li><a href="javascript:void(0)">Jeeps</a></li>
                <li><a href="javascript:void(0)">Accessories</a></li>
                <li><a href="javascript:void(0)">Salvage</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="parts_tabsMenu wow bounceInDown" data-wow-delay="0.2s" data-wow-duration="2s">
              <ul>
                <li><a href="javascript:void(0)">Aftermarket</a></li>
               <li><a href="javascript:void(0)">OEM</a></li>
                <li><a href="javascript:void(0)">Salvage</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="parts_slider">
            @if(count($products))
            @foreach($products as $product)

                    @php
                        $photo=explode(',',$product->photo);
                    @endphp
                <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="parts_Box wow zoomIn" data-wow-delay="0.2s" data-wow-duration="2s">

                    <img src="{{url('/Carjeep/public/../storage/app/'.$photo[0])}}" alt="img">
                    {{-- <img src="http://localhost/gpv_net_new_world/public//Carjeep/public/../storage/app/{{$photo[0]}}" alt="img"> --}}
                    <a href="{{route('product-detail',$product->slug)}}">{{$product->slug}}</a>
                </div>
                </div>
            @endforeach
            @endif



          </div>
        </div>
      </div>
    </div>
    <!-- jeep-section1 -->

    <!-- Js Files Start -->
    <script src="{{asset('../js/allmix.js')}}"></script>
    <script src="{{asset('../js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('../js/custom.js')}}"></script>
  </body>
</html>
