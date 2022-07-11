@extends('layouts.app')

@section('template-main-style')
    <link rel="stylesheet" href="{{asset('assets/site/vendors/css/base/elisyam-1.5.min.css')}}">
@endsection
@section('template-styles')
    @yield('page-styles')
    <link rel="stylesheet" href="{{asset('assets/site/css/custom.css')}}">
@endsection

@section("body-id", "page-top")
@section('page-content')
    <div class="page">
        <!-- Begin Header -->
    @include('layouts.site.header')

    <!-- Begin Page Content -->
        <div class="page-content d-flex align-items-stretch">

            <!-- Begin Left Sidebar -->
        @if(Auth::user())
            @include('layouts.site.sidebar')
        @endif

        <!-- Begin Content -->
            <div class="content-inner active @if(!Auth::user()) remove-offset @endif">
                <!-- Begin Page Content -->
                <div class="container">
                    @include('layouts.site-container.page-header')
                    @yield('content')
                </div>

                <!-- Begin Page Footer-->
                @include('layouts.site.footer')
            </div>

            <!-- Begin Centered Modal -->
            @yield('modal')
        </div>
    </div>
@endsection

@section('template-scripts')
    <script src="{{asset('assets/site/vendors/js/nicescroll/nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/js/inputmask/jquery.inputmask.min.js')}}"></script>
    @yield('page-scripts')
@endsection
@section('custom-scripts')
    <script src="{{asset('assets/site/js/components/widgets/widgets.min.js')}}"></script>
    <script src="{{asset('assets/site/js/custom.js')}}"></script>
@endsection
