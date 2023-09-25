<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('seo-title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/site/img/logo.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- stylesheets -->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/promo-site/js/bootstrap/bootstrap.min.css')}}"
          type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/promo-site/js/mainmenu/menu.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/promo-site/css/default.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/promo-site/css/layouts.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/promo-site/css/shortcodes.css')}}" type="text/css"/>
    <link rel="stylesheet" media="screen" href="{{ asset('assets/promo-site/css/responsive-leyouts.css')}}"
          type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/promo-site/css/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/promo-site/css/Simple-Line-Icons-Webfont/simple-line-icons.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{ asset('assets/promo-site/css/et-line-font/et-line-font.css')}}">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('assets/promo-site/css/custom.css')}}"/>
</head>

<body>
<div class="site_wrapper">
    @include('layouts.promo-site.header')
    @yield('content')
    @include('layouts.promo-site.footer')
</div>

<!-- popups -->
@yield('modals')


<!-- ========== Js Files ========== -->
<script type="text/javascript" src="{{ asset('assets/promo-site/js/universal/jquery.js')}}"></script>
<script src="{{ asset('assets/promo-site/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/promo-site/js/mainmenu/customeUI.js')}}"></script>
<script src="{{ asset('assets/promo-site/js/mainmenu/jquery.sticky.js')}}"></script>
<script src="{{ asset('assets/promo-site/js/scrolltotop/totop.js')}}"></script>
@yield('scripts')
<script src="{{ asset('assets/promo-site/js/scripts/functions.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/promo-site/js/scripts/custom.js')}}" type="text/javascript"></script>
</body>
</html>