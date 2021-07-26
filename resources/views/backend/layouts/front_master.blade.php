<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content = "width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name = "viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@if(!empty($appSettings)){{$appSettings['crm_settings']['short_name']}} @else Laravel @endif | @yield('pageTitle')</title>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>
 
    <!-- Bootstrap and Font Awesome css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="{{$appSettings ? asset('storage/logo/'.$appSettings['crm_settings']['favicon']) : "" }}" type="image/x-icon">
    	 <link href="{{ asset(mix('lmix/css/pace.css')) }}" rel="stylesheet" type="text/css">
	 <link href="{{ asset(mix('lmix/css/vendor.css')) }}" rel="stylesheet" type="text/css">
	 <link href="{{ asset(mix('lmix/css/theme.css')) }}" rel="stylesheet" type="text/css">

  <!-- Child Page css goes here  -->
    @yield("extraStyle")
    <!-- Child Page css -->	

</head>

<body class="hold-transition @yield('bodyCssClass')">
<div class="overlay-loader">
    <div class="loader" ></div>
</div>
    <!-- BEGIN CHILD PAGE-->
    @yield('pageContent')
	<!-- END CHILD PAGE-->	

 <script src="{{ asset(mix('/lmix/js/manifest.js')) }}"></script>
<!-- vendor libaries js -->
<script src="{{ asset(mix('/lmix/js/vendor.js')) }}"></script>
<!-- theme js -->
<script src="{{ asset(mix('/lmix/js/theme.js')) }}"></script>
<!-- app js -->
<script src="{{ asset(mix('/lmix/js/app.js')) }}"></script>

     <!-- Extra js from child page -->
     @yield("extraScript")
    <!-- END JAVASCRIPT -->
</body>

</html>