<div class="topbar primary-bg topbar-padding">
    <div class="container">
        <div class="topbar-left-items">
            <ul class="toplist toppadding pull-left paddtop1">
                <li><a href="tel:+79856483542">+7 (985) 648-35-42</a></li>
            </ul>
        </div>
        <!--end left-->

        <div class="topbar-right-items pull-right">
            <ul class="toplist toppadding">
                @auth()
                    <li class="lineright">
                        <a href="{{route('profile.show')}}">Мой аккаунт</a>
                    </li>
                @else
                    <li class="lineright">
                        <a href="{{route('login')}}">Войти</a>
                    </li>
                    <li class="lineright">
                        <a href="{{route('register')}}">Регистрация</a>
                    </li>
                @endif
                <li><a href="https://www.facebook.com/codelayers"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/codelayers"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li class="last"><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div id="header">
    <div class="container">
        <div class="navbar navbar-default yamm">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid"
                        class="navbar-toggle two three">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a href="{{url('/')}}" class="navbar-brand">
                    <img src="{{asset('assets/site/img/logo.svg')}}" alt="Лингва-Кит"/>
                </a>
            </div>
            <div id="navbar-collapse-grid" class="navbar-collapse collapse pull-right">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" class="">О нас</a>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle">Курсы</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Курс 1</a></li>
                            <li><a href="#">Курс 2</a></li>
                            <li><a href="#">Курс 3</a></li>
                            <li><a href="#">Курс 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="">Статьи</a>
                    </li>
                    <li>
                        <a href="#" class="">Изучающим в помощь</a>
                    </li>
                    <li>
                        <a href="#" class="">Тесты</a>
                    </li>
                    <li>
                        <a href="#" class="">Контакты</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--end menu-->
<div class="clearfix"></div>