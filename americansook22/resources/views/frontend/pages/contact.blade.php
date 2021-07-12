<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Contact</title>
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
    <img src="{{ ('images/contact.png') }}" alt="img">
  </div>
</div>
<!-- Slider Section Ends Here -->

<!-- contactPg start -->
<main class="contactPg">
  <div class="contactSec">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="contactDet">
            <div class="contactHead">
              <h2>Contact</h2>
            </div>
            <ul>
              <li>
                <h6>Address:</h6>
                <p>6197 Sven Garden Apt. 172, United State</p>
              </li>
              <li>
                <h6>Email:</h6>
                <a href="#">dummy@dummy.com</a>
              </li>
              <li>
                <h6>Phone</h6>
                <a href="#">+123456789</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="contactForm">
            <div class="contactHead">
              <h2>Get a Qoute</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <form>
              <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" required="">
              </div>
              <div class="form-group">
                <label>Last Name:</label>
                <input type="text" class="form-control" required="">
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" required="">
              </div>
              <div class="form-group">
                <label>Note:</label>
                <textarea rows="7"></textarea>
              </div>
              <button class="webBtn" class="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- contactPg end -->

<!-- ourProSec end -->

<!-- imgSec start -->
<div class="imgSec">
  <img src="{{ asset('images/bgImg.jpg') }}" class="img-responsive" alt="bgImg">
</div>
<!-- imgSec end -->

<!-- footer start -->
@include('frontend.layouts.footerNew')

</body>
</html>
