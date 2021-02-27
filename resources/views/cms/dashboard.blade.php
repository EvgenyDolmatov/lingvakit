@extends('layouts.cms')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', __("cms-pages.dashboard"))
@section('header-tools')
    <div class="page-header-tools">
        <a class="btn btn-gradient-01" href="#">{{ __("cms-pages.add-widget") }}</a>
    </div>
@endsection
@section('content')
    <div class="row flex-row">
        <!-- Begin Facebook -->
        <div class="col-xl-4 col-md-6 col-sm-6">
            <div class="widget widget-12 has-shadow">
                <div class="widget-body">
                    <div class="media">
                        <div class="align-self-center ml-5 mr-5">
                            <i class="ion-social-facebook text-facebook"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="title text-facebook">David Green</div>
                            <div class="number">10,865 Likes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Facebook -->
        <!-- Begin Twitter -->
        <div class="col-xl-4 col-md-6 col-sm-6">
            <div class="widget widget-12 has-shadow">
                <div class="widget-body">
                    <div class="media">
                        <div class="align-self-center ml-5 mr-5">
                            <i class="ion-social-twitter text-twitter"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="title text-twitter">@David_Green</div>
                            <div class="number">8,986 Followers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Twitter -->
        <!-- Begin Linkedin -->
        <div class="col-xl-4 col-md-6 col-sm-6">
            <div class="widget widget-12 has-shadow">
                <div class="widget-body">
                    <div class="media">
                        <div class="align-self-center ml-5 mr-5">
                            <i class="ion-social-linkedin-outline text-linkedin"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="title text-linkedin">@David_Green</div>
                            <div class="number">3,654 Followers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Linkedin -->
    </div>
    <!-- End Row -->
    <!-- Begin Row -->
    <div class="row flex-row">
        <div class="col-xl-12 col-md-6">
            <!-- Begin Widget 09 -->
            <div class="widget widget-09 has-shadow">
                <!-- Begin Widget Header -->
                <div class="widget-header d-flex align-items-center">
                    <h2>Delivered Orders</h2>
                    <div class="widget-options">
                        <button type="button" class="btn btn-shadow">View all</button>
                    </div>
                </div>
                <!-- End Widget Header -->
                <!-- Begin Widget Body -->
                <div class="widget-body">
                    <div class="row">
                        <div class="col-xl-10 col-12 no-padding">
                            <div>
                                <canvas id="orders"></canvas>
                            </div>
                        </div>
                        <div class="col-xl-2 col-12 d-flex flex-column my-auto no-padding text-center">
                            <div class="new-orders">
                                <div class="title">New Orders</div>
                                <div class="circle-orders">
                                    <div class="percent-orders"></div>
                                </div>
                            </div>
                            <div class="some-stats mt-5">
                                <div class="title">Total Delivered</div>
                                <div class="number text-blue">856</div>
                            </div>
                            <div class="some-stats mt-3">
                                <div class="title">Total Estimated</div>
                                <div class="number text-blue">297</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 09 -->
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
