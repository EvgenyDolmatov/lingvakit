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
            <form class="form-horizontal" method="POST" action="{{ route('orders.store-for-exists') }}">
                @csrf

                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("cms-pages.order-form") }}</h4>
                    </div>
                    <div class="widget-body">
                        <form class="form-horizontal" method="POST" action="{{ route('orders.store-for-exists') }}">
                            @csrf

                            {{-- Customer Info --}}
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">{{ __("cms-pages.customer") }}</label>
                                <div class="col-lg-9">
                                    <select name="user_id" class="custom-select form-control">
                                        <option value="" disabled @if(old('user_id') == null) selected @endif>
                                            {{ __("cms-pages.choose-customer") }}
                                        </option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" @if(old('user_id') == $user->id) selected @endif>
                                                {{ $user->getCustomer() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Product Info --}}
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">{{ __("cms-pages.product") }}</label>
                                <div class="col-lg-6">
                                    <select name="product_id" class="custom-select form-control">
                                        <option value="" disabled @if(old('user_id') == null) selected @endif>
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
                                    @error('quantity')
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
                                    @error('payment_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Note--}}
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">{{ __("cms-pages.note") }}</label>
                                <div class="col-lg-9">
                                <textarea name="note" class="form-control" rows="3" placeholder="{{ __("cms-pages.note") }}">{{old('note')}}</textarea>
                                </div>
                            </div>

                            @include('layouts.cms.template-parts.form-buttons')
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
@endsection
