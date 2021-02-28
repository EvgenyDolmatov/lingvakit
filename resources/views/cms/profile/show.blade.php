@extends('layouts.site')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection

@section('title', __("cms-pages.profile"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.profile") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-xl-3">
            <!-- Begin Widget -->
            <div class="widget has-shadow">
                <div class="widget-body">
                    <div class="mt-5">
                        <img src="{{asset('assets/cms/img/avatar/avatar-01.jpg')}}" alt="..." style="width: 120px;" class="avatar rounded-circle d-block mx-auto">
                    </div>
                    <h3 class="text-center mt-3 mb-1">{{ Auth::user()->name }}</h3>
                    <p class="text-center">{{ Auth::user()->email }}</p>
                    <div class="em-separator separator-dashed"></div>
                    {{--<ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="la la-bell la-2x align-middle pr-2"></i>{{ __("Notifications") }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="la la-bolt la-2x align-middle pr-2"></i>{{ __("Activity") }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="la la-comments la-2x align-middle pr-2"></i>{{ __("Messages") }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="la la-bar-chart la-2x align-middle pr-2"></i>{{ __("Statistics") }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="la la-clipboard la-2x align-middle pr-2"></i>{{ __("Tasks") }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="la la-gears la-2x align-middle pr-2"></i>{{ __("Settings") }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)"><i class="la la-question-circle la-2x align-middle pr-2"></i>{{ __("FAQ") }}</a>
                        </li>
                    </ul>--}}
                </div>
            </div>
            <!-- End Widget -->
        </div>
        <div class="col-xl-9">

            {{-- User Info Form --}}
            @include('cms.profile.user-info-form')

            {{-- User Password Form --}}
            @include('cms.profile.user-password-form')

        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{asset('assets/cms/vendors/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/app/contact/contact.min.js')}}"></script>
@endsection



