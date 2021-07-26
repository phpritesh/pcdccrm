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

	 <!-- app CSS -->
     	 <link href="{{ asset(mix('lmix/css/pace.css')) }}" rel="stylesheet" type="text/css">
	 <link href="{{ asset(mix('lmix/css/vendor.css')) }}" rel="stylesheet" type="text/css">
	 <link href="{{ asset(mix('lmix/css/theme.css')) }}" rel="stylesheet" type="text/css">
    <script>
        var hash = '{{session('user_session_sha1')}}';
    </script>
   <!-- Child Page css goes here  -->
   <style>
   .swal2-content{font-size:18px !important;}
   </style>
@yield("extraStyle")
<!-- Child Page css -->
</head>

<body  class="sidebar-mini skin-blue-light @yield('bodyCssClass')" >

<div class="ajax-loader">
    <img class="loader2" src="{{ asset('/images/loader.svg') }}" alt="">
</div>

<!-- Site wrapper -->
<div class="wrapper">
    <!-- page header -->
@include('backend.partial.header')
<!-- / page header -->

    <!-- page aside left side bar -->
@include('backend.partial.leftsidebar')
<!-- / page aside left side bar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Message -->
        @if (Session::has('success') || Session::has('error') || Session::has('warning'))
            <div class="alert custom_alert @if (Session::has('success')) alert-success @elseif(Session::has('error')) alert-danger @else alert-warning @endif alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @if (Session::has('success'))
                    <h5><i class="icon fa fa-check"></i>{!! Session::get('success') !!} </h5>
                @elseif(Session::has('error'))
                    <h5><i class="icon fa fa-ban"></i>{!! Session::get('error') !!} </h5>
                @else
                    <h5><i class="icon fa fa-warning"></i>{!!  Session::get('warning') !!} </h5>
                    @endif
                    </h5>
            </div>
        @endif
        @if (Session::has('message'))
            <div class="alert  alert-success keepIt">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5 style="font-weight: bold; font-size: large;"><i class="icon fa fa-check"></i>{!! Session::get('message') !!} </h5>
            </div>
    @endif
    <!-- ./Message -->
        <!-- BEGIN CHILD PAGE-->
		 @include('backend.partial._alerts')
    @yield('pageContent')
    <!-- END CHILD PAGE-->
    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
@include('backend.partial.footer')
<!-- / footer -->

    <!-- page aside right side bar -->
@include('backend.partial.rightsidebar')
<!-- / page aside right side bar -->
   <div id="modal-placeholder"></div>
	<p id="overlay" class="text-center load-overlay"  >
	    <i class="fa fa-spinner fa-pulse fa-5x"></i>
	</p>
</div>
<!-- ./wrapper -->
    
<!-- webpack menifest js -->
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