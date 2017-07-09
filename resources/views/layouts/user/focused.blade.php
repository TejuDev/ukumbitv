<!DOCTYPE html>
<html class="no-js">
	<head>
	  <title>{{trans('messages.site_name')}} - {{trans('messages.website_description')}}</title>
	  
	  <meta name="viewport" content="width=device-width,  initial-scale=1">
	  <link rel="stylesheet" href="{{asset('streamtube/css/bootstrap.min.css')}}"> 
	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	  <link rel="stylesheet" type="text/css" href="{{asset('streamtube/css/app.css')}}"> 
	  <link rel="shortcut icon" type="image/png" href="{{asset('streamtube/images/logo2-fav.png')}}"/>
	  <script src="{{asset('streamtube/js/vendors/modernizr-custom.js')}}"></script> 
	  @yield('styles') 
	</head>

	<body class="@yield('body-class')"> 
    @include('layouts.user.focused-nav')

    @yield('content')

    @include('layouts.user.footer') 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- background images slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>  
    @yield('scripts')
	</body>
</html>