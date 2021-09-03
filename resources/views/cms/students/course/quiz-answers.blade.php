@extends('layouts.cms')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/site/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __("cms-pages.courses") }}</i></a></li>
        <li class="breadcrumb-item">
            <a href="{{ route('students.course.show', [$student->id, $course->id]) }}">{{ $course->title }}</i></a>
        </li>
        <li class="breadcrumb-item active">{{ $quiz->title }}</li>
    </ul>
@endsection
@section('title', $student->getFullName() . ' (' . $quiz->title. ')')
@section('content')
    <div class="row flex-row">
        <div class="col-xl-12 col-md-6 col-sm-6">

            @if($comments)
                <div class="widget widget-12 has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                        <h3>{{ __('cms-pages.messages-from-student') }}</h3>
                    </div>

                    <div class="widget-body">
                        @foreach($comments as $key => $comment)
                            <p class="text-danger">{{ $comment->message }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            @foreach($quiz->questions as $key => $question)
                {{-- Work on Bugs --}}
                <div class="widget widget-12 has-shadow">

                    <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                        <h3 class="{{$question->getFontSize()}}">{{$key+1}}. {{ $question->title }}</h3>
                    </div>

                    <div class="widget-body">
                        {{-- Question: Single Choice --}}
                        @if($question->type === 'single_choice')
                            @foreach($question->conformities as $key => $conformity)
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <div class="col-lg-12">
                                        <div
                                                class="widget-header no-actions d-flex align-items-center justify-content-between">
                                            <h4 class="{{$question->getFontSize()}}">{{$key+1}}
                                                . {{$conformity->title}}</h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    @if($conformity->audio)
                                                        <div class="about-infos d-flex mb-3">
                                                            <div class="about-text">
                                                                <audio src="{{$conformity->getAudio()}}" preload="auto"
                                                                       controls></audio>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if($conformity->image)
                                                        <div class="about-infos d-flex mb-5">
                                                            <div class="about-text">
                                                                <img src="{{$conformity->getImage()}}" width="300"
                                                                     alt="{{ $conformity->title }}">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                @foreach($conformity->options as $option)
                                                    <div class="col-xl-3">
                                                        <div class="mb-3">
                                                            <div class="styled-radio radio-disabled">
                                                                <input type="radio"
                                                                       name="conformity_{{$conformity->id}}"
                                                                       id="option_{{$option->id}}"
                                                                       value="{{$option->id}}" disabled
                                                                       @if($option->getUserAnswer($student)) checked @endif>
                                                                <label
                                                                        class="{{$question->getFontSize()}} {{$option->getClassByAnswer($student)}}"
                                                                        for="option_{{$option->id}}">{{$option->value}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- Question: Multiple Choice --}}
                        @if($question->type === 'multiple_choice')
                            @foreach($question->conformities as $key => $conformity)
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <div class="col-lg-12">
                                        <div
                                                class="widget-header no-actions d-flex align-items-center justify-content-between">
                                            <h4 class="{{$question->getFontSize()}}">{{$key+1}}
                                                . {{$conformity->title}}</h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="row">
                                                @foreach($conformity->options as $option)
                                                    <div class="col-xl-3">
                                                        <div class="mb-3">
                                                            @if($question->type == 'multiple_choice')
                                                                <div class="styled-checkbox checkbox-disabled">
                                                                    <input type="checkbox"
                                                                           name="conformity_{{$conformity->id}}[]"
                                                                           id="answer_{{$option->id}}"
                                                                           value="{{$option->id}}" disabled
                                                                           @if($option->getUserAnswer($student)) checked @endif>
                                                                    <label class="{{$question->getFontSize()}} {{$option->getClassByAnswer($student)}}"
                                                                           for="answer_{{$option->id}}">{{$option->value}}</label>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- Question: Matching --}}
                        @if($question->type === 'matching')
                            <div class="form-group row d-flex align-items-center mb-5">
                                <div class="col-lg-12">
                                    <div class="source-list">
                                        @foreach($question->conformities as $conformity)
                                            <div class="question-container" data-id="{{$conformity->id}}">
                                                <div class="question-body">
                                                    <img src="{{ $conformity->getImage() }}" height="100"
                                                         alt="{{ $quiz->title }}">
                                                </div>
                                                <div class="question-body m-3 {{$question->getFontSize()}}">
                                                    {{ $conformity->title }}
                                                </div>
                                                <div class="draggable-field m-3" data-option="{{$conformity->id}}">
                                                    <div class="list-item m-3 {{$question->getFontSize()}} {{$conformity->getClassByAnswer($student)}}"
                                                         draggable="true"
                                                         data-option="{{$conformity->getOptionIdByAnswer($student)}}">
                                                        {{ $conformity->getOptionValueByAnswer($student) }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- Question: Fill in the Gaps --}}
                        @if($question->type === 'fill_the_gaps')
                            @foreach($question->conformities as $key => $conformity)
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <div class="col-lg-12">
                                        <div
                                                class="widget-header no-actions d-flex align-items-center justify-content-between">
                                            <h4 class="{{$question->getFontSize()}}">{{$key+1}}
                                                . {!! $conformity->getSentenceForBugQuiz($student) !!}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- Question: Logic Choice --}}
                        @if($question->type === 'logic_choice')
                            @foreach($question->conformities as $key => $conformity)
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <div class="col-lg-12">
                                        <div
                                                class="widget-header no-actions d-flex align-items-center justify-content-between">
                                            <h4 class="{{$question->getFontSize()}}">{{$key+1}}
                                                . {{$conformity->title}}</h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="row">
                                                @foreach($conformity->options as $option)
                                                    <div class="col-xl-3">
                                                        <div class="mb-3">
                                                            <div class="styled-radio radio-disabled">
                                                                <input type="radio"
                                                                       name="conformity_{{$conformity->id}}"
                                                                       id="option_{{$option->id}}"
                                                                       value="{{$option->id}}" disabled
                                                                       @if($option->getUserAnswer($student)) checked @endif>
                                                                <label class="{{$question->getFontSize()}} {{$option->getClassByAnswer($student)}}"
                                                                       for="option_{{$option->id}}">{{__("cms-pages.logic-".$option->value)}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- Question: Make Sentence & Make Text --}}
                        @if(in_array($question->type, ['make_sentence', 'make_text']))
                            @foreach($question->conformities as $key => $conformity)
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <div class="col-lg-12">
                                        <div class="source-list">
                                            @foreach($conformity->answersByUser($result) as $answer)
                                                <div class="question-container make-sentence"
                                                     data-id="{{$answer->id }}">

                                                    <div class="draggable-field field-word m-3">

                                                        <div class="list-item item-word m-3 {{$answer->getClassByValue()}} {{$question->getFontSize()}}"
                                                             draggable="true">
                                                            {{ $answer->getOptionValue($student) }}
                                                        </div>

                                                    </div>
                                                    <input type="hidden" name="option_{{$answer->id}}" value="">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- Question: Listen and Write --}}
                        @if($question->type === 'listen_write')
                            @foreach($question->conformities as $key => $conformity)
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <div class="col-lg-12">
                                        <div
                                                class="widget-header no-actions d-flex align-items-center justify-content-between">
                                            <h4 class="{{$question->getFontSize()}}">{{$key+1}}.</h4>
                                        </div>
                                        <input type="text" name="conformity_{{$conformity->id}}"
                                               class="form-control {{$conformity->getClassByAnswer($student)}} {{$question->getFontSize()}}"
                                               value="{{$conformity->getAnswerByUser($student)}}">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- Question: Short Answer --}}
                        @if($question->type === 'short_answer')
                            @foreach($question->conformities as $key => $conformity)
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <div class="col-lg-12">
                                        <div
                                                class="widget-header no-actions d-flex align-items-center justify-content-between">
                                            <h4 class="{{$question->getFontSize()}}">{{$key+1}}
                                                . {!! $conformity->title !!}</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <input type="text" name="conformity_{{$conformity->id}}"
                                                       class="form-control {{$conformity->getClassByAnswer($student)}} {{$question->getFontSize()}}"
                                                       value="{{$conformity->getAnswerByUser($student)}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if($question->type === 'attach_file')
                            @foreach($question->conformities as $key => $conformity)
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <div class="col-lg-12">
                                        <div class="widget-header no-actions d-flex align-items-center justify-content-between">
                                            <h4 class="{{$question->getFontSize()}}">
                                                {{$key+1}}. {!! $conformity->title !!}
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <a href="{{route('files.download', $conformity->answers()->first()->id)}}">
                                                {{ getFileName($conformity->answers()->first()->value)}}
                                            </a>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="text-left">
                                                @if(getUserAnswer($result, $conformity)->is_correct === 1)
                                                    <button class="btn btn-shadow" disabled>
                                                        {{ __("cms-pages.accepted") }}
                                                    </button>
                                                @else
                                                    <form style="display: inline-block" method="POST"
                                                          action="{{route('students.accept-answer', [$student->id, $quiz->id, $conformity->id])}}">
                                                        @csrf @method('PUT')

                                                        <a href="{{route('students.accept-answer', [$student->id, $quiz->id, $conformity->id])}}"
                                                           class="btn btn-gradient-01"
                                                           onclick="event.preventDefault();this.closest('form').submit();">
                                                            {{ __("cms-pages.accept") }}
                                                        </a>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="{{asset('assets/site/vendors/js/progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/js/chart/chart.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/site/vendors/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/site/js/dashboard/db-default.js')}}"></script>
@endsection
