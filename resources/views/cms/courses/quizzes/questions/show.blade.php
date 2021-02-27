@extends('layouts.cms')

@section('title', __("cms-pages.question-info"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __("cms-pages.courses") }}</i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a></li>
        <li class="breadcrumb-item"><a
                href="{{ route('quizzes.show', [$course->id, $stage->id, $quiz->id]) }}">{{ $quiz->title }}</a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.question") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        {{-- Question Info --}}
        <div class="col-xl-12">
            @include('layouts.cms.template-parts.course.question.show-question-info')
        </div>

        <div class="col-xl-12">
            {{-- Fill in the Gaps--}}
            @if($question->type === 'fill_the_gaps')
                @include('cms.courses.quizzes.questions.conformity.layouts.show.filling')
            @endif
            {{-- Single Choice --}}
            @if($question->type === 'single_choice')
                @include('cms.courses.quizzes.questions.conformity.layouts.show.single')
            @endif
            {{-- Multiple Choice--}}
            @if($question->type === 'multiple_choice')
                @include('cms.courses.quizzes.questions.conformity.layouts.show.multiple')
            @endif
            {{-- Logic Choice--}}
            @if($question->type === 'logic_choice')
                @include('cms.courses.quizzes.questions.conformity.layouts.show.logic')
            @endif
            {{-- Matching --}}
            @if($question->type === 'matching')
                @include('cms.courses.quizzes.questions.conformity.layouts.show.matching')
            @endif
            {{-- Make Sentence --}}
            @if(in_array($question->type, ['make_sentence', 'listen_write']))
                @include('cms.courses.quizzes.questions.conformity.layouts.show.sentence')
            @endif
            {{-- Make Text --}}
            @if($question->type === 'make_text')
                @include('cms.courses.quizzes.questions.conformity.layouts.show.text')
            @endif
            {{-- Short Answer --}}
            @if($question->type === 'short_answer')
                @include('cms.courses.quizzes.questions.conformity.layouts.show.short')
            @endif
        </div>
    </div>
@endsection

@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
    <script src="{{asset('assets/cms/vendors/js/bootstrap-select/bootstrap-select.min.js')}}"></script>
@endsection

