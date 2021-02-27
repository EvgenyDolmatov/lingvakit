@extends('layouts.site')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', __("site-pages.order-info"))
@section('content')

    <div class="row flex-row">
        <div class="col-12">
            <div class="widget widget-12 has-shadow">
                <div class="widget-body">
                    <div class="infos">
                        <div class="about-infos mt-3">
                            <div class="row flex-row">
                                @if($order->isPaid())
                                <div class="col-12">
                                    <div class="about-title mb-3">
                                        Спасибо за заказ! Теперь Вы можете перейти к изучению курса:
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-12">
                                    <img src="{{$course->getImage()}}" alt="{{$course->title}}" style="width: 100%">
                                    {{-- Course Title --}}
                                    <div class="about-infos d-flex flex-column mt-3">
                                        <div class="about-title"><a href="{{ route('site.course-show', $course->id) }}">{{ $course->title }}</a></div>
                                    </div>
                                </div>
                                @else
                                    <div class="col-12">
                                        <div class="about-title mb-3">
                                            К сожалению, оплата не прошла.
                                        </div>
                                        <div class="text-left">
                                            <a href="{{route('orders.checkout', $course->id)}}" class="btn btn-primary ">
                                                Попробовать снова
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
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
@endsection

