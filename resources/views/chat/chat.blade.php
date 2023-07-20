@extends('layouts.chat')

@section('title', "Чат")
@section('header-tools')
    <div class="page-header-tools">
        <a class="btn btn-gradient-01" href="#">{{ __("cms-pages.add-widget") }}</a>
    </div>
@endsection
@section('content')
    @include('layouts.chat.compact-sidebar')

    <div class="content-inner compact">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-xl-12 p-0">
                    <div class="row m-0 widget no-bg">
                        <div class="col-xl-2 col-lg-3 col-md-12 p-0" id="sidebar">
                            @include('layouts.chat.sidebar')
                        </div>
                        <div class="col-xl-8 col-lg-9 col-md-12 d-flex no-padding">
                            <!-- Begin Card -->
                            <div class="card w-100 no-bg">
                                <!-- Begin Tab -->
                                <div class="tab-content">
                                    <!-- Begin Tab 1 (Show) -->
                                    <div class="tab-pane fade show active messages-scroll auto-scroll" style="flex: 1 1"
                                         id="msg-1">
                                        <div class="card-body d-flex justify-content-center align-items-center h-100">
                                            <p>Выберите, кому вы хотите написать.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin Page Footer-->
        @include('layouts.cms.footer')
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
