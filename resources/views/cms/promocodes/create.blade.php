@extends('layouts.cms')

@section('title', __("cms-pages.new-promo-code"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('promocodes.index') }}">{{ __("cms-pages.promo-codes") }}</a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.new") }}</li>
    </ul>
@endsection
@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('promocodes.store') }}">
        @csrf
        <div class="row flex-row">
            <div class="col-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("cms-pages.promo-code-form") }}</h4>
                    </div>
                    <div class="widget-body">
                        {{-- Promo Code --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">
                                {{ __("cms-pages.promo-code") }}<span class="text-danger ml-2">*</span>
                            </label>
                            <div class="col-lg-9">
                                <input type="text" name="code" class="form-control"
                                       placeholder="{{ __("cms-pages.promo-code") }}" value="{{old('code')}}">
                                @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Promo Code Description--}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.description") }}</label>
                            <div class="col-lg-9">
                                <textarea name="description" class="form-control" rows="3"
                                          placeholder="{{ __("cms-pages.description") }}">{{old('description')}}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- Promo Code Type --}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.discount-type") }}</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <div class="mb-3">
                                            <div class="styled-radio">
                                                <input type="radio" name="type" id="percent"
                                                       value="percent"
                                                       checked>
                                                <label for="percent">{{ __("cms-pages.percent") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="mb-3">
                                            <div class="styled-radio">
                                                <input type="radio" name="type" id="amount"
                                                       value="amount">
                                                <label for="amount">{{ __("cms-pages.amount") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Promo Code Discount --}}
                        <div class="form-group row align-items-center mb-5 ">
                            <label class="col-lg-3 form-control-label">
                                {{ __("cms-pages.discount") }}<span class="text-danger ml-2">*</span>
                            </label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span id="discount-sign" class="input-group-addon addon-primary">%</span>
                                    <input type="number" name="discount" class="form-control"
                                           placeholder="{{ __("cms-pages.discount") }}" value="{{old('discount')}}">
                                    @error('discount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Promo Code Expiration Date --}}
                        <div class="form-group row align-items-center mb-5 ">
                            <label class="col-lg-3 form-control-label">
                                {{ __("cms-pages.expiration-date") }}<span class="text-danger ml-2">*</span>
                            </label>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="la la-calendar"></i></span>
                                        <input type="text" name="expiration_date" class="form-control" id="date">
                                        @error('expiration_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.cms.template-parts.form-buttons')
    </form>
@endsection
@section('modal')
    @include('layouts.cms.template-parts.modals.upload-and-choose-files')
@endsection
@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
@endsection
