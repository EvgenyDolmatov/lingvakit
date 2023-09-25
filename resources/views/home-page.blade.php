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
    <!-- masterslider -->
    <div class="master-slider ms-skin-default" id="masterslider">
        <div class="ms-slide slide-2" data-delay="9">
            <img src="{{ asset('assets/promo-site/js/masterslider/blank.gif') }}"
                 data-src="{{ asset('assets/promo-site/images/sliders/masterslider/slide1.jpg') }}" alt=""/>

            <h3 class="ms-layer text58"
                style="left: 230px;top: 200px;font-family: 'Nunito', sans-serif;"
                data-type="text"
                data-delay="500"
                data-ease="easeOutExpo"
                data-duration="1230"
                data-effect="scale(1.5,1.6)">Лингва&middot;Кит</h3>

            <h3 class="ms-layer text59"
                style="left: 230px;top: 275px;font-family: 'Nunito', sans-serif;"
                data-type="text"
                data-delay="1000"
                data-ease="easeOutExpo"
                data-duration="1230"
                data-effect="scale(1.5,1.6)"> Школа успеха в изучении китайского языка </h3>

            <a href="{{route('site.learning')}}"
               class="ms-layer sbut1"
               style="left: 230px; top: 420px;"
               data-type="text"
               data-delay="1500"
               data-ease="easeOutExpo"
               data-duration="1200"
               data-effect="scale(1.5,1.6)"> Выбрать курс </a>

            <a href="#testimonials"
               class="ms-layer sbut2"
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
                 style="background:url({{ asset('assets/promo-site/images/features/features-1.jpg') }});">
                <img class="nodisplay-image" src="{{ asset('assets/promo-site/images/features/features-1.jpg') }}"
                     alt=""/>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-6 col-sm-9 col-sm-offset-3 text-inner clearfix align-left">
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
                                <i class="fa fa-check"></i> Сильные преподаватели, которые имеют богатый стаж и опыт
                                работы
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Авторская методика прошла несколько лет апробации и
                                одобрение Центра развития одаренных детей
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
                 style="background:url({{ asset('assets/promo-site/images/features/features-2.jpg') }});">
                <img class="nodisplay-image" src="{{ asset('assets/promo-site/images/features/features-2.jpg') }}"
                     alt=""/>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-6 col-sm-9 col-sm-offset-3 text-inner clearfix align-left">
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
                                <i class="fa fa-check"></i> Рейтинговая система и приятные подарки мотивируют изучать
                                язык лучше всех
                            </li>
                            <li>
                                <i class="fa fa-check"></i> После прохождения любого теста студенты могут
                                проанализировать свои ошибки и исправить их
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class=" clearfix"></div>
    <section id="about" class="section-light section-side-image clearfix">
        <div class="img-holder col-md-6 col-sm-3 pull-left">
            <div class="background-imgholder"
                 style="background:url({{ asset('assets/promo-site/images/features/features-3.jpg') }});">
                <img class="nodisplay-image" src="{{ asset('assets/promo-site/images/features/features-3.jpg') }}"
                     alt=""/>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-6 col-sm-9 col-sm-offset-3 text-inner clearfix align-left">
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
                                <i class="fa fa-check"></i> Изучать материал и выполнять задания можно и на компьютере,
                                и на мобильных устройствах
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Студенты могут самостоятельно моделировать свой учебный
                                график и получать поддержку от учителя на протяжении всего периода обучения
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
                 style="background:url({{ asset('assets/promo-site/images/features/features-4.jpg') }});">
                <img class="nodisplay-image" src="{{ asset('assets/promo-site/images/features/features-4.jpg') }}"
                     alt=""/>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-6 col-sm-9 col-sm-offset-3 text-inner clearfix align-left">
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
                                <i class="fa fa-check"></i> После приобретения одного из наших курсов, можно
                                воспользоваться скидкой на последующее обучение
                            </li>
                            <li>
                                <i class="fa fa-check"></i> Кроме учебных материалов, студенты получают полезную
                                информацию для развития памяти и речи
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
                    <p class="sub-title">Прогресс, мотивация и сроки обучения зависят от преподавателя. Не теряйте
                        время, доверьте свой китайский нашим экспертам.</p>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="team-holder7 two bmargin">
                        <div class="team-member">
                            <a href="{{route('app.teacher-info')}}">
                                <img src="{{ asset('assets/promo-site/images/teachers/teacher1.jpg') }}" alt=""
                                     class="img-responsive"/>
                            </a>
                        </div>
                        <div class="info-box text-center">
                            <a href="{{route('app.teacher-info')}}">
                                <h4 class="uppercase oswald font-weight-3 less-mar2">Алена Пристинская</h4>
                            </a>
                            <span class="text-primary">Китайский язык</span> <br/>
                            <br/>
                            <p>В 2005 году закончила Педагогический Университет в г. Благовещенск, который находится
                                на самой северной границе с Китаем.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="team-holder7 two bmargin">
                        <div class="team-member">
                            <img src="{{asset('assets/promo-site/images/no-user.png')}}" alt="" class="img-responsive"/>
                        </div>
                        <div class="info-box text-center">
                            <h4 class="uppercase oswald font-weight-3 less-mar2">Преподаватели</h4>
                            <br/>
                            <br/>
                            <p>Приглашаем к сотрудничеству репетиторов и преподавателей</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    <section class="sec-padding testimonials" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="paddtop1 dosis font-weight-5 lspace-sm">Отзывы наших клиентов</h1>
                    <div class="title-line-4 align-center"></div>
                </div>
                <div class="col-md-4 col-sm-6 mb-5">
                    <div class="item">
                        <div class="text-box" style="height: auto">
                            <p class="collapsed">Мой ребенок с 2019 года занимается китайским языком. Почему именно
                                китайским, ведь я сама учитель английского и французского языков???
                                Потому что начертание иероглифов ребенку казалось совсем неординарным делом, это ведь
                                "не просто буквы". Начали с малого, просто для того, чтобы поддерживать интерес к
                                изучению языков, о потом по-тихоньку, малыми шагами, мы дошли и до экзамена HSK1.<br>

                                Было нелегко - пандемия, перенос экзаменов, но мы справились. Дочь на первом экзамене
                                получила 200 баллов из 200. Вот это была радость и мотивация продолжать дальше!
                                Затем второй экзамен, HSK 2. Потом устный экзамен HSKK1 - и тоже успех. И вот в начале
                                2022 года сдавали HSK 3.<br>

                                Каждый раз, когда забираем сертификат, это все больше и больше мотивирует ребенка
                                двигаться дальше. Пусть невсегда легко, а иногда и трудно, она все равно идет
                                вперед.<br>

                                Волшебный китайский язык? Нет. Это педагог, который нашел подход к моему сложному уже
                                подростку. Алена Алексеевна, спасибо Вам!</p>
                            <a href="#" class="text-orange-2 read-more">Показать больше</a>
                        </div>

                        <div class="image">
                            <img src="{{asset('assets/promo-site/images/reviews/review1.jpg')}}" alt/>
                        </div>
                        <div class="info">
                            <h5 class="less-mar1">Инна Русецкая</h5>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-5">
                    <div class="item">
                        <div class="text-box">
                            <p class="collapsed">Хотела бы рассказать о нашем пути в изучении китайского языка. А
                                точнее, о том, как его
                                изучает моя дочь Маша. Изначально тема китайского языка привлекала своей необычностью и
                                уникальностью (все-таки в основной массе дети учат английский и другие европейские
                                языки). Но китайский язык в сочетании с культурой и традициями вызывал определенный
                                трепет и желание изучить и познать нечто непохожее на все остальное. Ну и не будем
                                лукавить, тенденции современных мировых течений политики и экономики кричат нам о том,
                                что китайское доминирование - это будущее всего мирового сообщества.<br>

                                И вот, вооружившись такими настроениями, около 3 лет назад моя дочь ступила на путь
                                познания и изучения китайского языка. И благодаря нашему замечательному педагогу Алене
                                Алексеевне Пристинской, ее занятия не ограничиваются только языком. В конву занятий
                                тесно вплетена информация об истории, культурных традициях, ценностях, обычаях и
                                настроениях Китая. Алена Алексеевна следит за интересными событиями Поднебесной,
                                праздниками. Угощала лунными пряниками). Ой, как это вкусно. А как приятно!<br>

                                Но вернусь к обучению. Начинали в буквальном смысле с нуля. Маше на тот момент было 12
                                лет. Очень интересно. Но и сразу стало понятно, что будет непросто. Расслабляться
                                нельзя. Много информации нужно было усваивать. Тяжело моментами. Но в любом деле главное
                                - желание и труд. Труд обоюдный - и педагога и ученика!<br>

                                Дочка очень старалась и через год был преодолен первый рубеж - экзамен HSK1. Сдавали в
                                институте Конфуция при МГЛУ. Остоженка, настоящий большой серьезный университет,
                                педагоги-китайцы, много соискателей! Все очень ответственно и волнительно! Но наш
                                педагог был с нами в этот день. И это было важно! Остальное в руках ученика, главное
                                быть уверенным в знаниях. А они (знания) были!! Итог порадовал - 190 баллов из 200
                                возможных! И это твердая пятерка! Успех важен, т.к. дает импульс к дальнейшему труду и
                                развитию. Дальше больше. Рука об руку с Аленой Алексеевной были взяты HSK2, HSKK, HSK3…
                                и мы ни в коем случае не останавливаемся).<br>

                                Небольшая передышка на лето и двигаемся дальше 😁! Хотим выразить огромную благодарность
                                Алене Алексеевне за знания, которыми она делится со своими учениками, за терпение, за
                                веру и профессионализм!!!</p>
                            <a href="#" class="text-orange-2 read-more">Показать больше</a>
                        </div>

                        <div class="image">
                            <img src="{{asset('assets/promo-site/images/reviews/review2.jpg')}}" alt=""/>
                        </div>
                        <div class="info">
                            <h5 class="less-mar1">Ирина Урядченко</h5>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-5">
                    <div class="item">
                        <div class="text-box">
                            <p class="collapsed">«Предложила сыну начать учить китайский язык, в шутку! А он согласился)
                                Нам посоветовали обратиться к Алене Алексеевне.<br>

                                Она предложила ознакомительный курс, который позволил понять: «Что такое китайский
                                язык?» и «Хочу ли я стать носителем одного из древнейших языков?»
                                Не знаю как, но после 8 занятий у сына желание не только не пропало, НО ребёнок поставил
                                себе ЦЕЛЬ: выучить язык и поступить в китайский вуз!<br>

                                Грамотно разработанная программа, дисциплина и главное «контакт» с ребёнком, умение
                                замотивировать и заинтересовать дали свой результат уже через 8 мес! Первый экзамен 200
                                баллов из 200!<br>

                                Ждём через 3 месяца следующий экзамен и уверены в аналогичном результате! Спасибо Алене
                                Алексеевне! Не каждый учитель является педагогом!</p>
                            <a href="#" class="text-orange-2 read-more">Показать больше</a>
                        </div>

                        <div class="image">
                            <img src="{{asset('assets/promo-site/images/reviews/review3.jpg')}}" alt=""/>
                        </div>
                        <div class="info">
                            <h5 class="less-mar1">Наталья Манжелли</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="{{route('site.reviews')}}" class="sh-btn sh-btn-orange sh-btn-medium sh-btn-round margin">
                    Больше отзывов
                </a>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    <section id="news">
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

                </div>
                <!--end item-->
            </div>
        </div>
    </section>
    <!--end section -->
    <div class="clearfix"></div>
