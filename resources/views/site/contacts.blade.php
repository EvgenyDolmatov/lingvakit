@extends('layouts.site-container')

@section('seo-title', 'Лингва-Кит - Контакты')
@section('seo-description', 'Лингва-Кит - Наши контакты')
@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', __("site-pages.contacts"))
@section('header-tools')
    <ul class="breadcrumb justify-content-start">
        <li class="breadcrumb-item"><a href="{{ route('site.index') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("site-pages.contacts") }}</li>
    </ul>
@endsection
@section('content')
    <div class="widget widget-12 has-shadow">
        <div class="widget-body">
            <div class="row">
                <div class="col-12">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-4 col-12">
                                {{-- Phone --}}
                                <div class="media">
                                    <div class="align-self-center ml-5 mr-5">
                                        <i class="ion-iphone"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="title">Телефон</div>
                                        <div class="number"><a href="tel:+79856483542"></a>+7 (985) 648-35-42</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                {{-- Email --}}
                                <div class="media">
                                    <div class="align-self-center ml-5 mr-5">
                                        <i class="ion-email"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="title">E-mail</div>
                                        <div class="number">info@lingva-kit.ru</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                {{-- Address --}}
                                <div class="media">
                                    <div class="align-self-center ml-5 mr-5">
                                        <i class="ion-location"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="title">Адрес</div>
                                        <div class="number">г. Серпухов, <br>ул. Юбилейная д.2</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="widget-body">
                                    <div class="media-body align-self-center">
                                        <div class="title">Наименование</div>
                                        <div class="number">ИП Пристинская Алена Алексеевна</div>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="media-body align-self-center">
                                        <div class="title">ИНН</div>
                                        <div class="number">280111660440</div>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="media-body align-self-center">
                                        <div class="title">ОГРНИП</div>
                                        <div class="number">320508100275828</div>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="media-body align-self-center">
                                        <div class="title">ОКПО</div>
                                        <div class="number">2002519595</div>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="media-body align-self-center">
                                        <div class="title">Юридический адрес</div>
                                        <div class="number">142204, Россия, Московская обл., г. Серпухов, ул. Юбилейная, д. 2, кв. 253</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="widget-body">
                                    <form action="{{route('feedback')}}" method="POST">
                                        @csrf

                                        <div class="section-title mt-5 mb-5">
                                            <h4>{{__("site-pages.feedback-title")}}</h4>
                                        </div>
                                        {{-- Course Title --}}
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-6 col-md-12 mb-3">
                                                <label class="form-control-label">Ваше имя <span class="text-danger ml-2">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 col-md-12 mb-3">
                                                <label class="form-control-label">Ваш E-mail <span class="text-danger ml-2">*</span></label>
                                                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-control-label">Ваше сообщение <span class="text-danger ml-2">*</span></label>
                                                <textarea name="message" rows="5" class="form-control"></textarea>
                                                @error('message')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            @if (\Session::has('success'))
                                                <div class="col-12 mb-3">
                                                    <span class="alert alert-success">{!! \Session::get('success') !!}</span>
                                                </div>
                                            @endif
                                            <div class="col-12 mb-3">
                                                <div class="text-left">
                                                    <button class="btn btn-primary" type="submit">{{ __("site-pages.send") }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
@endsection
