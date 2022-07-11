@extends('layouts.cms')

@section('title', __("cms-pages.edit-student"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('students.index') }}">{{ __("cms-pages.students") }}</a></li>
        <li class="breadcrumb-item">{{ __("cms-pages.edit") }}</li>
    </ul>
@endsection
@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf @method('PUT')

        <div class="row flex-row">
            <div class="col-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("cms-pages.student-form") }}</h4>
                    </div>
                    <div class="widget-body">

                        {{-- Student Group --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.group") }}</label>
                            <div class="col-lg-9">
                                <select name="group" class="custom-select form-control">
                                    <option value="" selected disabled>{{ __("cms-pages.choose-group") }}</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                @error('group')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
@endsection
