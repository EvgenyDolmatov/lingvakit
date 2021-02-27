@extends('layouts.cms')

@section('title', __("cms-pages.edit-customer"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">{{ __("cms-pages.customers") }}</a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.edit") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>{{ __("cms-pages.customer-form") }}</h4>
                </div>
                <div class="widget-body">
                    <form class="form-horizontal" method="POST" action="{{ route('customers.update', $user->id) }}">
                        @csrf @method('PUT')

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.personal-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.company") }}</label>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <select id="company_id" name="company_id" class="custom-select form-control">
                                        <option value="" @if(!$user->company) selected @endif disabled>
                                            {{ __("cms-pages.choose-company") }}
                                        </option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}" @if($user->company && $company->id == $user->company->id) selected @endif>
                                                    {{$company->name}}
                                                </option>
                                            @endforeach
                                        <option value="other">{{ __("cms-pages.other") }}</option>
                                    </select>
                                </div>
                                <div id="company" class="form-group hide">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="text" name="company_name" class="form-control"
                                                   placeholder="{{ __("cms-pages.company_name") }} *" value="{{old('company_name')}}">
                                        </div>
                                        <div class="col-3">
                                            <input type="text" name="company_itn" class="form-control"
                                                   placeholder="{{ __("cms-pages.company_itn") }} *" value="{{old('company_itn')}}">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.full-name") }}<span
                                    class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" name="surname" class="form-control"
                                               placeholder="{{ __("cms-pages.surname-placeholder") }} *" value="{{$user->surname}}">
                                        @error('surname')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="{{ __("cms-pages.name-placeholder") }} *" value="{{$user->name}}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="patronymic" class="form-control"
                                               placeholder="{{ __("cms-pages.patronymic-placeholder") }}" value="{{$user->patronymic}}">
                                        @error('patronymic')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.email") }}<span
                                    class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <input type="email" name="email" class="form-control"
                                       placeholder="{{ __("cms-pages.email-placeholder") }}" value="{{$user->email}}">
                                @error('email')
                                <div class="invalid-feedback">{{ __($message) }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.phone") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="phone" id="phone" class="form-control"
                                       placeholder="{{ __("cms-pages.phone-placeholder") }}" value="{{$user->phone}}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.passport") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="passport" id="passport" class="form-control"
                                       placeholder="{{ __("cms-pages.passport-placeholder") }}" value="{{$user->passport}}">
                                @error('passport')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.additional-info") }}</label>
                            <div class="col-lg-9">
                                <div class="mb-3">
                                    <div class="styled-checkbox">
                                        <input type="checkbox" name="is_dealer" id="is_dealer" value="1" @if($user->is_dealer == 1) checked @endif>
                                        <label for="is_dealer">{{ __("cms-pages.is-dealer") }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.address-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.country") }}</label>
                            <div class="col-lg-9">
                                <select name="country_id" class="custom-select form-control">
                                    <option value="" @if(!$user->country) selected @endif disabled>{{ __("cms-pages.choose-country") }}</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" @if($user->country && $country->id == $user->country->id) selected @endif>
                                            {{ __("countries.".$country->code) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.state") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="state" class="form-control"
                                       placeholder="{{ __("cms-pages.state") }}" value="{{$user->state}}">
                                @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.city") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="city" class="form-control"
                                       placeholder="{{ __("cms-pages.city") }}" value="{{$user->city}}">
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.address") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="address" class="form-control"
                                       placeholder="{{ __("cms-pages.address") }}" value="{{$user->address}}">
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.zip") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="zip" class="form-control"
                                       placeholder="{{ __("cms-pages.zip") }}" value="{{$user->zip}}">
                                @error('zip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @include('layouts.cms.template-parts.form-buttons')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
@endsection
