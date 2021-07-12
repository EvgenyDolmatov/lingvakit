@extends('layouts.site')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', __("site-pages.checkout"))
@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('orders.store', $course->id) }}">
        @csrf
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Cart -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                        <h4>{{ __("cms-pages.order") }}</h4>
                    </div>
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table id="sorting-table" class="table mb-0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __("cms-pages.course") }}</th>
                                    <th>{{ __("cms-pages.duration") }}</th>
                                    <th>{{ __("cms-pages.price") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="width: 150px;">
                                        <img src="{{ $course->getImage() }}" width="100" alt>
                                    </td>
                                    <td><a href="{{ route('courses.show', $course->id) }}"
                                           class="text-primary">{{ $course->title }}</a></td>
                                    <td>{{ $course->getDuration() }}</td>
                                    <td>{!! $course->getPrice() !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Checkout Form --}}
            <div class="col-xl-9 col-md-6 col-sm-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("site-pages.checkout-form") }}</h4>
                    </div>
                    <div class="widget-body">
                        <div class="section-title mt-5 mb-5">
                            <h4>{{__("site-pages.client-info")}}</h4>
                        </div>
                        {{-- Customer Full Name --}}
                        <div class="form-group row mb-3">
                            {{-- Customer Surname --}}
                            <div class="col-xl-4 mb-3">
                                <label class="form-control-label">
                                    {{__("site-pages.surname")}}<span class="text-danger ml-2">*</span>
                                </label>
                                <input type="text" name="surname" value="{{$user->surname}}" class="form-control">
                                @error('surname')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Customer Name --}}
                            <div class="col-xl-4 mb-3">
                                <label class="form-control-label">
                                    {{__("site-pages.name")}}<span class="text-danger ml-2">*</span>
                                </label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Customer Patronymic --}}
                            <div class="col-xl-4 mb-3">
                                <label class="form-control-label">
                                    {{__("site-pages.patronymic")}}
                                </label>
                                <input type="text" name="patronymic" value="{{$user->patronymic}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            {{-- Customer Phone --}}
                            <div class="col-xl-6 mb-3">
                                <label class="form-control-label">
                                    {{__("site-pages.phone")}}<span class="text-danger ml-2">*</span>
                                </label>
                                <div class="input-group">
                                <span class="input-group-addon addon-secondary">
                                    <i class="la la-phone"></i>
                                </span>
                                    <input id="phone" type="text" name="phone" class="form-control"
                                           value="{{$user->phone}}">
                                </div>
                            </div>
                            {{-- Customer Email --}}
                            <div class="col-xl-6 mb-3">
                                <label class="form-control-label">{{__("site-pages.email")}}</label>
                                <div class="input-group">
                                <span class="input-group-addon addon-secondary">
                                    <i class="la la-at"></i>
                                </span>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                </div>
                            </div>
                        </div>
                        {{-- Customer Note --}}
                        <div class="form-group row mb-5">
                            <div class="col-xl-12 mb-3">
                                <label for="order-note" class="form-control-label">
                                    {{__("site-pages.order-note")}}
                                </label>
                                <textarea name="note" id="order-note" cols="30" rows="2"
                                          class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                        <h4>{{ __("cms-pages.order") }}</h4>
                    </div>
                    <div class="widget-body">

                        {{-- Promo Code --}}
                        <div class="form-group row mb-3">
                            <div class="col-xl-12 mb-3">
                                <div class="input-group">
                                    <input type="text" name="promocode" class="form-control"
                                           placeholder="{{__("site-pages.promo-code-placeholder")}}">
                                    <input type="hidden" name="promocode_applied">
                                </div>
                                <small id="promo-error" class="text-danger hide">{{__("site-pages.promo-code-error")}}</small>

                                <div id="promo-btn-container" class="text-right mt-3">
                                    <button id="apply-btn" type="button" class="btn square btn-sm btn-dark">
                                        {{ __("site-pages.apply") }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="price-promocode" class="form-group row mb-2 hide">
                            <div class="col-12">
                                <div class="text-right">
                                    <span>{{ __("site-pages.promo-code") }}:</span>
                                    <span id="promo-discount" class="text-primary" style="width:100px"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center mt-4 mb-2">
                            <div class="col-12">
                                <div class="text-right d-flex align-items-center justify-content-end">
                                    <h2>{{ __("site-pages.total") }}:</h2>
                                    <h2 id="total-cost" class="text-primary" data-price="{{$course->price}}" style="width:100px">{!! $course->getPrice() !!}</h2>
                                </div>
                            </div>
                        </div>

                        {{-- Payment's Methods --}}
                        <div class="form-group row d-flex align-items-center mt-4 mb-2">
                            <div class="col-12">
                                <div class="section-title mt-5 mb-5">
                                    <h4>{{__("site-pages.payment-methods")}}</h4>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="styled-radio">
                                                <input type="radio" name="payment_method" id="card_payment" value="card_payment" checked>
                                                <label for="card_payment">{{ __("site-pages.card-payment") }}</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="styled-radio">
                                                <input type="radio" name="payment_method" id="another_payment" value="another_payment">
                                                <label for="another_payment">{{ __("site-pages.another-payment") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center mt-5">
                            <div class="col-12">
                                <div class="text-right">
                                    <button type="submit"
                                            class="btn square btn-success">{{ __("site-pages.checkout") }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('page-scripts')
    <script src="{{asset('assets/cms/vendors/js/progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/site/js/ajax.min.js')}}"></script>
@endsection
