
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>@yield('siteTitle') - {{ config('app.name') }}</title>
<link rel="icon" href="favicon.ico" type="{{asset('public/adminAssets/image/x-icon')}}">
<!-- Favicon-->
<link rel="stylesheet" href="{{asset('public/adminAssets/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/adminAssets/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}"/>
<link rel="stylesheet" href="{{asset('public/adminAssets/assets/plugins/morrisjs/morris.css')}}" />
<link rel="stylesheet" href="{{ asset('public/adminAssets/assets/css/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('public/adminAssets/assets/plugins/multi-select/css/multi-select.css')}}">
<link rel="stylesheet" href="{{ asset('public/adminAssets/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('public/adminAssets/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('public/adminAssets/assets/css/blog.css')}}">
<link rel="stylesheet" href="{{asset('public/adminAssets/assets/css/color_skins.css')}}">
<link rel="stylesheet" href="{{asset('public/adminAssets/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/adminAssets/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />


@yield('css')
