@php
  use Stichoza\GoogleTranslate\GoogleTranslate;
   $data_cat_title = GoogleTranslate::trans('What are you looking for',Session::get('lang'));
   $session=Session::get('lang')
@endphp

<style>
  select#my-dropdown {
    border-radius: 10px;
    font-size: 16px;
    /* margin-top: 10px; */
}
input.btn_translate {
    background-color: #72727200;
    border-radius: 10px;
    font-size: 13px;
    border: 1px solid white;
    color: white;
}
</style>


<header>
  <div class="logoBar">
    <div class="row flexRow">
      <div class="col-md-2 col-sm-3 col-xs-12">
        <div class="logoSec">
          <a href="{{ asset('/') }}">
            <img src="{{asset('images/logo.png')}}" class="img-responsive" alt="logo">
          </a>
        </div>
      </div>
      <div class="col-md-7 col-sm-6 col-xs-12">
        <div class="SearchSec">

          <form>
            <input type="text" placeholder="{{$data_cat_title}}">
            <button><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="languageSec">
          <ul class="list-inline">
            <li>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img src="{{asset('images/icon-4.png')}}"> <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
              </ul>
            </li>
            <li>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img src="{{asset('images/icon-5.png')}}"> <span class="caret"></span>
              </button>

              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
              </ul>
            </li>
            <li>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img src="{{asset('images/icon-6.png')}}"> <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <!-- <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li> -->
              </ul>
            </li>
            <li>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img src="{{asset('images/user.png')}}"> <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">

                @auth
                <li>
                  @if(Auth::user()->role=='admin')
                  <a href="{{route('admin')}}">Dashboard</a>
                  @endif
                </li>

                <li>
                  @if((Auth::user()->is_vendor == null || Auth::user()->is_vendor == 0) && Auth::user()->role=='user')
                  <a href="{{route('user')}}">Dashboard</a>
                  @endif
                </li>

                <li>
                  @if((Auth::user()->is_vendor != null && Auth::user()->is_vendor != 0 && Auth::user()->is_vendor != 3
                  && Auth::user()->is_vendor == 1 ) && Auth::user()->role=='user')
                  <a style="cursor: auto">Request Sent</a>
                </li>

                <li>
                  @elseif((Auth::user()->is_vendor != null && Auth::user()->is_vendor != 0 && Auth::user()->is_vendor ==
                  2 ) && Auth::user()->role=='vendor')
                  <a href="{{route('vendor-dashboard')}}">Dashboard</a>
                  @endif
                </li>

                <li>
                  <a href="{{route('user.logout')}}">Logout</a>
                </li>
                @else
                <li>

                  <a href="{{route('login.form')}}">Login </a>
                </li>

                <li>
                  <a href="{{route('register.form')}}">Register</a>
                </li>
                @endauth
              </ul>
            </li>
            <li>
              <button class="btn btn-default dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                <a href="{{url('cart')}}"> {{Helper::cartCount()}}
                  <img src="{{asset('images/icon-7.png')}}"></a>
              </button>
            </li>



          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navigationBar">
    <div class="container-fluid">
      <div class="row flexRow">
        <div class="col-md-2 col-sm-3 col-xs-12">
          <div class="sideNav">
            <div class="main_categories">
              <div class="panel-group" id="vehicleaccordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse"
                        data-parent="#categories" href="#categories">
                        
                        @if(isset($session))
                        @php
                          echo $data_cat_title = GoogleTranslate::trans("Categories",Session::get('lang'));
                        @endphp
                      @else
                      Categories
                    @endif

                    @php $options=$session @endphp
                        
                         <span><i class="fa fa-list-ul"
                            aria-hidden="true"></i></span></a> </h4>
                  </div>
                  <div id="categories" class="panel-collapse collapse">
                    <div class="panel-form">
                      <div class="categories_nav">
                        <div class="menuSec">
                          <ul id="menu1">
                            @php
                            $categories = DB::table('categories')->where('status', 'active')->get();
                            @endphp

                            @foreach ( $categories as $cat)

                            <li>
                              <a href="{{route('category',$cat->id)}}">
                                @if(isset($session))
                                    @php
                                      echo $data_cat_title = GoogleTranslate::trans("$cat->title",Session::get('lang'));
                                    @endphp
                                  @else
                                  $cat->title
                                @endif
                                
                                
                                
                                <span>
                                  <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                              <ul>

                                @php
                                $SubCat = DB::table('sub_categories')->where('cat_id', $cat->id)->Where('status',
                                'active')
                                ->get();
                                @endphp


                                @foreach ( $SubCat as $subCatList)

                                <li><a href="{{route('subCategory',$subCatList->id)}}">
                                  
                                  @if(isset($session))
                                    @php
                                      echo $data_cat_title = GoogleTranslate::trans("$subCatList->title",Session::get('lang'));
                                    @endphp
                                  @else
                                  $subCatList->title
                                @endif
                                 
                                
                                
                                </a>
                                </li>

                                @endforeach

                              </ul>
                            </li>

                            @endforeach
                          </ul>








                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">


          <div class="menuSec">
            <ul id="menu">
              <li><a href="{{ asset('/') }}" class="">
                
                @if(isset($session))
                    @php
                      echo $data_cat_title = GoogleTranslate::trans('Home',Session::get('lang'));
                    @endphp
                  @else
                    Home
                @endif
              </a></li>
              <li><a href="{{ asset('about-us') }}">
                
                @if(isset($session))
                    @php
                      echo $data_cat_title = GoogleTranslate::trans('About Us',Session::get('lang'));
                    @endphp
                  @else
                  About Us
                @endif
               </a></li>
              <li><a href="#">
                @if(isset($session))
                    @php
                      echo $data_cat_title = GoogleTranslate::trans('Brands ',Session::get('lang'));
                    @endphp
                  @else
                  Brands 
                @endif
                
                <i class="fa fa-angle-down"></i></a>
                <ul>
                  @php
                  $brands = DB::table('brands')->where('status', 'active')->get();
                  @endphp
                  @foreach ($brands as $brand)
                  <li><a href="{{route('brands',$brand->id)}}">
                    
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
              </li>
              
              <li><a href="{{ asset('faq') }}">
                @if(isset($session))
                    @php
                      echo $data_cat_title = GoogleTranslate::trans("FAQ'S",Session::get('lang'));
                    @endphp
                  @else
                  FAQ'S
                @endif
                </a></li>
              <li><a href="{{ asset('contact') }}">
                @if(isset($session))
                @php
                  echo $data_cat_title = GoogleTranslate::trans("Contact",Session::get('lang'));
                @endphp
              @else
              Contact
            @endif
                
                </a></li>
              <li>
                <form action="{{route('search.lang')}}" method="get" style="float: right">
                  <select id="my-dropdown" name="lang">
                    <option value="en" @if($session=='en') selected  @endif >English</option>
                    <!-- <option value="ga" @if($session=='ga') selected @endif>Irish</option>
                    <option value="af" @if($session=='af') selected @endif>Afrikaans</option> -->
                    <option value="ar" @if($session=='ar') selected @endif>Arabic</option>
                    <!-- <option value="ko" @if($session=='ko') selected @endif>Korean</option>
                    <option value="hi" @if($session=='hi') selected @endif>Hindi</option> -->
                    <option value="fr">French</option>
                    <option value="es">Spanish</option>
                  </select>
                  <input type="submit" value="Translate" class="btn_translate">

                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>