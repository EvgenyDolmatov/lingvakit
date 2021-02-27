@extends('layouts.cms')

@section('page-styles')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
@endsection
@section('title', __("cms-pages.edit-answer"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __("cms-pages.courses") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('quizzes.show', [$course->id, $quiz->id]) }}">{{ $quiz->title }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('questions.show', [$course->id, $quiz->id, $question->id]) }}">{{ __("cms-pages.question") }}</a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.edit-answer") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>{{ __("cms-pages.answer") }}</h4>
                </div>
                <div class="widget-body">
                    <form class="form-horizontal" method="POST" action="{{ route('options.update', [$course->id, $quiz->id, $question->id, $option->id]) }}">
                        @csrf @method('PUT')

                        {{-- Answer Value --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.answer") }}<span
                                    class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="value" class="form-control"
                                       placeholder="{{ __("cms-pages.answer") }}" value="{{$option->value}}">
                                @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @include('layouts.cms.template-parts.form-buttons')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
@endsection
