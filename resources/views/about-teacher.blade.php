@extends('layouts.new-app')

@section('content')
    <section>
        <div class="header-inner two">
            <div class="inner text-center">
                <h4 class="title text-white uppercase">Преподаватели</h4>
            </div>
            <div class="overlay bg-opacity-5"></div>
            <img src="{{asset('assets/promo-site/images/teacher-bg.jpg')}}" alt="" class="img-responsive"/></div>
    </section>
    <div class="clearfix"></div>

    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="pagenation_links">
                            <a href="{{url('/')}}">Главная</a><i> / </i> Алёна Пристинская
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 bmargin">
                    <h3 class="uppercase less-mar2">Алёна Пристинская</h3>
                    <div class="col-md-12 text-left nopadding"><img src="images/title-botton-shape.png" alt=""/></div>
                    <div class="clearfix"></div>
                    <br/>
                    <p>Здравствуйте!</p>
                    <p>Меня зовут Алена Алексеевна, в 2005 году закончила Педагогический Университет в г. Благовещенск,
                        который находится на самой северной границе с Китаем.</p>
                    <p>Поднебесная привлекает меня своей уникальностью и историей, а работа с детьми, студентами и
                        взрослыми приносит мне только положительные эмоции, именно поэтому я посвящаю свою жизнь
                        преподавательской деятельности. </p>
                    <p>Работала в общеобразовательной школе с 2005 года, но репетитором работала с 2000 г.</p>
                    <p>Работала в общеобразовательной школе с 2005 года, но репетитором работала с 2000 г.</p>
                    <ul>
                        <li>В 2009 - 2010 гг. получила награды «Учитель Года» в разных номинациях.</li>
                        <li>В 2010 г. — кружок «Китайский язык и культура Китая» получил I место на областной выставке
                            «Инновации в системе образования Свердловской области»
                        </li>
                    </ul>
                    <br>
                    <p>Прошла курсы повышения квалификации и стажировки в российских и китайских университетах:</p>
                    <ul>
                        <li>2020 г. — Практикум профессиональной педагогической коммуникации (китайский язык) при
                            МГЛУ
                        </li>
                        <li>2020 г. — краткосрочная программа подготовки для преподавателей китайского языка (Пекин)
                        </li>
                        <li>2021 г. — подготовка экспертов ЕГЭ по китайскому языку (Москва)</li>
                        <li>2021 г. — краткосрочный курс «Последовательный перевод «Китайский язык»</li>
                        <li>2021 г. — онлайн-курсы для российских преподавателей китайского языка (Университет Миньцзу,
                            КНР)
                        </li>
                        <li>2021 г. — онлайн-курс во Втором Пекинском Университете иностранных языков (Пекин, КНР)</li>
                        <li>2022 г. — 3-х месячные курсы в Пекинском педагогическом университете (Пекин, КНР)</li>
                        <li>2023 г. — годовая стажировка в Шаньдунском педагогическом университете (Шаньдун, КНР)</li>
                    </ul>
                    <br/>
                    <ul class="personal-info orange-2">
                        <li><i class="fa fa-phone"></i> Телефон : +7 (985) 648-35-42</li>
                        <li><i class="fa fa-envelope"></i> Email : pristya@bk.ru</li>
                        <li><i class="fa fa-globe"></i> Сайт : lingvakit.ru</li>
                    </ul>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 bmargin">
                    <img src="{{asset('assets/promo-site/images/teachers/teacher1-full.jpg')}}" alt=""
                         class="img-responsive"/>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>

    <section class="sec-tpadding-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="section-title">Дипломы и сертификаты</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="demo-full-width">
                    <div id="grid-container" class="cbp">
                        <div class="cbp-item identity logos">
                            <a href="{{asset('assets/promo-site/images/teachers/teacher1/2.jpg')}}"
                               class="cbp-caption cbp-lightbox" data-title="Suspendisse Imperdiet<br>by Codelayers">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{asset('assets/promo-site/images/teachers/teacher1/2.jpg')}}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Suspendisse Imperdiet</div>
                                            <div class="cbp-l-caption-desc">by Codelayers</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item web-design">
                            <a href="{{asset('assets/promo-site/images/teachers/teacher1/3.jpg')}}"
                               class="cbp-caption cbp-lightbox" data-title="Suspendisse Imperdiet<br>by Codelayers">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{asset('assets/promo-site/images/teachers/teacher1/3.jpg')}}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Suspendisse Imperdiet</div>
                                            <div class="cbp-l-caption-desc">by Codelayers</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item motion identity">
                            <a href="{{asset('assets/promo-site/images/teachers/teacher1/4.jpeg')}}"
                               class="cbp-caption cbp-lightbox"
                               data-title="World Clock Widget<br>by Codelayers">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{asset('assets/promo-site/images/teachers/teacher1/4.jpeg')}}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Maecenas Sed</div>
                                            <div class="cbp-l-caption-desc">by Codelayers</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="cbp-item identity graphic">
                            <a href="{{asset('assets/promo-site/images/teachers/teacher1/5.jpeg')}}"
                               class="cbp-caption cbp-lightbox"
                               data-title="Quisque Ornare <br>by Codelayers">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{asset('assets/promo-site/images/teachers/teacher1/5.jpg')}}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Quisque Ornare</div>
                                            <div class="cbp-l-caption-desc">by Codelayers</div>
                                        </div>
                                    </div>
                                </div>
                            </a></div>
                        <div class="cbp-item identity graphic">
                            <a href="{{asset('assets/promo-site/images/teachers/teacher1/6.jpg')}}"
                               class="cbp-caption cbp-lightbox"
                               data-title="Quisque Ornare <br>by Codelayers">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{asset('assets/promo-site/images/teachers/teacher1/6.jpg')}}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Quisque Ornare</div>
                                            <div class="cbp-l-caption-desc">by Codelayers</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item identity graphic">
                            <a href="{{asset('assets/promo-site/images/teachers/teacher1/7.1.jpg')}}"
                               class="cbp-caption cbp-lightbox"
                               data-title="Quisque Ornare <br>by Codelayers">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{asset('assets/promo-site/images/teachers/teacher1/7.1.jpg')}}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Quisque Ornare</div>
                                            <div class="cbp-l-caption-desc">by Codelayers</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item identity graphic">
                            <a href="{{asset('assets/promo-site/images/teachers/teacher1/7.2.jpg')}}"
                               class="cbp-caption cbp-lightbox"
                               data-title="Quisque Ornare <br>by Codelayers">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{asset('assets/promo-site/images/teachers/teacher1/7.2.jpg')}}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Quisque Ornare</div>
                                            <div class="cbp-l-caption-desc">by Codelayers</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item identity graphic">
                            <a href="{{asset('assets/promo-site/images/teachers/teacher1/8.jpg')}}"
                               class="cbp-caption cbp-lightbox"
                               data-title="Quisque Ornare <br>by Codelayers">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{asset('assets/promo-site/images/teachers/teacher1/8.jpg')}}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Quisque Ornare</div>
                                            <div class="cbp-l-caption-desc">by Codelayers</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="cbp-item identity graphic">
                            <a href="{{asset('assets/promo-site/images/teachers/teacher1/10.jpg')}}"
                               class="cbp-caption cbp-lightbox"
                               data-title="Quisque Ornare <br>by Codelayers">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{{asset('assets/promo-site/images/teachers/teacher1/10.jpg')}}" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">Quisque Ornare</div>
                                            <div class="cbp-l-caption-desc">by Codelayers</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/promo-site/js/cubeportfolio/cubeportfolio.min.css')}}">
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/promo-site/js/cubeportfolio/jquery.cubeportfolio.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/promo-site/js/cubeportfolio/main.js')}}"></script>
@endsection

