<header class="header">
    <nav class="navbar fixed-top">
        <!-- Begin Topbar -->
        <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
            <!-- Begin Logo -->
            <div class="navbar-header">
                <a href="{{ route('site.index') }}" class="navbar-brand">
                    <div class="brand-image brand-big" style="display:none;">
                        <img src="{{asset('assets/site/img/logo-big.svg')}}" alt="logo" class="logo-big">
                    </div>
                    <div class="brand-image brand-small" style="display:block;">
                        <img src="{{asset('assets/site/img/logo.svg')}}" alt="logo" class="logo-small">
                    </div>
                </a>

                <!-- Toggle Button -->
                @if(Auth::user())
                    <a id="toggle-btn" href="#" class="menu-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                @endif
            </div>

            <ul class="nav-menu-list d-flex">
                <li class="nav-menu-item ml-3 mr-3">
                    <a href="{{route('site.index')}}">{{__("site-pages.home")}}</a>
                </li>
                <li class="nav-menu-item ml-3 mr-3">
                    <a href="{{route('site.about-us')}}">{{__("site-pages.about-us")}}</a>
                </li>
                <li class="nav-menu-item ml-3 mr-3">
                    <a href="{{route('site.contacts')}}">{{__("site-pages.contacts")}}</a>
                </li>
            </ul>

            <!-- Begin Navbar Menu -->
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                <!-- User -->
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#"
                                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                     class="nav-link"><img
                                src="{{asset('assets/cms/img/avatar/avatar-01.jpg')}}" alt="..."
                                class="avatar rounded-circle"></a>
                        <ul aria-labelledby="user" class="user-size dropdown-menu">
                            <li class="welcome">
                                <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                                <img src="{{ asset('assets/cms/img/avatar/avatar-01.jpg') }}" alt="..."
                                     class="rounded-circle">
                            </li>
                            <li>
                                <a href="{{ route('profile.show') }}" class="dropdown-item">
                                    {{ __("cms-pages.profile") }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user-settings') }}" class="dropdown-item no-padding-bottom">
                                    {{ __("cms-pages.settings") }}
                                </a>
                            </li>
                            <li class="separator"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{ route('logout') }}"
                                       class="dropdown-item logout text-center"
                                       onclick="event.preventDefault();this.closest('form').submit();">
                                        <i class="ti-power-off"></i>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <div class="page-header-tools">
                        <div class="btn-group" role="group" aria-label="Button Group">
                            @if (Route::has('register'))
                                <a class="btn btn-primary"
                                   href="{{ route('register') }}">{{ __("site-pages.register") }}
                                </a>
                            @endif

                            <a class="btn btn-shadow"
                               href="{{ route('login') }}">{{ __("site-pages.login") }}
                            </a>
                        </div>
                    </div>
                    @endif
                @endif
            </ul>
        </div>
    </nav>
</header>