@endsection

@section('modals')
    {{--    <div class="lk-modal-wrap">--}}
    {{--        <div class="lk-modal">--}}
    {{--            <div class="container">--}}
    {{--                <div class="modal-close-wrap">--}}
    {{--                    <div class="modal-close"></div>--}}
    {{--                </div>--}}
    {{--                <div class="modal-video">--}}
    {{--                    <video--}}
    {{--                            id="promo-video"--}}
    {{--                            class="video-js"--}}
    {{--                            controls--}}
    {{--                            preload="auto"--}}
    {{--                            style="width: 1200px; max-width: 100%;"--}}
    {{--                            poster="{{asset('assets/promo-site/video-poster.jpg')}}"--}}
    {{--                            data-setup="{}"--}}
    {{--                    >--}}
    {{--                        <source src="{{asset('assets/promo-site/banner_RoK.mp4')}}" type="video/mp4"/>--}}
    {{--                        <source src="{{asset('assets/promo-site/banner_RoK.webm')}}" type="video/webm"/>--}}
    {{--                        <p class="vjs-no-js">--}}
    {{--                            To view this video please enable JavaScript, and consider upgrading to a--}}
    {{--                            web browser that--}}
    {{--                            <a href="https://videojs.com/html5-video-support/" target="_blank"--}}
    {{--                            >supports HTML5 video</a--}}
    {{--                            >--}}
    {{--                        </p>--}}
    {{--                    </video>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection