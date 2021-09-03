@extends('layouts.site')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', $quiz->title)
@section('header-tools')
    <div class="page-header-tools">
        <div id="countdown" data-timer="{{$quiz->duration}}"></div>
    </div>
@endsection
@section('content')
    <form class="form-horizontal" method="POST"
          action="{{ route('site.store-results', [$course->id, $topic->id, $quiz->id]) }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="started_at" value="{{now()}}">

        <div class="row">
            <div class="col-12">
                <div class="widget widget-12 has-shadow">
                    <div class="widget-body">
                        <div class="about-infos d-flex flex-column mb-3">
                            <div class="about-text">{!! $quiz->description !!}</div>
                        </div>
                        @if($quiz->audio)
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-text">
                                    <audio src="{{$quiz->getAudio()}}" preload="auto" controls></audio>
                                </div>
                            </div>
                        @endif
                        @if($quiz->video)
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-text">
                                    <div id="player" data-id="{{$quiz->getVideoId()}}"
                                         data-width="100%" data-height="390"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                @foreach($questions as $key => $question)
                    <div class="widget widget-12 has-shadow">
                        <div
                            class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                            <h3 class="{{$question->getFontSize()}}">{{$key+1}}. {{ $question->title }}</h3>
                        </div>
                        <div class="widget-body">
                            @if($question->image)
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-text">
                                        <img src="{{$question->getImage()}}" width="300px" alt="{{ $question->title }}">
                                    </div>
                                </div>
                            @endif
                            @if($question->audios)
                                @foreach($question->audios as $audio)
                                    <div class="about-infos d-flex flex-column mb-3">
                                        <div class="about-text">
                                            <audio src="{{$audio->getAudio()}}" preload="auto" controls></audio>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            {{-- Question: Single Choice --}}
                            @if($question->type === 'single_choice')
                                @include('site.course.quiz.question-types.single')
                            @endif
                            {{-- Question: Multiple Choice --}}
                            @if($question->type === 'multiple_choice')
                                @include('site.course.quiz.question-types.multiple')
                            @endif
                            {{-- Question: Fill in the Gaps --}}
                            @if($question->type === 'fill_the_gaps')
                                @include('site.course.quiz.question-types.filling')
                            @endif
                            {{-- Question: Matching --}}
                            @if($question->type === 'matching')
                                @include('site.course.quiz.question-types.matching')
                            @endif
                            {{-- Question: Logic Choice --}}
                            @if($question->type === 'logic_choice')
                                @include('site.course.quiz.question-types.logic')
                            @endif
                            {{-- Question: Make Sentence --}}
                            @if($question->type === 'make_sentence')
                                @include('site.course.quiz.question-types.sentence')
                            @endif
                            {{-- Question: Make Text --}}
                            @if($question->type === 'make_text')
                                @include('site.course.quiz.question-types.text')
                            @endif
                            {{-- Question: Short Answer --}}
                            @if($question->type === 'short_answer')
                                @include('site.course.quiz.question-types.short')
                            @endif
                            {{-- Question: Listen and Write --}}
                            @if($question->type === 'listen_write')
                                @include('site.course.quiz.question-types.listen-write')
                            @endif
                                {{-- Question: Attach File --}}
                                @if($question->type === 'attach_file')
                                    @include('site.course.quiz.question-types.attach-file')
                                @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-12">
                <div class="form-group text-right mb-5">
                    <button type="button" class="btn btn-dark mb-2 mr-2 ml-2" data-toggle="modal" data-target="#modal-comment">
                        {{ __("site-pages.leave-comment") }}
                    </button>
                    <button class="btn btn-success mb-2 mr-2 ml-2" type="submit"
                            href="{{ route('site.testing', [$course->id, $topic->id, $quiz->id]) }}">{{ __("site-pages.end-quiz") }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('modal')
    <form id="leave-comment" class="form-horizontal" method="POST"
          action="{{route('site.quiz.leave-comment', [$course->id, $topic->id, $quiz->id])}}">
        @csrf

        <div id="modal-comment" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__("site-pages.leave-comment")}}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- Stage Name --}}
                        <div id="comment-result"></div>
                        <div class="form-group">
                            <div class="col-12 mb-3">
                                <label class="form-control-label">
                                    {{ __("site-pages.comment") }}<span class="text-danger ml-2">*</span>
                                </label>
                                <textarea name="message" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">{{ __("site-pages.send") }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('page-scripts')
    <script src="{{asset('assets/site/vendors/js/chart/chart.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/js/progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/site/js/dashboard/db-default.js')}}"></script>
    <script src="{{asset('assets/site/js/dragdrop.js')}}"></script>
    <script src="{{asset('assets/site/js/countdown.js')}}"></script>
    <script src="{{asset('assets/cms/js/youtube.min.js')}}"></script>
    <script src="{{asset('assets/site/js/ajax.js')}}"></script>
@endsection
