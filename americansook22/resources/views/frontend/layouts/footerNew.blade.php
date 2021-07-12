@php
use Stichoza\GoogleTranslate\GoogleTranslate;
$data_cat_title = GoogleTranslate::trans('What are you looking for',Session::get('lang'));
$session=Session::get('lang')
@endphp



<footer>
    <div class="container-fluid">
      <div class="upperRow">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="footerCntnt ">
                  <h6>
                    @if(isset($session))
                    @php
                      echo $data_cat_title = GoogleTranslate::trans('About Us',Session::get('lang'));
                    @endphp
                  @else
                  About Us
                @endif


                  </h6>
                  <p>
                    @if(isset($session))
                    @php
                    echo $data_cat_title = GoogleTranslate::trans("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged",Session::get('lang'));
                    @endphp
                  @else
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                @endif
                    
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="footerCntnt ">
                  <h6>
                    @if(isset($session))
                    @php
                      echo $data_cat_title = GoogleTranslate::trans('24/7 Customer Support',Session::get('lang'));
                    @endphp
                  @else
                  24/7 Customer Support
                @endif
                    
                    </h6>
                  <p>
                    @if(isset($session))
                    @php
                    echo $data_cat_title = GoogleTranslate::trans("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged",Session::get('lang'));
                    @endphp
                  @else
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                @endif
                    
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="footerCntnt bottomCntct">
                  <h6>
                    @if(isset($session))
                    @php
                    echo $data_cat_title = GoogleTranslate::trans("My Account",Session::get('lang'));
                    @endphp
                  @else
                  My Account
                @endif
                    </h6>
                  <ul>
                    <li><a href="#">Shopping cart</a></li>
                    <li><a href="#">Checkout</a></li>
                    <li><a href="#">Careers</a></li>
                  </ul>
                </div>
            </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="footerCntnt bottomCntct">
              <h6>Contact</h6>
              <ul>
                <li>Address:6197 Sven Garden Apt. 172 United State</li>
                <li><a href="mailto:dummy@dummy.com">Email:dummy@dummy.com</a></li>
                <li><a href="tel:123456789">Phone:+123456789</a></li>
              </ul>
            </div>
            <div class="footerCntnt">
                <ul class="socialIcons list-inline">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <ul class="list-inline paymentList">
                  <li><a href="#"><img src="{{asset('images/icon-1.png')}}" class="img-responsive" alt="icon"></a></li>
                  <li><a href="#"><img src="{{asset('images/icon-2.png')}}" class="img-responsive" alt="icon"></a></li>
                  <li><a href="#"><img src="{{asset('images/icon-3.png')}}" class="img-responsive" alt="icon"></a></li>
                </ul>
                <div class="footerLogo">
                  <a href="index.html">
                    <img src="{{asset('images/logo.png')}}" class="img-responsive" alt="logo">
                  </a>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="lowerRow">
        <div class="row">

          <div class="col-md-3 col-sm-3 col-xs-12">

          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="bottomRow">
    <div class="container-fluid">
      <p><i class="fa fa-copyright"></i>2021 American Sooq. All Rights Reserved.</p>
    </div>
  </div>
  <!-- bottomRow end -->

  </body>

  <!-- All JS -->
  <script src="{{ asset('js/all.js') }}"></script>
  <!-- jquery.slicknav JS -->
  <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
  <!-- Custom JS -->
  <script src="{{ asset('js/custom.js') }}"></script>
