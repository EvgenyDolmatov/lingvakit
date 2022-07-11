@extends('layouts.site-container')

@section('seo-title', 'Лингва-Кит - О компании')
@section('seo-description', 'Лингва-Кит - О компании')
@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/css/owl-carousel/owl.theme.min.css')}}">
@endsection
@section('title', __("site-pages.about-us"))
@section('header-tools')
    <ul class="breadcrumb justify-content-start">
        <li class="breadcrumb-item"><a href="{{ route('site.index') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("site-pages.about-us") }}</li>
    </ul>
@endsection
@section('content')
    <div class="widget widget-12 has-shadow">
        <div class="widget-header no-actions d-flex align-items-center pt-5">
            <div class="section-title">
                <h3>Онлайн курс для подготовки к ЕГЭ</h3>
            </div>
        </div>
        <div class="widget-body">

            <div class="about">
                <img src="{{asset('assets/site/img/site/about-1.jpg')}}" width="100%" alt="Лингва-Кит - О нас">
            </div>

            <div class="about mt-5">
                <div class="section-title mt-5 mb-3">
                    <h3>Основатель Лингва Кит</h3>
                </div>
                <div class="about-body">
                    <p>Меня зовут Алена Алексеевна. Я — педагог с 15-летним стажем и вечный студент одновременно)))
                        Да, да, я тоже всегда учусь. И очень люблю учиться, особенно у своих учеников!</p>
                    <p>В китайский язык я влюбилась 20 лет назад …и всё это время познаю глубину этой уникальной культуры! Было
                        много интересного и трудного на моем Пути. Вот представьте: чтобы купить хороший словарь, нужно было
                        ехать в Китай!</p>
                    <p>Но времена изменились! Он лайн обучение и соцсети дают все больше и больше возможностей изучать и
                        общаться с поклонниками этого языка, получать много информации и даже просто учить язык.</p>
                    <p>Уже два года как в нашей стране проводят ЕГЭ по китайскому. Уже 6 лет, как проводят Всероссийскую
                        олимпиаду по китайскому языку. И много других интересных конкурсов он-лайн и офф-лайн, где можно
                        проявить свои таланты и проверить свои способности, а также познакомиться с единомышленниками!</p>
                    <p>Этот сайт «Лингва Кит» создан именно для того, чтобы делиться полезными знаниями в изучении китайского
                        языка и подготовке к сложным заданиям.
                        И я очень рада, что могу передать свой опыт, знания и любовь к языку!</p>
                    <p>Попробуй наши курсы и ты увидишь, что всё можно решить и всему можно научиться!</p>
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
