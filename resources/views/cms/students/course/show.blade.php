@extends('layouts.cms')

@section('title', $course->title.' ('.$student->getFullName().')')
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
                    <h4>{{ __("cms-pages.results") }}</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.image") }}</th>
                                <th>{{ __("cms-pages.occupation-type") }}</th>
                                <th>{{ __("cms-pages.topic") }}</th>
                                <th>{{ __("cms-pages.date") }}</th>
                                <th>{{ __("cms-pages.result") }}</th>
                                <th>{{ __("cms-pages.attempts") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($course->stages as $keyStage => $stage)

                                <tr class="text-primary header header-danger">
                                    <td style="width: 70%" colspan="7">
                                        <h4>{{ ($keyStage+1).'. '.$stage->name }}</h4>
                                    </td>
                                </tr>

                                @foreach($stage->topics as $key => $topic)
                                    @if($topic->lesson)
                                        <tr>
                                            <td style="width:100px">
                                                <img src="{{ $topic->lesson->getImage() }}" width="100" alt>
                                            </td>
                                            <td class="text-primary">{{ __("cms-pages.".$topic->name) }}</td>
                                            <td>{{ $topic->lesson->title }}</td>
                                            <td>{{ $topic->getFinishedDate($student) }}</td>
                                            <td>{{ __('cms-pages.lesson-'.$topic->getResultByUser($student)) }}</td>
                                            <td></td>
                                        </tr>
                                    @elseif($topic->quiz)
                                        <tr>
                                            <td style="width:100px">
                                                <img src="{{ $topic->quiz->getImage() }}" width="100" alt>
                                            </td>
                                            <td class="text-primary">{{ __("cms-pages.".$topic->name) }}</td>
                                            <td>{{ $topic->quiz->title }}</td>
                                            <td>{{ $topic->getFinishedDate($student) }}</td>
                                            <td>{!! $topic->quiz->showUserScore($student) !!}</td>
                                            <td>{{ $topic->getAttemptQuantity($student) }}</td>

                                            <td class="td-actions">
                                                @if($topic->quiz->getResult($student))
                                                    <a href="{{ route('students.course.answers.show', [$student->id, $course->id, $topic->quiz->id]) }}">
                                                        <i class="la la-eye edit"></i>
                                                    </a>
                                                @endif
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
    </div>
@endsection

@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
    <script src="{{asset('assets/cms/vendors/js/bootstrap-select/bootstrap-select.min.js')}}"></script>
@endsection

