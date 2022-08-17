@extends('layouts.cms')

@section('title', __("cms-pages.new-presentation"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __("cms-pages.courses") }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a></li>
        <li class="breadcrumb-item">{{ $lesson->title }}</li>
        <li class="breadcrumb-item active">{{ __("cms-pages.new-presentation") }}</li>
    </ul>
@endsection
@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('presentations.store', [$course, $stage, $lesson]) }}">
        @csrf

        <div class="row flex-row">
            <div class="col-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("cms-pages.lesson-form") }}</h4>
                    </div>
                    <div class="widget-body">
                        {{-- Lesson Title --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.title") }}<span
                                        class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="title" class="form-control"
                                       placeholder="{{ __("cms-pages.title") }}" value="{{old('title')}}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Lesson Description--}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.description") }}</label>
                            <div class="col-lg-9">
                                <textarea id="description" name="description" class="form-control" rows="3"
                                          placeholder="{{ __("cms-pages.description") }}">{{old('description')}}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Lesson Image --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.main-image") }}</label>
                            <div class="col-lg-9">
                                <div class="form-group preview">
                                    <div class="current-item">
                                        <img src="{{asset('assets/cms/img/no-image.jpg')}}" width="240" alt>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary square mr-1 mb-2 btn-attach"
                                        data-type="image"
                                        data-var="image" data-toggle="modal" data-target="#modal-files">
                                    {{__("cms-pages.choose")}}
                                </button>
                            </div>
                        </div>
                        {{-- Slides --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.slides") }}</label>
                            <div class="col-lg-9">
                                <div class="slides-wrap">
                                    <div class="slide-item empty btn-attach" data-type="image" data-var="slide-image"
                                         data-toggle="modal" data-target="#presentation-files">
                                        <i class="la la-plus la-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.cms.template-parts.form-buttons')
    </form>
@endsection
@section('modal')
    @include('layouts.cms.template-parts.modals.upload-and-choose-files')
    @include('layouts.cms.template-parts.modals.presentation-upload-files')
@endsection
@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
    <script src="{{asset('assets/cms/vendors/js/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        });
    </script>
    <script src="{{asset('assets/cms/js/youtube.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/ajax-store.js')}}"></script>
@endsection
