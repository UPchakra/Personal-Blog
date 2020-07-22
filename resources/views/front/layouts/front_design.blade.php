<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Blog</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="{{asset('public/front/common-css/bootstrap.css')}}" rel="stylesheet">

	<link href="{{asset('public/front/common-css/swiper.css')}}" rel="stylesheet">

	<link href="{{asset('public/front/common-css/ionicons.css')}}" rel="stylesheet">


	<link href="{{asset('public/front/front-page-category/css/styles.css')}}" rel="stylesheet">

	<link href="{{asset('public/front/front-page-category/css/responsive.css')}}" rel="stylesheet">
	
	 <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') }}" rel="stylesheet">
 <style >
	.favorite_posts{
		color:blue;
	}
</style>
<link href="{{asset('public/front/single-post-1/css/styles.css')}}" rel="stylesheet">

	<link href="{{asset('public/front/single-post-1/css/responsive.css')}}" rel="stylesheet">
		<link href="{{asset('public/front/category/css/styles.css')}}" rel="stylesheet">

	<link href="{{asset('public/front/category/css/responsive.css')}}" rel="stylesheet">

</head>


<body >

	@include('front.layouts.header')

	

	@yield('content')


	@include('front.layouts.footer')


	<!-- SCIPTS -->


	<script src="{{asset('public/front/common-js/jquery-3.1.1.min.js')}}"></script>

	<script src="{{asset('public/front/common-js/tether.min.js')}}"></script>

	<script src="{{asset('public/front/common-js/bootstrap.js')}}"></script>

	<script src="{{asset('public/front/common-js/swiper.js')}}"></script>

	<script src="{{asset('public/front/common-js/scripts.js')}}"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>

  

    <script>
       
        @if(session('flash_message'))
        toastr.success("{{ Session::get('flash_message') }}");
        @endif

        @if(session('flash_check'))
        toastr.info("{{ Session::get('flash_check') }}");
        @endif

        @if(session('flash_error'))
        toastr.warning("{{ Session::get('flash_error') }}");
        @endif

        @if(session('flash_delete'))
        toastr.error("{{ Session::get('flash_delete') }}");
        @endif
    </script>


</body>
</html>
