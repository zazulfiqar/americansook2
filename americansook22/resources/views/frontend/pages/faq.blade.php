<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>FAQ's</title>
<!-- All CSS -->
<link href="css/all.css" rel="stylesheet">
<!-- slicknav CSS -->
<link href="css/slicknav.css" rel="stylesheet">
<!-- Style CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- responsive css -->
<link href="css/responsive.css" rel="stylesheet">
<!-- Google Fonts CSS -->
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap') }}" rel="stylesheet">
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap') }}" rel="stylesheet">
<link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}">
<link href="{{ asset('https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap') }}" rel="stylesheet">

</head>

<body class="responsive">

    @include('frontend.layouts.headerNew')

<!-- Slider Section Starts Here -->
<div class="innerBanner">
  <div class="container">
    <img src="{{asset('images/faq.png')}}" alt="img">
  </div>
</div>
<!-- Slider Section Ends Here -->

<!-- faqPg start -->
<main class="faqPg">
  <div class="faqSec">
    <div class="container">
      <div class="accordion_container">
        <div class="faqDiv">
          <div class="accordion_head">Lorem Ipsum is simply dummy text of the printing and typesetting industry<span class="plusminus">+</span></div>
          <div class="accordion_body" style="display: none;">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>
        </div>
        <div class="faqDiv">
          <div class="accordion_head">Lorem Ipsum is simply dummy text of the printing and typesetting industry<span class="plusminus">+</span></div>
          <div class="accordion_body" style="display: none;">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>
        </div>
        <div class="faqDiv">
          <div class="accordion_head">Lorem Ipsum is simply dummy text of the printing and typesetting industry<span class="plusminus">+</span></div>
          <div class="accordion_body" style="display: none;">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>
        </div>
        <div class="faqDiv">
          <div class="accordion_head">Lorem Ipsum is simply dummy text of the printing and typesetting industry<span class="plusminus">+</span></div>
          <div class="accordion_body" style="display: none;">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>
        </div>
        <div class="faqDiv">
          <div class="accordion_head">Lorem Ipsum is simply dummy text of the printing and typesetting industry<span class="plusminus">+</span></div>
          <div class="accordion_body" style="display: none;">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>
        </div>
        <div class="faqDiv">
          <div class="accordion_head">Lorem Ipsum is simply dummy text of the printing and typesetting industry<span class="plusminus">+</span></div>
          <div class="accordion_body" style="display: none;">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>
        </div>
        <div class="faqDiv">
          <div class="accordion_head">Lorem Ipsum is simply dummy text of the printing and typesetting industry<span class="plusminus">+</span></div>
          <div class="accordion_body" style="display: none;">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
<!-- faqPg end -->

<!-- ourProSec end -->

<!-- imgSec start -->
<div class="imgSec">
  <img src="{{asset('images/bgImg.jpg')}}" class="img-responsive" alt="bgImg">
</div>
<!-- imgSec end -->

<!-- footer start -->
@include('frontend.layouts.footerNew')

</body>
</html>
