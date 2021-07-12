
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
    @include('frontend.layouts.notification')

    @php
    use Stichoza\GoogleTranslate\GoogleTranslate;
     $data_cat_title = GoogleTranslate::trans('Select Category',Session::get('lang'));
     $session=Session::get('lang')
    @endphp

<!-- Slider Section Starts Here -->
{{-- <div class="innerBanner">
  <div class="container">
    <img src="images/contact.png" alt="img">
  </div>
</div> --}}
<!-- Slider Section Ends Here -->

<!-- cartPg start -->
<main class="cartPg">
  <div class="container">
    <div class="cartHead">
      <div class="row flexRow">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <h2>
            @if(isset($session))
                        @php
                          echo $data_cat_title = GoogleTranslate::trans("Your Cart",Session::get('lang'));
                        @endphp
                    @else
                    Your Cart
                    @endif
            </h2>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <a href="{{route('allProducts')}}"><i class="fa fa-angle-left"></i>
            @if(isset($session))
                        @php
                          echo $data_cat_title = GoogleTranslate::trans("Return to shop",Session::get('lang'));
                        @endphp
                    @else
                    Return to shop
                    @endif
            
          </a>
        </div>
      </div>
    </div>
    <div class="cartTable">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">
                @if(isset($session))
                        @php
                          echo $data_cat_title = GoogleTranslate::trans("Product",Session::get('lang'));
                        @endphp
                    @else
                    Product
                    @endif
                
                </th>
              <th scope="col">
                @if(isset($session))
                        @php
                          echo $data_cat_title = GoogleTranslate::trans("Unit Price",Session::get('lang'));
                        @endphp
                    @else
                    Unit Price
                    @endif
                
              </th>
              <th scope="col">
                @if(isset($session))
                        @php
                          echo $data_cat_title = GoogleTranslate::trans("Quantity",Session::get('lang'));
                        @endphp
                    @else
                    Quantity
                    @endif
                
              </th>
              <th scope="col">
                @if(isset($session))
                        @php
                          echo $data_cat_title = GoogleTranslate::trans("Total",Session::get('lang'));
                        @endphp
                    @else
                    Total
                    @endif
                
              </th>
            </tr>
          </thead>
          <tbody>
            <form action="{{route('cart.update')}}" method="POST">
                @csrf
                @if(Helper::getAllProductFromCart())

                    @foreach(Helper::getAllProductFromCart() as $key=>$cart)
            <tr>
                @php
                                $photo=explode(',',$cart->product['photo']);
                            @endphp
              <td>
                <img src="{{url('/americansook/public/../storage/app/'.$photo[0])}}"  class="img-responsive pull-left cartImg" alt="cart">
                <span><a href="{{route('product-detail',$cart->product_id)}}" target="_blank">{{$cart->product['title']}}</a></span>
              </td>
              <td> ${{number_format($cart['price'],2)}}</td>
              <td>
                <div class="qty-input quantitySec">
                  <button class="qty-count qty-count--minus" data-action="minus" type="button"><i class="fa fa-minus"></i></button>
                  <input type="hidden" name="qty_id[]" value="{{$cart->id}}">
                  <input class="product-qty" type="number" name="quant[{{$key}}]" min="1" max="50" value="{{$cart->quantity}}">
                  <button class="qty-count qty-count--add" data-action="add" type="button"><i class="fa fa-plus"></i></button>
                </div>
              </td>
              <td> ${{$cart['amount']}} </td>
              <td>
                <a class="remove" href="{{route('cart-delete',$cart->id)}}"><i class="fa fa-times"></i></a></td>
            </tr>

            @endforeach

            <track>
                <td></td>
                <td></td>
                <td></td>
            <td class="float-right" colspan="5">
                @if(count(Helper::getAllProductFromCart())>0)

                <button class="btnStyle1" type="submit">
                  @if(isset($session))
                  @php
                    echo $data_cat_title = GoogleTranslate::trans("Update",Session::get('lang'));
                  @endphp
              @else
              Update
              @endif  
                  
                
                </button>
                @else
                @if(isset($session))
                  @php
                    echo $data_cat_title = GoogleTranslate::trans(" Your cart is currently empty.",Session::get('lang'));
                  @endphp
              @else
              Your cart is currently empty.
              @endif 
              
                @endif
            </td>
            </track>
        @endif
</form>

          </tbody>
        </table>
      </div>
    </div>






    {{-- <div class="couponRow">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <form>
            <input type="text" placeholder="Coupon Code">
            <button class="submit">Apply Coupon</button>
          </form>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="updateCart pull-right">
            <a href="#">Update Cart</a>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="cartTotalSec">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="cartTotal">
            <h4>
              @if(isset($session))
                  @php
                    echo $data_cat_title = GoogleTranslate::trans("Cart Total",Session::get('lang'));
                  @endphp
              @else
              Cart Total
              @endif 
              
            
            </h4>
            <table class="table">
              <tbody>
                <tr>
                  {{-- <th>Subtotal</th>
                  <td> ${{number_format(Helper::totalCartPrice(),2)}} </td> --}}
                </tr>
                {{-- <tr>
                  <th scope="row">Shipping</th>
                  <td>
                    <div class="form-group">
                      <input type="radio" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1"> Free Shipping</label>
                    </div>
                    <div class="form-group">
                      <input type="radio" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Flat Rate: <span>$10.00</span></label>
                    </div>
                    <h6>Calculate Shipping</h6>
                    <select name="cars" id="cars">
                      <option value="volvo">Germany</option>
                      <option value="saab">France</option>
                    </select>
                    <select name="cars" id="cars">
                      <option value="volvo">Select an option...</option>
                      <option value="saab">1</option>
                    </select>
                    <input type="text" class="postcode" placeholder="Postcode / ZIP">
                    <button class="update">Update Totals</button>
                  </td>
                </tr> --}}
                <tr>
                  <th>
                    @if(isset($session))
                    @php
                      echo $data_cat_title = GoogleTranslate::trans("Total",Session::get('lang'));
                    @endphp
                @else
                Total
                @endif
                    
                  
                  </th>
                  <td>
                    @if(session()->has('coupon'))
                    ${{number_format(Session::get('coupon')['value'],2)}}
                    @endif
                    @php
                        $total_amount=Helper::totalCartPrice();
                        if(session()->has('coupon')){
                            $total_amount=$total_amount-Session::get('coupon')['value'];
                        }
                    @endphp
                    @if(session()->has('coupon'))
                        ${{number_format($total_amount,2)}}
                    @else
                    ${{number_format($total_amount,2)}}
                    @endif

                </td>
                </tr>
              </tbody>
            </table>
            <a href="{{ asset('checkout') }}"  class="checkoutBtn">
              @if(isset($session))
                    @php
                      echo $data_cat_title = GoogleTranslate::trans("Proceed to checkout",Session::get('lang'));
                    @endphp
                @else
                Proceed to checkout
                @endif
              </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- cartPg end -->

<!-- ourProSec end -->

<!-- imgSec start -->
<div class="imgSec">
  <img src="{{ asset('images/bgImg.jpg') }}" class="img-responsive" alt="bgImg">
</div>


{{-- <div class="success_modal">
    <div class="modal fade" id="exampleModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p>  Page Is Under Development</p>
          </div>
        </div>
      </div>
    </div>
</div> --}}
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
