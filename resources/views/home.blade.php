@extends('layouts.site')

@section('seo-title', 'Лингва-Кит - Мои курсы')
@section('seo-description', 'Список курсов')
@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', __("site-pages.my-courses"))
@section('header-tools')
    <div class="page-header-tools">
        <a class="btn btn-gradient-01" href="#">{{ __("cms-pages.add-widget") }}</a>
    </div>
@endsection
@section('content')
    @if(Auth::user()->courses)
        <div class="row flex-row">
            @foreach(Auth::user()->courses as $course)
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <img src="{{$course->getImage()}}" alt="{{$course->title}}" style="width: 100%">
                            {{-- Course Title --}}
                            <div class="about-infos d-flex flex-column mt-3">
                                <div class="about-title"><a href="{{ route('site.course-show', $course->slug) }}">{{ $course->title }}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
@section('page-scripts')
    <script src="{{asset('assets/cms/vendors/js/chart/chart.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/dashboard/db-default.js')}}"></script>
@endsection
