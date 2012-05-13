<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>达人汇</title>

	<link href="/css/foundation.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
	<link href="/css/app.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	      <link href="/css/ie.css" rel="stylesheet" type="text/css" />
	<![endif]-->

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Header  -->
    @include('user.header')
	
	
	@yield('content')
    	
	<!-- Footer  -->
    @include('user.footer')
	
	<script src="/js/jquery.min.js"></script>
	<script src="/js/app.js"></script>
	<script src="/js/modernizr.foundation.js"></script>
	<script src="/js/jquery.placeholder.min.js"></script>
	<script src="/js/jquery.orbit-1.4.0.js"></script>
	<script src="/js/jquery.reveal.js"></script>
	<script src="/js/jquery.tooltips.min.js"></script>
<!-- <script type="text/javascript" src="http://www.zurb.com/assets/foundation.top-bar.js"></script> -->
</body>
</html>
