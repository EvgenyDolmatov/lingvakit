@extends('layouts.cms')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/bootstrap-select/bootstrap-select.min.css')}}">
@endsection
@section('title', $group->name)
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">{{ __("cms-pages.groups") }}</i></a></li>
        <li class="breadcrumb-item active">{{ $group->name }}</li>
    </ul>
@endsection
@section('content')
    <form class="form-horizontal" method="POST" action="{{route('group.set-students-list', $group->id)}}">
        @csrf

        <div class="row flex-row">
            <div class="col-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("cms-pages.students-list") }}</h4>
                    </div>
                    <div class="widget-body">
                        {{-- Students List --}}
                        <div class="form-group row d-flex align-items-center mt-3 mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.students") }}</label>
                            <div class="col-lg-9">
                                <select name="students_list" class="selectpicker show-menu-arrow" multiple>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->getFullName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.cms.template-parts.form-buttons')
    </form>
@endsection

@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
    <script src="{{asset('assets/cms/vendors/js/bootstrap-select/bootstrap-select.min.js')}}"></script>
@endsection

