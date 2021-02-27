@extends('layouts.cms')

@section('page-styles')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
@endsection
@section('title', __("cms-pages.new-order"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __("cms-pages.orders") }}</a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.new") }}</li>
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
                    <form class="form-horizontal" method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.company-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.company") }}</label>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <select id="company_id" name="company_id" class="custom-select form-control">
                                        <option value="" @if(old('company_id') == null) selected @endif>
                                            {{ __("cms-pages.choose-company") }}
                                        </option>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}" @if(old('company_id') == $company->id) selected @endif>
                                                {{ $company->name }}
                                            </option>
                                        @endforeach
                                        <option value="other">{{ __("cms-pages.other") }}</option>
                                    </select>
                                </div>
                                <div id="company" class="form-group hide">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="text" name="company_name" class="form-control"
                                                   placeholder="{{ __("cms-pages.company-name") }} *" value="{{old('company_name')}}">
                                            @error('company_name')
                                            <div class="invalid-feedback">{{ __($message) }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <input type="text" id="company_itn" name="company_itn" class="form-control"
                                                   placeholder="{{ __("cms-pages.company-itn") }} *" value="{{old('company_itn')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Personal Info --}}
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
                                               value="{{old('surname')}}">
                                        @error('surname')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="{{ __("cms-pages.name-placeholder") }} *"
                                               value="{{old('name')}}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="patronymic" class="form-control"
                                               placeholder="{{ __("cms-pages.patronymic-placeholder") }}"
                                               value="{{old('patronymic')}}">
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
                                       value="{{old('email')}}">
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
                                       value="{{old('phone')}}">
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
                                       value="{{old('passport')}}">
                                @error('passport')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Address Info --}}
                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.address-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.country") }}</label>
                            <div class="col-lg-9">
                                <select name="country_id" class="custom-select form-control">
                                    <option value="" selected disabled>{{ __("cms-pages.choose-country") }}</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" @if(old('country_id') == $country->id) selected @endif>
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
                                       placeholder="{{ __("cms-pages.state-placeholder") }}" value="{{old('state')}}">
                                @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.city") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="city" class="form-control"
                                       placeholder="{{ __("cms-pages.city-placeholder") }}" value="{{old('city')}}">
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.address") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="address" class="form-control"
                                       placeholder="{{ __("cms-pages.address-placeholder") }}" value="{{old('address')}}">
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.zip") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="zip" class="form-control"
                                       placeholder="{{ __("cms-pages.zip-placeholder") }}" value="{{old('zip')}}">
                                @error('zip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Payment Info --}}
                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.payment-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.payment-type") }}</label>
                            <div class="col-lg-9">
                                <select name="payment_type" class="custom-select form-control">
                                    <option value="" disabled @if(old('payment_type') == null) selected @endif>
                                        {{ __("cms-pages.choose-payment-type") }}
                                    </option>
                                    <option value="bank_card" @if(old('payment_type') == 'bank_card') selected @endif>
                                        {{ __("cms-pages.bank_card") }}
                                    </option>
                                    <option value="money_transfer" @if(old('payment_type') == 'money_transfer') selected @endif>
                                        {{ __("cms-pages.money_transfer") }}
                                    </option>
                                </select>
                                @error('payment_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.order-status") }}</label>
                            <div class="col-lg-9">
                                <select name="status_id" class="custom-select form-control">
                                    <option value="" disabled @if(old('status_id') == null) selected @endif>
                                        {{ __("cms-pages.choose-order-status") }}
                                    </option>
                                    @foreach($orderStatuses as $orderStatus)
                                        <option value="{{ $orderStatus->id }}" @if(old('status_id') == $orderStatus->id) selected @endif>
                                            {{ __("cms-pages.".$orderStatus->title) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Product Info --}}
                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.order-details") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.product") }}</label>
                            <div class="col-lg-6">
                                <select name="product_id" class="custom-select form-control">
                                    <option value="" disabled @if(old('product_id') == null) selected @endif>
                                        {{ __("cms-pages.choose-product") }}
                                    </option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}" @if(old('product_id') == $product->id) selected @endif>
                                            {{ __($product->title) }} | {{ __("cms-pages.product-left") }} {{$product->warehouse->quantity}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-3">
                                <input type="number" name="quantity" class="form-control"
                                       placeholder="{{ __("cms-pages.quantity") }}" value="{{old('quantity')}}">
                            </div>
                        </div>
                        {{-- Note--}}
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.note") }}</label>
                            <div class="col-lg-9">
                                <textarea name="note" class="form-control" rows="3" placeholder="{{ __("cms-pages.note") }}">{{old('note')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center mb-5 justify-content-end">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <div class="styled-checkbox">
                                        <input type="checkbox" name="save_customer" id="save_customer" value="1">
                                        <label for="save_customer">{{ __("cms-pages.save-customer") }}</label>
                                    </div>
                                </div>
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
