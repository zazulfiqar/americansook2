

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Checkout</title>
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
    @include('frontend.layouts.notification')

    @php
    use Stichoza\GoogleTranslate\GoogleTranslate;
     $data_cat_title = GoogleTranslate::trans('Select Category',Session::get('lang'));
     $session=Session::get('lang')
    @endphp

  

    <main class="checkoutPg">
        <form class="form" method="POST" action="{{route('cart.order')}}">
            @csrf
        <!-- checkoutSec start -->
        <section class="checkout">
            <div class="container">
                <div class="body-space">
                    <div class="row">
                        <div class="car-form">
                            <div class="col-md-8">
                                <div class="rightSec">
                                    <h3>

                                        @if(isset($session))
                                                @php
                                                echo $data_cat_title = GoogleTranslate::trans("Billing Address",Session::get('lang'));
                                                @endphp
                                            @else
                                            Billing Address
                                            @endif

                                        
                                    </h3>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans("Country",Session::get('lang'));
                                                    @endphp
                                                @else
                                                Country
                                                @endif
                                                     
                                                    
                                                    <span>*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                                <select class="form-control" id="" name="country">
                                                    <option value="AF" selected="selected">Afghanistan</option>
                                                    <option value="AX">Åland Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="VG">British Virgin Islands</option>
                                                    <option value="BN">Brunei</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos [Keeling] Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo - Brazzaville</option>
                                                    <option value="CD">Congo - Kinshasa</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Côte d’Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong SAR China</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Laos</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macau SAR China</option>
                                                    <option value="MK">Macedonia</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia</option>
                                                    <option value="MD">Moldova</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar [Burma]</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP" >Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="AN">Netherlands Antilles</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="KP">North Korea</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territories</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn Islands</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Réunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russia</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="SH">Saint Helena</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">São Tomé and Príncipe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia</option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syria</option>
                                                    <option value="TW">Taiwan</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="Uk">United Kingdom</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UM">U.S. Minor Outlying Islands</option>
                                                    <option value="VI">U.S. Virgin Islands</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VA">Vatican City</option>
                                                    <option value="VE">Venezuela</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans(" First Name",Session::get('lang'));
                                                    @endphp
                                                @else
                                                First Name
                                                @endif
                                                    <span>*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" name="first_name"  required placeholder="First Name" value="{{old('first_name')}}">
                                                @error('first_name')
                                                    <span class='text-danger'>
                                                        {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans("Last Name ",Session::get('lang'));
                                                    @endphp
                                                @else
                                                Last Name 
                                                @endif
                                                    
                                                <span>*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" placeholder="Last Name"  required type="text" name="last_name" value="{{old('lat_name')}}">
                                                @error('last_name')
                                                    <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans("Address ",Session::get('lang'));
                                                    @endphp
                                                @else
                                                Address
                                                @endif
                                                    
                                                </label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control"  required placeholder="Address 1" type="text" name="address1" value="{{old('address1')}}">
                                                    @error('address1')
                                                        <span class='text-danger'>{{$message}}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans("City ",Session::get('lang'));
                                                    @endphp
                                                @else
                                                City
                                                @endif
                                                    </label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" placeholder="City"  required type="text" name="address2" value="{{old('address2')}}">
                                                @error('address2')
                                                    <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans("Shipping ",Session::get('lang'));
                                                    @endphp
                                                @else
                                                Shipping
                                                @endif
                                                     </label>
                                            </div>
                                            <div class="col-md-9">
                                        @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                        <select name="shipping" class="form-control">
                                            <option value="">
                                                
                                                
                                                @if(isset($session))
                                                @php
                                                echo $data_cat_title = GoogleTranslate::trans("Select your address ",Session::get('lang'));
                                                @endphp
                                            @else
                                            Select your address
                                            @endif
                                            </option>
                                            @foreach(Helper::shipping() as $shipping)
                                            <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ${{$shipping->price}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <span>
                                            @if(isset($session))
                                            @php
                                            echo $data_cat_title = GoogleTranslate::trans("Free ",Session::get('lang'));
                                            @endphp
                                        @else
                                        Free
                                        @endif
                                            
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </div>



                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">
                                                    @if(isset($session))
                                            @php
                                            echo $data_cat_title = GoogleTranslate::trans("Email Address ",Session::get('lang'));
                                            @endphp
                                        @else
                                        Email Address
                                        @endif
                                                     <span>*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" required placeholder="Email Address" type="text" name="email" value="{{old('email')}}">
                                                    @error('email')
                                                        <span class='text-danger'>{{$message}}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans("Phone ",Session::get('lang'));
                                                    @endphp
                                                @else
                                                Phone
                                                @endif
                                                    </label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" placeholder="Phone" type="number" name="phone" required value="{{old('phone')}}">
                                                @error('phone')
                                                    <span class='text-danger'>{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="your-order">
                                <div class="col-md-4">
                                    <div class="cartRight">
                                        <div class="crHead">
                                            <h5>
                                                @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans("Summary ",Session::get('lang'));
                                                    @endphp
                                                @else
                                                Summary
                                                @endif
                                                </h5>
                                        </div>
                                        <div class="crBody">
                                            <ul class="list-unstyled">
                                                @php
                                                    $total_amount=Helper::totalCartPrice();
                                                @endphp
                                                <!--<li>Card Subtotal x 1 <span class="pull-right">${{number_format(Helper::totalCartPrice(),2)}}</span></li>-->
                                                <li>Order Total <span class="pull-right">${{number_format($total_amount,2)}}</span></li>
                                            </ul>
                                            <div class="pay">
                                                <h5>
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans(" Payment Method ",Session::get('lang'));
                                                    @endphp
                                                @else
                                                Payment Method
                                                @endif
                                                    
                                                   </h5>
                                                <div class="line"></div>
                                            </div>
                                        </div>
                                        <div class="crFoot">
                                            <div class="form-group form-check">

                                                <input  name="payment_method" checked  type="radio" value="cod" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans(" Cash On Delivery ",Session::get('lang'));
                                                    @endphp
                                                @else
                                                Cash On Delivery
                                                @endif
                                                   </label>
                                            </div>
                                             <div class="form-group pull-left">
                                                <input name="payment_method"  type="radio" value="paypal" class="form-check-input" id="exampleCheck2">
                                                <label class="form-check-label" for="exampleCheck2">Paypal</label>
                                            </div> 
                                           <img src="images/paypal-1.png"> 
                                            <div class="clearfix"></div>
                                            <div class="place text-center">
                                                <button type="submit" class="webBtn">
                                                    
                                                    @if(isset($session))
                                                    @php
                                                    echo $data_cat_title = GoogleTranslate::trans("Place Order",Session::get('lang'));
                                                    @endphp
                                                @else
                                                Place Order
                                                @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </form>
        <!-- checkoutSec end -->
    </main>

    <div class="imgSec">
        <img src="{{ asset('images/bgImg.jpg') }}" class="img-responsive" alt="bgImg">
    </div>
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



























