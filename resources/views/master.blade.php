<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SimpleOne - A Responsive Html5 Ecommerce Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
	<link href="{!! asset('public/front/css/bootstrap.css') !!}" rel="stylesheet">
	<link href="{!! asset('public/front/css/bootstrap-responsive.css') !!}" rel="stylesheet">
	<link href="{!! asset('public/front/css/style.css') !!}" rel="stylesheet">
	<link href="{!! asset('public/front/css/flexslider.css') !!}" type="text/css" media="screen" rel="stylesheet"  />
	<link href="{!! asset('public/front/css/jquery.fancybox.css') !!}" rel="stylesheet">
	<link href="{!! asset('public/front/css/cloud-zoom.css') !!}" rel="stylesheet">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<!-- fav -->
	<link rel="shortcut icon" href="asset/ico/favicon.html">
</head>
<body>
	<!-- Header Start -->
	<header>
		@include('blocks.header')
		@include('blocks.navigation')
	</header>
	<!-- Header End -->

	<div id="maincontainer">
		<!-- Slider Start-->
		@include('blocks.slider')
		<!-- Slider End-->
	  
		<!-- Section Start-->
		@include('blocks.order_detail')

		@yield('content')

		<!-- Footer -->
		@include('blocks.footer')

	<!-- javascript
		================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{!! asset('public/front/js/jquery.js') !!}"></script>
	<script src="{!! asset('public/front/js/bootstrap.js') !!}"></script>
	<script src="{!! asset('public/front/js/respond.min.js') !!}"></script>
	<script src="{!! asset('public/front/js/application.js') !!}"></script>
	<script src="{!! asset('public/front/js/bootstrap-tooltip.js') !!}"></script>
	<script defer src="{!! asset('public/front/js/jquery.fancybox.js') !!}"></script>
	<script defer src="{!! asset('public/front/js/jquery.flexslider.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('public/front/js/jquery.tweet.js') !!}"></script>
	<script  src="{!! asset('public/front/js/cloud-zoom.1.0.2.js') !!}"></script>
	<script  type="text/javascript" src="{!! asset('public/front/js/jquery.validate.js') !!}"></script>
	<script type="text/javascript"  src="{!! asset('public/front/js/jquery.carouFredSel-6.1.0-packed.js') !!}"></script>
	<script type="text/javascript"  src="{!! asset('public/front/js/jquery.mousewheel.min.js') !!}"></script>
	<script type="text/javascript"  src="{!! asset('public/front/js/jquery.touchSwipe.min.js') !!}"></script>
	<script type="text/javascript"  src="{!! asset('public/front/js/jquery.ba-throttle-debounce.min.js') !!}"></script>
	<script defer src="{!! asset('public/front/js/custom.js') !!}"></script>
</body>
</html>