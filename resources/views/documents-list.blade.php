@extends('layouts.new-app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/promo-site/js/masterslider/style/masterslider.css')}}"/>
    <link href="{{ asset('assets/promo-site/js/animations/css/animations.min.css')}}" rel="stylesheet" type="text/css"
          media="all"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/promo-site/js/cubeportfolio/cubeportfolio.min.css')}}">
    <link href="{{ asset('assets/promo-site/js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/promo-site/js/ytplayer/ytplayer.css')}}"/>
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet"/>
@endsection

@section('scripts')
    <script src="{{ asset('assets/promo-site/js/masterslider/masterslider.min.js')}}"></script>
    <script type="text/javascript">
        (function ($) {
            "use strict";
            var slider = new MasterSlider();
            // adds Arrows navigation control to the slider.
            slider.control('arrows');
            slider.control('bullets');

            slider.setup('masterslider', {
                width: 1600,    // slider standard width
                height: 650,   // slider standard height
                space: 0,
                speed: 45,
                layout: 'fullwidth',
                loop: true,
                preload: 0,
                autoplay: true,
                view: "parallaxMask"
            });
        })(jQuery);
    </script>
    <script src="{{ asset('assets/promo-site/js/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{ asset('assets/promo-site/js/owl-carousel/custom.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/promo-site/js/ytplayer/jquery.mb.YTPlayer.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/promo-site/js/ytplayer/elementvideo-custom.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/promo-site/js/ytplayer/play-pause-btn.js')}}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/promo-site/js/progress-circle/jquery.circlechart.js')}}"></script>
    <script src="{{ asset('assets/promo-site/js/animations/js/animations.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/promo-site/js/animations/js/appear.min.js')}}" type="text/javascript"></script>

    <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>
@endsection

@section('content')
    <section class="sec-padding testimonials">
        <div class="container">
            <div class="col-12 text-center">
                <h1 class="paddtop1 dosis font-weight-5 lspace-sm">Основные сведения</h1>
                <div class="title-line-4 align-center"></div>
                <h3 class="font-weight-5">ИП Пристинская Алена Алексеевна</h3>
                <h3 class="font-weight-5" style="margin-bottom: 50px; line-height: 1.2">
                    Лицензия на образовательную деятельность<br>№ ЛО35-01235-50/00956971 от
                    30.11.2023
                </h3>

                <h4 style="margin-bottom: 100px;">
                    <a href="{{asset("documents/01_Политика-в-области-персональных-данных.pdf")}}"
                       style="color: #0d75c1"
                       target="_blank">
                        Сведения об образовательной организации
                    </a>
                </h4>

                <h1 class="paddtop1 dosis font-weight-5 lspace-sm" style="margin-bottom: 100px">Документы</h1>
                <div class="text-left">
                    <h4>
                        <a href="{{asset("documents/02_РП_ЛингваКит.pdf")}}" target="_blank" style="color: #0d75c1">
                            РП ЛингваКит
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/03_Правила_внутреннего_распорядка_обучающегося_(лингвакит).pdf")}}"
                           target="_blank" style="color: #0d75c1">
                            Правила внутреннего распорядка обучающегося (Лингвакит)
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/04_Правила_внутреннего_трудового_распорядка_для_работников_индивидуального_предпринимателя.pdf")}}"
                           target="_blank" style="color: #0d75c1">
                            Правила внутреннего трудового распорядка для работников индивидуального предпринимателя
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/05_Отчет_о_результатах_самообследования_Индивидуального_предпринимателя_Пристинской_А.А.pdf")}}"
                           target="_blank" style="color: #0d75c1">
                            Отчет о результатах самообследования Индивидуального предпринимателя Пристинскои А.А
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/06_Положение-о-режиме-занятий-обучающихся.pdf")}}" target="_blank" style="color: #0d75c1">
                            Положение о режиме занятий обучающихся
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/07_Формы-периодичность-и-порядок-текущего-контроля-успеваемости-и-промежуточной-аттестации-обучающихся.pdf")}}"
                           target="_blank" style="color: #0d75c1">
                            Формы периодичность и порядок текущего контроля успеваемости и промежуточной аттестации обучающихся
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/08-Положение-о-порядке-и-основаниях-перевода-отчисления-и-восстановления-обучающихся.pdf")}}"
                           target="_blank" style="color: #0d75c1">
                            Положение о порядке и основаниях перевода отчисления и восстановления обучающихся
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/09_Правила-приема-на-обучение-по-программам-дополнительного-образования.pdf")}}"
                           target="_blank" style="color: #0d75c1">
                            Правила приема на обучение по программам дополнительного образования
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/10_Положение-о-порядке-и-основаниях-перевода-отчисления-и-восстановления-обучающихся.pdf")}}"
                           target="_blank" style="color: #0d75c1">
                            Положение о порядке и основаниях перевода отчисления и восстановления обучающихся
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/11_Правила-оказания-платных-образовательных-услуг.pdf")}}" target="_blank" style="color: #0d75c1">
                            Правила оказания платных образовательных услуг
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/12_Об-утверждении-стоимости-обучения.pdf")}}" target="_blank" style="color: #0d75c1">
                            Об утверждении стоимости обучения
                        </a>
                    </h4>
                    <h4>
                        <a href="{{asset("documents/13_Лицензия.pdf")}}" target="_blank" style="color: #0d75c1">
                            Лицензия
                        </a>
                    </h4>
                    <h4 style="margin-bottom: 100px;">
                        <a href="{{asset("documents/14_Реестровая-выписка.pdf")}}" target="_blank" style="color: #0d75c1">
                            Реестровая выписка
                        </a>
                    </h4>
                </div>

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@endsection