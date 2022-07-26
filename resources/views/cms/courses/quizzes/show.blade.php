@extends('layouts.cms')

@section('title', __("cms-pages.quiz-info"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __("cms-pages.courses") }}</i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a></li>
        <li class="breadcrumb-item active">{{ $quiz->title }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.about-quiz") }}</h4>
                    <a href="{{ route('quizzes.edit', [$course->id, $stage->id, $quiz->id]) }}" type="button"
                       class="btn btn-primary mr-1 mb-2">{{ __("cms-pages.edit") }}</a>
                </div>
                <div class="widget-body">
                    <div class="row flex-row">
                        <div class="col-xl-3">
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-image">
                                    <img src="{{$quiz->getImage()}}" alt="{{ $quiz->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            {{-- Quiz Title --}}
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-title"><h5>{{ __("cms-pages.title") }}:</h5></div>
                                <div class="about-text">{{ $quiz->title }}</div>
                            </div>
                            @if($quiz->description)
                                {{-- Quiz Description --}}
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-title"><h5>{{ __("cms-pages.description") }}:</h5></div>
                                    <div class="about-text">{!! $quiz->description !!}</div>
                                </div>
                            @endif
                            @if($quiz->audio)
                                {{-- Quiz Audio --}}
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-text">
                                        <audio src="{{$quiz->getAudio()}}" preload="auto" controls></audio>
                                    </div>
                                </div>
                            @endif
                            @if($quiz->video)
                                {{-- Course Video --}}
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-text">
                                        @if($quiz->isExternalVideo())
                                            <div id="player" data-id="{{$quiz->getVideoId()}}"
                                                 data-width="640" data-height="390"></div>
                                        @else
                                            <video src="{{$quiz->getVideo()}}" width="640" controls></video>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if($quiz->duration > 0)
                                {{-- Quiz Duration --}}
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-title"><h5>{{ __("cms-pages.quiz-duration") }}:</h5></div>
                                    <div class="about-text">{{ $quiz->getDuration() }}</div>
                                </div>
                            @endif
                            @if($quiz->topic->passed_topics)
                                {{-- Quiz Duration --}}
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-title"><h5>{{ __("cms-pages.required-topics") }}:</h5></div>
                                    <div class="about-text">{{ $quiz->topic->getRequiredTopics() }}</div>
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
                    <h4>{{ __("cms-pages.quiz-questions") }}</h4>
                    <div class="text-right">
                        <div class="actions dark">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary mr-1 mb-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                    {{ __("cms-pages.add-question") }} ...
                                </button>
                                <div class="dropdown-menu">
                                    @foreach($questionTypes as $type)
                                        <a href="{{ route('questions.create', [$course->id, $stage->id, $quiz->id, $type->title]) }}" class="dropdown-item">
                                            <i class="la la-plus"></i>{{ __("cms-pages.".$type->title) }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.question") }}</th>
                                <th>{{ __("cms-pages.question-type") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quiz->questions as $question)
                                <tr>
                                    <td class="text-primary">{!! $question->title !!}</td>
                                    <td>{{ __("cms-pages.".$question->type) }}</td>

                                    <td class="td-actions">
                                        <a href="{{ route('questions.show', [$course->id, $stage->id, $quiz->id, $question->id]) }}"><i
                                                class="la la-eye edit"></i></a>
                                        <a href="{{ route('questions.edit', [$course->id, $stage->id, $quiz->id, $question->id]) }}"><i
                                                class="la la-edit edit"></i></a>
                                        <form style="display: inline-block" method="POST"
                                              action="{{ route('questions.destroy', [$course->id, $stage->id, $quiz->id, $question->id]) }}">
                                            @csrf @method('DELETE')

                                            <a href="{{ route('questions.destroy', [$course->id, $stage->id, $quiz->id, $question->id]) }}"
                                               onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                                <i class="la la-close delete"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
    <script src="{{asset('assets/cms/js/components/audio/audioplayer.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/youtube.min.js')}}"></script>
@endsection

