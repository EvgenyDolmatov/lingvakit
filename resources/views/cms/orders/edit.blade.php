@extends('layouts.cms')

@section('title', __("cms-pages.edit-order"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __("cms-pages.orders") }}</a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.edit") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>{{ __("cms-pages.order-form") }}</h4>
                </div>
                <div class="widget-body">
                    <form class="form-horizontal" method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf @method('PUT')

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.company-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.company") }}<span
                                    class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <input type="text" name="company_name" class="form-control"
                                               placeholder="{{ __("cms-pages.company") }}"
                                               value="{{$order->company}}">
                                        @error('company_name')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" id="company_itn" name="company_itn" class="form-control"
                                               placeholder="{{ __("cms-pages.company-itn") }}" value="{{$order->itn}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.personal-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.full-name") }}<span
                                    class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" name="surname" class="form-control"
                                               placeholder="{{ __("cms-pages.surname-placeholder") }} *"
                                               value="{{$order->surname}}">
                                        @error('surname')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="{{ __("cms-pages.name-placeholder") }} *"
                                               value="{{$order->name}}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="patronymic" class="form-control"
                                               placeholder="{{ __("cms-pages.patronymic-placeholder") }}"
                                               value="{{$order->patronymic}}">
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
                                       placeholder="{{ __("cms-pages.email-placeholder") }}"
                                       value="{{$order->email}}">
                                @error('email')
                                <div class="invalid-feedback">{{ __($message) }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.phone") }}<span
                                    class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="phone" id="phone" class="form-control"
                                       placeholder="{{ __("cms-pages.phone-placeholder") }}"
                                       value="{{$order->phone}}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.passport") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="passport" id="passport" class="form-control"
                                       placeholder="{{ __("cms-pages.passport-placeholder") }}"
                                       value="{{$order->passport}}">
                                @error('passport')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.address-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.country") }}</label>
                            <div class="col-lg-9">
                                <select name="country_id" class="custom-select form-control">
                                    <option value="" @if($order->country) selected @endif disabled>{{ __("cms-pages.choose-country") }}</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" @if($country->id == $order->country_id) selected @endif>
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
                                       placeholder="{{ __("cms-pages.state-placeholder") }}"
                                       value="{{$order->state}}">
                                @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.city") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="city" class="form-control"
                                       placeholder="{{ __("cms-pages.city-placeholder") }}" value="{{$order->city}}">
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.address") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="address" class="form-control"
                                       placeholder="{{ __("cms-pages.address-placeholder") }}"
                                       value="{{$order->address}}">
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.zip") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="zip" class="form-control"
                                       placeholder="{{ __("cms-pages.zip-placeholder") }}" value="{{$order->zip}}">
                                @error('zip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.payment-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.payment-type") }}</label>
                            <div class="col-lg-9">
                                <select name="payment_type" class="custom-select form-control">
                                    <option value="" disabled>{{ __("cms-pages.choose-payment-type") }}</option>
                                    <option value="bank_card" @if($order->payment_type == "bank_card") selected @endif>
                                        {{ __("cms-pages.bank_card") }}
                                    </option>
                                    <option value="money_transfer" @if($order->payment_type == "money_transfer") selected @endif>
                                        {{ __("cms-pages.money_transfer") }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.order-status") }}</label>
                            <div class="col-lg-9">
                                <select name="status_id" class="custom-select form-control">
                                    <option value="" disabled>{{ __("cms-pages.choose-order-status") }}</option>
                                    @foreach($orderStatuses as $orderStatus)
                                        <option value="{{ $orderStatus->id }}" @if($orderStatus->id == $order->status->id) selected @endif>
                                            {{ __("cms-pages.".$orderStatus->title) }}
                                        </option>
                                    @endforeach
                                </select>
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
