<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>XEN</title>

		<!-- fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7COswald:300,400,500,600,700" rel="stylesheet" type="text/css">

		<!-- styles -->
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body class="loader">
		<!-- loading start -->
		<div class="loading">
		    <img class="logo-loading" src="assets/images/logo/logo-loader.png" alt="logo">
	    </div><!-- loading end -->

		<!-- pointer start -->
		<div class="pointer" id="pointer">
			<i class="fas fa-long-arrow-alt-right"></i>
			<i class="fas fa-search"></i>
			<i class="fas fa-link"></i>
		</div><!-- pointer end -->

		<!-- to-top-btn start -->
		<a class="to-top-btn pointer-small" href="#up">
			  <span class="to-top-arrow"></span>
		</a><!-- to-top-btn end -->

        @include('layout.header')

        @include('layout.nav')


		<!-- animsition-overlay start -->
		<main class="animsition-overlay" data-animsition-overlay="true">
			<!-- home-slider start -->
            @yield('content')
        </main>

        @include('layout.footer')
    </div>


    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

  </body>
</html>
