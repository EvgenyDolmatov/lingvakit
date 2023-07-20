@extends('layouts.app')

@section('template-main-style')
    <link rel="stylesheet" href="{{asset('assets/cms/vendors/css/base/elisyam-1.5.min.css')}}">
@endsection
@section('template-styles')
    @yield('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/custom.css')}}">
@endsection

@section("body-id", "page-top")
@section('page-content')
    <div class="page chat">
        <!-- Begin Header -->
        @include('layouts.cms.header')

        <!-- Begin Page Content -->
        <div class="page-content d-flex align-items-stretch">
            @yield('content')
        </div>
    </div>
@endsection

@section('template-scripts')
    <script src="{{asset('assets/cms/vendors/js/nicescroll/nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/app/chat/chat.min.js')}}"></script>
    @yield('page-scripts')
@endsection
@section('custom-scripts')
    <script src="{{asset('assets/cms/js/custom.js')}}"></script>
    <script src="{{asset('assets/cms/js/search-media.min.js')}}"></script>
@endsection
