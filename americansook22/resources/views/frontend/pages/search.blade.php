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
<body class="body_bg2">
{{--    {{$categories}}--}}
<!-- Header Start -->
@include('frontend.layouts.header')
<!-- Header End -->
{{--{{dd($categories)}}--}}

<div class="search_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 center">
                <div class="search_box">

                    @php
                        use Stichoza\GoogleTranslate\GoogleTranslate;
                           $data_cat_title = GoogleTranslate::trans('Select Category',$lang);
                    @endphp

                    <select>
                        <option>{{$data_cat_title}}</option>

                        @foreach ( $categories as $cat)
                            @php
                                $data_title = $cat->title;
                                   $data_cat_title = GoogleTranslate::trans($data_title,$lang);
                            @endphp

                            <option>{{$data_cat_title}}</option>
                        @endforeach
                    </select>
                    <form method="POST" action="{{route('product.search')}}">
                        @csrf
                        <input type="" placeholder="Let me search">
                        <button type="submit"><img src="images/search_icon.png" alt="img"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Js Files Start -->
<script src="{{asset('js/allmix.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
