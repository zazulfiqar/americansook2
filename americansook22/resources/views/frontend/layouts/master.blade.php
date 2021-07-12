<!DOCTYPE html>
<html lang="zxx">
<head>
    @include('frontend.layouts.head')
    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css')}}">
    <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body class="js">


	@include('frontend.layouts.notification')

	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')

	@include('frontend.layouts.footer')

</body>
</html>
