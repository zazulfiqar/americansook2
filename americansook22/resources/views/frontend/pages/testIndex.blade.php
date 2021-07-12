<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Home</title>
<!-- All CSS -->
<link href="{{asset('css/all.css')}}" rel="stylesheet">
<!-- slicknav CSS -->
<link href="{{asset('css/slicknav.css')}}" rel="stylesheet">
<!-- Style CSS -->
<link href="{{asset('css/custom.css')}}" rel="stylesheet">
<!-- responsive css -->
<link href="{{asset('css/responsive.css')}}" rel="stylesheet">
<!-- Google Fonts CSS -->
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap') }}" rel="stylesheet">
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap') }}" rel="stylesheet">
<link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}">
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap') }}" rel="stylesheet">

</head>

<body class="responsive">

    @include('frontend.layouts.headerNew')
    @include('frontend.layouts.notification')

<!-- Slider Section Starts Here -->

<!-- Slider Section Starts Here -->
@php
  use Stichoza\GoogleTranslate\GoogleTranslate;
   $data_cat_title = GoogleTranslate::trans('Select Category',Session::get('lang'));
   $session=Session::get('lang')
@endphp




<div class="banner">
  <div class="contain">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="fullscreen-bg">
                 <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="{{ asset('images/Ecommerce Promotions - Motion Graphic Animation.mp4')}}" type="video/mp4">
  </video>
                </div>
          <!--<img src="images/slider-img.jpg" alt="img">-->
        </div>
        <!--<div class="item">-->
        <!-- <img src="images/slider-img.jpg" alt="img">-->
        <!--</div>-->
      </div>
    </div>
    <!-- Left and right controls -->
    <!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">-->
    <!-- <span class="fa fa-chevron-left"></span>-->
    <!-- <span class="sr-only">Previous</span>-->
    <!--</a>-->
    <!--<a class="right carousel-control" href="#myCarousel" data-slide="next">-->
    <!-- <span class="fa fa-chevron-right"></span>-->
    <!-- <span class="sr-only">Next</span>-->
    <!--</a>-->
  </div>
</div>
<!-- Slider Section Ends Here -->




<!--<div class="banner">-->
<!--  <div class="container">-->
<!--    <div id="myCarousel" class="carousel slide" data-ride="carousel">-->
<!--      <div class="carousel-inner" role="listbox">-->
<!--        <div class="item active">-->
<!--          <img src="{{asset('images/slider-img.jpg')}}"" alt="img">-->
<!--        </div>-->
<!--        <div class="item">-->
<!--          <img src="{{asset('images/slider-img.jpg')}}"" alt="img">-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
    <!-- Left and right controls -->
<!--    <a class="left carousel-control" href="#myCarousel" data-slide="prev">-->
<!--      <span class="fa fa-chevron-left"></span>-->
<!--      <span class="sr-only">Previous</span>-->
<!--    </a>-->
<!--    <a class="right carousel-control" href="#myCarousel" data-slide="next">-->
<!--      <span class="fa fa-chevron-right"></span>-->
<!--      <span class="sr-only">Next</span>-->
<!--    </a>-->
<!--  </div>-->
<!--</div>-->



<!-- Slider Section Ends Here -->

<!-- categoriesSec start -->
<div class="categoriesSec">
  <div class="container">
    <div class="row">
        @foreach ($category  as $cat )
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="category">
                <a href="{{route('category',$cat->id)}}">
                {{-- <img src="{{asset('images/catBg-4.png')}}" class="img-responsive" alt="catBg"></a> --}}
              <img src="{{url('/americansook/public/../storage/app/'.$cat->photo)}}" class="img-responsive" alt="catBg"></a>

              <!-- <div class="catOverlay">
                <h2>Current Products</h2>
                <img src="{{asset('images/mobile.png')}}" class="img-responsive" alt="cat">
              </div> -->
            </div>
            <div class="catname">
              
                    @if(isset($session))
                        @php
                          echo $data_cat_title = GoogleTranslate::trans("$cat->title",Session::get('lang'));
                        @endphp
                    @else
                      $cat->title
                    @endif
              </div>
          </div>
        @endforeach
        
    </div>
  </div>
