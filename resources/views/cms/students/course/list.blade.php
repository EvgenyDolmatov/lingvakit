@extends('layouts.cms')

@section('title', $course->title)
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.students") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">

        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.students") }}</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.rating") }}</th>
                                <th>{{ __("cms-pages.student") }}</th>
                                <th>{{ __("cms-pages.passed") }}</th>
                                <th>{{ __("cms-pages.points") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $key => $student)
                                <tr>
                                    <td class="text-primary">{{$key+1}}</td>
                                    <td><a href="{{route('students.show', $student->id)}}">{{$student->getFullName()}}</a></td>
                                    <td>{{$course->getProgress($student)}}</td>
                                    <td>{{$student->getPoints($course).' / '.$course->getTotalPoints()}}</td>
                                    <td class="td-actions">
                                        <a href="{{ route('students.course.show', [$student->id, $course->id]) }}">
                                            <i class="la la-eye edit"></i>
                                        </a>
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
    <script src="{{asset('assets/cms/vendors/js/bootstrap-select/bootstrap-select.min.js')}}"></script>
@endsection

