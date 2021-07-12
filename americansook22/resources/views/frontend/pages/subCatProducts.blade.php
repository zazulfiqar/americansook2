<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Home</title>
<!-- All CSS -->
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<!-- slicknav CSS -->
<link href="{{ asset('css/slicknav.css') }}" rel="stylesheet">
<!-- Style CSS -->
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<!-- responsive css -->
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
<!-- Google Fonts CSS -->
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap') }}" rel="stylesheet">
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap') }}" rel="stylesheet">
<link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}">
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap') }}" rel="stylesheet">

</head>

<body class="responsive">

    @include('frontend.layouts.headerNew')

    @php
    use Stichoza\GoogleTranslate\GoogleTranslate;
     $data_cat_title = GoogleTranslate::trans('Select Category',Session::get('lang'));
     $session=Session::get('lang')
    @endphp

<div class="ourProSec">
  <h2></h2>
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
                    $allproduct->title
                    @endif
                  
                  </h6>
                <h4>${{ $allproduct->price }}</h4>
            </div>
            </div>
        </div>
    @endforeach

    </div>
    {{-- <a href="#" class="webBtn">View More</a> --}}
  </div>
</div>
<!-- ourProSec end -->

<!-- imgSec start -->
<div class="imgSec">
  <img src="{{asset('images/bgImg.jpg')}}"" class="img-responsive" alt="bgImg">
</div>
<!-- imgSec end -->

<!-- footer start -->
@include('frontend.layouts.footerNew')
<!-- footer end -->

</body>
</html>
