@extends('layouts.site')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', __('Email confirmed'))
@section('content')
    <div class="row flex-row">
        <div class="col-12">
            <div class="widget-body shadow">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ __('Your Email has been successfully verified.') }}
                        {{ __('Now all the functions of the site are available to you.') }}
                    </div>
                    <a href="{{route('site.index')}}" class="btn btn-primary">{{__("site-pages.course-catalog")}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="{{asset('assets/cms/vendors/js/chart/chart.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/dashboard/db-default.js')}}"></script>
    <script src="{{asset('assets/cms/js/youtube.min.js')}}"></script>
@endsection
