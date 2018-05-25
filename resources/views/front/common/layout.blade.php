<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="format-detection" content="telephone=no" />
<meta name="description" content="@yield('description')">
<meta name="keyword" content="@yield('keyword')">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--  <title>{{ config('app.name', 'Laravel') }} -front-</title> -->
<title>@yield('title', 'atnreport')</title>
<link rel="icon" type="image/vnd.microsoft.icon" href="/front/images/common/favicon.ico">
<link rel="apple-touch-icon" href="/front/images/common/touch-icon.png" />

<!-- <link href="/css/app.css" rel="stylesheet"> -->
<link href="/css/bootstrap-3.3.7/bootstrap.min.css" rel="stylesheet">

<?php /* stylesheet */ ?>
<link rel="stylesheet" href="/front/css/reset.css">
<link rel="stylesheet" href="/front/css/common.css">
<link rel="stylesheet" href="/front/css/home.css">

<!-- Styles -->
@yield('css')

<!-- Scripts -->
<script>
	window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
	]); ?>
</script>

<script src="/front/js/jquery-3.1.0.min.js"></script>
<script src="/front/js/app.js"></script>

<script src="/front/js/lib/modernizr.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/lib/jquery.js"><\/script>')</script>
<script src="/front/js/lib/jquery.slick.min.js"></script>
<script src="/front/js/lib/jquery.tile.js"></script>
<script src="/front/js/common.js"></script>
<script src="/front/js/home.js"></script>
</head>

<!-- <body> -->
<body id="Top" class="page-home">

	@yield('header')

    @yield('content')

	@yield('footer')

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>
