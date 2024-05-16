<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @livewireStyles
        @if (data_get($page, 'settings.seo.disableIndexing') == true)
            <meta name="robots" content="noindex">
            <meta name="robots" content="nofollow">
        @endif
        <meta charset="utf-8">
        <base href={{ config('app.url') }}/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/bower_components/archyedt-thin/css/archyedt-thin.min.css">

        @yield('meta')

		<!-- fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7COswald:300,400,500,600,700" rel="stylesheet" type="text/css">

		<!-- styles -->
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="assets/css/custom.css?v1.0.4" rel="stylesheet" type="text/css">
        @stack('headStyles')
        <style>

            .border-btn-red .border-btn:before {
              color:white;
            }

            .large-title, .large-title-bold span, .medium-title, .nav-btn, .title-style {
                font-weight: 400;
            }


        .to-top-btn {
            display:none;
        }

        .pointer {
            width: 0px;
            height: 0px;
            background: #f05523;
            opacity: 0.5;
        }

        .pointer.large {
            width: 65px;
            height: 65px;
            background: rgba(239,13,51,.15);
            -webkit-box-shadow: 0 0 30px #f05523;
            box-shadow: 0 0 30px #f05523;
            opacity: 0.5;
        }
        </style>
	</head>
	<body class="loader">
		<!-- loading start -->
		<div class="loading">
		    <img class="logo-loading" src="assets/images/logo/logo-loader.png" alt="logo">
	    </div><!-- loading end -->

		{{-- <!-- pointer start -->
		<div class="pointer" id="pointer">
			<i class="fas fa-long-arrow-alt-right"></i>
			<i class="fas fa-search"></i>
			<i class="fas fa-link"></i>
		</div><!-- pointer end --> --}}

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
    @stack('bodyScripts')
    <script>
         $('.nav-box').click(function(){
            $('.lang-li').css('opacity', '0')
        })
    </script>
    @livewireScripts
  </body>
</html>
