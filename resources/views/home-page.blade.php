@extends('layouts.new-app')

@section('content')
    <!-- masterslider -->
    <div class="master-slider ms-skin-default" id="masterslider">
        <div class="ms-slide slide-2" data-delay="9">
            <img src="{{ asset('assets/promo-site/js/masterslider/blank.gif') }}"
                 data-src="{{ asset('assets/promo-site/images/sliders/masterslider/slide1.jpg') }}" alt=""/>

            <h3 class="ms-layer text58"
                style="left: 230px;top: 200px;font-family: Dosis, sans-serif;"
                data-type="text"
                data-delay="500"
                data-ease="easeOutExpo"
                data-duration="1230"
                data-effect="scale(1.5,1.6)">Лингва&middot;Кит</h3>

            <h3 class="ms-layer text59"
                style="left: 230px;top: 275px;font-family: Dosis, sans-serif;"
                data-type="text"
                data-delay="1000"
                data-ease="easeOutExpo"
                data-duration="1230"
                data-effect="scale(1.5,1.6)"> Школа успеха в изучении китайского языка </h3>

            <a class="ms-layer sbut1"
               style="left: 230px; top: 420px;"
               data-type="text"
               data-delay="1500"
               data-ease="easeOutExpo"
               data-duration="1200"
               data-effect="scale(1.5,1.6)"> Выбрать курс </a>

            <a class="ms-layer sbut2"
               style="left: 430px; top: 420px;"
               data-type="text"
               data-delay="1500"
               data-ease="easeOutExpo"
               data-duration="1200"
               data-effect="scale(1.5,1.6)"> Отзывы </a>
        </div>
    </div>
    <div class="clearfix"></div>

    <!-- subscription -->
    <section class="sec-padding section-primary">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="dosis text-white lspace-sm">Новости</h1>
                    <p class="sub-title text-white">Подпишитесь на рассылку и будьте в курсе наших новостей.</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="input_holder">
                        <input class="email_input" type="search" placeholder="Введите Вашу электронную почту">
                        <input name="submit" value="Подписаться" class="email_submit" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    <!-- it's easy -->
    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="paddtop1 dosis font-weight-5 lspace-sm">Китайский язык с <span class="text-primary">Лингва&middot;Кит</span>
                    </h1>
                    <div class="title-line-4 align-center"></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="content-container">
                <div class="mid-picture">
                    <div class="mid-circle">
                        <p>Это<span>легко</span></p>
                        <div class="arrows">
                            <div class="arrow"></div>
                            <div class="arrow"></div>
                            <div class="arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="circles">
                    <div class="bubbles-container">
                        <div class="bubble">
                            <div class="iconbox-xtiny"><span class="icon-notebook"></span></div>
                            <p>Всегда быть готовым к&nbsp;олимпиадам и&nbsp;другим конкурсам</p>
                        </div>
                        <div class="bubble">
                            <div class="iconbox-xtiny"><span class="icon-pencil"></span></div>
                            <p>Весело изучать китайский язык с нуля и до HSK/HSKK</p>
                        </div>
                        <div class="bubble">
                            <div class="iconbox-xtiny"><span class="icon-calendar"></span></div>
                            <p>Увлеченно познавать культуру и&nbsp;историю Китая</p>
                        </div>
                    </div>
                    <div class="bubbles-container">
                        <div class="bubble">
                            <div class="iconbox-xtiny"><span class="icon-grid"></span></div>
                            <p>Эффективно подготовиться к&nbsp;ЕГЭ</p>
                        </div>
                        <div class="bubble">
                            <div class="iconbox-xtiny"><span class="icon-tools"></span></div>
                            <p>Просто и&nbsp;свободно создавать свои уроки и&nbsp;курсы</p>
                        </div>
                        <div class="bubble">
                            <div class="iconbox-xtiny"><span class="icon-briefcase"></span></div>
                            <p>Успешно сдать международные экзамены HSK1-6</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="buttons">
                <a href="{{route('login')}}" class="btn btn-primary btn-large dark btn-xround">
                    Зарегистрироватья
                </a>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    <!-- features -->
    <section class="section-light section-side-image clearfix">
        <div class="img-holder col-md-6 col-sm-3 pull-left">
            <div class="background-imgholder"
                 style="background:url({{ asset('assets/promo-site/images/features.jpg') }});">
                <img class="nodisplay-image" src="{{ asset('assets/promo-site/images/features.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-md-offset-5 col-sm-8 col-sm-offset-2 text-inner clearfix align-left">
                    <div class="text-box white padding-7">
                        <div class="col-xs-12 text-left">
                            <h1 class="paddtop1 dosis font-weight-5 lspace-sm">
                                Гарантия качества обучения
                            </h1>
                            <div class="title-line-4"></div>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="iconlist orange">
                            <li>
                                <i class="fa fa-check"></i> Здесь будет контент
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class=" clearfix"></div>
    <section class="section-light section-side-image clearfix">
        <div class="img-holder col-md-6 col-sm-3 col-md-offset-6 pull-right">
            <div class="background-imgholder"
                 style="background:url({{ asset('assets/promo-site/images/features.jpg') }});">
                <img class="nodisplay-image" src="{{ asset('assets/promo-site/images/features.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-sm-8 text-inner inner-left clearfix align-left">
                    <div class="text-box white padding-7">
                        <div class="col-xs-12 text-left">
                            <h1 class="paddtop1 dosis font-weight-5 lspace-sm">
                                Динамика роста каждого студента
                            </h1>
                            <div class="title-line-4"></div>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="iconlist orange">
                            <li>
                                <i class="fa fa-check"></i> Здесь будет контент
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class=" clearfix"></div>
    <section class="section-light section-side-image clearfix">
        <div class="img-holder col-md-6 col-sm-3 pull-left">
            <div class="background-imgholder"
                 style="background:url({{ asset('assets/promo-site/images/features.jpg') }});">
                <img class="nodisplay-image" src="{{ asset('assets/promo-site/images/features.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-md-offset-5 col-sm-8 col-sm-offset-2 text-inner clearfix align-left">
                    <div class="text-box white padding-7">
                        <div class="col-xs-12 text-left">
                            <h1 class="paddtop1 dosis font-weight-5 lspace-sm">
                                Комфорт и удобство
                            </h1>
                            <div class="title-line-4"></div>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="iconlist orange">
                            <li>
                                <i class="fa fa-check"></i> Здесь будет контент
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class=" clearfix"></div>
    <section class="section-light section-side-image clearfix">
        <div class="img-holder col-md-6 col-sm-3 col-md-offset-6 pull-left">
            <div class="background-imgholder"
                 style="background:url({{ asset('assets/promo-site/images/features.jpg') }});">
                <img class="nodisplay-image" src="{{ asset('assets/promo-site/images/features.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-sm-8 text-inner inner-left clearfix align-left">
                    <div class="text-box white padding-7">
                        <div class="col-xs-12 text-left">
                            <h1 class="paddtop1 dosis font-weight-5 lspace-sm">
                                Бонусы и полезные советы
                            </h1>
                            <div class="title-line-4"></div>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="iconlist orange">
                            <li>
                                <i class="fa fa-check"></i> Здесь будет контент
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class=" clearfix"></div>

    <!-- teachers -->
    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="paddtop1 dosis font-weight-5 lspace-sm">Наши преподаватели</h1>
                    <p class="sub-title">Прогресс, мотивация и сроки обучения <span class="text-primary">на 50%</span>
                        зависят от преподавателя. Не теряйте время, доверьте свой английский экспертам, которые прошли
                        наш строгий отбор.</p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="team-holder7 two bmargin">
                        <div class="team-member">
                            <img src="{{ asset('assets/promo-site/images/teachers/teacher1.jpg') }}" alt=""
                                 class="img-responsive"/>
                        </div>
                        <div class="info-box text-center">
                            <h4 class="uppercase oswald font-weight-3 less-mar2">Алена Пристинская</h4>
                            <span class="text-primary">Китайский язык</span> <br/>
                            <br/>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo et
                                Praesent Lorem ipsum dolor sit amet</p>
                            <br/>
                            <ul class="social-icons">
                                <li>
                                    <a href="https://vk.com/alenapristinskaya" target="_blank">
                                        <i class="fa fa-vk"></i>
                                    </a>
                                </li>
                                <li><a href="https://twitter.com/codelayers"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="team-holder7 two bmargin">
                        <div class="team-member"><img src="http://placehold.it/500x500" alt="" class="img-responsive"/>
                        </div>
                        <div class="info-box text-center">
                            <h4 class="uppercase oswald font-weight-3 less-mar2">Madison</h4>
                            <span class="text-primary">Billing Support</span> <br/>
                            <br/>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo et
                                Praesent Lorem ipsum dolor sit amet</p>
                            <br/>
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/codelayers"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="https://twitter.com/codelayers"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    <section class="sec-padding testimonials">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="paddtop1 dosis font-weight-5 lspace-sm">Отзывы наших клиентов</h1>
                    <div class="title-line-4 align-center"></div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="item">
                        <div class="text-box">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent
                                mattis commodo augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a
                                est. Curabitur eget orci. </p>
                        </div>

                        <div class="image"><img src="http://placehold.it/190x190" alt=""/></div>
                        <div class="info">
                            <h5 class="less-mar1">Linda John</h5>
                            <span class="text-orange-2">Smartinc - manager</span>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="item">
                        <div class="text-box">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent
                                mattis commodo augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a
                                est. Curabitur eget orci. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                Suspendisse et justo. Praesent
                                mattis commodo augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a
                                est. Curabitur eget orci.</p>
                            <button class="btn btn-primary btn-small primary-bg rounded">Читать дальше</button>
                        </div>

                        <div class="image"><img src="http://placehold.it/190x190" alt=""/></div>
                        <div class="info">
                            <h5 class="less-mar1">Linda John</h5>
                            <span class="text-orange-2">Smartinc - manager</span>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="item">
                        <div class="text-box">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent
                                mattis commodo augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a
                                est. Curabitur eget orci. </p>
                        </div>

                        <div class="image"><img src="http://placehold.it/190x190" alt=""/></div>
                        <div class="info">
                            <h5 class="less-mar1">Linda John</h5>
                            <span class="text-orange-2">Smartinc - manager</span>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="item">
                        <div class="text-box">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent
                                mattis commodo augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a
                                est. Curabitur eget orci. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                Suspendisse et justo. Praesent
                                mattis commodo augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a
                                est. Curabitur eget orci.</p>
                        </div>

                        <div class="image"><img src="http://placehold.it/190x190" alt=""/></div>
                        <div class="info">
                            <h5 class="less-mar1">Linda John</h5>
                            <span class="text-orange-2">Smartinc - manager</span>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="item">
                        <div class="text-box">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent
                                mattis commodo augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a
                                est. Curabitur eget orci. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                Suspendisse et justo. Praesent
                                mattis commodo augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a
                                est. Curabitur eget orci.</p>
                        </div>

                        <div class="image"><img src="http://placehold.it/190x190" alt=""/></div>
                        <div class="info">
                            <h5 class="less-mar1">Linda John</h5>
                            <span class="text-orange-2">Smartinc - manager</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    <section>
        <div class="container">
            <div class="divider-line solid light opacity-5"></div>
            <div class="row sec-padd-default-page">

                <div class="col-xs-12 text-center">
                    <h1 class="paddtop1 dosis font-weight-5 lspace-sm">Новости
                    </h1>
                    <div class="title-line-4 align-center"></div>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-4 col-sm-6">
                    <a href="#" class="feature-box-84 text-center bmargin primary-bg">
                        <h4 class="text-white uppercase">
                            Акции, специальные предложения
                        </h4>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#" class="feature-box-84 text-center bmargin primary-bg">
                        <h4 class="text-white uppercase">
                            Бесплатные материалы
                        </h4>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#" class="feature-box-84 text-center bmargin primary-bg">
                        <h4 class="text-white uppercase">
                            О культуре и истории Китая
                        </h4>
                    </a>
                </div>
                <div class="clear"></div>

                <div class="col-md-4 col-sm-6">
                    <a href="#" class="feature-box-84 text-center bmargin primary-bg">
                        <h4 class="text-white uppercase">
                            Интересное о Китае
                        </h4>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#" class="feature-box-84 text-center bmargin primary-bg">
                        <h4 class="text-white uppercase">
                            Как создать свой курс
                        </h4>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#" class="feature-box-84 text-center bmargin primary-bg">
                        <h4 class="text-white uppercase">
                            О разном
                        </h4>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <div class="clearfix"></div>


    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="paddtop1 dosis font-weight-5 lspace-sm">Как учиться в Лингва&middot;Кит</h1>
                    <div class="title-line-4 align-center"></div>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-4">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="feature-box19 bmargin number">
                            <div class="iconbox-small round grayoutline2 orange2 left">1</div>
                            <div class="text-box-right">
                                <h4 class="less-mar3">Регистрация</h4>
                                <p>Пройдите процесс регистрации на сайте</p>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="feature-box19 bmargin number">
                            <div class="iconbox-small round grayoutline2 orange2 left">2</div>
                            <div class="text-box-right">
                                <h4 class="less-mar3">Выбор курса</h4>
                                <p>Выберите курс и оплатите его картой онлайн</p>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="feature-box19 bmargin number">
                            <div class="iconbox-small round grayoutline2 orange2 left">3</div>
                            <div class="text-box-right">
                                <h4 class="less-mar3">Изучение материала</h4>
                                <p>Приступите к изучению материала</p>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="divider-line2"></div>
                    <p>Lorem ipsum dolor sit amet, <span class="text-primary">consectetuer</span> adipiscing elit ipsum
                        dolor sit amet. </p>

                </div>
                <!--end item-->

                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="feature-box19 bmargin number">
                        <div class="image-holder">
                            <img src="{{ asset('assets/promo-site/images/how-to.jpg') }}" alt=""
                                 class="img-responsive"/>
                        </div>
                    </div>

                </div>
                <!--end item-->

                <div class="col-md-4 col-sm-12 col-xs-12">

                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="feature-box19 bmargin number">
                            <div class="iconbox-small round grayoutline2 orange2 left">4</div>
                            <div class="text-box-right">
                                <h4 class="less-mar3">Тестирование</h4>
                                <p>Пройдите тестирование по изученному материалу</p>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="feature-box19 bmargin number">
                            <div class="iconbox-small round grayoutline2 orange2 left">5</div>
                            <div class="text-box-right">
                                <h4 class="less-mar3">Сертификат</h4>
                                <p>По окончании обучения получите сертификат</p>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="feature-box19 bmargin number">
                            <div class="iconbox-small round grayoutline2 orange2 left">6</div>
                            <div class="text-box-right">
                                <h4 class="less-mar3">Получите бонус</h4>
                                <p>Посоветуйте нас друзьям и получите бонус</p>
                            </div>
                        </div>
                    </div>
                    <!--end item-->

                    <div class="divider-line2"></div>
                    <p>Lorem ipsum dolor sit amet, <span class="text-primary">consectetuer</span> adipiscing elit ipsum
                        dolor sit amet. </p>

                </div>
                <!--end item-->
            </div>
        </div>
    </section>
    <!--end section -->
    <div class="clearfix"></div>

@endsection