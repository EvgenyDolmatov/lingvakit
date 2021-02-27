@extends('layouts.site')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', __("site-pages.checkout"))
@section('content')
    <div class="row flex-row">
        <div class="col-12">
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
        <div class="col-12">
            <form class="form-horizontal" method="POST" action="{{ route('orders.store', $course->id) }}">
                @csrf

                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>{{ __("site-pages.checkout-form") }}</h4>
                    </div>
                    <div class="widget-body">


                        <div class="section-title mt-5 mb-5">
                            <h4>{{__("site-pages.client-info")}}</h4>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-xl-4 mb-3">
                                <label class="form-control-label">
                                    {{__("site-pages.surname")}}<span class="text-danger ml-2">*</span>
                                </label>
                                <input type="text" name="surname" value="{{$user->surname}}" class="form-control">
                                @error('surname')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-4 mb-3">
                                <label class="form-control-label">
                                    {{__("site-pages.name")}}<span class="text-danger ml-2">*</span>
                                </label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-4 mb-3">
                                <label class="form-control-label">
                                    {{__("site-pages.patronymic")}}
                                </label>
                                <input type="text" name="patronymic" value="{{$user->patronymic}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-5">
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
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ __("site-pages.checkout") }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="{{asset('assets/cms/vendors/js/chart/chart.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/dashboard/db-default.js')}}"></script>
    <script src="{{asset('assets/cms/js/youtube.min.js')}}"></script>
@endsection