</div>
<!-- categoriesSec end -->

<!-- sellerSec start -->
<div class="sellerSec">
  <h2>
    @if(isset($session))
          @php
            echo $data_cat_title = GoogleTranslate::trans("Brands",Session::get('lang'));
          @endphp
      @else
      Brands
      @endif
    </h2>
  <div class="container">
    <ul class="nav nav-tabs">

        @foreach ($brands as $brand)
        
            <li class="{{$loop->index+1 == 1 ? 'active' : '' }}"><a data-toggle="tab" href="#home{{ $brand->id }}">
              @if(isset($session))
          @php
            echo $data_cat_title = GoogleTranslate::trans("$brand->title",Session::get('lang'));
          @endphp
      @else
      $brand->title
      @endif
              </a></li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach ($brands as $brand)
            <div  class="tab-pane fade in {{$loop->index+1 == 1 ? 'active' : '' }}" id="home{{ $brand->id }}">
                <div class="row">
                    @php
                        $productsGet =  DB::table('products')->where('brand_id', $brand->id)->Where('is_approved', 1)
                        ->get();
                    @endphp
                    @foreach ($productsGet as $product_list)
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="product">
                                <a href="{{route('product-detail',$product_list->id)}}">
                            <div class="proImg">
                                <img src="{{url('/americansook/public/../storage/app/'.$product_list->photo)}}" class="img-responsive" alt="proImg">
                            </div>
                            </a>
                            <div class="proCntnt">
                                <h6>
                                  @if(isset($session))
                                    @php
                                      echo $data_cat_title = GoogleTranslate::trans("$product_list->title",Session::get('lang'));
                                    @endphp
                                @else
                                $product_list->title
                                @endif
                                  
                                  
                                
                                
                                </h6>
                                <h4>${{ $product_list->price }}</h4>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
  </div>
</div>
<!-- sellerSec end -->

<!-- ourProSec start -->
<div class="ourProSec">
  <h2>
    @if(isset($session))
    @php
      echo $data_cat_title = GoogleTranslate::trans(" Our Products",Session::get('lang'));
    @endphp
@else
echo  Our Products
@endif
    
   </h2>
  <div class="container">
    <div class="row">
        @foreach ($allproducts as $allproduct)
        <div class="col-md-2 col-sm-2 col-xs-12">
            <div class="product">
                <a href="{{route('product-detail',$allproduct->id)}}">
            <div class="proImg">
                <img src="{{url('/americansook/public/../storage/app/'.$allproduct->photo)}}" class="img-responsive" alt="proImg">
            </div>
            </a>
            <div class="proCntnt">
                <h6>

                  @if(isset($session))
                  @php
                    echo $data_cat_title = GoogleTranslate::trans("$allproduct->title",Session::get('lang'));
                  @endphp
              @else
              echo $allproduct->title
              @endif


                </h6>
                <h4>${{ $allproduct->price }}</h4>
            </div>
            </div>
        </div>
    @endforeach

    </div>
    <a href="{{ asset('allProducts') }}" class="webBtn">
      @if(isset($session))
                  @php
                    echo $data_cat_title = GoogleTranslate::trans("View More",Session::get('lang'));
                  @endphp
              @else
              View More
              @endif
      </a>
  </div>
</div>
<!-- ourProSec end -->

<!-- imgSec start -->
<div class="imgSec">
  <img src="{{asset('images/bgImg.jpg')}}" class="img-responsive" alt="bgImg">
</div>
<!-- imgSec end -->

<!-- footer start -->
@include('frontend.layouts.footerNew')
<!-- footer end -->
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
</body>
</html>
