<header class="header">
    <nav class="navbar fixed-top">
        <!-- Begin Topbar -->
        <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
            <!-- Begin Logo -->
            <div class="navbar-header">
                <a href="{{ route('dashboard') }}" class="navbar-brand">
                    <div class="brand-image brand-big">
                        <img src="{{asset('assets/cms/img/logo-big.png')}}" alt="logo" class="logo-big">
                    </div>
                    <div class="brand-image brand-small">
                        <img src="{{asset('assets/cms/img/logo.png')}}" alt="logo" class="logo-small">
                    </div>
                </a>
                <!-- Toggle Button -->
                <a id="toggle-btn" href="#" class="menu-btn active">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <!-- End Toggle -->
            </div>
            <!-- Begin Navbar Menu -->

            {{--            @dd(auth()->user()->uncheckedHomeWorks()->count())--}}
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a id="notifications" rel="nofollow" data-target="#" href="#"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                       class="nav-link"><i
                                class="la la-bell @if(auth()->user()->uncheckedHomeWorks()->count()) animated infinite swing @endif"></i>
                        @if(auth()->user()->uncheckedHomeWorks()->count())
                            <span class="badge-pulse"></span>
                        @endif
                    </a>

                    <ul aria-labelledby="notifications" class="dropdown-menu notification">
                        <li>
                            <div class="notifications-header">
                                <div class="title">Уведомления</div>
                                <div class="notifications-overlay"></div>
                                <img src="{{asset('assets/cms/img/notifications/01.jpg')}}" alt="..." class="img-fluid">
                            </div>
                        </li>
                        <li>
                            <a href="{{route('dashboard.homeworks')}}">
                                <div class="message-icon">
                                    <i class="la la-calendar-check-o"></i>
                                </div>
                                <div class="message-body">
                                    <div class="message-body-heading">
                                        Домашние работы @if(auth()->user()->uncheckedHomeWorks()->count())
                                            ({{auth()->user()->uncheckedHomeWorks()->count()}})
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">Все
                                уведомления</a>
                        </li>
                    </ul>
                </li>
                <!-- User -->
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
                            <a href="app-mail.html" class="dropdown-item">
                                {{ __("cms-pages.messages") }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user-settings') }}" class="dropdown-item no-padding-bottom">
                                {{ __("cms-pages.settings") }}
                            </a>
                        </li>
                        <li class="separator"></li>
                        <li>
                            <a href="{{route('site.index')}}" class="dropdown-item no-padding-top">
                                {{ __("cms-pages.return-to-site") }}
                            </a>
                        </li>
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
            </ul>
        </div>
    </nav>
</header>
