<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('seo-title')</title> {{-- {{ config('app.name', 'Seontex CMS') }} --}}
    <meta name="description" content="@yield('seo-description')">

    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700","Noto+Serif+TC:300,400,500"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/cms/img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/cms/img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/cms/img/favicon-16x16.png')}}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/cms/vendors/css/base/bootstrap.min.css')}}">

    @yield('template-main-style')
    @yield('template-styles')
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body id="@yield('body-id')" class="@yield('body-class')">

    <!-- Begin Preloader -->
    @include('layouts.cms.template-parts.preloader')

    <!-- Begin Container -->
    @yield('page-content')

    <script src="{{asset('assets/cms/vendors/js/base/jquery.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/base/core.min.js')}}"></script>
    @yield('template-scripts')
    <script src="{{asset('assets/cms/vendors/js/app/app.min.js')}}"></script>
    @yield('custom-scripts')
</body>
</html>
