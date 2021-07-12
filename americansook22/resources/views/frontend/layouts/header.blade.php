<header>

    <div class="main_header header2">
        <div class="container">
            <div class="row flexRow">
                <div class="col-md-3 col-sm-3 col-xs-12 flexCol">
                    <div class="main_logo">
                        <a href="{{url('search')}}"><img alt="img" src="{{asset('images/logo.png')}}"></a>
                    </div>
                </div>


                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="login_div">
                        <a href="javascript:void(0)">
                            {{ Session::get('user') }}
                            <span><i class="fa fa-user" aria-hidden="true"></i></span></a>

                        <a href="{{url('cart')}}"> {{Helper::cartCount()}}<span><i class="fa fa-shopping-cart"
                                                                                   aria-hidden="true"></i></span></a>

                        @auth
                            @if(Auth::user()->role=='admin')
                                <a href="{{route('admin')}}">Dashboard</a>
                            @endif
                            @if((Auth::user()->is_vendor == null || Auth::user()->is_vendor == 0)  && Auth::user()->role=='user')
                                <a href="{{route('user')}}">Dashboard</a>
                            @endif
                            @if((Auth::user()->is_vendor != null && Auth::user()->is_vendor != 0 && Auth::user()->is_vendor != 3 && Auth::user()->is_vendor == 1 ) && Auth::user()->role=='user')
                                <a style="cursor: auto">Request Sent</a>
                            @elseif((Auth::user()->is_vendor != null && Auth::user()->is_vendor != 0 && Auth::user()->is_vendor == 2 ) && Auth::user()->role=='vendor')
                                <a href="{{route('vendor-dashboard')}}">Dashboard</a>
                            @endif


                            <a href="{{route('user.logout')}}">Logout</a>

                        @else

                            <a href="{{route('login.form')}}">Login </a> <a

                                href="{{route('register.form')}}">Register</a>
                        @endauth

                        {{--  --}}
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="header4">
        <div class="container-fluid">
            <div class="row flexRow">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="sideNavBar">
                        <button onclick="myFunction()">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- <a href="#" >
                          <i class="fa fa-bars" ></i>
                        </a> -->

                        @php
                            use Stichoza\GoogleTranslate\GoogleTranslate;
                               $data_label_history = GoogleTranslate::trans('The History');
                               $data_label_lifestyle = GoogleTranslate::trans('Lifestyle');
                               $data_label_Videos = GoogleTranslate::trans('Videos');
                               $data_label_pictures = GoogleTranslate::trans('Pictures');
                               $data_label_features = GoogleTranslate::trans('Features');
                               $data_label_community = GoogleTranslate::trans('Community');
                        @endphp

                        <ul class="sideNavList" id="sideNavList">
                            <li><a href="#">{{$data_label_history}}</a></li>
                            <li><a href="#">{{$data_label_lifestyle}}</a></li>
                            <li><a href="#">{{$data_label_Videos}}</a></li>
                            <li><a href="#">{{$data_label_pictures}}</a></li>
                            <li><a href="#">{{$data_label_features}}</a></li>
                            <li><a href="#">{{$data_label_community}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 hidden-xs">
                    <div class="menuSec">
                        <ul id="menu">
                            @php
                                $categories = \App\Models\Category::all();
                            @endphp

                            @foreach ($categories as $cats)
                                {{-- {{dd($cats->products)}} --}}

                                @php
                                        $data_cat_title = $cats->title;
                                       $data_cat_title_label = GoogleTranslate::trans($data_cat_title);
                                @endphp

                                <li><a href="#">{{$data_cat_title_label}}</a>
                                    <ul>

                                        <div class="furtherNav">
                                            <div class="furtherNavBtn">
                                                <div class="row">
                                                    @php
                                                        $product_type =  App\ProductType::limit(3)->get();
                                                    @endphp

                                                    @foreach($product_type as $pro_types)

                                                        @php
                                                            $data_pro_title = $pro_types->title;
                                                           $data_pro_title_label = GoogleTranslate::trans($data_pro_title);
                                                        @endphp

                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <a href="#">{{$data_pro_title_label}}</a>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="furtherNavlinks">
                                                <div class="row">

                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <ul>


                                                            @foreach($cats->products as $pro_aftermake)

                                                                @php
                                                                    $data_pro_aftermake = $pro_aftermake->title;
                                                                   $data_pro_aftermake_label = GoogleTranslate::trans($data_pro_aftermake);
                                                                @endphp

                                                                @if($pro_aftermake->product_type == 1)
                                                                    <li>
                                                                        <a href="{{route('product-detail',$pro_aftermake->id)}}">{{$data_pro_aftermake_label}}</a>
                                                                    </li>
                                                                @endif


                                                            @endforeach
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <ul>
                                                            @foreach($cats->products as $pro_oem)

                                                                @php
                                                                    $data_pro_oem = $pro_oem->title;
                                                                   $data_pro_oem_label = GoogleTranslate::trans($data_pro_oem);
                                                                @endphp


                                                            @if($pro_oem->product_type == 2)
                                                                    <li>
                                                                        <a href="{{route('product-detail',$pro_aftermake->id)}}">{{$data_pro_oem_label}}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <ul>
                                                            @foreach ($cats->products as $pro_salvage)
                                                                @php
                                                                    $data_pro_salvage = $pro_salvage->title;
                                                                   $data_pro_salvage_label = GoogleTranslate::trans($data_pro_salvage);
                                                                @endphp

                                                            @if($pro_salvage->product_type == 3)
                                                                    <li>
                                                                        <a href="{{route('product-detail',$pro_aftermake->id)}}">{{$data_pro_salvage_label}}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 col">
                    <div class="wlogo">
                        <a href="#" class="wow fadeIn" data-wow-delay="0.2s" data-wow-duration="2s"><img
                                src="{{asset('images/wLogo.png')}}" class="img-responsive" alt="logo"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
