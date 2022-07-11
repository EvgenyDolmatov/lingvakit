@extends('layouts.cms')

@section('title', __("cms-pages.new-role"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __("cms-pages.roles-permissions") }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __("cms-pages.new") }}</li>
    </ul>
@endsection
@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('roles.store') }}">
        @csrf

        <div class="row flex-row">
            <div class="col-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("cms-pages.role-form") }}</h4>
                    </div>
                    <div class="widget-body">
                        {{-- Role Label --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.label") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control"
                                       placeholder="{{ __("cms-pages.label") }}" value="{{old('label')}}">
                            </div>
                        </div>
                        <div class="em-separator separator-dashed"></div>
                        {{-- Permissions of the Role--}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.permissions") }}</label>
                            <div class="col-lg-9">
                                @foreach($permissions as $permission)
                                    <div class="mb-3">
                                        <div class="styled-checkbox">
                                            <input type="checkbox" name="permissions[]" id="{{ $permission->name }}" value="{{ $permission->id }}">
                                            <label for="{{ $permission->name }}">{{ __($permission->name) }}</label>
                                        </div>
                                    </div>
                                @endforeach
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
