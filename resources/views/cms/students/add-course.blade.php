@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', $student->getFullName())
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('students.index') }}">{{ __("cms-pages.students") }}</a></li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.about-student") }}</h4>
                    <a href="{{ route('students.edit', $student->id) }}" type="button"
                       class="btn btn-primary mr-1 mb-2">{{ __("cms-pages.edit") }}</a>
                </div>
                <div class="widget-body">
                    <div class="row flex-row">
                        <div class="col-xl-9">
                            {{-- Student Full Name --}}
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-title"><h5>{{ __("cms-pages.full-name") }}:</h5></div>
                                <div class="about-text">{{ $student->getFullName() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.filter") }}</h4>

                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.image") }}</th>
                                <th>{{ __("cms-pages.course") }}</th>
                                <th>{{ __("cms-pages.available") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td style="width: 150px;">
                                        <img src="{{ $course->getImage() }}" width="100" alt>
                                    </td>
                                    <td>
                                        <a href="{{ route('courses.show', $course->id) }}" class="text-primary">
                                            {{ $course->title }}
                                        </a>
                                    </td>
                                    <td>
                                        <span style="width:100px">
                                            <span class="badge-text badge-text-small @if($student->hasCourse($course)) success @else danger @endif">
                                                @if($student->hasCourse($course))
                                                    {{__("cms-pages.yes")}}
                                                @else
                                                    {{__("cms-pages.no")}}
                                                @endif
                                            </span>
                                        </span>
                                    </td>
                                    <td class="td-actions">
                                        @if(!$student->hasCourse($course))
                                            <form style="display: inline-block" method="POST"
                                                  action="{{ route('students.course.give-access', [$student->id, $course->id]) }}">
                                                @csrf

                                                <a href="{{ route('students.course.give-access', [$student->id, $course->id]) }}"
                                                   onclick="event.preventDefault();if(confirm('{{ __("cms-messages.give-access") }}')){this.closest('form').submit();}">
                                                    {{__("cms-pages.give-access")}}
                                                </a>
                                            </form>
                                        @endif
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
    @include('layouts.cms.template-parts.scripts-index')
@endsection
