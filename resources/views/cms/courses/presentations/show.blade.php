@extends('layouts.cms')

@section('title', $presentation->title)

@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __("cms-pages.courses") }}</i></a></li>
        <li class="breadcrumb-item">{{ $course->title }}</li>
        <li class="breadcrumb-item">{{ $lesson->title }}</li>
        <li class="breadcrumb-item active">{{ __("cms-pages.presentation") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.about-presentation") }}</h4>

                    <div class="form-group">
                        <a href="{{ route('presentations.edit', [$course, $stage, $lesson, $presentation]) }}"
                           type="button"
                           class="btn btn-primary mr-1 mb-2">{{ __("cms-pages.edit") }}</a>

                        <form style="display: inline-block" method="POST"
                              action="{{ route('presentations.destroy', [$course, $stage, $lesson, $presentation]) }}">
                            @csrf @method('DELETE')

                            <button type="submit" class="btn btn-danger mr-1 mb-2"
                                    onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                {{ __("cms-pages.delete") }}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="row flex-row">
                        <div class="col-xl-3">
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-image">
                                    <img src="{{$presentation->getImage()}}" alt="{{ $presentation->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-title"><h5>{{ __("cms-pages.title") }}:</h5></div>
                                <div class="about-text">{{ $presentation->title }}</div>
                            </div>
                            @if($course->description)
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-title"><h5>{{ __("cms-pages.description") }}:</h5></div>
                                    <div class="about-text">{!! $presentation->description !!}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.slides") }}</h4>
                </div>

                <div class="widget-body">
                    @if($presentation->slides->count())
                        <div id="pres_{{$stage->id}}" class="pres-slides" data-id="{{$stage->id}}">
                            @foreach($presentation->slides->sortby('slide_number') as $slide)

                                <div class="stage-topic d-flex justify-content-between align-items-center mt-3 mb-3"
                                     data-position="{{$slide->slide_number}}"
                                     data-url="{{route('slides.index', $slide->id)}}">

                                    <div class="col-xl-6">
                                        <div class="table-img">
                                            <img src="{{ $slide->slideImage->getSmallImage() }}" width="100" alt>
                                        </div>
                                    </div>
                                    <div class="col-xl-6"></div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
    <script src="{{asset('assets/cms/vendors/js/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/youtube.min.js')}}"></script>

    <script src="{{asset('assets/cms/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/drugdrop-topics.js')}}"></script>
@endsection

