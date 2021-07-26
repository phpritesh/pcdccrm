<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content = "width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name = "viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@if(isset($appSettings['crm_settings']['short_name'])){{$appSettings['crm_settings']['short_name']}} @else Laravel @endif | @yield('pageTitle')</title>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>
 
    <!-- Bootstrap and Font Awesome css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{$appSettings['crm_settings'] ? asset('storage/logo/'.$appSettings['crm_settings']['favicon']) : "" }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jq-confirm/jquery-confirm.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">



</head>

<body class="hold-transition hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- BEGIN CHILD PAGE-->
    @yield('pageContent')
    <!-- END CHILD PAGE-->
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
</body>

</html>