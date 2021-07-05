@extends('layouts.cms')

@section('title')
    @if($course->is_allowed == 0)
        <span class="text-danger">
            {{$course->title .' ('. __("cms-pages.course-blocked") . ')'}}
        </span>
    @else
        {{$course->title}}
    @endif
@endsection
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __("cms-pages.courses") }}</i></a></li>
        <li class="breadcrumb-item active">{{ $course->title }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.about-course") }}</h4>

                    <div class="form-group">
                        <a href="{{ route('courses.edit', $course->id) }}" type="button"
                           class="btn btn-primary mr-1 mb-2">{{ __("cms-pages.edit") }}</a>

                        @if($currentUser->hasRole(['superuser','admin']))
                            <form style="display: inline-block" method="POST"
                                  action="{{ route('courses.moderate-switcher', $course->id) }}">
                                @csrf @method('PUT')

                                <button type="submit" class="btn btn-warning mr-1 mb-2">
                                    @if($course->is_allowed == 0)
                                        {{ __("cms-pages.unblock") }}
                                    @else
                                        {{ __("cms-pages.block") }}
                                    @endif
                                </button>
                            </form>
                        @endif

                        @if($course->author->id === $currentUser->id)
                            <form style="display: inline-block" method="POST"
                                  action="{{ route('courses.destroy', $course->id) }}">
                                @csrf @method('DELETE')

                                <button type="submit" class="btn btn-danger mr-1 mb-2"
                                        onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                    {{ __("cms-pages.delete") }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="widget-body">
                    <div class="row flex-row">
                        <div class="col-xl-3">
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-image">
                                    <img src="{{$course->getImage()}}" alt="{{ $course->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">

                            {{-- Course Author --}}
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-title"><h5>{{ __("cms-pages.author") }}:</h5></div>
                                <div class="about-text">{{ $course->author->getFullName() }}</div>
                            </div>
                            {{-- Course Publish Date --}}
                            @if($course->publish_date)
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-title"><h5>{{ __("cms-pages.publish-date") }}:</h5></div>
                                    <div class="about-text">{{ $course->publish_date }}</div>
                                </div>
                            @endif
                            {{-- Course Title --}}
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-title"><h5>{{ __("cms-pages.title") }}:</h5></div>
                                <div class="about-text">{{ $course->title }}</div>
                            </div>
                            {{-- Course Description --}}
                            @if($course->description)
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-title"><h5>{{ __("cms-pages.description") }}:</h5></div>
                                    <div class="about-text">{!! $course->description !!}</div>
                                </div>
                            @endif

                            <div class="about-infos d-flex mb-4">
                                @if($course->language)
                                    {{-- Course Language --}}
                                    <button type="button" class="btn btn-outline-primary btn-sm mr-3">
                                        {{ __("languages.".$course->language->label) }}
                                    </button>
                                @endif
                                @if($course->category)
                                    {{-- Course Category --}}
                                    <button type="button" class="btn btn-outline-info btn-sm mr-3">
                                        {{ __($course->category->name) }}
                                    </button>
                                @endif
                                {{-- Course Level --}}
                                <button type="button" class="btn btn-outline-danger btn-sm mr-3">
                                    {{ __("cms-pages.".$course->difficulty_level) }}
                                </button>
                            </div>

                            {{-- Course Quizzes --}}
                            @if($course->quizzes)
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-title"><h5>{{ __("cms-pages.quizzes") }}:</h5></div>
                                    @foreach($course->quizzes as $quiz)
                                        <div class="about-text">{{ $quiz->question }}</div>
                                    @endforeach
                                </div>
                            @endif
                            @if($course->video)
                                {{-- Course Video --}}
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-text">
                                        @if($course->isExternalVideo())
                                            <div id="player" data-id="{{$course->getVideoId()}}"
                                                 data-width="640" data-height="390"></div>
                                        @else
                                            <video src="{{$course->getVideo()}}" width="640" controls></video>
                                        @endif
                                    </div>
                                </div>
                            @endif


                            {{-- Course Category --}}
                            {{--<div class="about-infos d-flex flex-column mb-3">
                                <div class="about-title"><h5>{{ __("cms-pages.category") }}:</h5></div>
                                <div class="about-text">{{ __($course->category->name) }}</div>
                            </div>--}}
                            {{-- Course Level --}}
                            {{--<div class="about-infos d-flex flex-column mb-3">
                                <div class="about-title"><h5>{{ __("cms-pages.difficulty-level") }}:</h5></div>
                                <div class="about-text">{{ __("cms-pages.".$course->difficulty_level) }}</div>
                            </div>--}}
                            @if($course->duration > 0)
                                {{-- Course Duration --}}
                                <div class="about-infos d-flex flex-column mb-3">
                                    <div class="about-title"><h5>{{ __("cms-pages.course-duration") }}:</h5></div>
                                    <div class="about-text">{{ $course->getDuration() }}</div>
                                </div>
                            @endif
                            {{-- Course Price --}}
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-title"><h5>{{ __("cms-pages.course-cost") }}:</h5></div>
                                <div class="about-text">{!! $course->getPrice() !!}</div>
                            </div>
                            {{-- Number of Students --}}
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="text-left">
                                    <a href="{{route('course.students.list', $course->id)}}"
                                       class="btn btn-warning btn-sm mr-1 mb-2">
                                        {{ __("cms-pages.students") }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Show only to the owner of this course --}}
        @if( $course->belongsToCurrentTeacher() )
            <div class="col-xl-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                        <h4>{{ __("cms-pages.course-plan") }}</h4>
                        <button type="button" class="btn btn-primary mr-1 mb-2" data-toggle="modal"
                                data-target="#modal-stage">
                            {{ __("cms-pages.add-stage") }}
                        </button>
                    </div>

                    <div class="widget-body">


                        @foreach($course->stages as $keyStage => $stage)

                            <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                                <div class="col-12">
                                    <h4>{{ ($keyStage+1).'. '.$stage->name }}</h4>
                                </div>
                            </div>

                            <div class="stage-topics">
                                @foreach($stage->topics as $key => $topic)
                                    @if($topic->lesson)
                                        <div class="stage-topic d-flex justify-content-between align-items-center mt-2 mb-2" data-id="{{$topic->id}}">
                                            <input type="hidden" value="{{$topic->id}}">
                                            <div class="col-2">
                                                <img src="{{ $topic->lesson->getImage() }}" width="100" alt>
                                            </div>
                                            <div class="col-2">
                                                {{ __("cms-pages.".$topic->name) }}
                                            </div>
                                            <div class="col-2">
                                                {{ $topic->lesson->title }}
                                            </div>
                                            <div class="col-2">
                                                {{ $topic->lesson->getDuration() }}
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ route('lessons.edit', [$course->id, $stage->id, $topic->lesson->id]) }}"><i
                                                            class="la la-edit edit"></i></a>
                                                <form style="display: inline-block" method="POST"
                                                      action="{{ route('lessons.destroy', [$course->id, $stage->id, $topic->lesson->id]) }}">
                                                    @csrf @method('DELETE')

                                                    <a href="{{ route('lessons.destroy', [$course->id, $stage->id, $topic->lesson->id]) }}"
                                                       onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                                        <i class="la la-close delete"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    @elseif($topic->quiz)
                                        <div class="stage-topic d-flex justify-content-between align-items-center mt-2 mb-2">
                                            <input type="hidden" value="{{$topic->id}}">
                                            <div class="col-2">
                                                <img src="{{ $topic->quiz->getImage() }}" width="100" alt>
                                            </div>
                                            <div class="col-2">
                                                {{ __("cms-pages.".$topic->name) }}
                                            </div>
                                            <div class="col-2">
                                                {{ $topic->quiz->title }}
                                            </div>
                                            <div class="col-2">
                                                {{ $topic->quiz->getDuration() }}
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ route('lessons.edit', [$course->id, $stage->id, $topic->quiz->id]) }}"><i
                                                            class="la la-edit edit"></i></a>
                                                <form style="display: inline-block" method="POST"
                                                      action="{{ route('lessons.destroy', [$course->id, $stage->id, $topic->quiz->id]) }}">
                                                    @csrf @method('DELETE')

                                                    <a href="{{ route('lessons.destroy', [$course->id, $stage->id, $topic->quiz->id]) }}"
                                                       onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                                        <i class="la la-close delete"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>


                        @endforeach


                        <div class="table-responsive">
                            <table id="sorting-table" class="table mb-0">
                                <thead>
                                <tr>
                                    <th style="width:100px">{{ __("cms-pages.image") }}</th>
                                    <th>{{ __("cms-pages.occupation-type") }}</th>
                                    <th>{{ __("cms-pages.topic") }}</th>
                                    <th>{{ __("cms-pages.duration") }}</th>
                                    <th>{{ __("cms-pages.max-points") }}</th>
                                    <th class="text-right">{{ __("cms-pages.actions") }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($course->stages as $keyStage => $stage)
                                    <tr class="text-primary header">
                                        <td style="width: 70%" colspan="5">
                                            <h4>{{ ($keyStage+1).'. '.$stage->name }}</h4>
                                        </td>
                                        <td class="td-actions text-right">
                                            <div class="actions dark d-inline-block">
                                                <div class="dropdown">
                                                    <button type="button" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"
                                                            class="dropdown-toggle">
                                                        <i class="la la-plus edit"></i></button>

                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('lessons.create', [$course->id, $stage->id]) }}"
                                                           class="dropdown-item">
                                                            <i class="la la-plus"></i>{{ __("cms-pages.new-lesson") }}
                                                        </a>
                                                        <a href="{{ route('quizzes.create', [$course->id, $stage->id]) }}"
                                                           class="dropdown-item">
                                                            <i class="la la-plus"></i>{{ __("cms-pages.new-quiz") }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" data-toggle="modal"
                                                    data-target="#modal-stage-{{$stage->id}}">
                                                <i class="la la-edit edit"></i>
                                            </button>
                                            <form style="display: inline-block" method="POST"
                                                  action="{{ route('stages.destroy', [$course->id, $stage->id]) }}">
                                                @csrf @method('DELETE')

                                                <a href="{{ route('stages.destroy', [$course->id, $stage->id]) }}"
                                                   onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                                    <i class="la la-close delete"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>

                                    @if(count($stage->topics) < 1)
                                        <tr class="empty">
                                            <td class="text-center" colspan="5">
                                                <div class="d-flex justify-content-center align-items-center"
                                                     style="min-height: 130px">
                                                    {{__("cms-pages.empty")}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    @foreach($stage->topics as $key => $topic)
                                        @if($topic->lesson)
                                            <tr>
                                                <td style="width:100px">
                                                    <img src="{{ $topic->lesson->getImage() }}" width="100" alt>
                                                </td>
                                                <td class="text-primary">{{ __("cms-pages.".$topic->name) }}</td>
                                                <td>{{ $topic->lesson->title }}</td>
                                                <td>{{ $topic->lesson->getDuration() }}</td>
                                                <td></td>
                                                <td class="td-actions text-right">
                                                    <a href="{{ route('lessons.edit', [$course->id, $stage->id, $topic->lesson->id]) }}"><i
                                                                class="la la-edit edit"></i></a>
                                                    <form style="display: inline-block" method="POST"
                                                          action="{{ route('lessons.destroy', [$course->id, $stage->id, $topic->lesson->id]) }}">
                                                        @csrf @method('DELETE')

                                                        <a href="{{ route('lessons.destroy', [$course->id, $stage->id, $topic->lesson->id]) }}"
                                                           onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                                            <i class="la la-close delete"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @elseif($topic->quiz)
                                            <tr>
                                                <td style="width:100px">
                                                    <img src="{{ $topic->quiz->getImage() }}" width="100" alt>
                                                </td>
                                                <td class="text-primary">{{ __("cms-pages.".$topic->name) }}</td>
                                                <td>{{ $topic->quiz->title }}</td>
                                                <td>{{ $topic->quiz->getDuration() }}</td>
                                                <td>{{ $topic->quiz->getTotalPoints() }}</td>
                                                <td class="td-actions text-right">
                                                    <a href="{{ route('quizzes.show', [$course->id, $stage->id, $topic->quiz->id]) }}"><i
                                                                class="la la-eye edit"></i></a>
                                                    <a href="{{ route('quizzes.edit', [$course->id, $stage->id, $topic->quiz->id]) }}"><i
                                                                class="la la-edit edit"></i></a>
                                                    <form style="display: inline-block" method="POST"
                                                          action="{{ route('quizzes.destroy', [$course->id, $stage->id, $topic->quiz->id]) }}">
                                                        @csrf @method('DELETE')

                                                        <a href="{{ route('quizzes.destroy', [$course->id, $stage->id, $topic->quiz->id]) }}"
                                                           onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                                            <i class="la la-close delete"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('modal')
    <form class="form-horizontal" method="POST" action="{{ route('stages.store', $course->id) }}">
        @csrf

        <div id="modal-stage" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__("cms-pages.new-stage")}}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- Stage Name --}}
                        <div class="form-group">
                            <div class="col-12 mb-3">
                                <label class="form-control-label">
                                    {{ __("cms-pages.title") }}<span class="text-danger ml-2">*</span>
                                </label>
                                <input type="text" name="name" class="form-control"
                                       placeholder="{{ __("cms-pages.title") }}" value="{{old('name')}}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-gradient-01" type="submit">{{ __("cms-pages.save") }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @foreach($course->stages as $stage)
        <form class="form-horizontal" method="POST" action="{{ route('stages.update', [$course->id, $stage->id]) }}">
            @csrf @method('PUT')

            <div id="modal-stage-{{$stage->id}}" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{__("cms-pages.edit-stage")}}</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- Stage Name --}}
                            <div class="form-group">
                                <div class="col-12 mb-3">
                                    <label class="form-control-label">
                                        {{ __("cms-pages.title") }}<span class="text-danger ml-2">*</span>
                                    </label>
                                    <input type="text" name="name" class="form-control"
                                           placeholder="{{ __("cms-pages.title") }}" value="{{$stage->name}}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-gradient-01" type="submit">{{ __("cms-pages.save") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@endsection

@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
    <script src="{{asset('assets/cms/vendors/js/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/youtube.min.js')}}"></script>

    <script src="{{asset('assets/cms/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/drugdrop-topics.js')}}"></script>
@endsection

