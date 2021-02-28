@extends('layouts.site')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', $topic->getTitle())
@section('header-tools')
    <div class="page-header-tools">
        @if($topic->lesson && !$result)
            <form style="display: inline-block" method="POST"
                  action="{{ route('site.lesson-passed', [$course->id, $topic->id, $lesson->id]) }}">
                @csrf

                <a class="btn btn-warning"
                   href="{{route('site.lesson-passed', [$course->id, $topic->id, $lesson->id])}}"
                   onclick="event.preventDefault();this.closest('form').submit();">{{ __("site-pages.lesson-passed") }}</a>
            </form>
        @endif

        @if($topic->quiz)
            @if($quiz->quizPassed($user))
                <a class="btn btn-warning"
                   href="{{ route('site.testing', [$course->id, $topic->id, $quiz->id]) }}">{{ __("site-pages.retake-quiz") }}</a>
                <a class="btn btn-danger"
                   href="{{route('bug-work.show', [$course->id, $topic->id, $quiz->id])}}">Работа над ошибками</a>
            @else
                <a class="btn btn-warning"
                   href="{{ route('site.testing', [$course->id, $topic->id, $quiz->id]) }}">{{ __("site-pages.start-quiz") }}</a>
            @endif
        @endif


        <a class="btn btn-shadow"
           href="{{ route('site.course-show', $course->id) }}">{{ __("site-pages.course-plan") }}</a>

        <div class="btn-group" role="group" aria-label="Buttons Group">
            @if($previousTopic)
                <a class="btn btn-previous"
                   href="{{ route('site.show-topic', [$course->id, $previousTopic->id]) }}">
                    <i class="la la-arrow-left mr-2"></i>{{__("site-pages.previous-topic")}}
                </a>
            @endif
            @if($nextTopic)
                <a class="btn btn-next" href="{{ route('site.show-topic', [$course->id, $nextTopic->id]) }}">
                    {{__("site-pages.next-topic")}}<i class="la la-arrow-right ml-2"></i>
                </a>
            @endif
        </div>
    </div>
@endsection

@section('content')
    <div class="row flex-row">
        <div class="col-12">
            @if($topic->lesson)
                @include('site.course.topic.content.lesson')
            @elseif($topic->quiz)
                @include('site.course.topic.content.quiz')
            @endif
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
