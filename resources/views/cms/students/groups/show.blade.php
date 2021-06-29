@extends('layouts.cms')

@section('title', $group->name)
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">{{ __("cms-pages.groups") }}</i></a></li>
        <li class="breadcrumb-item active">{{ $group->name }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.about-group") }}</h4>
                    <a href="{{ route('groups.edit', $group->id) }}" type="button"
                       class="btn btn-primary mr-1 mb-2">{{ __("cms-pages.edit") }}</a>
                </div>
                <div class="widget-body">
                    <div class="row flex-row">
                        <div class="col-xl-9">
                            {{-- Group Name --}}
                            <div class="about-infos d-flex flex-column mb-3">
                                <div class="about-title"><h5>{{ __("cms-pages.group-name") }}:</h5></div>
                                <div class="about-text">{{ $group->name }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.students") }}</h4>
                    <a href="{{ route('group.students-list', $group->id) }}" type="button"
                       class="btn btn-primary mr-1 mb-2">{{ __("cms-pages.change-students-list") }}</a>
                </div>

                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.full-name") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td class="text-primary">
                                        <a href="#" class="text-primary">
                                            {{ $student->getFullName() }}
                                        </a>
                                    </td>

                                    <td class="td-actions">
                                        <a href="{{ route('students.course.show', [$student->id, $course->id]) }}"><i class="la la-eye edit"></i></a>
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

