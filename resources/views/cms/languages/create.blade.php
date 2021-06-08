@extends('layouts.cms')

@section('title', __("cms-pages.new-language"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('languages.index') }}">{{ __("cms-pages.languages") }}</a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.new") }}</li>
    </ul>
@endsection
@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('languages.store') }}">
        @csrf

        <div class="row flex-row">
            <div class="col-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("cms-pages.language-form") }}</h4>
                    </div>
                    <div class="widget-body">

                        {{-- Language Name --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.title") }}<span
                                        class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control"
                                       placeholder="{{ __("cms-pages.title") }}" value="{{old('name')}}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Language Label --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.label") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="label" class="form-control"
                                       placeholder="{{ __("cms-pages.label") }}" value="{{old('label')}}">
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
