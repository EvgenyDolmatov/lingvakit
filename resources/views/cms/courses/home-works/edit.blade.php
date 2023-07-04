@extends('layouts.cms')

@section('title', __("cms-pages.new-hw"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __("cms-pages.courses") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.new-hw") }}</li>
    </ul>
@endsection
@section('content')
    <form class="form-horizontal" method="POST"
          action="{{ route('lesson.home-works.update', [$course, $stage, $lesson, $homeWork]) }}"
          enctype="multipart/form-data">
        @csrf
        <div class="row flex-row">
            <div class="col-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("cms-pages.hw-form") }}</h4>
                    </div>
                    <div class="widget-body">
                        {{-- Home Work File --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label" for="home_work_file">
                                {{ __("cms-pages.file") }}
                            </label>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <input type="file" name="home_work_file" id="home_work_file" class="form-control">
                                </div>
                                {!! $homeWork->getFile() !!}
                            </div>
                        </div>
                        {{-- Lesson Description--}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label"
                                   for="comment">{{ __("cms-pages.comment") }}</label>
                            <div class="col-lg-9">
                                <textarea id="comment" name="comment" class="form-control" rows="3"
                                          placeholder="{{ __("cms-pages.comment") }}">{{old('comment', $homeWork->comment)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.cms.template-parts.form-buttons')
    </form>
@endsection
