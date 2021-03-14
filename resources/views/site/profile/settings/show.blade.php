@extends('layouts.site')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', __("Profile"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("Profile") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-xl-3">
            <!-- Begin Widget -->
            <div class="widget has-shadow">
                <div class="widget-body">
                    <div class="mt-5">
                        <img src="{{asset('assets/cms/img/avatar/avatar-01.jpg')}}" alt="..." style="width: 120px;" class="avatar rounded-circle d-block mx-auto">
                    </div>
                    <h3 class="text-center mt-3 mb-1">{{ Auth::user()->name }}</h3>
                    <p class="text-center">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <!-- End Widget -->
        </div>
        <div class="col-xl-9">

            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>{{ __("Site Settings") }}</h4>
                </div>
                <div class="widget-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user-settings.update')}}">
                        @csrf @method('PUT')

                        <div class="form-group row align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("Site Language") }}</label>
                            <div class="col-lg-9 select mb-3">
                                @php $settings = Auth::user()->setting; @endphp
                                <select name="locale" class="custom-select form-control">
                                    <option value="" disabled>{{ __("Choose Language") }}</option>
                                    <option value="en" @if($settings && Auth::user()->setting->locale == 'en') selected @endif>
                                        {{ __("English") }}
                                    </option>
                                    <option value="ru" @if($settings && Auth::user()->setting->locale == 'ru') selected @endif>
                                        {{ __("Russian") }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="em-separator separator-dashed"></div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">{{ __("Save Changes") }}</button>
                            <button class="btn btn-shadow" type="reset">{{ __("Cancel") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{asset('assets/cms/vendors/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/app/contact/contact.min.js')}}"></script>
@endsection



