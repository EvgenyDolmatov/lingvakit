@extends('layouts.cms')

@section('title', __("cms-pages.edit-permission"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __("cms-pages.roles-permissions") }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __("cms-pages.edit") }}</li>
    </ul>
@endsection
@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('permissions.update', $permission->id) }}">
        @csrf @method('PUT')

        <div class="row flex-row">
            <div class="col-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("cms-pages.permission-form") }}</h4>
                    </div>
                    <div class="widget-body">
                        {{-- Role Label --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.label") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control"
                                       placeholder="{{ __("cms-pages.label") }}" value="{{$permission->name}}">
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
