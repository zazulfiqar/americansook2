
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
                  @foreach ($categories as $cats)
                      <li><a href="javascript:void(0)">{{$cats->title}}</a></li>
                  @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="parts_tabsMenu wow bounceInDown" data-wow-delay="0.2s" data-wow-duration="2s">
              <ul>

                  @foreach($product_types as $pro_types )
                      <li><a href="javascript:void(0)">{{$pro_types->title}}</a></li>
                  @endforeach

              </ul>
            </div>
          </div>
        </div>
        <form action="{{route('shop.filter')}}" method="POST">
            @csrf
        <div class="row">
          <div class="parts_slider">
{{--            {{$products}}--}}
            @if(count($products)>0)
                @foreach($products as $product)
                    <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="parts_Box wow zoomIn" data-wow-delay="0.2s" data-wow-duration="2s">

                        @php
                        $photo=explode(',',$product->photo);
                        @endphp
{{--                        <a href="{{route('product-detail',$product->slug)}}">--}}
{{--                             <img src="{{url('/Carjeep/public/../storage/app/'.$data)}}" alt="{{$data}}">--}}
                        <img src="{{url('/Carjeep/public/../storage/app/'.$photo[0])}}" alt="img">
{{--                        {{$product->title}}</a>--}}
{{--                         <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="wishlist" data-id="{{$product->id}}"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                        <div class="product-content">
                             <h3><a href="{{route('product-detail',$product->id)}}">{{$product->title}}</a></h3>
{{--                            @php--}}
{{--                                $after_discount=($product->price-($product->price*$product->discount)/100);--}}
{{--                            @endphp--}}
{{--                            <span>${{number_format($after_discount,2)}}</span>--}}
{{--                            <del style="padding-left:4%;">${{number_format($product->price,2)}}</del>--}}
                        </div>

                    </div>
                    </div>
                @endforeach
            @else
                    <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
            @endif


            </div>

          </div>

        </form>
      </div>
    </div>
    <!-- jeep-section1 -->

    <!-- Js Files Start -->
    <script src="{{asset('js/allmix.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
  </body>
</html>
